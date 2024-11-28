<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *| --------------------------------------------------------------------------
 *| Tb Pinjam Log Controller
 *| --------------------------------------------------------------------------
 *| Tb Pinjam Log site
 *|
 */
class Tb_pinjam_log extends Admin
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tb_pinjam_log');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	 * show all Tb Pinjam Logs
	 *
	 * @var $offset String
	 */
	public function index($offset = 0)
	{
		$this->is_allowed('tb_pinjam_log_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tb_pinjam_logs'] = $this->model_tb_pinjam_log->get($filter, $field, $this->limit_page, $offset);
		$this->data['tb_pinjam_log_counts'] = $this->model_tb_pinjam_log->count_all($filter, $field);

		$config = [
			'base_url'     => ADMIN_NAMESPACE_URL  . '/tb_pinjam_log/index/',
			'total_rows'   => $this->data['tb_pinjam_log_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->data['tables'] = $this->load->view('backend/standart/administrator/tb_pinjam_log/tb_pinjam_log_data_table', $this->data, true);

		if ($this->input->get('ajax')) {
			$this->response([
				'tables' => $this->data['tables'],
				'pagination' => $this->data['pagination'],
				'total_row' => $this->data['tb_pinjam_log_counts']
			]);
		}

		$this->template->title('Tb Pinjam Log List');
		$this->render('backend/standart/administrator/tb_pinjam_log/tb_pinjam_log_list', $this->data);
	}

	/**
	 * Add new tb_pinjam_logs
	 *
	 */
	public function add()
	{
		$this->is_allowed('tb_pinjam_log_add');

		$this->template->title('Tb Pinjam Log New');
		$this->render('backend/standart/administrator/tb_pinjam_log/tb_pinjam_log_add', $this->data);
	}

	/**
	 * Add New Tb Pinjam Logs
	 *
	 * @return JSON
	 */
	public function add_save()
	{
		if (!$this->is_allowed('tb_pinjam_log_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}

		$this->form_validation->set_rules('tanggal_pinjam', 'Tanggal Pinjam', 'trim|required');


		$this->form_validation->set_rules('waktu_pinjam', 'Waktu Pinjam', 'trim|required');


		$this->form_validation->set_rules('tanggal_kembali', 'Tanggal Kembali', 'trim|required');


		$this->form_validation->set_rules('waktu_kembali', 'Waktu Kembali', 'trim|required');


		$this->form_validation->set_rules('lend_id', 'Lend Id', 'trim|required|max_length[255]');


		$this->form_validation->set_rules('peminjam', 'Peminjam', 'trim|required|max_length[255]');


		$this->form_validation->set_rules('job', 'Job', 'trim|required|max_length[255]');


		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|max_length[255]');


		$this->form_validation->set_rules('telp', 'Telp', 'trim|required|max_length[11]');


		$this->form_validation->set_rules('tag_code[]', 'Aset', 'trim|required|max_length[255]');




		if ($this->form_validation->run()) {

			$save_data = [
				'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
				'waktu_pinjam' => $this->input->post('waktu_pinjam'),
				'tanggal_kembali' => $this->input->post('tanggal_kembali'),
				'waktu_kembali' => $this->input->post('waktu_kembali'),
				'lend_id' => $this->input->post('lend_id'),
				'peminjam' => $this->input->post('peminjam'),
				'job' => $this->input->post('job'),
				'alamat' => $this->input->post('alamat'),
				'telp' => $this->input->post('telp'),
				'tag_code' => implode(',', (array) $this->input->post('tag_code')),
				'status' => $this->input->post('status'),
			];








			$save_tb_pinjam_log = $id = $this->model_tb_pinjam_log->store($save_data);


			if ($save_tb_pinjam_log) {




				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_tb_pinjam_log;
					$this->data['message'] = cclang('success_save_data_stay', [
						admin_anchor('/tb_pinjam_log/edit/' . $save_tb_pinjam_log, 'Edit Tb Pinjam Log'),
						admin_anchor('/tb_pinjam_log', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
							admin_anchor('/tb_pinjam_log/edit/' . $save_tb_pinjam_log, 'Edit Tb Pinjam Log')
						]),
						'success'
					);

					$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/tb_pinjam_log');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/tb_pinjam_log');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		$this->response($this->data);
	}

	public function simpan_data()
	{
		if (!$this->is_allowed('tb_pinjam_log_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}

		$this->form_validation->set_rules('tanggal_pinjam', 'Tanggal Pinjam', 'trim|required');


		$this->form_validation->set_rules('waktu_pinjam', 'Waktu Pinjam', 'trim|required');


		$this->form_validation->set_rules('tanggal_kembali', 'Tanggal Kembali', 'trim|required');


		$this->form_validation->set_rules('waktu_kembali', 'Waktu Kembali', 'trim|required');


		$this->form_validation->set_rules('lend_id', 'Lend Id', 'trim|required|max_length[255]');


		$this->form_validation->set_rules('peminjam', 'Peminjam', 'trim|required|max_length[255]');


		$this->form_validation->set_rules('job', 'Job', 'trim|required|max_length[255]');


		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|max_length[255]');


		$this->form_validation->set_rules('telp', 'Telp', 'trim|required|max_length[11]');


		$this->form_validation->set_rules('tag_code[]', 'Aset', 'trim|required|max_length[255]');




		if ($this->form_validation->run()) {

			$save_data = [
				'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
				'waktu_pinjam' => $this->input->post('waktu_pinjam'),
				'tanggal_kembali' => $this->input->post('tanggal_kembali'),
				'waktu_kembali' => $this->input->post('waktu_kembali'),
				'lend_id' => $this->input->post('lend_id'),
				'peminjam' => $this->input->post('peminjam'),
				'job' => $this->input->post('job'),
				'alamat' => $this->input->post('alamat'),
				'telp' => $this->input->post('telp'),
				'tag_code' => implode(',', (array) $this->input->post('tag_code')),
				'status' => $this->input->post('status'),
			];








			$save_tb_pinjam_log = $id = $this->model_tb_pinjam_log->store($save_data);


			if ($save_tb_pinjam_log) {




				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_tb_pinjam_log;
					$this->data['message'] = cclang('success_save_data_stay', [
						admin_anchor('/tb_pinjam_log/edit/' . $save_tb_pinjam_log, 'Edit Tb Pinjam Log'),
						admin_anchor('/tb_pinjam_log', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
							admin_anchor('/tb_pinjam_log/edit/' . $save_tb_pinjam_log, 'Edit Tb Pinjam Log')
						]),
						'success'
					);

					$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/tb_pinjam_log');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/tb_pinjam_log');
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
	 * Update view Tb Pinjam Logs
	 *
	 * @var $id String
	 */
	public function edit($id)
	{
		$this->is_allowed('tb_pinjam_log_update');

		$this->data['tb_pinjam_log'] = $this->model_tb_pinjam_log->find($id);

		$this->template->title('Tb Pinjam Log Update');
		$this->render('backend/standart/administrator/tb_pinjam_log/tb_pinjam_log_update', $this->data);
	}

	/**
	 * Update Tb Pinjam Logs
	 *
	 * @var $id String
	 */
	public function edit_save($id)
	{
		if (!$this->is_allowed('tb_pinjam_log_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}




		$this->form_validation->set_rules('tanggal_pinjam', 'Tanggal Pinjam', 'trim|required');


		$this->form_validation->set_rules('waktu_pinjam', 'Waktu Pinjam', 'trim|required');


		$this->form_validation->set_rules('tanggal_kembali', 'Tanggal Kembali', 'trim|required');


		$this->form_validation->set_rules('waktu_kembali', 'Waktu Kembali', 'trim|required');


		$this->form_validation->set_rules('lend_id', 'Lend Id', 'trim|required|max_length[255]');


		$this->form_validation->set_rules('peminjam', 'Peminjam', 'trim|required|max_length[255]');


		$this->form_validation->set_rules('job', 'Job', 'trim|required|max_length[255]');


		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|max_length[255]');


		$this->form_validation->set_rules('telp', 'Telp', 'trim|required|max_length[11]');


		$this->form_validation->set_rules('tag_code[]', 'Aset', 'trim|required|max_length[255]');



		if ($this->form_validation->run()) {

			$save_data = [
				'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
				'waktu_pinjam' => $this->input->post('waktu_pinjam'),
				'tanggal_kembali' => $this->input->post('tanggal_kembali'),
				'waktu_kembali' => $this->input->post('waktu_kembali'),
				'lend_id' => $this->input->post('lend_id'),
				'peminjam' => $this->input->post('peminjam'),
				'job' => $this->input->post('job'),
				'alamat' => $this->input->post('alamat'),
				'telp' => $this->input->post('telp'),
				'tag_code' => implode(',', (array) $this->input->post('tag_code')),
				'status' => $this->input->post('status'),
			];








			$save_tb_pinjam_log = $this->model_tb_pinjam_log->change($id, $save_data);

			if ($save_tb_pinjam_log) {





				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						admin_anchor('/tb_pinjam_log', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', []),
						'success'
					);

					$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/tb_pinjam_log');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/tb_pinjam_log');
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
	 * delete Tb Pinjam Logs
	 *
	 * @var $id String
	 */
	public function delete($id = null)
	{
		$this->is_allowed('tb_pinjam_log_delete');

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
					"message" => cclang('has_been_deleted', 'tb_pinjam_log')
				]);
			} else {
				$this->response([
					"success" => true,
					"message" => cclang('error_delete', 'tb_pinjam_log')
				]);
			}
		} else {
			if ($remove) {
				set_message(cclang('has_been_deleted', 'tb_pinjam_log'), 'success');
			} else {
				set_message(cclang('error_delete', 'tb_pinjam_log'), 'error');
			}
			redirect_back();
		}
	}

	/**
	 * View view Tb Pinjam Logs
	 *
	 * @var $id String
	 */
	public function view($id)
	{
		$this->is_allowed('tb_pinjam_log_view');

		$this->data['tb_pinjam_log'] = $this->model_tb_pinjam_log->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Tb Pinjam Log Detail');
		$this->render('backend/standart/administrator/tb_pinjam_log/tb_pinjam_log_view', $this->data);
	}

	/**
	 * delete Tb Pinjam Logs
	 *
	 * @var $id String
	 */
	private function _remove($id)
	{
		$tb_pinjam_log = $this->model_tb_pinjam_log->find($id);



		return $this->model_tb_pinjam_log->remove($id);
	}


	/**
	 * Export to excel
	 *
	 * @return Files Excel .xls
	 */
	public function export()
	{
		$this->is_allowed('tb_pinjam_log_export');

		$this->model_tb_pinjam_log->export(
			'tb_pinjam_log',
			'tb_pinjam_log',
			$this->model_tb_pinjam_log->field_search
		);
	}

	/**
	 * Export to PDF
	 *
	 * @return Files PDF .pdf
	 */
	public function export_pdf()
	{
		$this->is_allowed('tb_pinjam_log_export');

		$this->model_tb_pinjam_log->pdf('tb_pinjam_log', 'tb_pinjam_log');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('tb_pinjam_log_export');

		$table = $title = 'tb_pinjam_log';
		$this->load->library('HtmlPdf');

		$config = array(
			'orientation' => 'p',
			'format' => 'a4',
			'marges' => array(5, 5, 5, 5)
		);

		$this->pdf = new HtmlPdf($config);
		$this->pdf->setDefaultFont('stsongstdlight');

		$result = $this->db->get($table);

		$data = $this->model_tb_pinjam_log->find($id);
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


/* End of file tb_pinjam_log.php */
/* Location: ./application/controllers/administrator/Tb Pinjam Log.php */