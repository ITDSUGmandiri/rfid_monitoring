<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Tb History Invent Controller
*| --------------------------------------------------------------------------
*| Tb History Invent site
*|
*/
class Tb_history_invent extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tb_history_invent');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Tb History Invents
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('tb_history_invent_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tb_history_invents'] = $this->model_tb_history_invent->get($filter, $field, $this->limit_page, $offset);
		$this->data['tb_history_invent_counts'] = $this->model_tb_history_invent->count_all($filter, $field);

		$config = [
			'base_url'     => ADMIN_NAMESPACE_URL  . '/tb_history_invent/index/',
			'total_rows'   => $this->data['tb_history_invent_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);
		
		$this->data['tables'] = $this->load->view('backend/standart/administrator/tb_history_invent/tb_history_invent_data_table', $this->data, true);
		
		if ($this->input->get('ajax')) {
			$this->response([
				'tables' => $this->data['tables'],
				'pagination' => $this->data['pagination'],
				'total_row' => $this->data['tb_history_invent_counts']
			]);
		}

		$this->template->title('Tb History Invent List');
		$this->render('backend/standart/administrator/tb_history_invent/tb_history_invent_list', $this->data);
	}
	
	/**
	* Add new tb_history_invents
	*
	*/
	public function add()
	{
		$this->is_allowed('tb_history_invent_add');

		$this->template->title('Tb History Invent New');
		$this->render('backend/standart/administrator/tb_history_invent/tb_history_invent_add', $this->data);
	}

	/**
	* Add New Tb History Invents
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('tb_history_invent_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
		

		$this->form_validation->set_rules('waktu', 'Waktu', 'trim|required');
		

		$this->form_validation->set_rules('id_room', 'Ruangan', 'trim|required|max_length[20]');
		

		

		$this->form_validation->set_rules('user', 'User', 'trim|required');
		

		$this->form_validation->set_rules('labeling', 'Labeling', 'trim|required');
		

		$this->form_validation->set_rules('rfid_code_tag', 'Rfid Code Tag', 'trim|required|max_length[96]');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'tanggal' => $this->input->post('tanggal'),
				'waktu' => $this->input->post('waktu'),
				'id_room' => $this->input->post('id_room'),
				'user' => $this->input->post('user'),
				'labeling' => $this->input->post('labeling'),
				'rfid_code_tag' => $this->input->post('rfid_code_tag'),
			];

			
			



			
			
			$save_tb_history_invent = $id = $this->model_tb_history_invent->store($save_data);
            

			if ($save_tb_history_invent) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_tb_history_invent;
					$this->data['message'] = cclang('success_save_data_stay', [
						admin_anchor('/tb_history_invent/edit/' . $save_tb_history_invent, 'Edit Tb History Invent'),
						admin_anchor('/tb_history_invent', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						admin_anchor('/tb_history_invent/edit/' . $save_tb_history_invent, 'Edit Tb History Invent')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/tb_history_invent');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/tb_history_invent');
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
	* Update view Tb History Invents
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('tb_history_invent_update');

		$this->data['tb_history_invent'] = $this->model_tb_history_invent->find($id);

		$this->template->title('Tb History Invent Update');
		$this->render('backend/standart/administrator/tb_history_invent/tb_history_invent_update', $this->data);
	}

	/**
	* Update Tb History Invents
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('tb_history_invent_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
		

		$this->form_validation->set_rules('waktu', 'Waktu', 'trim|required');
		

		$this->form_validation->set_rules('id_room', 'Ruangan', 'trim|required|max_length[20]');
		

		

		$this->form_validation->set_rules('user', 'User', 'trim|required');
		

		$this->form_validation->set_rules('labeling', 'Labeling', 'trim|required');
		

		$this->form_validation->set_rules('rfid_code_tag', 'Rfid Code Tag', 'trim|required|max_length[96]');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'tanggal' => $this->input->post('tanggal'),
				'waktu' => $this->input->post('waktu'),
				'id_room' => $this->input->post('id_room'),
				'user' => $this->input->post('user'),
				'labeling' => $this->input->post('labeling'),
				'rfid_code_tag' => $this->input->post('rfid_code_tag'),
			];

			

			


			
			
			$save_tb_history_invent = $this->model_tb_history_invent->change($id, $save_data);

			if ($save_tb_history_invent) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						admin_anchor('/tb_history_invent', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/tb_history_invent');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/tb_history_invent');
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
	* delete Tb History Invents
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('tb_history_invent_delete');

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
					"message" => cclang('has_been_deleted', 'tb_history_invent')
				]);
			} else {
				$this->response([
					"success" => true,
					"message" => cclang('error_delete', 'tb_history_invent')
				]);
			}

		} else {
			if ($remove) {
				set_message(cclang('has_been_deleted', 'tb_history_invent'), 'success');
			} else {
				set_message(cclang('error_delete', 'tb_history_invent'), 'error');
			}
			redirect_back();
		}

	}

		/**
	* View view Tb History Invents
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('tb_history_invent_view');

		$this->data['tb_history_invent'] = $this->model_tb_history_invent->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Tb History Invent Detail');
		$this->render('backend/standart/administrator/tb_history_invent/tb_history_invent_view', $this->data);
	}
	
	/**
	* delete Tb History Invents
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$tb_history_invent = $this->model_tb_history_invent->find($id);

		
		
		return $this->model_tb_history_invent->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('tb_history_invent_export');

		$this->model_tb_history_invent->export(
			'tb_history_invent', 
			'tb_history_invent',
			$this->model_tb_history_invent->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('tb_history_invent_export');

		$this->model_tb_history_invent->pdf('tb_history_invent', 'tb_history_invent');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('tb_history_invent_export');

		$table = $title = 'tb_history_invent';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_tb_history_invent->find($id);
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


/* End of file tb_history_invent.php */
/* Location: ./application/controllers/administrator/Tb History Invent.php */