<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *| --------------------------------------------------------------------------
 *| Table Asset Master Controller
 *| --------------------------------------------------------------------------
 *| Table Asset Master site
 *|
 */
class Table_asset_master extends Admin
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_table_asset_master');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	 * show all Table Asset Masters
	 *
	 * @var $offset String
	 */
	public function index($offset = 0)
	{
		$this->is_allowed('table_asset_master_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['table_asset_masters'] = $this->model_table_asset_master->get($filter, $field, $this->limit_page, $offset);
		$this->data['table_asset_master_counts'] = $this->model_table_asset_master->count_all($filter, $field);

		$config = [
			'base_url'     => ADMIN_NAMESPACE_URL  . '/table_asset_master/index/',
			'total_rows'   => $this->data['table_asset_master_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->data['tables'] = $this->load->view('backend/standart/administrator/table_asset_master/table_asset_master_data_table', $this->data, true);

		if ($this->input->get('ajax')) {
			$this->response([
				'tables' => $this->data['tables'],
				'pagination' => $this->data['pagination'],
				'total_row' => $this->data['table_asset_master_counts']
			]);
		}

		$this->template->title('Table Asset Master List');
		$this->render('backend/standart/administrator/table_asset_master/table_asset_master_list', $this->data);
	}

	/**
	 * Add new table_asset_masters
	 *
	 */
	public function add()
	{
		$this->is_allowed('table_asset_master_add');

		$this->template->title('Data Aset');
		$this->render('backend/standart/administrator/table_asset_master/table_asset_master_add', $this->data);
	}

	/**
	 * Add New Table Asset Masters
	 *
	 * @return JSON
	 */
	public function add_save()
	{
		if (!$this->is_allowed('table_asset_master_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}



		$this->form_validation->set_rules('kode_satker', 'Kode Satker', 'trim|required|max_length[30]');


		$this->form_validation->set_rules('nama_satker', 'Nama Satker', 'trim|required|max_length[30]');


		$this->form_validation->set_rules('for_inventaris', 'For Inventaris', 'trim|required|max_length[30]');


		$this->form_validation->set_rules('kode_brg', 'Kode Brg', 'trim|required|max_length[11]');


		$this->form_validation->set_rules('NUP', 'NUP', 'trim|required|max_length[11]');


		$this->form_validation->set_rules('rfid_code_label', 'Rfid Code Label', 'trim|required|max_length[11]');


		$this->form_validation->set_rules('nama_brg', 'Nama Brg', 'trim|required|max_length[30]');


		$this->form_validation->set_rules('Merk', 'Merk', 'trim|required|max_length[30]');


		$this->form_validation->set_rules('Tipe', 'Tipe', 'trim|required|max_length[30]');


		$this->form_validation->set_rules('Kondisi', 'Kondisi', 'trim|required|max_length[30]');


		$this->form_validation->set_rules('usia', 'Usia', 'trim|required|max_length[10]');


		$this->form_validation->set_rules('lokasi_id', 'Lokasi Id', 'trim|required|max_length[11]');


		$this->form_validation->set_rules('tgl_inventarisasi', 'Tgl Inventarisasi', 'trim|required');


		$this->form_validation->set_rules('location_asset', 'Location Asset', 'trim|required|max_length[30]');




		if ($this->form_validation->run()) {

			$save_data = [
				'kode_satker' => $this->input->post('kode_satker'),
				'nama_satker' => $this->input->post('nama_satker'),
				'for_inventaris' => $this->input->post('for_inventaris'),
				'kode_brg' => $this->input->post('kode_brg'),
				'NUP' => $this->input->post('NUP'),
				'rfid_code_label' => $this->input->post('rfid_code_label'),
				'nama_brg' => $this->input->post('nama_brg'),
				'Merk' => $this->input->post('Merk'),
				'Tipe' => $this->input->post('Tipe'),
				'Kondisi' => $this->input->post('Kondisi'),
				'usia' => $this->input->post('usia'),
				'lokasi_id' => $this->input->post('lokasi_id'),
				'tgl_inventarisasi' => $this->input->post('tgl_inventarisasi'),
				'location_asset' => $this->input->post('location_asset'),
				'id' => $this->input->post('id'),
			];








			$save_table_asset_master = $id = $this->model_table_asset_master->store($save_data);
			$save_table_asset_master = true;


			if ($save_table_asset_master) {




				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_table_asset_master;
					$this->data['message'] = cclang('success_save_data_stay', [
						admin_anchor('/table_asset_master/edit/' . $save_table_asset_master, 'Edit Table Asset Master'),
						admin_anchor('/table_asset_master', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
							admin_anchor('/table_asset_master/edit/' . $save_table_asset_master, 'Edit Table Asset Master')
						]),
						'success'
					);

					$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/table_asset_master');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/table_asset_master');
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
	 * Update view Table Asset Masters
	 *
	 * @var $id String
	 */
	public function edit($id)
	{
		$this->is_allowed('table_asset_master_update');

		$this->data['table_asset_master'] = $this->model_table_asset_master->find($id);

		$this->template->title('Table Asset Master Update');
		$this->render('backend/standart/administrator/table_asset_master/table_asset_master_update', $this->data);
	}

	/**
	 * Update Table Asset Masters
	 *
	 * @var $id String
	 */
	public function edit_save($id)
	{
		if (!$this->is_allowed('table_asset_master_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}
		$this->form_validation->set_rules('kode_satker', 'Kode Satker', 'trim|required|max_length[30]');


		$this->form_validation->set_rules('nama_satker', 'Nama Satker', 'trim|required|max_length[30]');


		$this->form_validation->set_rules('for_inventaris', 'For Inventaris', 'trim|required|max_length[30]');


		$this->form_validation->set_rules('kode_brg', 'Kode Brg', 'trim|required|max_length[11]');


		$this->form_validation->set_rules('NUP', 'NUP', 'trim|required|max_length[11]');


		$this->form_validation->set_rules('rfid_code_label', 'Rfid Code Label', 'trim|required|max_length[11]');


		$this->form_validation->set_rules('nama_brg', 'Nama Brg', 'trim|required|max_length[30]');


		$this->form_validation->set_rules('Merk', 'Merk', 'trim|required|max_length[30]');


		$this->form_validation->set_rules('Tipe', 'Tipe', 'trim|required|max_length[30]');


		$this->form_validation->set_rules('Kondisi', 'Kondisi', 'trim|required|max_length[30]');


		$this->form_validation->set_rules('usia', 'Usia', 'trim|required|max_length[10]');


		$this->form_validation->set_rules('lokasi_id', 'Lokasi Id', 'trim|required|max_length[11]');


		$this->form_validation->set_rules('tgl_inventarisasi', 'Tgl Inventarisasi', 'trim|required');


		$this->form_validation->set_rules('location_asset', 'Location Asset', 'trim|required|max_length[30]');



		if ($this->form_validation->run()) {

			$save_data = [
				'kode_satker' => $this->input->post('kode_satker'),
				'nama_satker' => $this->input->post('nama_satker'),
				'for_inventaris' => $this->input->post('for_inventaris'),
				'kode_brg' => $this->input->post('kode_brg'),
				'NUP' => $this->input->post('NUP'),
				'rfid_code_label' => $this->input->post('rfid_code_label'),
				'nama_brg' => $this->input->post('nama_brg'),
				'Merk' => $this->input->post('Merk'),
				'Tipe' => $this->input->post('Tipe'),
				'Kondisi' => $this->input->post('Kondisi'),
				'usia' => $this->input->post('usia'),
				'lokasi_id' => $this->input->post('lokasi_id'),
				'tgl_inventarisasi' => $this->input->post('tgl_inventarisasi'),
				'location_asset' => $this->input->post('location_asset'),
				'id' => $this->input->post('id'),
			];








			$save_table_asset_master = $this->model_table_asset_master->change($id, $save_data);

			if ($save_table_asset_master) {





				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						admin_anchor('/table_asset_master', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', []),
						'success'
					);

					$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/table_asset_master');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/table_asset_master');
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
	 * delete Table Asset Masters
	 *
	 * @var $id String
	 */
	public function delete($id = null)
	{
		$this->is_allowed('table_asset_master_delete');

		$this->load->helper('file');

		$arr_id = $this->input->get('id');
		$remove = false;

		if (!empty($id)) {
			$remove = $this->_remove($id);
		} elseif (count($arr_id) > 0) {
			foreach ($arr_id as $id) {
				$remove = $this->_remove($id);
			}
		}

		if ($this->input->get('ajax')) {
			if ($remove) {
				$this->response([
					"success" => true,
					"message" => cclang('has_been_deleted', 'table_asset_master')
				]);
			} else {
				$this->response([
					"success" => true,
					"message" => cclang('error_delete', 'table_asset_master')
				]);
			}
		} else {
			if ($remove) {
				set_message(cclang('has_been_deleted', 'table_asset_master'), 'success');
			} else {
				set_message(cclang('error_delete', 'table_asset_master'), 'error');
			}
			redirect_back();
		}
	}

	/**
	 * View view Table Asset Masters
	 *
	 * @var $id String
	 */
	public function view($id)
	{
		$this->is_allowed('table_asset_master_view');

		$this->data['table_asset_master'] = $this->model_table_asset_master->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Table Asset Master Detail');
		$this->render('backend/standart/administrator/table_asset_master/table_asset_master_view', $this->data);
	}

	/**
	 * delete Table Asset Masters
	 *
	 * @var $id String
	 */
	private function _remove($id)
	{
		$table_asset_master = $this->model_table_asset_master->find($id);



		return $this->model_table_asset_master->remove($id);
	}


	/**
	 * Export to excel
	 *
	 * @return Files Excel .xls
	 */
	public function export()
	{
		$this->is_allowed('table_asset_master_export');

		$this->model_table_asset_master->export(
			'table_asset_master',
			'table_asset_master',
			$this->model_table_asset_master->field_search
		);
	}

	/**
	 * Export to PDF
	 *
	 * @return Files PDF .pdf
	 */
	public function export_pdf()
	{
		$this->is_allowed('table_asset_master_export');

		$this->model_table_asset_master->pdf('table_asset_master', 'table_asset_master');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('table_asset_master_export');

		$table = $title = 'table_asset_master';
		$this->load->library('HtmlPdf');

		$config = array(
			'orientation' => 'p',
			'format' => 'a4',
			'marges' => array(5, 5, 5, 5)
		);

		$this->pdf = new HtmlPdf($config);
		$this->pdf->setDefaultFont('stsongstdlight');

		$result = $this->db->get($table);

		$data = $this->model_table_asset_master->find($id);
		$fields = $result->list_fields();

		$content = $this->pdf->loadHtmlPdf('core_template/pdf/pdf_single', [
			'data' => $data,
			'fields' => $fields,
			'title' => $title
		], TRUE);

		$this->pdf->initialize($config);
		$this->pdf->pdf->SetDisplayMode('fullpage');
		$this->pdf->writeHTML($content);
		$this->pdf->Output($table . '.pdf', 'H');
	}
}


/* End of file table_asset_master.php */
/* Location: ./application/controllers/administrator/Table Asset Master.php */