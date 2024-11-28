<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Lokasi Kerja Controller
*| --------------------------------------------------------------------------
*| Lokasi Kerja site
*|
*/
class Lokasi_kerja extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_lokasi_kerja');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Lokasi Kerjas
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('lokasi_kerja_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['lokasi_kerjas'] = $this->model_lokasi_kerja->get($filter, $field, $this->limit_page, $offset);
		$this->data['lokasi_kerja_counts'] = $this->model_lokasi_kerja->count_all($filter, $field);

		$config = [
			'base_url'     => ADMIN_NAMESPACE_URL  . '/lokasi_kerja/index/',
			'total_rows'   => $this->data['lokasi_kerja_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);
		
		$this->data['tables'] = $this->load->view('backend/standart/administrator/lokasi_kerja/lokasi_kerja_data_table', $this->data, true);
		
		if ($this->input->get('ajax')) {
			$this->response([
				'tables' => $this->data['tables'],
				'pagination' => $this->data['pagination'],
				'total_row' => $this->data['lokasi_kerja_counts']
			]);
		}

		$this->template->title('Area List');
		$this->render('backend/standart/administrator/lokasi_kerja/lokasi_kerja_list', $this->data);
	}
	
	/**
	* Add new lokasi_kerjas
	*
	*/
	public function add()
	{
		$this->is_allowed('lokasi_kerja_add');

		$this->template->title('Area New');
		$this->render('backend/standart/administrator/lokasi_kerja/lokasi_kerja_add', $this->data);
	}

	/**
	* Add New Lokasi Kerjas
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('lokasi_kerja_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('kode', 'Kode', 'trim|required|max_length[6]');
		

		$this->form_validation->set_rules('nama_lokasi', 'Nama Lokasi', 'trim|required|max_length[100]');
		

		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required|max_length[100]');
		

		$this->form_validation->set_rules('alamat_lengkap', 'Alamat Lengkap', 'trim|required|max_length[200]');
		

		$this->form_validation->set_rules('lat', 'Lat', 'trim|required|max_length[50]');
		

		$this->form_validation->set_rules('long', 'Long', 'trim|required|max_length[50]');
		

		$this->form_validation->set_rules('user_create', 'User Create', 'trim|required|max_length[25]');
		

		$this->form_validation->set_rules('create_date', 'Create Date', 'trim|required');
		

		$this->form_validation->set_rules('user_change', 'User Change', 'trim|required|max_length[25]');
		

		$this->form_validation->set_rules('change_date', 'Change Date', 'trim|required');
		

		$this->form_validation->set_rules('lokasi_kerja_photo_name', 'Photo', 'trim|required');
		

		

		if ($this->form_validation->run()) {
			$lokasi_kerja_photo_uuid = $this->input->post('lokasi_kerja_photo_uuid');
			$lokasi_kerja_photo_name = $this->input->post('lokasi_kerja_photo_name');
		
			$save_data = [
				'kode' => $this->input->post('kode'),
				'nama_lokasi' => $this->input->post('nama_lokasi'),
				'keterangan' => $this->input->post('keterangan'),
				'alamat_lengkap' => $this->input->post('alamat_lengkap'),
				'lat' => $this->input->post('lat'),
				'long' => $this->input->post('long'),
				'user_create' => $this->input->post('user_create'),
				'create_date' => $this->input->post('create_date'),
				'user_change' => $this->input->post('user_change'),
				'change_date' => $this->input->post('change_date'),
			];

			
			



			
			if (!is_dir(FCPATH . '/uploads/lokasi_kerja/')) {
				mkdir(FCPATH . '/uploads/lokasi_kerja/');
			}

			if (!empty($lokasi_kerja_photo_name)) {
				$lokasi_kerja_photo_name_copy = date('YmdHis') . '-' . $lokasi_kerja_photo_name;

				rename(FCPATH . 'uploads/tmp/' . $lokasi_kerja_photo_uuid . '/' . $lokasi_kerja_photo_name, 
						FCPATH . 'uploads/lokasi_kerja/' . $lokasi_kerja_photo_name_copy);

				if (!is_file(FCPATH . '/uploads/lokasi_kerja/' . $lokasi_kerja_photo_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['photo'] = $lokasi_kerja_photo_name_copy;
			}
		
			
			$save_lokasi_kerja = $id = $this->model_lokasi_kerja->store($save_data);
            

			if ($save_lokasi_kerja) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_lokasi_kerja;
					$this->data['message'] = cclang('success_save_data_stay', [
						admin_anchor('/lokasi_kerja/edit/' . $save_lokasi_kerja, 'Edit Lokasi Kerja'),
						admin_anchor('/lokasi_kerja', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						admin_anchor('/lokasi_kerja/edit/' . $save_lokasi_kerja, 'Edit Lokasi Kerja')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/lokasi_kerja');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/lokasi_kerja');
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
	* Update view Lokasi Kerjas
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('lokasi_kerja_update');

		$this->data['lokasi_kerja'] = $this->model_lokasi_kerja->find($id);

		$this->template->title('Area Update');
		$this->render('backend/standart/administrator/lokasi_kerja/lokasi_kerja_update', $this->data);
	}

	/**
	* Update Lokasi Kerjas
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('lokasi_kerja_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('kode', 'Kode', 'trim|required|max_length[6]');
		

		$this->form_validation->set_rules('nama_lokasi', 'Nama Lokasi', 'trim|required|max_length[100]');
		

		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required|max_length[100]');
		

		$this->form_validation->set_rules('alamat_lengkap', 'Alamat Lengkap', 'trim|required|max_length[200]');
		

		$this->form_validation->set_rules('lat', 'Lat', 'trim|required|max_length[50]');
		

		$this->form_validation->set_rules('long', 'Long', 'trim|required|max_length[50]');
		

		$this->form_validation->set_rules('user_create', 'User Create', 'trim|required|max_length[25]');
		

		$this->form_validation->set_rules('create_date', 'Create Date', 'trim|required');
		

		$this->form_validation->set_rules('user_change', 'User Change', 'trim|required|max_length[25]');
		

		$this->form_validation->set_rules('change_date', 'Change Date', 'trim|required');
		

		$this->form_validation->set_rules('lokasi_kerja_photo_name', 'Photo', 'trim|required');
		

		
		if ($this->form_validation->run()) {
			$lokasi_kerja_photo_uuid = $this->input->post('lokasi_kerja_photo_uuid');
			$lokasi_kerja_photo_name = $this->input->post('lokasi_kerja_photo_name');
		
			$save_data = [
				'kode' => $this->input->post('kode'),
				'nama_lokasi' => $this->input->post('nama_lokasi'),
				'keterangan' => $this->input->post('keterangan'),
				'alamat_lengkap' => $this->input->post('alamat_lengkap'),
				'lat' => $this->input->post('lat'),
				'long' => $this->input->post('long'),
				'user_create' => $this->input->post('user_create'),
				'create_date' => $this->input->post('create_date'),
				'user_change' => $this->input->post('user_change'),
				'change_date' => $this->input->post('change_date'),
			];

			

			


			
			if (!is_dir(FCPATH . '/uploads/lokasi_kerja/')) {
				mkdir(FCPATH . '/uploads/lokasi_kerja/');
			}

			if (!empty($lokasi_kerja_photo_uuid)) {
				$lokasi_kerja_photo_name_copy = date('YmdHis') . '-' . $lokasi_kerja_photo_name;

				rename(FCPATH . 'uploads/tmp/' . $lokasi_kerja_photo_uuid . '/' . $lokasi_kerja_photo_name, 
						FCPATH . 'uploads/lokasi_kerja/' . $lokasi_kerja_photo_name_copy);

				if (!is_file(FCPATH . '/uploads/lokasi_kerja/' . $lokasi_kerja_photo_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['photo'] = $lokasi_kerja_photo_name_copy;
			}
		
			
			$save_lokasi_kerja = $this->model_lokasi_kerja->change($id, $save_data);

			if ($save_lokasi_kerja) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						admin_anchor('/lokasi_kerja', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/lokasi_kerja');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/lokasi_kerja');
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
	* delete Lokasi Kerjas
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('lokasi_kerja_delete');

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
					"message" => cclang('has_been_deleted', 'lokasi_kerja')
				]);
			} else {
				$this->response([
					"success" => true,
					"message" => cclang('error_delete', 'lokasi_kerja')
				]);
			}

		} else {
			if ($remove) {
				set_message(cclang('has_been_deleted', 'lokasi_kerja'), 'success');
			} else {
				set_message(cclang('error_delete', 'lokasi_kerja'), 'error');
			}
			redirect_back();
		}

	}

		/**
	* View view Lokasi Kerjas
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('lokasi_kerja_view');

		$this->data['lokasi_kerja'] = $this->model_lokasi_kerja->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Area Detail');
		$this->render('backend/standart/administrator/lokasi_kerja/lokasi_kerja_view', $this->data);
	}
	
	/**
	* delete Lokasi Kerjas
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$lokasi_kerja = $this->model_lokasi_kerja->find($id);

		if (!empty($lokasi_kerja->photo)) {
			$path = FCPATH . '/uploads/lokasi_kerja/' . $lokasi_kerja->photo;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		
		
		return $this->model_lokasi_kerja->remove($id);
	}
	
	/**
	* Upload Image Lokasi Kerja	* 
	* @return JSON
	*/
	public function upload_photo_file()
	{
		if (!$this->is_allowed('lokasi_kerja_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'lokasi_kerja',
		]);
	}

	/**
	* Delete Image Lokasi Kerja	* 
	* @return JSON
	*/
	public function delete_photo_file($uuid)
	{
		if (!$this->is_allowed('lokasi_kerja_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'photo', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'lokasi_kerja',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/lokasi_kerja/'
        ]);
	}

	/**
	* Get Image Lokasi Kerja	* 
	* @return JSON
	*/
	public function get_photo_file($id)
	{
		if (!$this->is_allowed('lokasi_kerja_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$lokasi_kerja = $this->model_lokasi_kerja->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'photo', 
            'table_name'        => 'lokasi_kerja',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/lokasi_kerja/',
            'delete_endpoint'   => ADMIN_NAMESPACE_URL  .  '/lokasi_kerja/delete_photo_file'
        ]);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('lokasi_kerja_export');

		$this->model_lokasi_kerja->export(
			'lokasi_kerja', 
			'lokasi_kerja',
			$this->model_lokasi_kerja->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('lokasi_kerja_export');

		$this->model_lokasi_kerja->pdf('lokasi_kerja', 'lokasi_kerja');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('lokasi_kerja_export');

		$table = $title = 'lokasi_kerja';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_lokasi_kerja->find($id);
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


/* End of file lokasi_kerja.php */
/* Location: ./application/controllers/administrator/Lokasi Kerja.php */