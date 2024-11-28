<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Log Controller
*| --------------------------------------------------------------------------
*| Log site
*|
*/
class Log extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_log');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Logs
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('log_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['logs'] = $this->model_log->get($filter, $field, $this->limit_page, $offset);
		$this->data['log_counts'] = $this->model_log->count_all($filter, $field);

		$config = [
			'base_url'     => ADMIN_NAMESPACE_URL  . '/log/index/',
			'total_rows'   => $this->data['log_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Log List');
		$this->render('backend/standart/administrator/log/log_list', $this->data);
	}
	
	/**
	* Add new logs
	*
	*/
	public function add()
	{
		$this->is_allowed('log_add');

		$this->template->title('Log New');
		$this->render('backend/standart/administrator/log/log_add', $this->data);
	}

	/**
	* Add New Logs
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('log_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[200]');
		

		$this->form_validation->set_rules('message', 'Message', 'trim|required');
		

		$this->form_validation->set_rules('type', 'Type', 'trim|required|max_length[200]');
		

		$this->form_validation->set_rules('data', 'Data', 'trim|required');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'title' => $this->input->post('title'),
				'message' => $this->input->post('message'),
				'type' => $this->input->post('type'),
				'data' => $this->input->post('data'),
				'created_at' => date('Y-m-d H:i:s'),
			];

			
			



			
			
			$save_log = $id = $this->model_log->store($save_data);
            

			if ($save_log) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_log;
					$this->data['message'] = cclang('success_save_data_stay', [
						admin_anchor('/log/edit/' . $save_log, 'Edit Log'),
						admin_anchor('/log', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						admin_anchor('/log/edit/' . $save_log, 'Edit Log')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/log');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/log');
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
	* Update view Logs
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('log_update');

		$this->data['log'] = $this->model_log->find($id);

		$this->template->title('Log Update');
		$this->render('backend/standart/administrator/log/log_update', $this->data);
	}

	/**
	* Update Logs
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('log_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[200]');
		

		$this->form_validation->set_rules('message', 'Message', 'trim|required');
		

		$this->form_validation->set_rules('type', 'Type', 'trim|required|max_length[200]');
		

		$this->form_validation->set_rules('data', 'Data', 'trim|required');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'title' => $this->input->post('title'),
				'message' => $this->input->post('message'),
				'type' => $this->input->post('type'),
				'data' => $this->input->post('data'),
				'created_at' => date('Y-m-d H:i:s'),
			];

			

			


			
			
			$save_log = $this->model_log->change($id, $save_data);

			if ($save_log) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						admin_anchor('/log', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/log');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/log');
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
	* delete Logs
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('log_delete');

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
            set_message(cclang('has_been_deleted', 'log'), 'success');
        } else {
            set_message(cclang('error_delete', 'log'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Logs
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('log_view');

		$this->data['log'] = $this->model_log->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Log Detail');
		$this->render('backend/standart/administrator/log/log_view', $this->data);
	}
	
	/**
	* delete Logs
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$log = $this->model_log->find($id);

		
		
		return $this->model_log->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('log_export');

		$this->model_log->export(
			'log', 
			'log',
			$this->model_log->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('log_export');

		$this->model_log->pdf('log', 'log');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('log_export');

		$table = $title = 'log';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_log->find($id);
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


/* End of file log.php */
/* Location: ./application/controllers/administrator/Log.php */