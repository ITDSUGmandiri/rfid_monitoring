<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Tag Label Controller
*| --------------------------------------------------------------------------
*| Tag Label site
*|
*/
class Tag_label extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tag_label');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Tag Labels
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('tag_label_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tag_labels'] = $this->model_tag_label->get($filter, $field, $this->limit_page, $offset);
		$this->data['tag_label_counts'] = $this->model_tag_label->count_all($filter, $field);

		$config = [
			'base_url'     => ADMIN_NAMESPACE_URL  . '/tag_label/index/',
			'total_rows'   => $this->data['tag_label_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);
		
		$this->data['tables'] = $this->load->view('backend/standart/administrator/tag_label/tag_label_data_table', $this->data, true);
		
		if ($this->input->get('ajax')) {
			$this->response([
				'tables' => $this->data['tables'],
				'pagination' => $this->data['pagination'],
				'total_row' => $this->data['tag_label_counts']
			]);
		}

		$this->template->title('Label List');
		$this->render('backend/standart/administrator/tag_label/tag_label_list', $this->data);
	}
	
	/**
	* Add new tag_labels
	*
	*/
	public function add()
	{
		$this->is_allowed('tag_label_add');

		$this->template->title('Label New');
		$this->render('backend/standart/administrator/tag_label/tag_label_add', $this->data);
	}

	/**
	* Add New Tag Labels
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('tag_label_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('label_name', 'Name', 'trim|required|max_length[255]');
		

		$this->form_validation->set_rules('label_description', 'Description', 'trim|required');
		

		$this->form_validation->set_rules('tag_label_label_image_name', 'Image', 'trim|required');
		

		

		if ($this->form_validation->run()) {
			$tag_label_label_image_uuid = $this->input->post('tag_label_label_image_uuid');
			$tag_label_label_image_name = $this->input->post('tag_label_label_image_name');
		
			$save_data = [
				'label_supplier' => $this->input->post('label_supplier'),
				'label_name' => $this->input->post('label_name'),
				'label_description' => $this->input->post('label_description'),
				'label_created' => date('Y-m-d H:i:s'),
				'label_createdby' => get_user_data('id'),				'label_updated' => date('Y-m-d H:i:s'),
				'label_updatedby' => get_user_data('id'),				'label_dimension' => $this->input->post('label_dimension'),
				'referensi' => $this->input->post('referensi'),
			];

			
			



			
			if (!is_dir(FCPATH . '/uploads/tag_label/')) {
				mkdir(FCPATH . '/uploads/tag_label/');
			}

			if (!empty($tag_label_label_image_name)) {
				$tag_label_label_image_name_copy = date('YmdHis') . '-' . $tag_label_label_image_name;

				rename(FCPATH . 'uploads/tmp/' . $tag_label_label_image_uuid . '/' . $tag_label_label_image_name, 
						FCPATH . 'uploads/tag_label/' . $tag_label_label_image_name_copy);

				if (!is_file(FCPATH . '/uploads/tag_label/' . $tag_label_label_image_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['label_image'] = $tag_label_label_image_name_copy;
			}
		
			
			$save_tag_label = $id = $this->model_tag_label->store($save_data);
            

			if ($save_tag_label) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_tag_label;
					$this->data['message'] = cclang('success_save_data_stay', [
						admin_anchor('/tag_label/edit/' . $save_tag_label, 'Edit Tag Label'),
						admin_anchor('/tag_label', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						admin_anchor('/tag_label/edit/' . $save_tag_label, 'Edit Tag Label')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/tag_label');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/tag_label');
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
	* Update view Tag Labels
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('tag_label_update');

		$this->data['tag_label'] = $this->model_tag_label->find($id);

		$this->template->title('Label Update');
		$this->render('backend/standart/administrator/tag_label/tag_label_update', $this->data);
	}

	/**
	* Update Tag Labels
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('tag_label_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('label_name', 'Name', 'trim|required|max_length[255]');
		

		$this->form_validation->set_rules('label_description', 'Description', 'trim|required');
		

		$this->form_validation->set_rules('tag_label_label_image_name', 'Image', 'trim|required');
		

		
		if ($this->form_validation->run()) {
			$tag_label_label_image_uuid = $this->input->post('tag_label_label_image_uuid');
			$tag_label_label_image_name = $this->input->post('tag_label_label_image_name');
		
			$save_data = [
				'label_supplier' => $this->input->post('label_supplier'),
				'label_name' => $this->input->post('label_name'),
				'label_description' => $this->input->post('label_description'),
				'label_updated' => date('Y-m-d H:i:s'),
				'label_updatedby' => get_user_data('id'),				'label_dimension' => $this->input->post('label_dimension'),
				'referensi' => $this->input->post('referensi'),
			];

			

			


			
			if (!is_dir(FCPATH . '/uploads/tag_label/')) {
				mkdir(FCPATH . '/uploads/tag_label/');
			}

			if (!empty($tag_label_label_image_uuid)) {
				$tag_label_label_image_name_copy = date('YmdHis') . '-' . $tag_label_label_image_name;

				rename(FCPATH . 'uploads/tmp/' . $tag_label_label_image_uuid . '/' . $tag_label_label_image_name, 
						FCPATH . 'uploads/tag_label/' . $tag_label_label_image_name_copy);

				if (!is_file(FCPATH . '/uploads/tag_label/' . $tag_label_label_image_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['label_image'] = $tag_label_label_image_name_copy;
			}
		
			
			$save_tag_label = $this->model_tag_label->change($id, $save_data);

			if ($save_tag_label) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						admin_anchor('/tag_label', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/tag_label');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/tag_label');
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
	* delete Tag Labels
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('tag_label_delete');

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
					"message" => cclang('has_been_deleted', 'tag_label')
				]);
			} else {
				$this->response([
					"success" => true,
					"message" => cclang('error_delete', 'tag_label')
				]);
			}

		} else {
			if ($remove) {
				set_message(cclang('has_been_deleted', 'tag_label'), 'success');
			} else {
				set_message(cclang('error_delete', 'tag_label'), 'error');
			}
			redirect_back();
		}

	}

		/**
	* View view Tag Labels
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('tag_label_view');

		$this->data['tag_label'] = $this->model_tag_label->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Label Detail');
		$this->render('backend/standart/administrator/tag_label/tag_label_view', $this->data);
	}
	
	/**
	* delete Tag Labels
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$tag_label = $this->model_tag_label->find($id);

		if (!empty($tag_label->label_image)) {
			$path = FCPATH . '/uploads/tag_label/' . $tag_label->label_image;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		
		
		return $this->model_tag_label->remove($id);
	}
	
	/**
	* Upload Image Tag Label	* 
	* @return JSON
	*/
	public function upload_label_image_file()
	{
		if (!$this->is_allowed('tag_label_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'tag_label',
		]);
	}

	/**
	* Delete Image Tag Label	* 
	* @return JSON
	*/
	public function delete_label_image_file($uuid)
	{
		if (!$this->is_allowed('tag_label_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'label_image', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'tag_label',
            'primary_key'       => 'label_id',
            'upload_path'       => 'uploads/tag_label/'
        ]);
	}

	/**
	* Get Image Tag Label	* 
	* @return JSON
	*/
	public function get_label_image_file($id)
	{
		if (!$this->is_allowed('tag_label_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$tag_label = $this->model_tag_label->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'label_image', 
            'table_name'        => 'tag_label',
            'primary_key'       => 'label_id',
            'upload_path'       => 'uploads/tag_label/',
            'delete_endpoint'   => ADMIN_NAMESPACE_URL  .  '/tag_label/delete_label_image_file'
        ]);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('tag_label_export');

		$this->model_tag_label->export(
			'tag_label', 
			'tag_label',
			$this->model_tag_label->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('tag_label_export');

		$this->model_tag_label->pdf('tag_label', 'tag_label');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('tag_label_export');

		$table = $title = 'tag_label';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_tag_label->find($id);
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


/* End of file tag_label.php */
/* Location: ./application/controllers/administrator/Tag Label.php */