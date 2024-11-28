<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Tb Log Act Controller
*| --------------------------------------------------------------------------
*| Tb Log Act site
*|
*/
class Tb_log_act extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tb_log_act');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Tb Log Acts
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('tb_log_act_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tb_log_acts'] = $this->model_tb_log_act->get($filter, $field, $this->limit_page, $offset);
		$this->data['tb_log_act_counts'] = $this->model_tb_log_act->count_all($filter, $field);

		$config = [
			'base_url'     => ADMIN_NAMESPACE_URL  . '/tb_log_act/index/',
			'total_rows'   => $this->data['tb_log_act_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);
		
		$this->data['tables'] = $this->load->view('backend/standart/administrator/tb_log_act/tb_log_act_data_table', $this->data, true);
		
		if ($this->input->get('ajax')) {
			$this->response([
				'tables' => $this->data['tables'],
				'pagination' => $this->data['pagination'],
				'total_row' => $this->data['tb_log_act_counts']
			]);
		}

		$this->template->title('Tb Log Act List');
		$this->render('backend/standart/administrator/tb_log_act/tb_log_act_list', $this->data);
	}
	
	/**
	* Add new tb_log_acts
	*
	*/
	public function add()
	{
		$this->is_allowed('tb_log_act_add');

		$this->template->title('Tb Log Act New');
		$this->render('backend/standart/administrator/tb_log_act/tb_log_act_add', $this->data);
	}

	/**
	* Add New Tb Log Acts
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('tb_log_act_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('log_id', 'Log Id', 'trim|required|max_length[11]');
		

		$this->form_validation->set_rules('act_id', 'Act Id', 'trim|required|max_length[11]');
		

		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required|max_length[255]');
		

		$this->form_validation->set_rules('user', 'User', 'trim|required|max_length[255]');
		

		$this->form_validation->set_rules('date', 'Date', 'trim|required');
		

		$this->form_validation->set_rules('time', 'Time', 'trim|required');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'log_id' => $this->input->post('log_id'),
				'act_id' => $this->input->post('act_id'),
				'keterangan' => $this->input->post('keterangan'),
				'user' => $this->input->post('user'),
				'date' => $this->input->post('date'),
				'time' => $this->input->post('time'),
			];

			
			



			
			
			$save_tb_log_act = $id = $this->model_tb_log_act->store($save_data);
            

			if ($save_tb_log_act) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_tb_log_act;
					$this->data['message'] = cclang('success_save_data_stay', [
						admin_anchor('/tb_log_act/edit/' . $save_tb_log_act, 'Edit Tb Log Act'),
						admin_anchor('/tb_log_act', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						admin_anchor('/tb_log_act/edit/' . $save_tb_log_act, 'Edit Tb Log Act')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/tb_log_act');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/tb_log_act');
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
	* Update view Tb Log Acts
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('tb_log_act_update');

		$this->data['tb_log_act'] = $this->model_tb_log_act->find($id);

		$this->template->title('Tb Log Act Update');
		$this->render('backend/standart/administrator/tb_log_act/tb_log_act_update', $this->data);
	}

	/**
	* Update Tb Log Acts
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('tb_log_act_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('log_id', 'Log Id', 'trim|required|max_length[11]');
		

		$this->form_validation->set_rules('act_id', 'Act Id', 'trim|required|max_length[11]');
		

		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required|max_length[255]');
		

		$this->form_validation->set_rules('user', 'User', 'trim|required|max_length[255]');
		

		$this->form_validation->set_rules('date', 'Date', 'trim|required');
		

		$this->form_validation->set_rules('time', 'Time', 'trim|required');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'log_id' => $this->input->post('log_id'),
				'act_id' => $this->input->post('act_id'),
				'keterangan' => $this->input->post('keterangan'),
				'user' => $this->input->post('user'),
				'date' => $this->input->post('date'),
				'time' => $this->input->post('time'),
			];

			

			


			
			
			$save_tb_log_act = $this->model_tb_log_act->change($id, $save_data);

			if ($save_tb_log_act) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						admin_anchor('/tb_log_act', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/tb_log_act');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/tb_log_act');
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
	* delete Tb Log Acts
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('tb_log_act_delete');

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

		if ($this->input->get('ajax')) {
			if ($remove) {
				$this->response([
					"success" => true,
					"message" => cclang('has_been_deleted', 'tb_log_act')
				]);
			} else {
				$this->response([
					"success" => true,
					"message" => cclang('error_delete', 'tb_log_act')
				]);
			}

		} else {
			if ($remove) {
				set_message(cclang('has_been_deleted', 'tb_log_act'), 'success');
			} else {
				set_message(cclang('error_delete', 'tb_log_act'), 'error');
			}
			redirect_back();
		}

	}

		/**
	* View view Tb Log Acts
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('tb_log_act_view');

		$this->data['tb_log_act'] = $this->model_tb_log_act->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Tb Log Act Detail');
		$this->render('backend/standart/administrator/tb_log_act/tb_log_act_view', $this->data);
	}
	
	/**
	* delete Tb Log Acts
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$tb_log_act = $this->model_tb_log_act->find($id);

		
		
		return $this->model_tb_log_act->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('tb_log_act_export');

		$this->model_tb_log_act->export(
			'tb_log_act', 
			'tb_log_act',
			$this->model_tb_log_act->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('tb_log_act_export');

		$this->model_tb_log_act->pdf('tb_log_act', 'tb_log_act');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('tb_log_act_export');

		$table = $title = 'tb_log_act';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_tb_log_act->find($id);
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


/* End of file tb_log_act.php */
/* Location: ./application/controllers/administrator/Tb Log Act.php */