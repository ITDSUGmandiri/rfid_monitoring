<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Tag Librarian Controller
*| --------------------------------------------------------------------------
*| Tag Librarian site
*|
*/
class Tag_librarian extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tag_librarian');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Tag Librarians
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('tag_librarian_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tag_librarians'] = $this->model_tag_librarian->get($filter, $field, $this->limit_page, $offset);
		$this->data['tag_librarian_counts'] = $this->model_tag_librarian->count_all($filter, $field);

		$config = [
			'base_url'     => ADMIN_NAMESPACE_URL  . '/tag_librarian/index/',
			'total_rows'   => $this->data['tag_librarian_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);
		
		$this->data['tables'] = $this->load->view('backend/standart/administrator/tag_librarian/tag_librarian_data_table', $this->data, true);
		
		if ($this->input->get('ajax')) {
			$this->response([
				'tables' => $this->data['tables'],
				'pagination' => $this->data['pagination'],
				'total_row' => $this->data['tag_librarian_counts']
			]);
		}

		$this->template->title('Librarian List');
		$this->render('backend/standart/administrator/tag_librarian/tag_librarian_list', $this->data);
	}
	
	/**
	* Add new tag_librarians
	*
	*/
	public function add()
	{
		$this->is_allowed('tag_librarian_add');

		$this->template->title('Librarian New');
		$this->render('backend/standart/administrator/tag_librarian/tag_librarian_add', $this->data);
	}

	/**
	* Add New Tag Librarians
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('tag_librarian_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('librarian_name', 'Librarian Name', 'trim|required|max_length[255]');
		

		$this->form_validation->set_rules('librarian_gate', 'Librarian Gate', 'trim|required|max_length[10]');
		

		

		$this->form_validation->set_rules('building_id', 'Area', 'trim|required|max_length[11]');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'librarian_name' => $this->input->post('librarian_name'),
				'librarian_gate' => $this->input->post('librarian_gate'),
				'librarian_created' => date('Y-m-d H:i:s'),
				'librarian_createdby' => get_user_data('id'),				'librarian_updated' => date('Y-m-d H:i:s'),
				'librarian_updateby' => get_user_data('id'),				'building_id' => $this->input->post('building_id'),
			];

			
			



			
			
			$save_tag_librarian = $id = $this->model_tag_librarian->store($save_data);
            

			if ($save_tag_librarian) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_tag_librarian;
					$this->data['message'] = cclang('success_save_data_stay', [
						admin_anchor('/tag_librarian/edit/' . $save_tag_librarian, 'Edit Tag Librarian'),
						admin_anchor('/tag_librarian', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						admin_anchor('/tag_librarian/edit/' . $save_tag_librarian, 'Edit Tag Librarian')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/tag_librarian');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/tag_librarian');
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
	* Update view Tag Librarians
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('tag_librarian_update');

		$this->data['tag_librarian'] = $this->model_tag_librarian->find($id);

		$this->template->title('Librarian Update');
		$this->render('backend/standart/administrator/tag_librarian/tag_librarian_update', $this->data);
	}

	/**
	* Update Tag Librarians
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('tag_librarian_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('librarian_name', 'Librarian Name', 'trim|required|max_length[255]');
		

		$this->form_validation->set_rules('librarian_gate', 'Librarian Gate', 'trim|required|max_length[10]');
		

		

		$this->form_validation->set_rules('building_id', 'Area', 'trim|required|max_length[11]');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'librarian_name' => $this->input->post('librarian_name'),
				'librarian_gate' => $this->input->post('librarian_gate'),
				'librarian_created' => date('Y-m-d H:i:s'),
				'librarian_createdby' => get_user_data('id'),				'librarian_updated' => date('Y-m-d H:i:s'),
				'librarian_updateby' => get_user_data('id'),				'building_id' => $this->input->post('building_id'),
			];

			

			


			
			
			$save_tag_librarian = $this->model_tag_librarian->change($id, $save_data);

			if ($save_tag_librarian) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						admin_anchor('/tag_librarian', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/tag_librarian');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/tag_librarian');
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
	* delete Tag Librarians
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('tag_librarian_delete');

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
					"message" => cclang('has_been_deleted', 'tag_librarian')
				]);
			} else {
				$this->response([
					"success" => true,
					"message" => cclang('error_delete', 'tag_librarian')
				]);
			}

		} else {
			if ($remove) {
				set_message(cclang('has_been_deleted', 'tag_librarian'), 'success');
			} else {
				set_message(cclang('error_delete', 'tag_librarian'), 'error');
			}
			redirect_back();
		}

	}

		/**
	* View view Tag Librarians
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('tag_librarian_view');

		$this->data['tag_librarian'] = $this->model_tag_librarian->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Librarian Detail');
		$this->render('backend/standart/administrator/tag_librarian/tag_librarian_view', $this->data);
	}
	
	/**
	* delete Tag Librarians
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$tag_librarian = $this->model_tag_librarian->find($id);

		
		
		return $this->model_tag_librarian->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('tag_librarian_export');

		$this->model_tag_librarian->export(
			'tag_librarian', 
			'tag_librarian',
			$this->model_tag_librarian->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('tag_librarian_export');

		$this->model_tag_librarian->pdf('tag_librarian', 'tag_librarian');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('tag_librarian_export');

		$table = $title = 'tag_librarian';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_tag_librarian->find($id);
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


/* End of file tag_librarian.php */
/* Location: ./application/controllers/administrator/Tag Librarian.php */