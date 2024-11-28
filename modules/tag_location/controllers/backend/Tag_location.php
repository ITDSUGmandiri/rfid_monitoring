<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Tag Location Controller
*| --------------------------------------------------------------------------
*| Tag Location site
*|
*/
class Tag_location extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tag_location');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Tag Locations
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('tag_location_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tag_locations'] = $this->model_tag_location->get($filter, $field, $this->limit_page, $offset);
		$this->data['tag_location_counts'] = $this->model_tag_location->count_all($filter, $field);

		$config = [
			'base_url'     => ADMIN_NAMESPACE_URL  . '/tag_location/index/',
			'total_rows'   => $this->data['tag_location_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);
		
		$this->data['tables'] = $this->load->view('backend/standart/administrator/tag_location/tag_location_data_table', $this->data, true);
		
		if ($this->input->get('ajax')) {
			$this->response([
				'tables' => $this->data['tables'],
				'pagination' => $this->data['pagination'],
				'total_row' => $this->data['tag_location_counts']
			]);
		}

		$this->template->title('Location List');
		$this->render('backend/standart/administrator/tag_location/tag_location_list', $this->data);
	}
	
	/**
	* Add new tag_locations
	*
	*/
	public function add()
	{
		$this->is_allowed('tag_location_add');

		$this->template->title('Location New');
		$this->render('backend/standart/administrator/tag_location/tag_location_add', $this->data);
	}

	/**
	* Add New Tag Locations
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('tag_location_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('rfid_id', 'RFID Tag Number', 'trim|required|max_length[11]');
		

		$this->form_validation->set_rules('librarian_id', 'Librarian', 'trim|required|max_length[11]');
		

		$this->form_validation->set_rules('location_status', 'Status', 'trim|required');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'rfid_id' => $this->input->post('rfid_id'),
				'librarian_id' => $this->input->post('librarian_id'),
				'location_status' => $this->input->post('location_status'),
				'location_created' => date('Y-m-d H:i:s'),
				'location_updated' => date('Y-m-d H:i:s'),
			];

			
			



			
			
			$save_tag_location = $id = $this->model_tag_location->store($save_data);
            

			if ($save_tag_location) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_tag_location;
					$this->data['message'] = cclang('success_save_data_stay', [
						admin_anchor('/tag_location/edit/' . $save_tag_location, 'Edit Tag Location'),
						admin_anchor('/tag_location', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						admin_anchor('/tag_location/edit/' . $save_tag_location, 'Edit Tag Location')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/tag_location');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/tag_location');
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
	* Update view Tag Locations
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('tag_location_update');

		$this->data['tag_location'] = $this->model_tag_location->find($id);

		$this->template->title('Location Update');
		$this->render('backend/standart/administrator/tag_location/tag_location_update', $this->data);
	}

	/**
	* Update Tag Locations
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('tag_location_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('rfid_id', 'RFID Tag Number', 'trim|required|max_length[11]');
		

		$this->form_validation->set_rules('librarian_id', 'Librarian', 'trim|required|max_length[11]');
		

		$this->form_validation->set_rules('location_status', 'Status', 'trim|required');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'rfid_id' => $this->input->post('rfid_id'),
				'librarian_id' => $this->input->post('librarian_id'),
				'location_status' => $this->input->post('location_status'),
				'location_updated' => date('Y-m-d H:i:s'),
			];

			

			


			
			
			$save_tag_location = $this->model_tag_location->change($id, $save_data);

			if ($save_tag_location) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						admin_anchor('/tag_location', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/tag_location');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/tag_location');
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
	* delete Tag Locations
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('tag_location_delete');

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
					"message" => cclang('has_been_deleted', 'tag_location')
				]);
			} else {
				$this->response([
					"success" => true,
					"message" => cclang('error_delete', 'tag_location')
				]);
			}

		} else {
			if ($remove) {
				set_message(cclang('has_been_deleted', 'tag_location'), 'success');
			} else {
				set_message(cclang('error_delete', 'tag_location'), 'error');
			}
			redirect_back();
		}

	}

		/**
	* View view Tag Locations
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('tag_location_view');

		$this->data['tag_location'] = $this->model_tag_location->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Location Detail');
		$this->render('backend/standart/administrator/tag_location/tag_location_view', $this->data);
	}
	
	/**
	* delete Tag Locations
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$tag_location = $this->model_tag_location->find($id);

		
		
		return $this->model_tag_location->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('tag_location_export');

		$this->model_tag_location->export(
			'tag_location', 
			'tag_location',
			$this->model_tag_location->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('tag_location_export');

		$this->model_tag_location->pdf('tag_location', 'tag_location');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('tag_location_export');

		$table = $title = 'tag_location';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_tag_location->find($id);
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


/* End of file tag_location.php */
/* Location: ./application/controllers/administrator/Tag Location.php */