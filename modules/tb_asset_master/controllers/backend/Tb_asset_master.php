<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Tb Asset Master Controller
*| --------------------------------------------------------------------------
*| Tb Asset Master site
*|
*/
class Tb_asset_master extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tb_asset_master');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Tb Asset Masters
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('tb_asset_master_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tb_asset_masters'] = $this->model_tb_asset_master->get($filter, $field, $this->limit_page, $offset);
		$this->data['tb_asset_master_counts'] = $this->model_tb_asset_master->count_all($filter, $field);

		$config = [
			'base_url'     => ADMIN_NAMESPACE_URL  . '/tb_asset_master/index/',
			'total_rows'   => $this->data['tb_asset_master_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);
		
		$this->data['tables'] = $this->load->view('backend/standart/administrator/tb_asset_master/tb_asset_master_data_table', $this->data, true);
		
		if ($this->input->get('ajax')) {
			$this->response([
				'tables' => $this->data['tables'],
				'pagination' => $this->data['pagination'],
				'total_row' => $this->data['tb_asset_master_counts']
			]);
		}

		$this->template->title('Tb Asset Master List');
		$this->render('backend/standart/administrator/tb_asset_master/tb_asset_master_list', $this->data);
	}
	
	/**
	* Add new tb_asset_masters
	*
	*/
	public function add()
	{
		$this->is_allowed('tb_asset_master_add');

		$this->template->title('Tb Asset Master New');
		$this->render('backend/standart/administrator/tb_asset_master/tb_asset_master_add', $this->data);
	}

	/**
	* Add New Tb Asset Masters
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('tb_asset_master_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('kode_brg', 'Kode Brg', 'trim|max_length[15]');
		

		$this->form_validation->set_rules('nup', 'Nup', 'trim|max_length[11]');
		

		$this->form_validation->set_rules('tag_code', 'Tag Code', 'trim|max_length[15]');
		

		$this->form_validation->set_rules('nama_brg', 'Nama Brg', 'trim|max_length[200]');
		

		$this->form_validation->set_rules('Merk', 'Merk', 'trim|max_length[50]');
		

		$this->form_validation->set_rules('Tipe', 'Tipe', 'trim|max_length[30]');
		

		$this->form_validation->set_rules('Kondisi', 'Kondisi', 'trim|max_length[5]');
		

		$this->form_validation->set_rules('Kelompok', 'Kelompok', 'trim|max_length[10]');
		

		$this->form_validation->set_rules('Lokasi', 'Lokasi', 'trim|max_length[255]');
		

		$this->form_validation->set_rules('Keterangan', 'Keterangan', 'trim|max_length[200]');
		

		$this->form_validation->set_rules('PICbarang', 'PICbarang', 'trim|max_length[11]');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'kode_brg' => $this->input->post('kode_brg'),
				'nup' => $this->input->post('nup'),
				'tag_code' => $this->input->post('tag_code'),
				'nama_brg' => $this->input->post('nama_brg'),
				'Merk' => $this->input->post('Merk'),
				'Tipe' => $this->input->post('Tipe'),
				'Kondisi' => $this->input->post('Kondisi'),
				'Nilai' => $this->input->post('Nilai'),
				'Kelompok' => $this->input->post('Kelompok'),
				'tgl_inventarisasi' => $this->input->post('tgl_inventarisasi'),
				'tglperolehan' => $this->input->post('tglperolehan'),
				'Lokasi' => $this->input->post('Lokasi'),
				'status_id' => $this->input->post('status_id'),
				'Keterangan' => $this->input->post('Keterangan'),
				'PICbarang' => $this->input->post('PICbarang'),
			];

			
			



			
			
			$save_tb_asset_master = $id = $this->model_tb_asset_master->store($save_data);
            

			if ($save_tb_asset_master) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_tb_asset_master;
					$this->data['message'] = cclang('success_save_data_stay', [
						admin_anchor('/tb_asset_master/edit/' . $save_tb_asset_master, 'Edit Tb Asset Master'),
						admin_anchor('/tb_asset_master', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						admin_anchor('/tb_asset_master/edit/' . $save_tb_asset_master, 'Edit Tb Asset Master')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/tb_asset_master');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/tb_asset_master');
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
	* Update view Tb Asset Masters
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('tb_asset_master_update');

		$this->data['tb_asset_master'] = $this->model_tb_asset_master->find($id);

		$this->template->title('Tb Asset Master Update');
		$this->render('backend/standart/administrator/tb_asset_master/tb_asset_master_update', $this->data);
	}

	/**
	* Update Tb Asset Masters
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('tb_asset_master_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('kode_brg', 'Kode Brg', 'trim|max_length[15]');
		

		$this->form_validation->set_rules('nup', 'Nup', 'trim|max_length[11]');
		

		$this->form_validation->set_rules('tag_code', 'Tag Code', 'trim|max_length[15]');
		

		$this->form_validation->set_rules('nama_brg', 'Nama Brg', 'trim|max_length[200]');
		

		$this->form_validation->set_rules('Merk', 'Merk', 'trim|max_length[50]');
		

		$this->form_validation->set_rules('Tipe', 'Tipe', 'trim|max_length[30]');
		

		$this->form_validation->set_rules('Kondisi', 'Kondisi', 'trim|max_length[5]');
		

		$this->form_validation->set_rules('Kelompok', 'Kelompok', 'trim|max_length[10]');
		

		$this->form_validation->set_rules('Lokasi', 'Lokasi', 'trim|max_length[255]');
		

		$this->form_validation->set_rules('Keterangan', 'Keterangan', 'trim|max_length[200]');
		

		$this->form_validation->set_rules('PICbarang', 'PICbarang', 'trim|max_length[11]');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'kode_brg' => $this->input->post('kode_brg'),
				'nup' => $this->input->post('nup'),
				'tag_code' => $this->input->post('tag_code'),
				'nama_brg' => $this->input->post('nama_brg'),
				'Merk' => $this->input->post('Merk'),
				'Tipe' => $this->input->post('Tipe'),
				'Kondisi' => $this->input->post('Kondisi'),
				'Nilai' => $this->input->post('Nilai'),
				'Kelompok' => $this->input->post('Kelompok'),
				'tgl_inventarisasi' => $this->input->post('tgl_inventarisasi'),
				'tglperolehan' => $this->input->post('tglperolehan'),
				'Lokasi' => $this->input->post('Lokasi'),
				'status_id' => $this->input->post('status_id'),
				'Keterangan' => $this->input->post('Keterangan'),
				'PICbarang' => $this->input->post('PICbarang'),
			];

			

			


			
			
			$save_tb_asset_master = $this->model_tb_asset_master->change($id, $save_data);

			if ($save_tb_asset_master) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						admin_anchor('/tb_asset_master', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/tb_asset_master');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/tb_asset_master');
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
	* delete Tb Asset Masters
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('tb_asset_master_delete');

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
					"message" => cclang('has_been_deleted', 'tb_asset_master')
				]);
			} else {
				$this->response([
					"success" => true,
					"message" => cclang('error_delete', 'tb_asset_master')
				]);
			}

		} else {
			if ($remove) {
				set_message(cclang('has_been_deleted', 'tb_asset_master'), 'success');
			} else {
				set_message(cclang('error_delete', 'tb_asset_master'), 'error');
			}
			redirect_back();
		}

	}

		/**
	* View view Tb Asset Masters
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('tb_asset_master_view');

		$this->data['tb_asset_master'] = $this->model_tb_asset_master->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Tb Asset Master Detail');
		$this->render('backend/standart/administrator/tb_asset_master/tb_asset_master_view', $this->data);
	}
	
	/**
	* delete Tb Asset Masters
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$tb_asset_master = $this->model_tb_asset_master->find($id);

		
		
		return $this->model_tb_asset_master->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('tb_asset_master_export');

		$this->model_tb_asset_master->export(
			'tb_asset_master', 
			'tb_asset_master',
			$this->model_tb_asset_master->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('tb_asset_master_export');

		$this->model_tb_asset_master->pdf('tb_asset_master', 'tb_asset_master');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('tb_asset_master_export');

		$table = $title = 'tb_asset_master';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_tb_asset_master->find($id);
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


/* End of file tb_asset_master.php */
/* Location: ./application/controllers/administrator/Tb Asset Master.php */