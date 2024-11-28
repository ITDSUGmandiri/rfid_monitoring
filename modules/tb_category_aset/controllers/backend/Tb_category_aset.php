<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Tb Category Aset Controller
*| --------------------------------------------------------------------------
*| Tb Category Aset site
*|
*/
class Tb_category_aset extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tb_category_aset');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Tb Category Asets
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('tb_category_aset_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tb_category_asets'] = $this->model_tb_category_aset->get($filter, $field, $this->limit_page, $offset);
		$this->data['tb_category_aset_counts'] = $this->model_tb_category_aset->count_all($filter, $field);

		$config = [
			'base_url'     => ADMIN_NAMESPACE_URL  . '/tb_category_aset/index/',
			'total_rows'   => $this->data['tb_category_aset_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);
		
		$this->data['tables'] = $this->load->view('backend/standart/administrator/tb_category_aset/tb_category_aset_data_table', $this->data, true);
		
		if ($this->input->get('ajax')) {
			$this->response([
				'tables' => $this->data['tables'],
				'pagination' => $this->data['pagination'],
				'total_row' => $this->data['tb_category_aset_counts']
			]);
		}

		$this->template->title('Kategori Aset List');
		$this->render('backend/standart/administrator/tb_category_aset/tb_category_aset_list', $this->data);
	}
	
	/**
	* Add new tb_category_asets
	*
	*/
	public function add()
	{
		$this->is_allowed('tb_category_aset_add');

		$this->template->title('Kategori Aset New');
		$this->render('backend/standart/administrator/tb_category_aset/tb_category_aset_add', $this->data);
	}

	/**
	* Add New Tb Category Asets
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('tb_category_aset_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('kode_kategori', 'Kode Kategori', 'trim|required|max_length[255]');
		

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[255]');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'kode_kategori' => $this->input->post('kode_kategori'),
				'nama' => $this->input->post('nama'),
			];

			
			



			
			
			$save_tb_category_aset = $id = $this->model_tb_category_aset->store($save_data);
            

			if ($save_tb_category_aset) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_tb_category_aset;
					$this->data['message'] = cclang('success_save_data_stay', [
						admin_anchor('/tb_category_aset/edit/' . $save_tb_category_aset, 'Edit Tb Category Aset'),
						admin_anchor('/tb_category_aset', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						admin_anchor('/tb_category_aset/edit/' . $save_tb_category_aset, 'Edit Tb Category Aset')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/tb_category_aset');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/tb_category_aset');
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
	* Update view Tb Category Asets
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('tb_category_aset_update');

		$this->data['tb_category_aset'] = $this->model_tb_category_aset->find($id);

		$this->template->title('Kategori Aset Update');
		$this->render('backend/standart/administrator/tb_category_aset/tb_category_aset_update', $this->data);
	}

	/**
	* Update Tb Category Asets
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('tb_category_aset_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('kode_kategori', 'Kode Kategori', 'trim|required|max_length[255]');
		

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[255]');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'kode_kategori' => $this->input->post('kode_kategori'),
				'nama' => $this->input->post('nama'),
			];

			

			


			
			
			$save_tb_category_aset = $this->model_tb_category_aset->change($id, $save_data);

			if ($save_tb_category_aset) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						admin_anchor('/tb_category_aset', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/tb_category_aset');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/tb_category_aset');
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
	* delete Tb Category Asets
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('tb_category_aset_delete');

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
					"message" => cclang('has_been_deleted', 'tb_category_aset')
				]);
			} else {
				$this->response([
					"success" => true,
					"message" => cclang('error_delete', 'tb_category_aset')
				]);
			}

		} else {
			if ($remove) {
				set_message(cclang('has_been_deleted', 'tb_category_aset'), 'success');
			} else {
				set_message(cclang('error_delete', 'tb_category_aset'), 'error');
			}
			redirect_back();
		}

	}

		/**
	* View view Tb Category Asets
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('tb_category_aset_view');

		$this->data['tb_category_aset'] = $this->model_tb_category_aset->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Kategori Aset Detail');
		$this->render('backend/standart/administrator/tb_category_aset/tb_category_aset_view', $this->data);
	}
	
	/**
	* delete Tb Category Asets
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$tb_category_aset = $this->model_tb_category_aset->find($id);

		
		
		return $this->model_tb_category_aset->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('tb_category_aset_export');

		$this->model_tb_category_aset->export(
			'tb_category_aset', 
			'tb_category_aset',
			$this->model_tb_category_aset->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('tb_category_aset_export');

		$this->model_tb_category_aset->pdf('tb_category_aset', 'tb_category_aset');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('tb_category_aset_export');

		$table = $title = 'tb_category_aset';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_tb_category_aset->find($id);
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


/* End of file tb_category_aset.php */
/* Location: ./application/controllers/administrator/Tb Category Aset.php */