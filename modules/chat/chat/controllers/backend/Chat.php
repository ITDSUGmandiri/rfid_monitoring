<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Chat Controller
*| --------------------------------------------------------------------------
*| Chat site
*|
*/
class Chat extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_chat');
		$this->load->helper('chat');
	}

	/**
	* show all Chats
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('chat_list');


		$this->data['contacts'] = $this->model_chat->get_contacts();
		$this->data['emoji_html'] = $this->load->view('backend/standart/administrator/chat/partial/chat_emoji', [], true);

		$this->template->title('Chat List');
        $this->render('backend/standart/administrator/chat/chat_list', $this->data);
	}

	public function new_private_chat()
	{
		if (!$this->is_allowed('chat_list', false)) {
			$this->response([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
		}

		$contact_id = $this->input->get('contact_id');

		if ($contact_id == get_user_data('id')) {
			die();
		}

		$chat = $this->model_chat->chat_is_exist($contact_id);

		if (!$chat) {
			$new_chat_id = $this->model_chat->new_private_chat($contact_id);
			$chat = $this->model_chat->find($new_chat_id);
		}

		$messages = $this->model_chat->get_messages($chat->chat_uid);
		$this->model_chat->read_message($chat->chat_uid, $contact_id);

		$this->model_chat->add_to_contact($contact_id);
		$this->response([
			'success' => true,
			'data' => [
				'messages' => $messages,
				'chat' => $chat,
			],
		]);
	}


	public function get_message()
	{
		if (!$this->is_allowed('chat_list', false)) {
			$this->response([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
		}

		$chat_id = $this->input->get('chat_id');
		$offset = $this->input->get('offset');

		$messages = $this->model_chat->get_messages($chat_id, $offset);

		$this->response([
			'success' => true,
			'data' => [
				'messages' => $messages,
				'total' => count($messages),
				'offset' => $offset,
			],
		]);
	}
	public function get_search_message()
	{
		if (!$this->is_allowed('chat_list', false)) {
			$this->response([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
		}

		$chat_id = $this->input->get('chat_id');
		$message_id = $this->input->get('message_id');

		$messages = $this->model_chat->get_search_message($chat_id, $message_id);

		$this->response([
			'success' => true,
			'data' => [
				'messages' => $messages,
			],
		]);
	}
	public function send_message()
	{
		if (!$this->is_allowed('chat_list', false)) {
			$this->response([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
		}

		$chat_id = $this->input->post('chat_id');
		$message = $this->input->post('message');
		$uid = $this->input->post('uid');
		$user_id = get_user_data('id');
		$user_full_name = get_user_data('full_name');

		if ($message == null){
			die;
		}

		$message = (nl2br(trim($message)));
		$message = strip_tags($message, '<br>');
		$message = $this->_filter_message_image($message);

		$data = [
			'message' =>$message,
			'chat_id' => $chat_id,
			'message_user_id' => $user_id,
			'status' => 'sent',
			'uid' => $uid,
			'created_at' => now()
		];
		$message_id = $this->model_chat->send_message($data);

		$dateTime = new DateTime();

		$data['id']  = $message_id;
		$data['user_full_name']  = $user_full_name;

		$members = $this->model_chat->get_member($chat_id);
		$this->model_chat->notify_to_member($members, $data);

		$this->model_chat->change_by([
			'chat_uid' => $chat_id
		],[
			'updated_at' => now(),
		]);

		$this->response([
			'success' => true,
		]);
	}

	public function _filter_message_image($message = null)
	{
		$message = preg_replace('/(<br>)+$/', '', $message);
		preg_match_all('#\[image\=([^/]+\/[^/]+)\]#', $message, $matches);
		foreach ($matches[1] as $path) {

			if (!is_dir(FCPATH . '/uploads/chat/')) {
				mkdir(FCPATH . '/uploads/chat/');
			}

			list($uid, $file_name) = explode('/', $path);

			$chat_image_name_copy = date('YmdHis') . '-' . $file_name;

			@rename(FCPATH . 'uploads/tmp/' . $uid . '/' .  $file_name, 
					FCPATH . 'uploads/chat/' . $chat_image_name_copy);

			$message = str_replace($path, $chat_image_name_copy, $message);

			if (!is_file(FCPATH . '/uploads/chat/' . $chat_image_name_copy)) {
				echo json_encode([
					'success' => false,
					'message' => 'Error uploading file'
					]);
				exit;
			}

		
		}

		return $message;
		
	}

	public function get_chat()
	{
		if (!$this->is_allowed('chat_list', false)) {
			$this->response([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
		}

		$chats = $this->model_chat->get_chats();

		$this->response([
			'success' => true,
			'data' => [
				'chats' => $chats,
			],
		]);
	}

	public function find_chats()
	{
		if (!$this->is_allowed('chat_list', false)) {
			$this->response([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
		}
		$q = $this->input->get('q');
		$chats = $this->model_chat->find_chats($q);

		$this->response([
			'success' => true,
			'data' => [
				'chats' => $chats,
			],
		]);
	}

	public function find_contacts()
	{
		if (!$this->is_allowed('chat_list', false)) {
			$this->response([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
		}
		$q = $this->input->get('q');
		$contact = $this->model_chat->find_contact($q);

		$this->response([
			'success' => true,
			'data' => [
				'contact' => $contact,
			],
		]);
	}

	public function upload_image_file()
	{
		if (!$this->is_allowed('', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');
		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'chat',
			'allowed_types' => '*',
		]);
	}


	public function delete_image_file($uuid)
	{
		if (!$this->is_allowed('', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'image', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'chat',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/chat/'
        ]);
	}

	public function read_message()
	{
		if (!$this->is_allowed('chat_list', false)) {
			$this->response([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
		}
		$chat_id = $this->input->get('chat_id');
		$contact_id = $this->input->get('contact_id');
		$read = $this->model_chat->read_message($chat_id, $contact_id);

		$this->response([
			'success' => true,
			'data' => [
				'ids' => $read,
			],
		]);
	}

	public function avatar($filename = null)
	{
		$path_file = FCPATH . '/uploads/user/';
		$file_path = $path_file . $filename;
		$file = $file_path;
		if (!is_file($file_path)) {
			$file = $path_file . 'default.png';
		}
		$this->load->library('Image_resize', $file);
		$this->image_resize->crop(100, 100);
		$this->image_resize->output();
	}


}


/* End of file chat.php */
/* Location: ./application/controllers/administrator/Chat.php */