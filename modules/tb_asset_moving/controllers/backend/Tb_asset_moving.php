<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Tb Asset Moving Controller
*| --------------------------------------------------------------------------
*| Tb Asset Moving site
*|
*/
class Tb_asset_moving extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tb_asset_moving');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Tb Asset Movings
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('tb_asset_moving_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tb_asset_movings'] = $this->model_tb_asset_moving->get($filter, $field, $this->limit_page, $offset);
		$this->data['tb_asset_moving_counts'] = $this->model_tb_asset_moving->count_all($filter, $field);

		$config = [
			'base_url'     => ADMIN_NAMESPACE_URL  . '/tb_asset_moving/index/',
			'total_rows'   => $this->data['tb_asset_moving_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);
		
		$this->data['tables'] = $this->load->view('backend/standart/administrator/tb_asset_moving/tb_asset_moving_data_table', $this->data, true);
		
		if ($this->input->get('ajax')) {
			$this->response([
				'tables' => $this->data['tables'],
				'pagination' => $this->data['pagination'],
				'total_row' => $this->data['tb_asset_moving_counts']
			]);
		}

		$this->template->title('Tb Asset Moving List');
		$this->render('backend/standart/administrator/tb_asset_moving/tb_asset_moving_list', $this->data);
	}
	
	/**
	* Add new tb_asset_movings
	*
	*/
	public function add()
	{
		$this->is_allowed('tb_asset_moving_add');

		$this->template->title('Tb Asset Moving New');
		$this->render('backend/standart/administrator/tb_asset_moving/tb_asset_moving_add', $this->data);
	}

	/**
	* Add New Tb Asset Movings
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('tb_asset_moving_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
		

		$this->form_validation->set_rules('waktu', 'Waktu', 'trim|required');
		

		$this->form_validation->set_rules('reader_id', 'Reader', 'trim|required');
		

		$this->form_validation->set_rules('room_id', 'Ruangan', 'trim|required');
		

		$this->form_validation->set_rules('tag_code', 'Aset', 'trim|required|max_length[96]');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'tanggal' => $this->input->post('tanggal'),
				'waktu' => $this->input->post('waktu'),
				'reader_id' => $this->input->post('reader_id'),
				'room_id' => $this->input->post('room_id'),
				'tag_code' => $this->input->post('tag_code'),
				'status_moving' => $this->input->post('status_moving'),
			];

			
			



			
			
			$save_tb_asset_moving = $id = $this->model_tb_asset_moving->store($save_data);
            

			if ($save_tb_asset_moving) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_tb_asset_moving;
					$this->data['message'] = cclang('success_save_data_stay', [
						admin_anchor('/tb_asset_moving/edit/' . $save_tb_asset_moving, 'Edit Tb Asset Moving'),
						admin_anchor('/tb_asset_moving', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						admin_anchor('/tb_asset_moving/edit/' . $save_tb_asset_moving, 'Edit Tb Asset Moving')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/tb_asset_moving');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/tb_asset_moving');
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
	* Update view Tb Asset Movings
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('tb_asset_moving_update');

		$this->data['tb_asset_moving'] = $this->model_tb_asset_moving->find($id);

		$this->template->title('Tb Asset Moving Update');
		$this->render('backend/standart/administrator/tb_asset_moving/tb_asset_moving_update', $this->data);
	}

	/**
	* Update Tb Asset Movings
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('tb_asset_moving_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
		

		$this->form_validation->set_rules('waktu', 'Waktu', 'trim|required');
		

		$this->form_validation->set_rules('reader_id', 'Reader', 'trim|required');
		

		$this->form_validation->set_rules('room_id', 'Ruangan', 'trim|required');
		

		$this->form_validation->set_rules('tag_code', 'Aset', 'trim|required|max_length[96]');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'tanggal' => $this->input->post('tanggal'),
				'waktu' => $this->input->post('waktu'),
				'reader_id' => $this->input->post('reader_id'),
				'room_id' => $this->input->post('room_id'),
				'tag_code' => $this->input->post('tag_code'),
				'status_moving' => $this->input->post('status_moving'),
			];

			

			


			
			
			$save_tb_asset_moving = $this->model_tb_asset_moving->change($id, $save_data);

			if ($save_tb_asset_moving) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						admin_anchor('/tb_asset_moving', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/tb_asset_moving');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/tb_asset_moving');
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
	* delete Tb Asset Movings
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('tb_asset_moving_delete');

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
					"message" => cclang('has_been_deleted', 'tb_asset_moving')
				]);
			} else {
				$this->response([
					"success" => true,
					"message" => cclang('error_delete', 'tb_asset_moving')
				]);
			}

		} else {
			if ($remove) {
				set_message(cclang('has_been_deleted', 'tb_asset_moving'), 'success');
			} else {
				set_message(cclang('error_delete', 'tb_asset_moving'), 'error');
			}
			redirect_back();
		}

	}

		/**
	* View view Tb Asset Movings
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('tb_asset_moving_view');

		$this->data['tb_asset_moving'] = $this->model_tb_asset_moving->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Tb Asset Moving Detail');
		$this->render('backend/standart/administrator/tb_asset_moving/tb_asset_moving_view', $this->data);
	}
	
	/**
	* delete Tb Asset Movings
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$tb_asset_moving = $this->model_tb_asset_moving->find($id);

		
		
		return $this->model_tb_asset_moving->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('tb_asset_moving_export');

		$this->model_tb_asset_moving->export(
			'tb_asset_moving', 
			'tb_asset_moving',
			$this->model_tb_asset_moving->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('tb_asset_moving_export');

		$this->model_tb_asset_moving->pdf('tb_asset_moving', 'tb_asset_moving');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('tb_asset_moving_export');

		$table = $title = 'tb_asset_moving';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_tb_asset_moving->find($id);
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


/* End of file tb_asset_moving.php */
/* Location: ./application/controllers/administrator/Tb Asset Moving.php */