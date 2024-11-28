<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Tag Broken Controller
*| --------------------------------------------------------------------------
*| Tag Broken site
*|
*/
class Tag_broken extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tag_broken');
		$this->load->model('model_tag_location');
		$this->load->model('model_tag_location_log');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Tag Brokens
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('tag_broken_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tag_brokens'] = $this->model_tag_broken->get($filter, $field, $this->limit_page, $offset);
		$this->data['tag_broken_counts'] = $this->model_tag_broken->count_all($filter, $field);

		$config = [
			'base_url'     => ADMIN_NAMESPACE_URL  . '/tag_broken/index/',
			'total_rows'   => $this->data['tag_broken_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);
		
		$this->data['tables'] = $this->load->view('backend/standart/administrator/tag_broken/tag_broken_data_table', $this->data, true);
		
		if ($this->input->get('ajax')) {
			$this->response([
				'tables' => $this->data['tables'],
				'pagination' => $this->data['pagination'],
				'total_row' => $this->data['tag_broken_counts']
			]);
		}

		$this->template->title('Broken List');
		$this->render('backend/standart/administrator/tag_broken/tag_broken_list', $this->data);
	}
	
	/**
	* Add new tag_brokens
	*
	*/
	public function add()
	{
		$this->is_allowed('tag_broken_add');

		$this->template->title('Broken New');
		$this->render('backend/standart/administrator/tag_broken/tag_broken_add', $this->data);
	}

	/**
	* Add New Tag Brokens
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('tag_broken_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('rfid_id', 'RFID', 'trim|required|max_length[11]');
		

		$this->form_validation->set_rules('librarian_id', 'Librarian', 'trim|required|max_length[11]');
		

		$this->form_validation->set_rules('broken_laporan', 'Tanggal Kerusakan', 'trim|required');
		

		$this->form_validation->set_rules('broken_keterangan', 'Keterangan  Kerusakan', 'trim|required');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'rfid_id' => $this->input->post('rfid_id'),
				'librarian_id' => $this->input->post('librarian_id'),
				'broken_laporan' => $this->input->post('broken_laporan'),
				'broken_keterangan' => $this->input->post('broken_keterangan'),
				'broken_created' => date('Y-m-d H:i:s'),
				'broken_createdby' => get_user_data('id'),			];

			
			



			
			
			$save_tag_broken = $id = $this->model_tag_broken->store($save_data);
            

			if ($save_tag_broken) {
				
				$update_location = [
					'location_status' => 'KERUSAKAN',
					'location_updated' => date('Y-m-d H:i:s'),
				];
	
				$this->model_tag_location->change($this->input->post('rfid_id'), $update_location);

				$save_log = [
					'rfid_id' => $this->input->post('rfid_id'),
					'librarian_id' => $this->input->post('librarian_id'),
					'log_status' => 'KERUSAKAN',
					'log_created' => date('Y-m-d H:i:s'),
					'log_createdby' => get_user_data('username'),
				];

				$this->model_tag_location_log->store($save_log);
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_tag_broken;
					$this->data['message'] = cclang('success_save_data_stay', [
						admin_anchor('/tag_broken/edit/' . $save_tag_broken, 'Edit Tag Broken'),
						admin_anchor('/tag_broken', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						admin_anchor('/tag_broken/edit/' . $save_tag_broken, 'Edit Tag Broken')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/tag_broken');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/tag_broken');
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
	* delete Tag Brokens
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('tag_broken_delete');

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
					"message" => cclang('has_been_deleted', 'tag_broken')
				]);
			} else {
				$this->response([
					"success" => true,
					"message" => cclang('error_delete', 'tag_broken')
				]);
			}

		} else {
			if ($remove) {
				set_message(cclang('has_been_deleted', 'tag_broken'), 'success');
			} else {
				set_message(cclang('error_delete', 'tag_broken'), 'error');
			}
			redirect_back();
		}

	}

		/**
	* View view Tag Brokens
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('tag_broken_view');

		$this->data['tag_broken'] = $this->model_tag_broken->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Broken Detail');
		$this->render('backend/standart/administrator/tag_broken/tag_broken_view', $this->data);
	}
	
	/**
	* delete Tag Brokens
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$tag_broken = $this->model_tag_broken->find($id);

		
		
		return $this->model_tag_broken->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('tag_broken_export');

		$this->model_tag_broken->export(
			'tag_broken', 
			'tag_broken',
			$this->model_tag_broken->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('tag_broken_export');

		$this->model_tag_broken->pdf('tag_broken', 'tag_broken');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('tag_broken_export');

		$table = $title = 'tag_broken';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_tag_broken->find($id);
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


/* End of file tag_broken.php */
/* Location: ./application/controllers/administrator/Tag Broken.php */