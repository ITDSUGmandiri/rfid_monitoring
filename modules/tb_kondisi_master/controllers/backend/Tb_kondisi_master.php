<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Tb Kondisi Master Controller
*| --------------------------------------------------------------------------
*| Tb Kondisi Master site
*|
*/
class Tb_kondisi_master extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tb_kondisi_master');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Tb Kondisi Masters
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('tb_kondisi_master_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tb_kondisi_masters'] = $this->model_tb_kondisi_master->get($filter, $field, $this->limit_page, $offset);
		$this->data['tb_kondisi_master_counts'] = $this->model_tb_kondisi_master->count_all($filter, $field);

		$config = [
			'base_url'     => ADMIN_NAMESPACE_URL  . '/tb_kondisi_master/index/',
			'total_rows'   => $this->data['tb_kondisi_master_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);
		
		$this->data['tables'] = $this->load->view('backend/standart/administrator/tb_kondisi_master/tb_kondisi_master_data_table', $this->data, true);
		
		if ($this->input->get('ajax')) {
			$this->response([
				'tables' => $this->data['tables'],
				'pagination' => $this->data['pagination'],
				'total_row' => $this->data['tb_kondisi_master_counts']
			]);
		}

		$this->template->title('Tb Kondisi Master List');
		$this->render('backend/standart/administrator/tb_kondisi_master/tb_kondisi_master_list', $this->data);
	}
	
	/**
	* Add new tb_kondisi_masters
	*
	*/
	public function add()
	{
		$this->is_allowed('tb_kondisi_master_add');

		$this->template->title('Tb Kondisi Master New');
		$this->render('backend/standart/administrator/tb_kondisi_master/tb_kondisi_master_add', $this->data);
	}

	/**
	* Add New Tb Kondisi Masters
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('tb_kondisi_master_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('kondisi_id', 'Kondisi Id', 'trim|required|max_length[255]');
		

		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required|max_length[255]');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'kondisi_id' => $this->input->post('kondisi_id'),
				'keterangan' => $this->input->post('keterangan'),
			];

			
			



			
			
			$save_tb_kondisi_master = $id = $this->model_tb_kondisi_master->store($save_data);
            

			if ($save_tb_kondisi_master) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_tb_kondisi_master;
					$this->data['message'] = cclang('success_save_data_stay', [
						admin_anchor('/tb_kondisi_master/edit/' . $save_tb_kondisi_master, 'Edit Tb Kondisi Master'),
						admin_anchor('/tb_kondisi_master', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						admin_anchor('/tb_kondisi_master/edit/' . $save_tb_kondisi_master, 'Edit Tb Kondisi Master')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/tb_kondisi_master');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/tb_kondisi_master');
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
	* Update view Tb Kondisi Masters
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('tb_kondisi_master_update');

		$this->data['tb_kondisi_master'] = $this->model_tb_kondisi_master->find($id);

		$this->template->title('Tb Kondisi Master Update');
		$this->render('backend/standart/administrator/tb_kondisi_master/tb_kondisi_master_update', $this->data);
	}

	/**
	* Update Tb Kondisi Masters
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('tb_kondisi_master_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('kondisi_id', 'Kondisi Id', 'trim|required|max_length[255]');
		

		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required|max_length[255]');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'kondisi_id' => $this->input->post('kondisi_id'),
				'keterangan' => $this->input->post('keterangan'),
			];

			

			


			
			
			$save_tb_kondisi_master = $this->model_tb_kondisi_master->change($id, $save_data);

			if ($save_tb_kondisi_master) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						admin_anchor('/tb_kondisi_master', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/tb_kondisi_master');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/tb_kondisi_master');
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
	* delete Tb Kondisi Masters
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('tb_kondisi_master_delete');

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
					"message" => cclang('has_been_deleted', 'tb_kondisi_master')
				]);
			} else {
				$this->response([
					"success" => true,
					"message" => cclang('error_delete', 'tb_kondisi_master')
				]);
			}

		} else {
			if ($remove) {
				set_message(cclang('has_been_deleted', 'tb_kondisi_master'), 'success');
			} else {
				set_message(cclang('error_delete', 'tb_kondisi_master'), 'error');
			}
			redirect_back();
		}

	}

		/**
	* View view Tb Kondisi Masters
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('tb_kondisi_master_view');

		$this->data['tb_kondisi_master'] = $this->model_tb_kondisi_master->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Tb Kondisi Master Detail');
		$this->render('backend/standart/administrator/tb_kondisi_master/tb_kondisi_master_view', $this->data);
	}
	
	/**
	* delete Tb Kondisi Masters
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$tb_kondisi_master = $this->model_tb_kondisi_master->find($id);

		
		
		return $this->model_tb_kondisi_master->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('tb_kondisi_master_export');

		$this->model_tb_kondisi_master->export(
			'tb_kondisi_master', 
			'tb_kondisi_master',
			$this->model_tb_kondisi_master->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('tb_kondisi_master_export');

		$this->model_tb_kondisi_master->pdf('tb_kondisi_master', 'tb_kondisi_master');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('tb_kondisi_master_export');

		$table = $title = 'tb_kondisi_master';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_tb_kondisi_master->find($id);
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


/* End of file tb_kondisi_master.php */
/* Location: ./application/controllers/administrator/Tb Kondisi Master.php */