<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Check Upload Controller
*| --------------------------------------------------------------------------
*| Check Upload site
*|
*/
class Check_upload extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_check_upload');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Check Uploads
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('check_upload_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['check_uploads'] = $this->model_check_upload->get($filter, $field, $this->limit_page, $offset);
		$this->data['check_upload_counts'] = $this->model_check_upload->count_all($filter, $field);

		$config = [
			'base_url'     => ADMIN_NAMESPACE_URL  . '/check_upload/index/',
			'total_rows'   => $this->data['check_upload_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);
		
		$this->data['tables'] = $this->load->view('backend/standart/administrator/check_upload/check_upload_data_table', $this->data, true);
		
		if ($this->input->get('ajax')) {
			$this->response([
				'tables' => $this->data['tables'],
				'pagination' => $this->data['pagination'],
				'total_row' => $this->data['check_upload_counts']
			]);
		}

		$this->template->title('Check Upload List');
		$this->render('backend/standart/administrator/check_upload/check_upload_list', $this->data);
	}
	
	/**
	* Add new check_uploads
	*
	*/
	public function add()
	{
		$this->is_allowed('check_upload_add');

		$this->template->title('Check Upload New');
		$this->render('backend/standart/administrator/check_upload/check_upload_add', $this->data);
	}

	/**
	* Add New Check Uploads
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('check_upload_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('check_upload_file1_name[]', 'File1', 'trim|required');
		

		$this->form_validation->set_rules('check_upload_file2_name[]', 'File2', 'trim|required');
		

		$this->form_validation->set_rules('check_upload_file3_name[]', 'File3', 'trim|required');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
			];

			
			



			
			if (!is_dir(FCPATH . '/uploads/check_upload/')) {
				mkdir(FCPATH . '/uploads/check_upload/');
			}

			if (count((array) $this->input->post('check_upload_file1_name'))) {
				foreach ((array) $_POST['check_upload_file1_name'] as $idx => $file_name) {
					$check_upload_file1_name_copy = date('YmdHis') . '-' . $file_name;

					rename(FCPATH . 'uploads/tmp/' . $_POST['check_upload_file1_uuid'][$idx] . '/' .  $file_name, 
							FCPATH . 'uploads/check_upload/' . $check_upload_file1_name_copy);

					$listed_image[] = $check_upload_file1_name_copy;

					if (!is_file(FCPATH . '/uploads/check_upload/' . $check_upload_file1_name_copy)) {
						echo json_encode([
							'success' => false,
							'message' => 'Error uploading file'
							]);
						exit;
					}
				}

				$save_data['file1'] = implode($listed_image, ',');
				$listed_image = [];
			}
		
			if (count((array) $this->input->post('check_upload_file2_name'))) {
				foreach ((array) $_POST['check_upload_file2_name'] as $idx => $file_name) {
					$check_upload_file2_name_copy = date('YmdHis') . '-' . $file_name;

					rename(FCPATH . 'uploads/tmp/' . $_POST['check_upload_file2_uuid'][$idx] . '/' .  $file_name, 
							FCPATH . 'uploads/check_upload/' . $check_upload_file2_name_copy);

					$listed_image[] = $check_upload_file2_name_copy;

					if (!is_file(FCPATH . '/uploads/check_upload/' . $check_upload_file2_name_copy)) {
						echo json_encode([
							'success' => false,
							'message' => 'Error uploading file'
							]);
						exit;
					}
				}

				$save_data['file2'] = implode($listed_image, ',');
				$listed_image = [];
			}
		
			if (count((array) $this->input->post('check_upload_file3_name'))) {
				foreach ((array) $_POST['check_upload_file3_name'] as $idx => $file_name) {
					$check_upload_file3_name_copy = date('YmdHis') . '-' . $file_name;

					rename(FCPATH . 'uploads/tmp/' . $_POST['check_upload_file3_uuid'][$idx] . '/' .  $file_name, 
							FCPATH . 'uploads/check_upload/' . $check_upload_file3_name_copy);

					$listed_image[] = $check_upload_file3_name_copy;

					if (!is_file(FCPATH . '/uploads/check_upload/' . $check_upload_file3_name_copy)) {
						echo json_encode([
							'success' => false,
							'message' => 'Error uploading file'
							]);
						exit;
					}
				}

				$save_data['file3'] = implode($listed_image, ',');
				$listed_image = [];
			}
		
			
			$save_check_upload = $id = $this->model_check_upload->store($save_data);
            

			if ($save_check_upload) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_check_upload;
					$this->data['message'] = cclang('success_save_data_stay', [
						admin_anchor('/check_upload/edit/' . $save_check_upload, 'Edit Check Upload'),
						admin_anchor('/check_upload', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						admin_anchor('/check_upload/edit/' . $save_check_upload, 'Edit Check Upload')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/check_upload');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/check_upload');
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
	* Update view Check Uploads
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('check_upload_update');

		$this->data['check_upload'] = $this->model_check_upload->find($id);

		$this->template->title('Check Upload Update');
		$this->render('backend/standart/administrator/check_upload/check_upload_update', $this->data);
	}

	/**
	* Update Check Uploads
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('check_upload_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('check_upload_file1_name[]', 'File1', 'trim|required');
		

		$this->form_validation->set_rules('check_upload_file2_name[]', 'File2', 'trim|required');
		

		$this->form_validation->set_rules('check_upload_file3_name[]', 'File3', 'trim|required');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
			];

			

			


			
			$listed_image = [];
			if (count((array) $this->input->post('check_upload_file1_name'))) {
				foreach ((array) $_POST['check_upload_file1_name'] as $idx => $file_name) {
					if (isset($_POST['check_upload_file1_uuid'][$idx]) AND !empty($_POST['check_upload_file1_uuid'][$idx])) {
						$check_upload_file1_name_copy = date('YmdHis') . '-' . $file_name;

						rename(FCPATH . 'uploads/tmp/' . $_POST['check_upload_file1_uuid'][$idx] . '/' .  $file_name, 
								FCPATH . 'uploads/check_upload/' . $check_upload_file1_name_copy);

						$listed_image[] = $check_upload_file1_name_copy;

						if (!is_file(FCPATH . '/uploads/check_upload/' . $check_upload_file1_name_copy)) {
							echo json_encode([
								'success' => false,
								'message' => 'Error uploading file'
								]);
							exit;
						}
					} else {
						$listed_image[] = $file_name;
					}
				}
			}
			
			$save_data['file1'] = implode($listed_image, ',');
			$listed_image = [];

		
			$listed_image = [];
			if (count((array) $this->input->post('check_upload_file2_name'))) {
				foreach ((array) $_POST['check_upload_file2_name'] as $idx => $file_name) {
					if (isset($_POST['check_upload_file2_uuid'][$idx]) AND !empty($_POST['check_upload_file2_uuid'][$idx])) {
						$check_upload_file2_name_copy = date('YmdHis') . '-' . $file_name;

						rename(FCPATH . 'uploads/tmp/' . $_POST['check_upload_file2_uuid'][$idx] . '/' .  $file_name, 
								FCPATH . 'uploads/check_upload/' . $check_upload_file2_name_copy);

						$listed_image[] = $check_upload_file2_name_copy;

						if (!is_file(FCPATH . '/uploads/check_upload/' . $check_upload_file2_name_copy)) {
							echo json_encode([
								'success' => false,
								'message' => 'Error uploading file'
								]);
							exit;
						}
					} else {
						$listed_image[] = $file_name;
					}
				}
			}
			
			$save_data['file2'] = implode($listed_image, ',');
			$listed_image = [];

		
			$listed_image = [];
			if (count((array) $this->input->post('check_upload_file3_name'))) {
				foreach ((array) $_POST['check_upload_file3_name'] as $idx => $file_name) {
					if (isset($_POST['check_upload_file3_uuid'][$idx]) AND !empty($_POST['check_upload_file3_uuid'][$idx])) {
						$check_upload_file3_name_copy = date('YmdHis') . '-' . $file_name;

						rename(FCPATH . 'uploads/tmp/' . $_POST['check_upload_file3_uuid'][$idx] . '/' .  $file_name, 
								FCPATH . 'uploads/check_upload/' . $check_upload_file3_name_copy);

						$listed_image[] = $check_upload_file3_name_copy;

						if (!is_file(FCPATH . '/uploads/check_upload/' . $check_upload_file3_name_copy)) {
							echo json_encode([
								'success' => false,
								'message' => 'Error uploading file'
								]);
							exit;
						}
					} else {
						$listed_image[] = $file_name;
					}
				}
			}
			
			$save_data['file3'] = implode($listed_image, ',');
			$listed_image = [];

		
			
			$save_check_upload = $this->model_check_upload->change($id, $save_data);

			if ($save_check_upload) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						admin_anchor('/check_upload', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/check_upload');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/check_upload');
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
	* delete Check Uploads
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('check_upload_delete');

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
					"message" => cclang('has_been_deleted', 'check_upload')
				]);
			} else {
				$this->response([
					"success" => true,
					"message" => cclang('error_delete', 'check_upload')
				]);
			}

		} else {
			if ($remove) {
				set_message(cclang('has_been_deleted', 'check_upload'), 'success');
			} else {
				set_message(cclang('error_delete', 'check_upload'), 'error');
			}
			redirect_back();
		}

	}

		/**
	* View view Check Uploads
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('check_upload_view');

		$this->data['check_upload'] = $this->model_check_upload->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Check Upload Detail');
		$this->render('backend/standart/administrator/check_upload/check_upload_view', $this->data);
	}
	
	/**
	* delete Check Uploads
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$check_upload = $this->model_check_upload->find($id);

		
		if (!empty($check_upload->file1)) {
			foreach ((array) explode(',', $check_upload->file1) as $filename) {
				$path = FCPATH . '/uploads/check_upload/' . $filename;

				if (is_file($path)) {
					$delete_file = unlink($path);
				}
			}
		}
		if (!empty($check_upload->file2)) {
			foreach ((array) explode(',', $check_upload->file2) as $filename) {
				$path = FCPATH . '/uploads/check_upload/' . $filename;

				if (is_file($path)) {
					$delete_file = unlink($path);
				}
			}
		}
		if (!empty($check_upload->file3)) {
			foreach ((array) explode(',', $check_upload->file3) as $filename) {
				$path = FCPATH . '/uploads/check_upload/' . $filename;

				if (is_file($path)) {
					$delete_file = unlink($path);
				}
			}
		}
		
		return $this->model_check_upload->remove($id);
	}
	
	
	/**
	* Upload Image Check Upload	* 
	* @return JSON
	*/
	public function upload_file1_file()
	{
		if (!$this->is_allowed('check_upload_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'check_upload',
		]);
	}

	/**
	* Delete Image Check Upload	* 
	* @return JSON
	*/
	public function delete_file1_file($uuid)
	{
		if (!$this->is_allowed('check_upload_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'file1', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'check_upload',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/check_upload/'
        ]);
	}

	/**
	* Get Image Check Upload	* 
	* @return JSON
	*/
	public function get_file1_file($id)
	{
		if (!$this->is_allowed('check_upload_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$check_upload = $this->model_check_upload->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'file1', 
            'table_name'        => 'check_upload',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/check_upload/',
            'delete_endpoint'   => ADMIN_NAMESPACE_URL  .  '/check_upload/delete_file1_file'
        ]);
	}
	
	/**
	* Upload Image Check Upload	* 
	* @return JSON
	*/
	public function upload_file2_file()
	{
		if (!$this->is_allowed('check_upload_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'check_upload',
		]);
	}

	/**
	* Delete Image Check Upload	* 
	* @return JSON
	*/
	public function delete_file2_file($uuid)
	{
		if (!$this->is_allowed('check_upload_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'file2', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'check_upload',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/check_upload/'
        ]);
	}

	/**
	* Get Image Check Upload	* 
	* @return JSON
	*/
	public function get_file2_file($id)
	{
		if (!$this->is_allowed('check_upload_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$check_upload = $this->model_check_upload->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'file2', 
            'table_name'        => 'check_upload',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/check_upload/',
            'delete_endpoint'   => ADMIN_NAMESPACE_URL  .  '/check_upload/delete_file2_file'
        ]);
	}
	
	/**
	* Upload Image Check Upload	* 
	* @return JSON
	*/
	public function upload_file3_file()
	{
		if (!$this->is_allowed('check_upload_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'check_upload',
		]);
	}

	/**
	* Delete Image Check Upload	* 
	* @return JSON
	*/
	public function delete_file3_file($uuid)
	{
		if (!$this->is_allowed('check_upload_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'file3', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'check_upload',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/check_upload/'
        ]);
	}

	/**
	* Get Image Check Upload	* 
	* @return JSON
	*/
	public function get_file3_file($id)
	{
		if (!$this->is_allowed('check_upload_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$check_upload = $this->model_check_upload->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'file3', 
            'table_name'        => 'check_upload',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/check_upload/',
            'delete_endpoint'   => ADMIN_NAMESPACE_URL  .  '/check_upload/delete_file3_file'
        ]);
	}
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('check_upload_export');

		$this->model_check_upload->export(
			'check_upload', 
			'check_upload',
			$this->model_check_upload->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('check_upload_export');

		$this->model_check_upload->pdf('check_upload', 'check_upload');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('check_upload_export');

		$table = $title = 'check_upload';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_check_upload->find($id);
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


/* End of file check_upload.php */
/* Location: ./application/controllers/administrator/Check Upload.php */