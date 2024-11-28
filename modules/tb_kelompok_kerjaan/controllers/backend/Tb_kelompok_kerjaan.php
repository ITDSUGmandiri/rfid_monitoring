<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Tb Kelompok Kerjaan Controller
*| --------------------------------------------------------------------------
*| Tb Kelompok Kerjaan site
*|
*/
class Tb_kelompok_kerjaan extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tb_kelompok_kerjaan');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Tb Kelompok Kerjaans
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('tb_kelompok_kerjaan_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tb_kelompok_kerjaans'] = $this->model_tb_kelompok_kerjaan->get($filter, $field, $this->limit_page, $offset);
		$this->data['tb_kelompok_kerjaan_counts'] = $this->model_tb_kelompok_kerjaan->count_all($filter, $field);

		$config = [
			'base_url'     => ADMIN_NAMESPACE_URL  . '/tb_kelompok_kerjaan/index/',
			'total_rows'   => $this->data['tb_kelompok_kerjaan_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);
		
		$this->data['tables'] = $this->load->view('backend/standart/administrator/tb_kelompok_kerjaan/tb_kelompok_kerjaan_data_table', $this->data, true);
		
		if ($this->input->get('ajax')) {
			$this->response([
				'tables' => $this->data['tables'],
				'pagination' => $this->data['pagination'],
				'total_row' => $this->data['tb_kelompok_kerjaan_counts']
			]);
		}

		$this->template->title('Tb Kelompok Kerjaan List');
		$this->render('backend/standart/administrator/tb_kelompok_kerjaan/tb_kelompok_kerjaan_list', $this->data);
	}
	
	/**
	* Add new tb_kelompok_kerjaans
	*
	*/
	public function add()
	{
		$this->is_allowed('tb_kelompok_kerjaan_add');

		$this->template->title('Tb Kelompok Kerjaan New');
		$this->render('backend/standart/administrator/tb_kelompok_kerjaan/tb_kelompok_kerjaan_add', $this->data);
	}

	/**
	* Add New Tb Kelompok Kerjaans
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('tb_kelompok_kerjaan_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('id', 'Id', 'trim|required');
		

		$this->form_validation->set_rules('kode', 'Kode', 'trim|required');
		

		$this->form_validation->set_rules('jenis', 'Jenis', 'trim|required|max_length[255]');
		

		$this->form_validation->set_rules('kelompok', 'Kelompok', 'trim|required|max_length[255]');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'id' => $this->input->post('id'),
				'kode' => $this->input->post('kode'),
				'jenis' => $this->input->post('jenis'),
				'kelompok' => $this->input->post('kelompok'),
			];

			
			



			
			
			$save_tb_kelompok_kerjaan = $id = $this->model_tb_kelompok_kerjaan->store($save_data);
                        $save_tb_kelompok_kerjaan = true;
            

			if ($save_tb_kelompok_kerjaan) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_tb_kelompok_kerjaan;
					$this->data['message'] = cclang('success_save_data_stay', [
						admin_anchor('/tb_kelompok_kerjaan/edit/' . $save_tb_kelompok_kerjaan, 'Edit Tb Kelompok Kerjaan'),
						admin_anchor('/tb_kelompok_kerjaan', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						admin_anchor('/tb_kelompok_kerjaan/edit/' . $save_tb_kelompok_kerjaan, 'Edit Tb Kelompok Kerjaan')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/tb_kelompok_kerjaan');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/tb_kelompok_kerjaan');
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
	* Update view Tb Kelompok Kerjaans
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('tb_kelompok_kerjaan_update');

		$this->data['tb_kelompok_kerjaan'] = $this->model_tb_kelompok_kerjaan->find($id);

		$this->template->title('Tb Kelompok Kerjaan Update');
		$this->render('backend/standart/administrator/tb_kelompok_kerjaan/tb_kelompok_kerjaan_update', $this->data);
	}

	/**
	* Update Tb Kelompok Kerjaans
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('tb_kelompok_kerjaan_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('id', 'Id', 'trim|required');
		

		$this->form_validation->set_rules('kode', 'Kode', 'trim|required');
		

		$this->form_validation->set_rules('jenis', 'Jenis', 'trim|required|max_length[255]');
		

		$this->form_validation->set_rules('kelompok', 'Kelompok', 'trim|required|max_length[255]');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'id' => $this->input->post('id'),
				'kode' => $this->input->post('kode'),
				'jenis' => $this->input->post('jenis'),
				'kelompok' => $this->input->post('kelompok'),
			];

			

			


			
			
			$save_tb_kelompok_kerjaan = $this->model_tb_kelompok_kerjaan->change($id, $save_data);

			if ($save_tb_kelompok_kerjaan) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						admin_anchor('/tb_kelompok_kerjaan', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/tb_kelompok_kerjaan');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/tb_kelompok_kerjaan');
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
	* delete Tb Kelompok Kerjaans
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('tb_kelompok_kerjaan_delete');

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
					"message" => cclang('has_been_deleted', 'tb_kelompok_kerjaan')
				]);
			} else {
				$this->response([
					"success" => true,
					"message" => cclang('error_delete', 'tb_kelompok_kerjaan')
				]);
			}

		} else {
			if ($remove) {
				set_message(cclang('has_been_deleted', 'tb_kelompok_kerjaan'), 'success');
			} else {
				set_message(cclang('error_delete', 'tb_kelompok_kerjaan'), 'error');
			}
			redirect_back();
		}

	}

		/**
	* View view Tb Kelompok Kerjaans
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('tb_kelompok_kerjaan_view');

		$this->data['tb_kelompok_kerjaan'] = $this->model_tb_kelompok_kerjaan->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Tb Kelompok Kerjaan Detail');
		$this->render('backend/standart/administrator/tb_kelompok_kerjaan/tb_kelompok_kerjaan_view', $this->data);
	}
	
	/**
	* delete Tb Kelompok Kerjaans
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$tb_kelompok_kerjaan = $this->model_tb_kelompok_kerjaan->find($id);

		
		
		return $this->model_tb_kelompok_kerjaan->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('tb_kelompok_kerjaan_export');

		$this->model_tb_kelompok_kerjaan->export(
			'tb_kelompok_kerjaan', 
			'tb_kelompok_kerjaan',
			$this->model_tb_kelompok_kerjaan->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('tb_kelompok_kerjaan_export');

		$this->model_tb_kelompok_kerjaan->pdf('tb_kelompok_kerjaan', 'tb_kelompok_kerjaan');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('tb_kelompok_kerjaan_export');

		$table = $title = 'tb_kelompok_kerjaan';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_tb_kelompok_kerjaan->find($id);
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


/* End of file tb_kelompok_kerjaan.php */
/* Location: ./application/controllers/administrator/Tb Kelompok Kerjaan.php */