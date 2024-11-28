<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Bmn Controller
*| --------------------------------------------------------------------------
*| Bmn site
*|
*/
class Bmn extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_bmn');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Bmns
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('bmn_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['bmns'] = $this->model_bmn->get($filter, $field, $this->limit_page, $offset);
		$this->data['bmn_counts'] = $this->model_bmn->count_all($filter, $field);

		$config = [
			'base_url'     => ADMIN_NAMESPACE_URL  . '/bmn/index/',
			'total_rows'   => $this->data['bmn_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);
		
		$this->data['tables'] = $this->load->view('backend/standart/administrator/bmn/bmn_data_table', $this->data, true);
		
		if ($this->input->get('ajax')) {
			$this->response([
				'tables' => $this->data['tables'],
				'pagination' => $this->data['pagination'],
				'total_row' => $this->data['bmn_counts']
			]);
		}

		$this->template->title('Bmn List');
		$this->render('backend/standart/administrator/bmn/bmn_list', $this->data);
	}
	
	/**
	* Add new bmns
	*
	*/
	public function add()
	{
		$this->is_allowed('bmn_add');

		$this->template->title('Bmn New');
		$this->render('backend/standart/administrator/bmn/bmn_add', $this->data);
	}

	/**
	* Add New Bmns
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('bmn_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('bagian', 'Bagian', 'trim|required|max_length[50]');
		

		$this->form_validation->set_rules('kode_barang', 'Kode Barang', 'trim|required|max_length[50]');
		

		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required|max_length[150]');
		

		$this->form_validation->set_rules('nup', 'Nup', 'trim|required|max_length[11]');
		

		$this->form_validation->set_rules('merk', 'Merk', 'trim|required|max_length[150]');
		

		$this->form_validation->set_rules('tanggal_perolehan', 'Tanggal Perolehan', 'trim|required');
		

		$this->form_validation->set_rules('kategori_barang', 'Kategori Barang', 'trim|required|max_length[50]');
		

		$this->form_validation->set_rules('tahun_sensus', 'Tahun Sensus', 'trim|required|max_length[4]');
		

		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required|max_length[255]');
		

		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'bagian' => $this->input->post('bagian'),
				'kode_barang' => $this->input->post('kode_barang'),
				'nama_barang' => $this->input->post('nama_barang'),
				'nup' => $this->input->post('nup'),
				'merk' => $this->input->post('merk'),
				'tanggal_perolehan' => $this->input->post('tanggal_perolehan'),
				'kategori_barang' => $this->input->post('kategori_barang'),
				'tahun_sensus' => $this->input->post('tahun_sensus'),
				'keterangan' => $this->input->post('keterangan'),
			];

			
			



			
			
			$save_bmn = $id = $this->model_bmn->store($save_data);
            

			if ($save_bmn) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_bmn;
					$this->data['message'] = cclang('success_save_data_stay', [
						admin_anchor('/bmn/edit/' . $save_bmn, 'Edit Bmn'),
						admin_anchor('/bmn', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						admin_anchor('/bmn/edit/' . $save_bmn, 'Edit Bmn')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/bmn');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/bmn');
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
	* Update view Bmns
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('bmn_update');

		$this->data['bmn'] = $this->model_bmn->find($id);

		$this->template->title('Bmn Update');
		$this->render('backend/standart/administrator/bmn/bmn_update', $this->data);
	}

	/**
	* Update Bmns
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('bmn_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('bagian', 'Bagian', 'trim|required|max_length[50]');
		

		$this->form_validation->set_rules('kode_barang', 'Kode Barang', 'trim|required|max_length[50]');
		

		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required|max_length[150]');
		

		$this->form_validation->set_rules('nup', 'Nup', 'trim|required|max_length[11]');
		

		$this->form_validation->set_rules('merk', 'Merk', 'trim|required|max_length[150]');
		

		$this->form_validation->set_rules('tanggal_perolehan', 'Tanggal Perolehan', 'trim|required');
		

		$this->form_validation->set_rules('kategori_barang', 'Kategori Barang', 'trim|required|max_length[50]');
		

		$this->form_validation->set_rules('tahun_sensus', 'Tahun Sensus', 'trim|required|max_length[4]');
		

		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required|max_length[255]');
		

		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'bagian' => $this->input->post('bagian'),
				'kode_barang' => $this->input->post('kode_barang'),
				'nama_barang' => $this->input->post('nama_barang'),
				'nup' => $this->input->post('nup'),
				'merk' => $this->input->post('merk'),
				'tanggal_perolehan' => $this->input->post('tanggal_perolehan'),
				'kategori_barang' => $this->input->post('kategori_barang'),
				'tahun_sensus' => $this->input->post('tahun_sensus'),
				'keterangan' => $this->input->post('keterangan'),
			];

			

			


			
			
			$save_bmn = $this->model_bmn->change($id, $save_data);

			if ($save_bmn) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						admin_anchor('/bmn', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/bmn');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/bmn');
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
	* delete Bmns
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('bmn_delete');

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
					"message" => cclang('has_been_deleted', 'bmn')
				]);
			} else {
				$this->response([
					"success" => true,
					"message" => cclang('error_delete', 'bmn')
				]);
			}

		} else {
			if ($remove) {
				set_message(cclang('has_been_deleted', 'bmn'), 'success');
			} else {
				set_message(cclang('error_delete', 'bmn'), 'error');
			}
			redirect_back();
		}

	}

		/**
	* View view Bmns
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('bmn_view');

		$this->data['bmn'] = $this->model_bmn->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Bmn Detail');
		$this->render('backend/standart/administrator/bmn/bmn_view', $this->data);
	}
	
	/**
	* delete Bmns
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$bmn = $this->model_bmn->find($id);

		
		
		return $this->model_bmn->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('bmn_export');

		$this->model_bmn->export(
			'bmn', 
			'bmn',
			$this->model_bmn->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('bmn_export');

		$this->model_bmn->pdf('bmn', 'bmn');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('bmn_export');

		$table = $title = 'bmn';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_bmn->find($id);
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


/* End of file bmn.php */
/* Location: ./application/controllers/administrator/Bmn.php */