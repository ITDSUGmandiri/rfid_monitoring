<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Chat Message Controller
*| --------------------------------------------------------------------------
*| Chat Message site
*|
*/
class Chat_message extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_chat_message');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Chat Messages
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('chat_message_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['chat_messages'] = $this->model_chat_message->get($filter, $field, $this->limit_page, $offset);
		$this->data['chat_message_counts'] = $this->model_chat_message->count_all($filter, $field);

		$config = [
			'base_url'     => ADMIN_NAMESPACE_URL  . '/chat_message/index/',
			'total_rows'   => $this->data['chat_message_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Chat Message List');
		$this->render('backend/standart/administrator/chat_message/chat_message_list', $this->data);
	}
	
	/**
	* Add new chat_messages
	*
	*/
	public function add()
	{
		$this->is_allowed('chat_message_add');

		$this->template->title('Chat Message New');
		$this->render('backend/standart/administrator/chat_message/chat_message_add', $this->data);
	}

	/**
	* Add New Chat Messages
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('chat_message_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('message_user_id', 'Message User Id', 'trim|required|max_length[11]');
		

		$this->form_validation->set_rules('chat_id', 'Chat Id', 'trim|required|max_length[100]');
		

		$this->form_validation->set_rules('uid', 'Uid', 'trim|required|max_length[100]');
		

		$this->form_validation->set_rules('message', 'Message', 'trim|required');
		

		$this->form_validation->set_rules('status', 'Status', 'trim|required|max_length[100]');
		

		$this->form_validation->set_rules('created_at', 'Created At', 'trim|required');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'message_user_id' => $this->input->post('message_user_id'),
				'chat_id' => $this->input->post('chat_id'),
				'uid' => $this->input->post('uid'),
				'message' => $this->input->post('message'),
				'status' => $this->input->post('status'),
				'created_at' => $this->input->post('created_at'),
			];

			
			



			
			
			$save_chat_message = $id = $this->model_chat_message->store($save_data);
            

			if ($save_chat_message) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_chat_message;
					$this->data['message'] = cclang('success_save_data_stay', [
						admin_anchor('/chat_message/edit/' . $save_chat_message, 'Edit Chat Message'),
						admin_anchor('/chat_message', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						admin_anchor('/chat_message/edit/' . $save_chat_message, 'Edit Chat Message')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/chat_message');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/chat_message');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		$this->response($this->data);
	}
	
		/**
	* Update view Chat Messages
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('chat_message_update');

		$this->data['chat_message'] = $this->model_chat_message->find($id);

		$this->template->title('Chat Message Update');
		$this->render('backend/standart/administrator/chat_message/chat_message_update', $this->data);
	}

	/**
	* Update Chat Messages
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('chat_message_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('message_user_id', 'Message User Id', 'trim|required|max_length[11]');
		

		$this->form_validation->set_rules('chat_id', 'Chat Id', 'trim|required|max_length[100]');
		

		$this->form_validation->set_rules('uid', 'Uid', 'trim|required|max_length[100]');
		

		$this->form_validation->set_rules('message', 'Message', 'trim|required');
		

		$this->form_validation->set_rules('status', 'Status', 'trim|required|max_length[100]');
		

		$this->form_validation->set_rules('created_at', 'Created At', 'trim|required');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'message_user_id' => $this->input->post('message_user_id'),
				'chat_id' => $this->input->post('chat_id'),
				'uid' => $this->input->post('uid'),
				'message' => $this->input->post('message'),
				'status' => $this->input->post('status'),
				'created_at' => $this->input->post('created_at'),
			];

			

			


			
			
			$save_chat_message = $this->model_chat_message->change($id, $save_data);

			if ($save_chat_message) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						admin_anchor('/chat_message', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/chat_message');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/chat_message');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		$this->response($this->data);
	}
	
	/**
	* delete Chat Messages
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('chat_message_delete');

		$this->load->helper('file');

		$arr_id = $this->input->get('id');
		$remove = false;

		if (!empty($id)) {
			$remove = $this->_remove($id);
		} elseif (count($arr_id) >0) {
			foreach ($arr_id as $id) {
				$remove = $this->_remove($id);
			}
		}

		if ($remove) {
            set_message(cclang('has_been_deleted', 'chat_message'), 'success');
        } else {
            set_message(cclang('error_delete', 'chat_message'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Chat Messages
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('chat_message_view');

		$this->data['chat_message'] = $this->model_chat_message->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Chat Message Detail');
		$this->render('backend/standart/administrator/chat_message/chat_message_view', $this->data);
	}
	
	/**
	* delete Chat Messages
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$chat_message = $this->model_chat_message->find($id);

		
		
		return $this->model_chat_message->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('chat_message_export');

		$this->model_chat_message->export(
			'chat_message', 
			'chat_message',
			$this->model_chat_message->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('chat_message_export');

		$this->model_chat_message->pdf('chat_message', 'chat_message');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('chat_message_export');

		$table = $title = 'chat_message';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_chat_message->find($id);
        $fields = $result->list_fields();

        $content = $this->pdf->loadHtmlPdf('core_template/pdf/pdf_single', [
            'data' => $data,
            'fields' => $fields,
            'title' => $title
        ], TRUE);

        $this->pdf->initialize($config);
        $this->pdf->pdf->SetDisplayMode('fullpage');
        $this->pdf->writeHTML($content);
        $this->pdf->Output($table.'.pdf', 'H');
	}

	
}


/* End of file chat_message.php */
/* Location: ./application/controllers/administrator/Chat Message.php */