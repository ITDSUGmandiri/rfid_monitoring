<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Crud Field Condition Controller
*| --------------------------------------------------------------------------
*| Crud Field Condition site
*|
*/
class Crud_field_condition extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_crud_field_condition');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Crud Field Conditions
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('crud_field_condition_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['crud_field_conditions'] = $this->model_crud_field_condition->get($filter, $field, $this->limit_page, $offset);
		$this->data['crud_field_condition_counts'] = $this->model_crud_field_condition->count_all($filter, $field);

		$config = [
			'base_url'     => ADMIN_NAMESPACE_URL  . '/crud_field_condition/index/',
			'total_rows'   => $this->data['crud_field_condition_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Crud Field Condition List');
		$this->render('backend/standart/administrator/crud_field_condition/crud_field_condition_list', $this->data);
	}
	
	/**
	* Add new crud_field_conditions
	*
	*/
	public function add()
	{
		$this->is_allowed('crud_field_condition_add');

		$this->template->title('Crud Field Condition New');
		$this->render('backend/standart/administrator/crud_field_condition/crud_field_condition_add', $this->data);
	}

	/**
	* Add New Crud Field Conditions
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('crud_field_condition_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('crud_field_id', 'Crud Field Id', 'trim|required|max_length[11]');
		

		$this->form_validation->set_rules('reff', 'Reff', 'trim|required');
		

		$this->form_validation->set_rules('crud_id', 'Crud Id', 'trim|required|max_length[11]');
		

		$this->form_validation->set_rules('cond_field', 'Cond Field', 'trim|required');
		

		$this->form_validation->set_rules('cond_operator', 'Cond Operator', 'trim|required');
		

		$this->form_validation->set_rules('cond_value', 'Cond Value', 'trim|required');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'crud_field_id' => $this->input->post('crud_field_id'),
				'reff' => $this->input->post('reff'),
				'crud_id' => $this->input->post('crud_id'),
				'cond_field' => $this->input->post('cond_field'),
				'cond_operator' => $this->input->post('cond_operator'),
				'cond_value' => $this->input->post('cond_value'),
			];

			
			



			
			
			$save_crud_field_condition = $id = $this->model_crud_field_condition->store($save_data);
            

			if ($save_crud_field_condition) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_crud_field_condition;
					$this->data['message'] = cclang('success_save_data_stay', [
						admin_anchor('/crud_field_condition/edit/' . $save_crud_field_condition, 'Edit Crud Field Condition'),
						admin_anchor('/crud_field_condition', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						admin_anchor('/crud_field_condition/edit/' . $save_crud_field_condition, 'Edit Crud Field Condition')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/crud_field_condition');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/crud_field_condition');
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
	* Update view Crud Field Conditions
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('crud_field_condition_update');

		$this->data['crud_field_condition'] = $this->model_crud_field_condition->find($id);

		$this->template->title('Crud Field Condition Update');
		$this->render('backend/standart/administrator/crud_field_condition/crud_field_condition_update', $this->data);
	}

	/**
	* Update Crud Field Conditions
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('crud_field_condition_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('crud_field_id', 'Crud Field Id', 'trim|required|max_length[11]');
		

		$this->form_validation->set_rules('reff', 'Reff', 'trim|required');
		

		$this->form_validation->set_rules('crud_id', 'Crud Id', 'trim|required|max_length[11]');
		

		$this->form_validation->set_rules('cond_field', 'Cond Field', 'trim|required');
		

		$this->form_validation->set_rules('cond_operator', 'Cond Operator', 'trim|required');
		

		$this->form_validation->set_rules('cond_value', 'Cond Value', 'trim|required');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'crud_field_id' => $this->input->post('crud_field_id'),
				'reff' => $this->input->post('reff'),
				'crud_id' => $this->input->post('crud_id'),
				'cond_field' => $this->input->post('cond_field'),
				'cond_operator' => $this->input->post('cond_operator'),
				'cond_value' => $this->input->post('cond_value'),
			];

			

			


			
			
			$save_crud_field_condition = $this->model_crud_field_condition->change($id, $save_data);

			if ($save_crud_field_condition) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						admin_anchor('/crud_field_condition', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/crud_field_condition');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/crud_field_condition');
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
	* delete Crud Field Conditions
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('crud_field_condition_delete');

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

		if ($remove) {
            set_message(cclang('has_been_deleted', 'crud_field_condition'), 'success');
        } else {
            set_message(cclang('error_delete', 'crud_field_condition'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Crud Field Conditions
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('crud_field_condition_view');

		$this->data['crud_field_condition'] = $this->model_crud_field_condition->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Crud Field Condition Detail');
		$this->render('backend/standart/administrator/crud_field_condition/crud_field_condition_view', $this->data);
	}
	
	/**
	* delete Crud Field Conditions
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$crud_field_condition = $this->model_crud_field_condition->find($id);

		
		
		return $this->model_crud_field_condition->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('crud_field_condition_export');

		$this->model_crud_field_condition->export(
			'crud_field_condition', 
			'crud_field_condition',
			$this->model_crud_field_condition->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('crud_field_condition_export');

		$this->model_crud_field_condition->pdf('crud_field_condition', 'crud_field_condition');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('crud_field_condition_export');

		$table = $title = 'crud_field_condition';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_crud_field_condition->find($id);
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


/* End of file crud_field_condition.php */
/* Location: ./application/controllers/administrator/Crud Field Condition.php */