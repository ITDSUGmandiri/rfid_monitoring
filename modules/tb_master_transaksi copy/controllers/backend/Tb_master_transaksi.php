<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Tb Master Transaksi Controller
*| --------------------------------------------------------------------------
*| Tb Master Transaksi site
*|
*/
class Tb_master_transaksi extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tb_master_transaksi');
		$this->load->model('Model_tb_master_aset');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Tb Master Transaksis
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('tb_master_transaksi_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tb_master_transaksis'] = $this->model_tb_master_transaksi->get($filter, $field, $this->limit_page, $offset);
		$this->data['tb_master_transaksi_counts'] = $this->model_tb_master_transaksi->count_all($filter, $field);

		$config = [
			'base_url'     => ADMIN_NAMESPACE_URL  . '/tb_master_transaksi/index/',
			'total_rows'   => $this->data['tb_master_transaksi_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);
		
		$this->data['tables'] = $this->load->view('backend/standart/administrator/tb_master_transaksi/tb_master_transaksi_data_table', $this->data, true);
		
		if ($this->input->get('ajax')) {
			$this->response([
				'tables' => $this->data['tables'],
				'pagination' => $this->data['pagination'],
				'total_row' => $this->data['tb_master_transaksi_counts']
			]);
		}

		$this->template->title('Tb Master Transaksi List');
		$this->render('backend/standart/administrator/tb_master_transaksi/tb_master_transaksi_list', $this->data);
	}

	function datatable_aset_master($offset = 0)
	{

		// $this->is_allowed('tb_master_transaksi_list');
		// http://localhost/rfid_monitoring/administrator/tb_master_aset/index/20?ajax=1&q=&filter=

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tb_master_transaksis'] = $this->Model_tb_master_aset->get($filter, $field, $this->limit_page, $offset);
		$this->data['tb_master_transaksi_counts'] = $this->Model_tb_master_aset->count_all($filter, $field);

		$config = [
			'base_url'     => ADMIN_NAMESPACE_URL  . '/tb_master_transaksi/datatable_aset_master/',
			'total_rows'   => $this->data['tb_master_transaksi_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);
		
		$this->data['tables'] = $this->load->view('backend/standart/administrator/tb_master_transaksi/tb_master_aset_data_table', $this->data, true);
		
		if ($this->input->get('ajax')) {
			$this->response([
				'tables' => $this->data['tables'],
				'pagination' => $this->data['pagination'],
				'total_row' => $this->data['tb_master_transaksi_counts']
			]);
		}

		// $this->template->title('Tb Master Transaksi List');
		$this->render('backend/standart/administrator/tb_master_transaksi/tb_master_transaksi_add', $this->data);
		
	}
	
	/**
	* Add new tb_master_transaksis
	*
	*/
	public function add()
	{
		$this->is_allowed('tb_master_transaksi_add');

		$this->template->title('Tb Master Transaksi New');
		$this->render('backend/standart/administrator/tb_master_transaksi/tb_master_transaksi_add', $this->data);
	}

	/**
	* Add New Tb Master Transaksis
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('tb_master_transaksi_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		

		$this->form_validation->set_rules('tipe_transaksi', 'Tipe Transaksi', 'trim|required');
		

		$this->form_validation->set_rules('status_transaksi', 'Status Transaksi', 'trim|required');
		

		

		$this->form_validation->set_rules('tgl_awal_transaksi', 'Tgl Awal Transaksi', 'trim|required');
		

		$this->form_validation->set_rules('ket_transaksi', 'Ket Transaksi', 'trim|required|max_length[500]');
		

		

		$this->form_validation->set_rules('nama_pegawai_input', 'Nama Pegawai Input', 'trim|max_length[100]');
		

		

		$this->form_validation->set_rules('id_area', 'Id Area', 'trim|required');
		

		$this->form_validation->set_rules('id_gedung', 'Id Gedung', 'trim|required');
		

		$this->form_validation->set_rules('id_ruangan', 'Id Ruangan', 'trim|required');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'tipe_transaksi' => $this->input->post('tipe_transaksi'),
				'status_transaksi' => $this->input->post('status_transaksi'),
				'tgl_awal_transaksi' => $this->input->post('tgl_awal_transaksi'),
				'ket_transaksi' => $this->input->post('ket_transaksi'),
				'id_pegawai_input' => $this->input->post('id_pegawai_input'),
				'nama_pegawai_input' => $this->input->post('nama_pegawai_input'),
				'id_area' => $this->input->post('id_area'),
				'id_gedung' => $this->input->post('id_gedung'),
				'id_ruangan' => $this->input->post('id_ruangan'),
			];

			
			



			
			
			$save_tb_master_transaksi = $id = $this->model_tb_master_transaksi->store($save_data);
            

			if ($save_tb_master_transaksi) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_tb_master_transaksi;
					$this->data['message'] = cclang('success_save_data_stay', [
						admin_anchor('/tb_master_transaksi/edit/' . $save_tb_master_transaksi, 'Edit Tb Master Transaksi'),
						admin_anchor('/tb_master_transaksi', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						admin_anchor('/tb_master_transaksi/edit/' . $save_tb_master_transaksi, 'Edit Tb Master Transaksi')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/tb_master_transaksi');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/tb_master_transaksi');
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
	* Update view Tb Master Transaksis
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('tb_master_transaksi_update');

		$this->data['tb_master_transaksi'] = $this->model_tb_master_transaksi->find($id);

		$this->template->title('Tb Master Transaksi Update');
		$this->render('backend/standart/administrator/tb_master_transaksi/tb_master_transaksi_update', $this->data);
	}

	/**
	* Update Tb Master Transaksis
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('tb_master_transaksi_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				

		$this->form_validation->set_rules('tipe_transaksi', 'Tipe Transaksi', 'trim|required');
		

		$this->form_validation->set_rules('status_transaksi', 'Status Transaksi', 'trim|required');
		

		

		$this->form_validation->set_rules('tgl_awal_transaksi', 'Tgl Awal Transaksi', 'trim|required');
		

		$this->form_validation->set_rules('ket_transaksi', 'Ket Transaksi', 'trim|required|max_length[500]');
		

		

		$this->form_validation->set_rules('nama_pegawai_input', 'Nama Pegawai Input', 'trim|max_length[100]');
		

		

		$this->form_validation->set_rules('id_area', 'Id Area', 'trim|required');
		

		$this->form_validation->set_rules('id_gedung', 'Id Gedung', 'trim|required');
		

		$this->form_validation->set_rules('id_ruangan', 'Id Ruangan', 'trim|required');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'tipe_transaksi' => $this->input->post('tipe_transaksi'),
				'status_transaksi' => $this->input->post('status_transaksi'),
				'tgl_awal_transaksi' => $this->input->post('tgl_awal_transaksi'),
				'ket_transaksi' => $this->input->post('ket_transaksi'),
				'id_pegawai_input' => $this->input->post('id_pegawai_input'),
				'nama_pegawai_input' => $this->input->post('nama_pegawai_input'),
				'id_area' => $this->input->post('id_area'),
				'id_gedung' => $this->input->post('id_gedung'),
				'id_ruangan' => $this->input->post('id_ruangan'),
			];

			

			


			
			
			$save_tb_master_transaksi = $this->model_tb_master_transaksi->change($id, $save_data);

			if ($save_tb_master_transaksi) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						admin_anchor('/tb_master_transaksi', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/tb_master_transaksi');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/tb_master_transaksi');
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
	* delete Tb Master Transaksis
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('tb_master_transaksi_delete');

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
					"message" => cclang('has_been_deleted', 'tb_master_transaksi')
				]);
			} else {
				$this->response([
					"success" => true,
					"message" => cclang('error_delete', 'tb_master_transaksi')
				]);
			}

		} else {
			if ($remove) {
				set_message(cclang('has_been_deleted', 'tb_master_transaksi'), 'success');
			} else {
				set_message(cclang('error_delete', 'tb_master_transaksi'), 'error');
			}
			redirect_back();
		}

	}

		/**
	* View view Tb Master Transaksis
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('tb_master_transaksi_view');

		$this->data['tb_master_transaksi'] = $this->model_tb_master_transaksi->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Tb Master Transaksi Detail');
		$this->render('backend/standart/administrator/tb_master_transaksi/tb_master_transaksi_view', $this->data);
	}
	
	/**
	* delete Tb Master Transaksis
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$tb_master_transaksi = $this->model_tb_master_transaksi->find($id);

		
		
		return $this->model_tb_master_transaksi->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('tb_master_transaksi_export');

		$this->model_tb_master_transaksi->export(
			'tb_master_transaksi', 
			'tb_master_transaksi',
			$this->model_tb_master_transaksi->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('tb_master_transaksi_export');

		$this->model_tb_master_transaksi->pdf('tb_master_transaksi', 'tb_master_transaksi');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('tb_master_transaksi_export');

		$table = $title = 'tb_master_transaksi';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_tb_master_transaksi->find($id);
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

	public function ajax_id_gedung($id = null)
	{
		if (!$this->is_allowed('tb_master_transaksi_list', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		$results = db_get_all_data('tb_master_gedung', ['id_area' => $id]);
		$this->response($results);	
	}

	public function ajax_id_ruangan($id = null)
	{
		if (!$this->is_allowed('tb_master_transaksi_list', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		$results = db_get_all_data('tb_master_ruangan', ['id_gedung' => $id]);
		$this->response($results);	
	}

	
}


/* End of file tb_master_transaksi.php */
/* Location: ./application/controllers/administrator/Tb Master Transaksi.php */