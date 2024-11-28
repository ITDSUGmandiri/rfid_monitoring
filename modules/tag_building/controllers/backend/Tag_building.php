<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Tag Building Controller
*| --------------------------------------------------------------------------
*| Tag Building site
*|
*/
class Tag_building extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tag_building');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Tag Buildings
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('tag_building_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tag_buildings'] = $this->model_tag_building->get($filter, $field, $this->limit_page, $offset);
		$this->data['tag_building_counts'] = $this->model_tag_building->count_all($filter, $field);

		$config = [
			'base_url'     => ADMIN_NAMESPACE_URL  . '/tag_building/index/',
			'total_rows'   => $this->data['tag_building_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);
		
		$this->data['tables'] = $this->load->view('backend/standart/administrator/tag_building/tag_building_data_table', $this->data, true);
		
		if ($this->input->get('ajax')) {
			$this->response([
				'tables' => $this->data['tables'],
				'pagination' => $this->data['pagination'],
				'total_row' => $this->data['tag_building_counts']
			]);
		}

		$this->template->title('Building List');
		$this->render('backend/standart/administrator/tag_building/tag_building_list', $this->data);
	}
	
	/**
	* Add new tag_buildings
	*
	*/
	public function add()
	{
		$this->is_allowed('tag_building_add');

		$this->template->title('Building New');
		$this->render('backend/standart/administrator/tag_building/tag_building_add', $this->data);
	}

	/**
	* Add New Tag Buildings
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('tag_building_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('building_name', 'Building Name', 'trim|required|max_length[255]');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'building_name' => $this->input->post('building_name'),
				'building_created' => date('Y-m-d H:i:s'),
				'building_createdby' => get_user_data('id'),				'building_updated' => date('Y-m-d H:i:s'),
				'building_updatedby' => get_user_data('id'),			];

			
			



			
			
			$save_tag_building = $id = $this->model_tag_building->store($save_data);
            

			if ($save_tag_building) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_tag_building;
					$this->data['message'] = cclang('success_save_data_stay', [
						admin_anchor('/tag_building/edit/' . $save_tag_building, 'Edit Tag Building'),
						admin_anchor('/tag_building', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						admin_anchor('/tag_building/edit/' . $save_tag_building, 'Edit Tag Building')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/tag_building');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/tag_building');
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
	* Update view Tag Buildings
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('tag_building_update');

		$this->data['tag_building'] = $this->model_tag_building->find($id);

		$this->template->title('Building Update');
		$this->render('backend/standart/administrator/tag_building/tag_building_update', $this->data);
	}

	/**
	* Update Tag Buildings
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('tag_building_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('building_name', 'Building Name', 'trim|required|max_length[255]');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'building_name' => $this->input->post('building_name'),
				'building_updated' => date('Y-m-d H:i:s'),
				'building_updatedby' => get_user_data('id'),			];

			

			


			
			
			$save_tag_building = $this->model_tag_building->change($id, $save_data);

			if ($save_tag_building) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						admin_anchor('/tag_building', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/tag_building');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/tag_building');
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
	* delete Tag Buildings
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('tag_building_delete');

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
					"message" => cclang('has_been_deleted', 'tag_building')
				]);
			} else {
				$this->response([
					"success" => true,
					"message" => cclang('error_delete', 'tag_building')
				]);
			}

		} else {
			if ($remove) {
				set_message(cclang('has_been_deleted', 'tag_building'), 'success');
			} else {
				set_message(cclang('error_delete', 'tag_building'), 'error');
			}
			redirect_back();
		}

	}

		/**
	* View view Tag Buildings
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('tag_building_view');

		$this->data['tag_building'] = $this->model_tag_building->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Building Detail');
		$this->render('backend/standart/administrator/tag_building/tag_building_view', $this->data);
	}
	
	/**
	* delete Tag Buildings
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$tag_building = $this->model_tag_building->find($id);

		
		
		return $this->model_tag_building->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('tag_building_export');

		$this->model_tag_building->export(
			'tag_building', 
			'tag_building',
			$this->model_tag_building->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('tag_building_export');

		$this->model_tag_building->pdf('tag_building', 'tag_building');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('tag_building_export');

		$table = $title = 'tag_building';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_tag_building->find($id);
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


/* End of file tag_building.php */
/* Location: ./application/controllers/administrator/Tag Building.php */