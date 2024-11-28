<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Tb Mutasi Asset Controller
*| --------------------------------------------------------------------------
*| Tb Mutasi Asset site
*|
*/
class Tb_mutasi_asset extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tb_mutasi_asset');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Tb Mutasi Assets
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('tb_mutasi_asset_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tb_mutasi_assets'] = $this->model_tb_mutasi_asset->get($filter, $field, $this->limit_page, $offset);
		$this->data['tb_mutasi_asset_counts'] = $this->model_tb_mutasi_asset->count_all($filter, $field);

		$config = [
			'base_url'     => ADMIN_NAMESPACE_URL  . '/tb_mutasi_asset/index/',
			'total_rows'   => $this->data['tb_mutasi_asset_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);
		
		$this->data['tables'] = $this->load->view('backend/standart/administrator/tb_mutasi_asset/tb_mutasi_asset_data_table', $this->data, true);
		
		if ($this->input->get('ajax')) {
			$this->response([
				'tables' => $this->data['tables'],
				'pagination' => $this->data['pagination'],
				'total_row' => $this->data['tb_mutasi_asset_counts']
			]);
		}

		$this->template->title('Tb Mutasi Asset List');
		$this->render('backend/standart/administrator/tb_mutasi_asset/tb_mutasi_asset_list', $this->data);
	}
	
	/**
	* Add new tb_mutasi_assets
	*
	*/
	public function add()
	{
		$this->is_allowed('tb_mutasi_asset_add');

		$this->template->title('Tb Mutasi Asset New');
		$this->render('backend/standart/administrator/tb_mutasi_asset/tb_mutasi_asset_add', $this->data);
	}

	/**
	* Add New Tb Mutasi Assets
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('tb_mutasi_asset_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('mutasi_id', 'Mutasi Id', 'trim|required|max_length[11]');
		

		$this->form_validation->set_rules('code_rfidtag', 'Code Rfidtag', 'trim|required|max_length[255]');
		

		$this->form_validation->set_rules('id_room_old', 'Id Room Old', 'trim|required|max_length[255]');
		

		$this->form_validation->set_rules('id_room_new', 'Id Room New', 'trim|required|max_length[255]');
		

		$this->form_validation->set_rules('tanggal_m', 'Tanggal M', 'trim|required');
		

		$this->form_validation->set_rules('waktu_m', 'Waktu M', 'trim|required');
		

		$this->form_validation->set_rules('pic', 'Pic', 'trim|required|max_length[255]');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'mutasi_id' => $this->input->post('mutasi_id'),
				'code_rfidtag' => $this->input->post('code_rfidtag'),
				'id_room_old' => $this->input->post('id_room_old'),
				'id_room_new' => $this->input->post('id_room_new'),
				'tanggal_m' => $this->input->post('tanggal_m'),
				'waktu_m' => $this->input->post('waktu_m'),
				'pic' => $this->input->post('pic'),
			];

			
			



			
			
			$save_tb_mutasi_asset = $id = $this->model_tb_mutasi_asset->store($save_data);
            

			if ($save_tb_mutasi_asset) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_tb_mutasi_asset;
					$this->data['message'] = cclang('success_save_data_stay', [
						admin_anchor('/tb_mutasi_asset/edit/' . $save_tb_mutasi_asset, 'Edit Tb Mutasi Asset'),
						admin_anchor('/tb_mutasi_asset', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						admin_anchor('/tb_mutasi_asset/edit/' . $save_tb_mutasi_asset, 'Edit Tb Mutasi Asset')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/tb_mutasi_asset');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/tb_mutasi_asset');
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
	* Update view Tb Mutasi Assets
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('tb_mutasi_asset_update');

		$this->data['tb_mutasi_asset'] = $this->model_tb_mutasi_asset->find($id);

		$this->template->title('Tb Mutasi Asset Update');
		$this->render('backend/standart/administrator/tb_mutasi_asset/tb_mutasi_asset_update', $this->data);
	}

	/**
	* Update Tb Mutasi Assets
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('tb_mutasi_asset_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('mutasi_id', 'Mutasi Id', 'trim|required|max_length[11]');
		

		$this->form_validation->set_rules('code_rfidtag', 'Code Rfidtag', 'trim|required|max_length[255]');
		

		$this->form_validation->set_rules('id_room_old', 'Id Room Old', 'trim|required|max_length[255]');
		

		$this->form_validation->set_rules('id_room_new', 'Id Room New', 'trim|required|max_length[255]');
		

		$this->form_validation->set_rules('tanggal_m', 'Tanggal M', 'trim|required');
		

		$this->form_validation->set_rules('waktu_m', 'Waktu M', 'trim|required');
		

		$this->form_validation->set_rules('pic', 'Pic', 'trim|required|max_length[255]');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'mutasi_id' => $this->input->post('mutasi_id'),
				'code_rfidtag' => $this->input->post('code_rfidtag'),
				'id_room_old' => $this->input->post('id_room_old'),
				'id_room_new' => $this->input->post('id_room_new'),
				'tanggal_m' => $this->input->post('tanggal_m'),
				'waktu_m' => $this->input->post('waktu_m'),
				'pic' => $this->input->post('pic'),
			];

			

			


			
			
			$save_tb_mutasi_asset = $this->model_tb_mutasi_asset->change($id, $save_data);

			if ($save_tb_mutasi_asset) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						admin_anchor('/tb_mutasi_asset', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/tb_mutasi_asset');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/tb_mutasi_asset');
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
	* delete Tb Mutasi Assets
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('tb_mutasi_asset_delete');

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
					"message" => cclang('has_been_deleted', 'tb_mutasi_asset')
				]);
			} else {
				$this->response([
					"success" => true,
					"message" => cclang('error_delete', 'tb_mutasi_asset')
				]);
			}

		} else {
			if ($remove) {
				set_message(cclang('has_been_deleted', 'tb_mutasi_asset'), 'success');
			} else {
				set_message(cclang('error_delete', 'tb_mutasi_asset'), 'error');
			}
			redirect_back();
		}

	}

		/**
	* View view Tb Mutasi Assets
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('tb_mutasi_asset_view');

		$this->data['tb_mutasi_asset'] = $this->model_tb_mutasi_asset->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Tb Mutasi Asset Detail');
		$this->render('backend/standart/administrator/tb_mutasi_asset/tb_mutasi_asset_view', $this->data);
	}
	
	/**
	* delete Tb Mutasi Assets
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$tb_mutasi_asset = $this->model_tb_mutasi_asset->find($id);

		
		
		return $this->model_tb_mutasi_asset->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('tb_mutasi_asset_export');

		$this->model_tb_mutasi_asset->export(
			'tb_mutasi_asset', 
			'tb_mutasi_asset',
			$this->model_tb_mutasi_asset->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('tb_mutasi_asset_export');

		$this->model_tb_mutasi_asset->pdf('tb_mutasi_asset', 'tb_mutasi_asset');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('tb_mutasi_asset_export');

		$table = $title = 'tb_mutasi_asset';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_tb_mutasi_asset->find($id);
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


/* End of file tb_mutasi_asset.php */
/* Location: ./application/controllers/administrator/Tb Mutasi Asset.php */