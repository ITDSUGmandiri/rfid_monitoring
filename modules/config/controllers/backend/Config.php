<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Config Controller
*| --------------------------------------------------------------------------
*| Config site
*|
*/
class Config extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_config');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Configs
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('config_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['configs'] = $this->model_config->get($filter, $field, $this->limit_page, $offset);
		$this->data['config_counts'] = $this->model_config->count_all($filter, $field);

		$config = [
			'base_url'     => ADMIN_NAMESPACE_URL  . '/config/index/',
			'total_rows'   => $this->data['config_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);
		
		$this->data['tables'] = $this->load->view('backend/standart/administrator/config/config_data_table', $this->data, true);
		
		if ($this->input->get('ajax')) {
			$this->response([
				'tables' => $this->data['tables'],
				'pagination' => $this->data['pagination'],
				'total_row' => $this->data['config_counts']
			]);
		}

		$this->template->title('Config List');
		$this->render('backend/standart/administrator/config/config_list', $this->data);
	}
	
	/**
	* Add new configs
	*
	*/
	public function add()
	{
		$this->is_allowed('config_add');

		$this->template->title('Config New');
		$this->render('backend/standart/administrator/config/config_add', $this->data);
	}

	/**
	* Add New Configs
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('config_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('kode', 'Kode', 'trim|required|max_length[50]');
		

		$this->form_validation->set_rules('config_name', 'Config Name', 'trim|required|max_length[100]');
		

		$this->form_validation->set_rules('variable', 'Variable', 'trim|required|max_length[100]');
		

		$this->form_validation->set_rules('value', 'Value', 'trim|required');
		

		$this->form_validation->set_rules('is_active', 'Is Active', 'trim|required|max_length[1]');
		

		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'kode' => $this->input->post('kode'),
				'config_name' => $this->input->post('config_name'),
				'variable' => $this->input->post('variable'),
				'value' => $this->input->post('value'),
				'is_active' => $this->input->post('is_active'),
				'owner' => $this->input->post('owner'),
				'keterangan' => $this->input->post('keterangan'),
			];

			
			



			
			
			$save_config = $id = $this->model_config->store($save_data);
            

			if ($save_config) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_config;
					$this->data['message'] = cclang('success_save_data_stay', [
						admin_anchor('/config/edit/' . $save_config, 'Edit Config'),
						admin_anchor('/config', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						admin_anchor('/config/edit/' . $save_config, 'Edit Config')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/config');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/config');
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
	* Update view Configs
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('config_update');

		$this->data['config'] = $this->model_config->find($id);

		$this->template->title('Config Update');
		$this->render('backend/standart/administrator/config/config_update', $this->data);
	}

	/**
	* Update Configs
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('config_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('kode', 'Kode', 'trim|required|max_length[50]');
		

		$this->form_validation->set_rules('config_name', 'Config Name', 'trim|required|max_length[100]');
		

		$this->form_validation->set_rules('variable', 'Variable', 'trim|required|max_length[100]');
		

		$this->form_validation->set_rules('value', 'Value', 'trim|required');
		

		$this->form_validation->set_rules('is_active', 'Is Active', 'trim|required|max_length[1]');
		

		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'kode' => $this->input->post('kode'),
				'config_name' => $this->input->post('config_name'),
				'variable' => $this->input->post('variable'),
				'value' => $this->input->post('value'),
				'is_active' => $this->input->post('is_active'),
				'owner' => $this->input->post('owner'),
				'keterangan' => $this->input->post('keterangan'),
			];

			

			


			
			
			$save_config = $this->model_config->change($id, $save_data);

			if ($save_config) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						admin_anchor('/config', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/config');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/config');
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
	* delete Configs
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('config_delete');

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
					"message" => cclang('has_been_deleted', 'config')
				]);
			} else {
				$this->response([
					"success" => true,
					"message" => cclang('error_delete', 'config')
				]);
			}

		} else {
			if ($remove) {
				set_message(cclang('has_been_deleted', 'config'), 'success');
			} else {
				set_message(cclang('error_delete', 'config'), 'error');
			}
			redirect_back();
		}

	}

		/**
	* View view Configs
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('config_view');

		$this->data['config'] = $this->model_config->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Config Detail');
		$this->render('backend/standart/administrator/config/config_view', $this->data);
	}
	
	/**
	* delete Configs
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$config = $this->model_config->find($id);

		
		
		return $this->model_config->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('config_export');

		$this->model_config->export(
			'config', 
			'config',
			$this->model_config->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('config_export');

		$this->model_config->pdf('config', 'config');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('config_export');

		$table = $title = 'config';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_config->find($id);
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


/* End of file config.php */
/* Location: ./application/controllers/administrator/Config.php */