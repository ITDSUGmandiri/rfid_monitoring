<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_chat extends MY_Model
{

	private $primary_key 	= 'id';
	private $table_name 	= 'chat';
	private $field_search 	= ['title'];

	const TYPE_PRIVATE_CHAT = 'private';
	const TYPE_GROUP_CHAT 	= 'group';

	public function __construct()
	{
		$config = array(
			'primary_key' 	=> $this->primary_key,
			'table_name' 	=> $this->table_name,
			'field_search' 	=> $this->field_search,
		);

		parent::__construct($config);
		$this->load->model('user/model_user');
	}

	public function get_contacts()
	{
		$contacts = $this->db->query('
			SELECT au.username,au.avatar, au.id, au.full_name, au.email, GROUP_CONCAT(ag.name) as groups
				FROM chat_contact cc
					LEFT JOIN aauth_users au
						ON au.id = cc.contact_id
					LEFT JOIN aauth_user_to_group aug
						ON aug.user_id = au.id
					LEFT JOIN aauth_groups ag
						ON ag.id = aug.group_id
				WHERE cc.user_id = "' . get_user_data('id') . '"
				GROUP BY au.id
			')->result();

		$contacts = array_map(function ($row) {
			$group = explode(',', $row->groups);
			$group = array_flip($group);
			unset($group['Default']);
			$group = array_flip($group);
			$row->group = @array_values($group)[0];
			return $row;
		}, $contacts);
		return $contacts;
	}

	public function chat_is_exist($user_contact_id = null)
	{
		$user_id = get_user_data('id');

		$chat = $this->db->query('
			SELECT * FROM chat ch

				WHERE (
						ch.user_one = "' . $user_contact_id . '"
							AND ch.user_two = "' . $user_id . '") 
					OR 
					(
						ch.user_two = "' . $user_contact_id . '"
							AND ch.user_one = "' . $user_id . '") 

			')->row();

		return $chat;
	}

	public function new_private_chat($user_contact_id = null)
	{
		$user_id = get_user_data('id');
		$chat_uid = gen_chat_uuid();
		$chat = $this->store([
			'type' => self::TYPE_PRIVATE_CHAT,
			'user_one' => $user_id,
			'user_two' => $user_contact_id,
			'chat_uid' => $chat_uid,
			'created_at' => now(),
		]);

		return $chat;
	}

	public function change_by($change, $data = array())
	{
		$this->db->where($change);
		$this->db->update($this->table_name, $data);

		return $this->db->affected_rows();
	}

	public function get_messages($chat_id = null, $offset = 0, $limit = 50)
	{
		$user_id = get_user_data('id');


		$messages = $this->db->query('
			SELECT 
				*,  @curRow := @curRow + 1 AS row_number
				FROM chat_message cms
				
				WHERE cms.chat_id = "' . $chat_id . '"
				
				ORDER BY cms.created_at DESC
				LIMIT ' . $offset . ',' . $limit . '

			')->result();

		$sort_messages = [];

		foreach ($messages as $row) {
			$sort_messages[$row->id] = $row;
		}

		return $sort_messages;
	}


	public function find_message_by_uid($uid = NULL)
	{

		$this->db->where('uid', $uid);
		$query = $this->db->get('chat_message');

		return $query->row();
	}

	public function get_search_message($chat_id = null, $message_id = 0)
	{
		$user_id = get_user_data('id');

		$message = $this->find_message_by_uid($message_id);
		$message_id = $message->id;
		$message_id = abs($message_id - 10);

		$messages = $this->db->query('
			SELECT 
				*
				FROM chat_message cms
				
				WHERE cms.chat_id = "' . $chat_id . '"
				AND  id >= ' . $message_id . ' 
				ORDER BY cms.created_at ASC
				LIMIT 20

			')->result();

		$sort_messages = [];

		foreach ($messages as $row) {
			$sort_messages[$row->id] = $row;
		}

		return $sort_messages;
	}


	public function get_chat_message($chat_id = null, $offset = null)
	{
		$user_id = get_user_data('id');

		$messages = $this->db->query('
			SELECT * FROM chat_message cms
				
				WHERE cms.chat_id = "' . $chat_id . '"

				ORDER BY cms.created_at DESC
				LIMIT 50

			')->result();

		$sort_messages = [];

		foreach ($messages as $row) {
			$sort_messages[$row->id] = $row;
		}

		return $sort_messages;
	}

	public function get_last_message($chat_id = null, $user_id = null, $owner_id = null)
	{
		$message = $this->db->query('
			SELECT * FROM chat_message cms
				
				WHERE cms.chat_id = "' . $chat_id . '"
					AND (cms.message_user_id = "' . $user_id . '" OR cms.message_user_id = "' . $owner_id . '")

				ORDER BY cms.created_at DESC

			')->row();

		return $message;
	}

	public function send_message($data = [])
	{

		$user_id = get_user_data('id');

		$chat = $this->db->insert('chat_message', $data);

		return $this->db->insert_id();
	}

	public function get_chats()
	{
		$cur_id_user = $owner_id = get_user_data('id');

		$chats = $this->db->query('
			SELECT *,
				(
				SELECT count(status) 
					FROM chat_message chms  
					WHERE chms.chat_id = ch.chat_uid
						AND chms.message_user_id != ' . $cur_id_user . '
						AND status = "sent"
				) as unread
				FROM chat ch

				WHERE (
						ch.user_one = "' . $cur_id_user . '"
							or ch.user_two = "' . $cur_id_user . '") 
				ORDER BY ch.updated_at DESC
			')->result();

		$chat_arr = [];

		$i = 0;
		foreach ($chats as $chat) {
			$i++;
			$user_id = $chat->user_one;
			if ($chat->user_two != $cur_id_user) {
				$user_id = $chat->user_two;
			}
			if ($chat->user_one != $cur_id_user) {
				$user_id = $chat->user_one;
			}
			$chat->user_id = $user_id;
			$this->db->select('id, username, avatar, full_name');
			$chat->user = $this->model_user->find($user_id);
			@$chat->user->group = @get_user_first_group($user_id)->name;
			$last_message = ($this->get_last_message($chat->chat_uid, $user_id, $owner_id));
			preg_match_all('#\[image\=([^/]+)\]$#', @$last_message->message, $matches);
			@$last_message->message = strip_tags($last_message->message);
			foreach ($matches[0] as $path) {
				@$last_message->message  = str_replace($path, '<i class="fa fa-camera"></i> image', @$last_message->message);
			}
			@$last_message->message = (@$last_message->message);
			$chat->messages = [];
			if ($i <= 8) {
				$chat->messages = $this->get_messages($chat->chat_uid, 0, 25);
			}
			$chat->last_message = $last_message;
			$chat_arr[] = $chat;
		}
		return $chat_arr;
	}

	public function find_chats($filter = null)
	{
		$cur_id_user = $owner_id = get_user_data('id');

		$chats = $this->db->query('
			SELECT *
				 FROM chat ch
				 	LEFT JOIN chat_message cm
				 		ON cm.chat_id = ch.chat_uid

				WHERE (
						ch.user_one = "' . $cur_id_user . '"
							or ch.user_two = "' . $cur_id_user . '") 

					AND cm.message LIKE "%' . $filter . '%"
				ORDER BY ch.updated_at DESC
			')->result();

		$chat_arr = [];

		foreach ($chats as $chat) {
			$user_id = $chat->user_one;
			if ($chat->user_two != $cur_id_user) {
				$user_id = $chat->user_two;
			}
			if ($chat->user_one != $cur_id_user) {
				$user_id = $chat->user_one;
			}
			$chat->user_id = $user_id;
			$this->db->select('id, username, avatar, full_name');
			$chat->user = $this->model_user->find($user_id);
			$last_message = ($this->get_last_message($chat->chat_uid, $user_id, $owner_id));
			preg_match_all('#\[image\=([^/]+)\]$#', @$chat->message, $matches);
			@$chat->message = strip_tags($chat->message);
			foreach ($matches[0] as $path) {
				@$chat->message  = str_replace($path, '<i class="fa fa-camera"></i> image', @$chat->message);
			}
			@$chat->message = substr(@$chat->message, 0, 50);
			$chat->last_message = $chat->message;
			$chat_arr[] = $chat;
		}

		return $chat_arr;
	}

	public function read_message($chat_id = null, $contact_id = null)
	{
		$query = $this->db->query('
			SELECT id, uid
				FROM chat_message cms 

				WHERE cms.chat_id = "' . $chat_id . '"
					AND cms.message_user_id = "' . $contact_id . '" 
					AND status = "sent"
			')->result();

		$read_ids = array_map(function ($row) {
			return $row->uid;
		}, $query);
		$message = $this->db->query('
			UPDATE chat_message cms
				SET status = "read"
				
				WHERE cms.chat_id = "' . $chat_id . '"
					AND cms.message_user_id = "' . $contact_id . '" 
			');

		$return = writeData(CHAT_READ_PATH . '/' . $contact_id . '/' . uniqid(), [
			'chat_id' => $chat_id,
			'ids' => $read_ids
		]);

		return $read_ids;
	}

	public function get_member($chat_id = null)
	{
		$result = $this->db->get_where($this->table_name, [
			'chat_uid' => $chat_id
		])->row();

		return [
			$result->user_one,
			$result->user_two,
		];
	}

	public function notify_to_member($members = null, $data = [])
	{
		foreach ($members as $id) {
			writeData(DEFAULT_PATH . gen_user_id($id) . '/' . uniqid(), $data);
		}
	}
	public function find_contact($filter = null)
	{
		$contact =  $this->db->query('
			SELECT 
				id, email, username, avatar, full_name FROM aauth_users
				WHERE (email = "' . $filter . '"
								OR username = "' . $filter . '"
								)
						AND id != "' . get_user_data('id') . '"
				')->row();




		if ($contact) {
			$contact->group = get_user_first_group($contact->id);
		}
		return $contact;
	}

	public function add_to_contact($contact_id = null)
	{
		if (!$this->db->get_where('chat_contact', [
			'contact_id' => $contact_id,
			'user_id' => get_user_data('id'),
		])->row()) {
			$this->db->insert('chat_contact', [
				'contact_id' => $contact_id,
				'user_id' => get_user_data('id'),
			]);
		}
	}
}

/* End of file Model_blog.php */
/* Location: ./application/models/Model_blog.php */