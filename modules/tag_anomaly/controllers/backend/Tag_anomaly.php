<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Tag Anomaly Controller
*| --------------------------------------------------------------------------
*| Tag Anomaly site
*|
*/
class Tag_anomaly extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tag_anomaly');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Tag Anomalys
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('tag_anomaly_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tag_anomalys'] = $this->model_tag_anomaly->get($filter, $field, $this->limit_page, $offset);
		$this->data['tag_anomaly_counts'] = $this->model_tag_anomaly->count_all($filter, $field);

		$config = [
			'base_url'     => ADMIN_NAMESPACE_URL  . '/tag_anomaly/index/',
			'total_rows'   => $this->data['tag_anomaly_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);
		
		$this->data['tables'] = $this->load->view('backend/standart/administrator/tag_anomaly/tag_anomaly_data_table', $this->data, true);
		
		if ($this->input->get('ajax')) {
			$this->response([
				'tables' => $this->data['tables'],
				'pagination' => $this->data['pagination'],
				'total_row' => $this->data['tag_anomaly_counts']
			]);
		}

		$this->template->title('Anomaly List');
		$this->render('backend/standart/administrator/tag_anomaly/tag_anomaly_list', $this->data);
	}
	
	/**
	* Add new tag_anomalys
	*
	*/
	public function add()
	{
		$this->is_allowed('tag_anomaly_add');

		$this->template->title('Anomaly New');
		$this->render('backend/standart/administrator/tag_anomaly/tag_anomaly_add', $this->data);
	}

	/**
	* Add New Tag Anomalys
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('tag_anomaly_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('rfid_id', 'RFID', 'trim|required|max_length[11]');
		

		$this->form_validation->set_rules('anomaly_right_librarian', 'Right Librarian', 'trim|required|max_length[11]');
		

		$this->form_validation->set_rules('anomaly_wrong_librarian', 'Wrong Librarian', 'trim|required|max_length[11]');
		

		$this->form_validation->set_rules('anomaly_status', 'Status', 'trim|required');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'rfid_id' => $this->input->post('rfid_id'),
				'anomaly_right_librarian' => $this->input->post('anomaly_right_librarian'),
				'anomaly_wrong_librarian' => $this->input->post('anomaly_wrong_librarian'),
				'anomaly_status' => $this->input->post('anomaly_status'),
				'anomaly_created' => date('Y-m-d H:i:s'),
				'anomaly_updated' => date('Y-m-d H:i:s'),
				'anomaly_updatedby' => get_user_data('username'),
				'rfid_barcode' => $this->input->post('rfid_barcode'),
			];

			
			



			
			
			$save_tag_anomaly = $id = $this->model_tag_anomaly->store($save_data);
            

			if ($save_tag_anomaly) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_tag_anomaly;
					$this->data['message'] = cclang('success_save_data_stay', [
						admin_anchor('/tag_anomaly/edit/' . $save_tag_anomaly, 'Edit Tag Anomaly'),
						admin_anchor('/tag_anomaly', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						admin_anchor('/tag_anomaly/edit/' . $save_tag_anomaly, 'Edit Tag Anomaly')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/tag_anomaly');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/tag_anomaly');
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
	* Update view Tag Anomalys
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('tag_anomaly_update');

		$this->data['tag_anomaly'] = $this->model_tag_anomaly->find($id);

		$this->template->title('Anomaly Update');
		$this->render('backend/standart/administrator/tag_anomaly/tag_anomaly_update', $this->data);
	}

	/**
	* Update Tag Anomalys
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('tag_anomaly_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('rfid_id', 'RFID', 'trim|required|max_length[11]');
		

		$this->form_validation->set_rules('anomaly_right_librarian', 'Right Librarian', 'trim|required|max_length[11]');
		

		$this->form_validation->set_rules('anomaly_wrong_librarian', 'Wrong Librarian', 'trim|required|max_length[11]');
		

		$this->form_validation->set_rules('anomaly_status', 'Status', 'trim|required');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'rfid_id' => $this->input->post('rfid_id'),
				'anomaly_right_librarian' => $this->input->post('anomaly_right_librarian'),
				'anomaly_wrong_librarian' => $this->input->post('anomaly_wrong_librarian'),
				'anomaly_status' => $this->input->post('anomaly_status'),
				'anomaly_updated' => date('Y-m-d H:i:s'),
				'anomaly_updatedby' => get_user_data('username'),
				'rfid_barcode' => $this->input->post('rfid_barcode'),
			];

			

			


			
			
			$save_tag_anomaly = $this->model_tag_anomaly->change($id, $save_data);

			if ($save_tag_anomaly) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						admin_anchor('/tag_anomaly', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/tag_anomaly');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/tag_anomaly');
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
	* delete Tag Anomalys
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('tag_anomaly_delete');

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
					"message" => cclang('has_been_deleted', 'tag_anomaly')
				]);
			} else {
				$this->response([
					"success" => true,
					"message" => cclang('error_delete', 'tag_anomaly')
				]);
			}

		} else {
			if ($remove) {
				set_message(cclang('has_been_deleted', 'tag_anomaly'), 'success');
			} else {
				set_message(cclang('error_delete', 'tag_anomaly'), 'error');
			}
			redirect_back();
		}

	}

		/**
	* View view Tag Anomalys
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('tag_anomaly_view');

		$this->data['tag_anomaly'] = $this->model_tag_anomaly->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Anomaly Detail');
		$this->render('backend/standart/administrator/tag_anomaly/tag_anomaly_view', $this->data);
	}
	
	/**
	* delete Tag Anomalys
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$tag_anomaly = $this->model_tag_anomaly->find($id);

		
		
		return $this->model_tag_anomaly->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('tag_anomaly_export');

		$this->model_tag_anomaly->export(
			'tag_anomaly', 
			'tag_anomaly',
			$this->model_tag_anomaly->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('tag_anomaly_export');

		$this->model_tag_anomaly->pdf('tag_anomaly', 'tag_anomaly');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('tag_anomaly_export');

		$table = $title = 'tag_anomaly';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_tag_anomaly->find($id);
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


/* End of file tag_anomaly.php */
/* Location: ./application/controllers/administrator/Tag Anomaly.php */