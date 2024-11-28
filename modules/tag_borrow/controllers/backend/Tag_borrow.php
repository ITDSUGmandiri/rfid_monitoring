<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Tag Borrow Controller
*| --------------------------------------------------------------------------
*| Tag Borrow site
*|
*/
class Tag_borrow extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tag_borrow');
		$this->load->model('model_tag_location');
		$this->load->model('model_tag_location_log');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Tag Borrows
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('tag_borrow_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tag_borrows'] = $this->model_tag_borrow->get($filter, $field, $this->limit_page, $offset);
		$this->data['tag_borrow_counts'] = $this->model_tag_borrow->count_all($filter, $field);

		$config = [
			'base_url'     => ADMIN_NAMESPACE_URL  . '/tag_borrow/index/',
			'total_rows'   => $this->data['tag_borrow_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);
		
		$this->data['tables'] = $this->load->view('backend/standart/administrator/tag_borrow/tag_borrow_data_table', $this->data, true);
		
		if ($this->input->get('ajax')) {
			$this->response([
				'tables' => $this->data['tables'],
				'pagination' => $this->data['pagination'],
				'total_row' => $this->data['tag_borrow_counts']
			]);
		}

		$this->template->title('Borrow List');
		$this->render('backend/standart/administrator/tag_borrow/tag_borrow_list', $this->data);
	}
	
	/**
	* Add new tag_borrows
	*
	*/
	public function add()
	{
		$this->is_allowed('tag_borrow_add');

		$this->template->title('Borrow New');
		$this->render('backend/standart/administrator/tag_borrow/tag_borrow_add', $this->data);
	}

	/**
	* Add New Tag Borrows
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('tag_borrow_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('rfid_id', 'RFID', 'trim|required|max_length[11]');
		

		$this->form_validation->set_rules('librarian_id', 'Librarian', 'trim|required|max_length[11]');
		

		$this->form_validation->set_rules('borrow_keperluan', 'Keperluan', 'trim|required|max_length[255]');
		

		$this->form_validation->set_rules('borrow_peminjam', 'Peminjam', 'trim|required|max_length[255]');
		

		$this->form_validation->set_rules('borrow_peminjaman', 'Tgl Peminjaman', 'trim|required');
		

		$this->form_validation->set_rules('borrow_pengembalian', 'Tgl Pengembalian', 'trim|required');
		

		$this->form_validation->set_rules('borrow_status', 'Status', 'trim|required');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'rfid_id' => $this->input->post('rfid_id'),
				'librarian_id' => $this->input->post('librarian_id'),
				'borrow_keperluan' => $this->input->post('borrow_keperluan'),
				'borrow_peminjam' => $this->input->post('borrow_peminjam'),
				'borrow_peminjaman' => $this->input->post('borrow_peminjaman'),
				'borrow_pengembalian' => $this->input->post('borrow_pengembalian'),
				'borrow_status' => $this->input->post('borrow_status'),
				'borrow_created' => date('Y-m-d H:i:s'),
				'borrow_createdby' => get_user_data('id'),				'borrow_updated' => date('Y-m-d H:i:s'),
				'borrow_updatedby' => get_user_data('id'),			];

			
			



			
			
			$save_tag_borrow = $id = $this->model_tag_borrow->store($save_data);
            

			if ($save_tag_borrow) {
				
				$update_location = [
					'location_status' => 'PINJAM',
					'location_updated' => date('Y-m-d H:i:s'),
				];
	
				$this->model_tag_location->change($this->input->post('rfid_id'), $update_location);

				$save_log = [
					'rfid_id' => $this->input->post('rfid_id'),
					'librarian_id' => $this->input->post('librarian_id'),
					'log_status' => 'PINJAM',
					'log_created' => date('Y-m-d H:i:s'),
					'log_createdby' => get_user_data('username'),
				];

				$this->model_tag_location_log->store($save_log);
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_tag_borrow;
					$this->data['message'] = cclang('success_save_data_stay', [
						admin_anchor('/tag_borrow/edit/' . $save_tag_borrow, 'Edit Tag Borrow'),
						admin_anchor('/tag_borrow', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						admin_anchor('/tag_borrow/edit/' . $save_tag_borrow, 'Edit Tag Borrow')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/tag_borrow');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/tag_borrow');
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
	* Update view Tag Borrows
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('tag_borrow_update');

		$this->data['tag_borrow'] = $this->model_tag_borrow->find($id);

		$this->template->title('Borrow Update');
		$this->render('backend/standart/administrator/tag_borrow/tag_borrow_update', $this->data);
	}

	/**
	* Update Tag Borrows
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('tag_borrow_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				// $this->form_validation->set_rules('rfid_id', 'RFID', 'trim|required|max_length[11]');
		

		// $this->form_validation->set_rules('librarian_id', 'Librarian', 'trim|required|max_length[11]');
		

		

		

		

		

		$this->form_validation->set_rules('borrow_status', 'Status', 'trim|required');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				// 'rfid_id' => $this->input->post('rfid_id'),
				// 'librarian_id' => $this->input->post('librarian_id'),
				'borrow_status' => $this->input->post('borrow_status'),
				'borrow_updated' => date('Y-m-d H:i:s'),
				'borrow_updatedby' => get_user_data('id'),			];

			

			


			
			
			$save_tag_borrow = $this->model_tag_borrow->change($id, $save_data);

			if ($save_tag_borrow) {

				
				$update_location = [
					'location_status' => 'TERSEDIA',
					'location_updated' => date('Y-m-d H:i:s'),
				];
	
				$this->model_tag_location->change($id, $update_location);

				$save_log = [
					'rfid_id' => $this->input->post('rfid_id'),
					'librarian_id' => $this->input->post('librarian_id'),
					'log_status' => 'KEMBALI',
					'log_created' => date('Y-m-d H:i:s'),
					'log_createdby' => get_user_data('username'),
				];

				$this->model_tag_location_log->store($save_log);
				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						admin_anchor('/tag_borrow', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/tag_borrow');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/tag_borrow');
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
	* delete Tag Borrows
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('tag_borrow_delete');

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
					"message" => cclang('has_been_deleted', 'tag_borrow')
				]);
			} else {
				$this->response([
					"success" => true,
					"message" => cclang('error_delete', 'tag_borrow')
				]);
			}

		} else {
			if ($remove) {
				set_message(cclang('has_been_deleted', 'tag_borrow'), 'success');
			} else {
				set_message(cclang('error_delete', 'tag_borrow'), 'error');
			}
			redirect_back();
		}

	}

		/**
	* View view Tag Borrows
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('tag_borrow_view');

		$this->data['tag_borrow'] = $this->model_tag_borrow->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Borrow Detail');
		$this->render('backend/standart/administrator/tag_borrow/tag_borrow_view', $this->data);
	}
	
	/**
	* delete Tag Borrows
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$tag_borrow = $this->model_tag_borrow->find($id);

		
		
		return $this->model_tag_borrow->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('tag_borrow_export');

		$this->model_tag_borrow->export(
			'tag_borrow', 
			'tag_borrow',
			$this->model_tag_borrow->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('tag_borrow_export');

		$this->model_tag_borrow->pdf('tag_borrow', 'tag_borrow');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('tag_borrow_export');

		$table = $title = 'tag_borrow';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_tag_borrow->find($id);
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


/* End of file tag_borrow.php */
/* Location: ./application/controllers/administrator/Tag Borrow.php */