<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *| --------------------------------------------------------------------------
 *| manual_sensus Controller
 *| --------------------------------------------------------------------------
 *| manual_sensus site
 *|
 */
class manual_sensus extends Admin
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('tb_master_aset/model_tb_master_aset');

		$this->load->model('model_manual_sensus');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
		$this->output->enable_profiler(TRUE);
	}

	/**
	 * show all manual_sensuss
	 *
	 * @var $offset String
	 */
	public function index($offset = 0)
	{
		$this->is_allowed('sensus_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['pengaturan_sistem'] = $this->model_manual_sensus->getPengaturanSistem();

		$this->data['sensus'] = $this->model_manual_sensus->get($filter, $field, $this->limit_page, $offset);
		$this->data['sensus_counts'] = $this->model_manual_sensus->count_all($filter, $field);

		$config = [
			'base_url'     => ADMIN_NAMESPACE_URL  . '/manual_sensus/index/',
			'total_rows'   => $this->data['sensus_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->data['tables'] = $this->load->view('backend/standart/administrator/manual_sensus/sensus_data_table', $this->data, true);

		if ($this->input->get('ajax')) {
			$this->response([
				'tables' => $this->data['tables'],
				'pagination' => $this->data['pagination'],
				'total_row' => $this->data['sensus_counts']
			]);
		}

		$this->template->title('Manual Sensus List');
		$this->render('backend/standart/administrator/manual_sensus/sensus_list', $this->data);
	}

	public function serverSideData()
	{

		$columns = array(
			0 => 'checkbox_id_master_aset',
			1 => 'id_aset',
			2 => 'nama_aset',
			3 => 'kode_aset',
			4 => 'nup'
		);

		$limit = $this->input->post('length');
		$start = $this->input->post('start');
		$order = $columns[$this->input->post('order')[0]['column']];
		$dir = $this->input->post('order')[0]['dir'];

		$filter_id_parameter = $this->input->post('filter_id_parameter');

		$totalData = $this->model_registrasi_aset->count_all_content();
		$totalFiltered = $totalData;

		if (empty($this->input->post('search')['value'])) {
			$contents = $this->model_registrasi_aset->get_content($limit, $start, $order, $dir);
		} else {
			$search = $this->input->post('search')['value'];
			$contents =  $this->model_registrasi_aset->content_search($limit, $start, $search, $order, $dir);
			$totalFiltered = $this->model_registrasi_aset->content_search_count($search);
		}

		// echo '<pre>';
		// print_r($contents);
		// echo '</pre>';
		// exit();

		$data = array();
		if (!empty($contents)) {
			$autoNumber = $start + 1;
			foreach ($contents as $row) {
				$nestedData['checkbox_id_master_aset'] = '<input type="checkbox" value="' . $row->id_aset . '" class="cekbok" data-id="' . $row->id_aset . '" data-kode-aset="' . $row->kode_aset . '" data-nup="' . $row->nup . '" data-nama-aset="' . $row->nama_aset . '">';
				$nestedData['auto_number'] = $autoNumber;
				$nestedData['id'] = $row->id_aset;
				$autoNumber++;
				$nestedData['nama_aset'] = $row->nama_aset;
				$nestedData['kode_aset'] = $row->kode_aset;
				$nestedData['nup'] = $row->nup;
				$data[] = $nestedData;
			}
		}

		$json_data = array(
			"draw"            => intval($this->input->post('draw')),
			"recordsTotal"    => intval($totalData),
			"recordsFiltered" => intval($totalFiltered),
			"data"            => $data
		);

		echo json_encode($json_data);
	}

	/**
	 * Add new manual sensuss
	 *
	 */
	public function add()
	{
		$this->is_allowed('sensus_add');

		$this->data['pengaturan_sistem'] = $this->model_manual_sensus->getPengaturanSistem();
		$this->data['tb_master_asets'] = $this->model_tb_master_aset->get_aset();

		$this->data['master_asets'] = $this->model_manual_sensus->get_dataaset();

		// echo '<pre>';
		// print_r($this->data['master_asets']);
		// echo '</pre>';
		// exit();

		$this->template->title('Sensus');
		$this->render('backend/standart/administrator/manual_sensus/sensus_add', $this->data);
	}

	public function manual_sensus_add_anomali()
	{
		$this->is_allowed('sensus_add');

		$this->data['pengaturan_sistem'] = $this->model_manual_sensus->getPengaturanSistem();
		$this->data['tb_master_asets'] = $this->model_tb_master_aset->get_aset();

		$this->template->title('Sensus');
		$this->render('backend/standart/administrator/manual_sensus/manual_sensus_add_anomali', $this->data);
	}

	/**
	 * Add New Tb Master Transaksis
	 *
	 * @return JSON
	 */
	public function add_save()
	{

		if (!$this->is_allowed('sensus_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}

		// $this->form_validation->set_rules('tipe_transaksi', 'Tipe Transaksi', 'trim|required');
		// $this->form_validation->set_rules('status_transaksi', 'Status Transaksi', 'trim|required');
		$this->form_validation->set_rules('tgl_awal_transaksi', 'Tgl Awal Transaksi', 'trim|required');
		$this->form_validation->set_rules('ket_transaksi', 'Ket Transaksi', 'trim|required|max_length[500]');
		// $this->form_validation->set_rules('nama_pegawai_input', 'Nama Pegawai Input', 'trim|max_length[100]');
		$this->form_validation->set_rules('id_area', 'Id Area', 'trim|required');
		$this->form_validation->set_rules('id_gedung', 'Id Gedung', 'trim|required');
		$this->form_validation->set_rules('id_ruangan', 'Id Ruangan', 'trim|required');

		if ($this->form_validation->run()) {

			$save_data_master_transaksi = [
				'kode_transaksi' => $this->input->post('kode_transaksi'),
				'tipe_transaksi' => $this->input->post('tipe_transaksi'),
				'status_transaksi' => $this->input->post('status_transaksi'),
				'tgl_input' => date('Y-m-d H:i:s'),
				'tgl_awal_transaksi' => $this->input->post('tgl_awal_transaksi'),
				// 'tgl_akhir_transaksi' => $this->input->post('tgl_akhir_transaksi'),
				'id_pegawai_input' => $this->session->userdata('id'),
				'nama_pegawai_input' => $this->session->userdata('full_name'),
				'id_pegawai' => $this->input->post('id_pegawai'),
				'nama_pegawai' => $this->input->post('nama_pegawai'),
				'ket_transaksi' => $this->input->post('ket_transaksi'),
				'id_area' => $this->input->post('id_area'),
				'id_gedung' => $this->input->post('id_gedung'),
				'id_ruangan' => $this->input->post('id_ruangan')
			];

			$save_data_detail_transaksi = [
				'id_area' => $this->input->post('id_area'),
				'id_gedung' => $this->input->post('id_gedung'),
				'id_ruangan' => $this->input->post('id_ruangan')
			];

			// Ambil data array aset dan tag dari ajax post
			$hasil_sensus_normal = json_decode($this->input->post('hasil_sensus_normal'), true);
			$hasil_sensus_anomali = json_decode($this->input->post('hasil_sensus_anomali'), true);
			// $uniqueDataArray = json_decode($this->input->post('uniqueDataArray'), true);

			// echo '<pre>';
			// print_r($hasil_sensus_anomali);
			// echo '</pre>';
			// exit();

			$save_sensus = $id = $this->model_manual_sensus->saveSensus($save_data_master_transaksi, $save_data_detail_transaksi, $hasil_sensus_normal, $hasil_sensus_anomali);

			if ($save_sensus) {

				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_sensus;
					$this->data['message'] = cclang('success_save_data_stay', [admin_anchor('/sensus', 'Go back to list')]);
				} else {
					set_message(cclang('success_save_data_redirect', [admin_anchor('/sensus/view/' . $save_sensus, 'See detail')]), 'success');
					$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/sensus');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/sensus');
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
	 * Update view Tb Master Transaksis
	 *
	 * @var $id String
	 */
	public function edit($id)
	{
		$this->is_allowed('registrasi_aset_update');

		$this->data['registrasi_aset'] = $this->model_registrasi_aset->find($id);

		$this->template->title('Register Aset Update');
		$this->render('backend/standart/administrator/registrasi_aset/registrasi_aset_update', $this->data);
	}

	/**
	 * Update Tb Master Transaksis
	 *
	 * @var $id String
	 */
	public function edit_save($id)
	{
		if (!$this->is_allowed('registrasi_aset_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}


		$this->form_validation->set_rules('tipe_transaksi', 'Tipe Transaksi', 'trim|required');


		$this->form_validation->set_rules('status_transaksi', 'Status Transaksi', 'trim|required');




		$this->form_validation->set_rules('tgl_awal_transaksi', 'Tgl Awal Transaksi', 'trim|required');


		$this->form_validation->set_rules('ket_transaksi', 'Ket Transaksi', 'trim|required|max_length[500]');




		$this->form_validation->set_rules('nama_pegawai_input', 'Nama Pegawai Input', 'trim|max_length[100]');




		$this->form_validation->set_rules('id_area', 'Id Area', 'trim|required');


		$this->form_validation->set_rules('id_gedung', 'Id Gedung', 'trim|required');


		$this->form_validation->set_rules('id_ruangan', 'Id Ruangan', 'trim|required');



		if ($this->form_validation->run()) {

			$save_data = [
				'tipe_transaksi' => $this->input->post('tipe_transaksi'),
				'status_transaksi' => $this->input->post('status_transaksi'),
				'tgl_awal_transaksi' => $this->input->post('tgl_awal_transaksi'),
				'ket_transaksi' => $this->input->post('ket_transaksi'),
				'id_pegawai_input' => $this->input->post('id_pegawai_input'),
				'nama_pegawai_input' => $this->input->post('nama_pegawai_input'),
				'id_area' => $this->input->post('id_area'),
				'id_gedung' => $this->input->post('id_gedung'),
				'id_ruangan' => $this->input->post('id_ruangan'),
			];








			$save_tb_master_transaksi = $this->model_registrasi_aset->change($id, $save_data);

			if ($save_tb_master_transaksi) {





				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						admin_anchor('/registrasi_aset', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', []),
						'success'
					);

					$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/registrasi_aset');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/registrasi_aset');
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
	 * delete Tb Master Transaksis
	 *
	 * @var $id String
	 */
	public function delete($id = null)
	{
		$this->is_allowed('registrasi_aset_delete');

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
					"message" => cclang('has_been_deleted', 'registrasi_aset')
				]);
			} else {
				$this->response([
					"success" => true,
					"message" => cclang('error_delete', 'registrasi_aset')
				]);
			}
		} else {
			if ($remove) {
				set_message(cclang('has_been_deleted', 'registrasi_aset'), 'success');
			} else {
				set_message(cclang('error_delete', 'registrasi_aset'), 'error');
			}
			redirect_back();
		}
	}

	/**
	 * View view Tb Master Transaksis
	 *
	 * @var $id String
	 */
	public function view($id, $id_ruangan)
	{
		$this->is_allowed('manual_sensus_view');

		$this->data['tb_master_transaksi'] = $this->model_manual_sensus->getTransaksiById($id);
		$this->data['tb_detail_transaksi'] = $this->model_manual_sensus->getHasilSensusById($id);
		$this->data['summary_report'] = $this->model_manual_sensus->getSummaryRekonSensusById($id, $id_ruangan);

		$this->template->title('Detail Manual Sensus');
		$this->render('backend/standart/administrator/manual_sensus/sensus_view', $this->data);
	}

	public function hasilSensus($id, $id_ruangan)
	{
		
		$this->is_allowed('sensus_view_hasil_sensus');

		// $this->data['tb_master_transaksi'] = $this->model_sensus->getTransaksiById($id);
		// $this->data['tb_detail_transaksi'] = $this->model_sensus->getDetailTransaksiById($id);
		// $this->template->title('Hasil Sensus');
		// $this->render('backend/standart/administrator/sensus/laporan_hasil_sensus', $this->data);

		$data['id'] = $this->session->userdata('id');
		$data['username'] = $this->session->userdata('username');
		$data['email'] = $this->session->userdata('email');
		$data['full_name'] = $this->session->userdata('full_name');
		// $data['address'] = $this->session->userdata('address');
		// $data['phone'] = $this->session->userdata('phone');
		// $data['user_id'] = $this->session->userdata('user_id');
		// $data['level'] = $this->session->userdata('level');  

		// end passing config and variable data

		// $data['id_transaksi'] = $id;

		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';
		// exit;

		$data['tb_master_transaksi'] = $this->model_sensus->getTransaksiById($id);
		$data['tb_detail_transaksi'] = $this->model_sensus->getHasilSensusById($id);
		$data['summary_report'] = $this->model_sensus->getSummaryRekonSensusById($id, $id_ruangan);

		$this->load->view('backend/standart/administrator/sensus/rpt_hasil_sensus', $data);

	}

	public function rekonSensus($id, $id_ruangan)
	{

		// echo '<pre>';
		// print_r($id_ruangan);
		// echo '</pre>';
		// exit;
		
		$this->is_allowed('rekon_view_hasil_sensus');

		// $this->data['tb_master_transaksi'] = $this->model_sensus->getTransaksiById($id);
		// $this->data['tb_detail_transaksi'] = $this->model_sensus->getDetailTransaksiById($id);
		// $this->template->title('Hasil Sensus');
		// $this->render('backend/standart/administrator/sensus/laporan_hasil_sensus', $this->data);

		// $ci = &get_instance();
		// echo json_encode($ci->session->userdata());
		// exit;

		$data['id'] = $this->session->userdata('id');
		$data['username'] = $this->session->userdata('username');
		$data['email'] = $this->session->userdata('email');
		$data['full_name'] = $this->session->userdata('full_name');
		// $data['address'] = $this->session->userdata('address');
		// $data['phone'] = $this->session->userdata('phone');
		// $data['user_id'] = $this->session->userdata('user_id');
		// $data['level'] = $this->session->userdata('level'); 

		// end passing config and variable data

		// $data['id_transaksi'] = $id;

		$data['tb_master_transaksi'] = $this->model_sensus->getTransaksiById($id);
		$data['tb_detail_transaksi'] = $this->model_sensus->getRekonSensusById($id);
		$data['summary_report'] = $this->model_sensus->getSummaryRekonSensusById($id, $id_ruangan);

		// echo '<pre>';
		// print_r($data['tb_master_transaksi']);
		// echo '</pre>';
		// exit;

		// echo '<pre>';
		// print_r($data['summary_report']);
		// echo '</pre>';
		// exit;

		$this->load->view('backend/standart/administrator/sensus/rpt_rekon_sensus', $data);

	}

	/**
	 * delete Tb Master Transaksis
	 *
	 * @var $id String
	 */
	private function _remove($id)
	{
		$tb_master_transaksi = $this->model_registrasi_aset->find($id);
		return $this->model_registrasi_aset->remove($id);
	}


	/**
	 * Export to excel
	 *
	 * @return Files Excel .xls
	 */
	public function export()
	{
		$this->is_allowed('registrasi_aset_export');

		$this->model_registrasi_aset->export(
			'registrasi_aset',
			'registrasi_aset',
			$this->model_registrasi_aset->field_search
		);
	}

	/**
	 * Export to PDF
	 *
	 * @return Files PDF .pdf
	 */
	public function export_pdf()
	{
		$this->is_allowed('registrasi_aset_export');

		$this->model_tb_master_transaksi->pdf('registrasi_aset', 'registrasi_aset');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('registrasi_aset_export');

		$table = $title = 'registrasi_aset';
		$this->load->library('HtmlPdf');

		$config = array(
			'orientation' => 'p',
			'format' => 'a4',
			'marges' => array(5, 5, 5, 5)
		);

		$this->pdf = new HtmlPdf($config);
		$this->pdf->setDefaultFont('stsongstdlight');

		$result = $this->db->get($table);

		$data = $this->model_tb_master_transaksi->find($id);
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

	public function ajax_id_gedung($id = null)
	{
		if (!$this->is_allowed('registrasi_aset_list', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}
		$results = db_get_all_data('tb_master_gedung', ['id_area' => $id]);
		$this->response($results);
	}

	public function ajax_id_ruangan($id = null)
	{
		if (!$this->is_allowed('registrasi_aset_list', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}
		$results = db_get_all_data('tb_master_ruangan', ['id_gedung' => $id]);
		$this->response($results);
	}

	public function check_unique_data()
	{
		$uniqueData = $this->input->get('uniqueData');
		$uniqueDataArray = json_decode($uniqueData, true);

		// Cek apakah data sudah ada di database
		$exists = false;
		foreach ($uniqueDataArray as $data) {
			$tid = $data['tid'];
			$epc = $data['epc'];

			$check = $this->db->get_where('tb_master_tag_rfid', [
				'kode_tid' => $tid,
				'status_tag' => 'N'
				// 'kode_epc' => $epc
			])->num_rows();

			if ($check > 0) {
				$exists = true;
				break;
			}
		}

		$response = [
			'exists' => $exists
		];

		$this->response($response);
	}

	public function get_all_tag()
	{
		// Ambil semua data tag dari database
		$tags = $this->db->get('tb_master_tag_rfid')->result();

		// Format response
		$response = [
			'success' => true,
			'data' => $tags
		];

		// Kirim response dalam format JSON
		$this->response($response);
	}

	public function delete_all_tag()
	{
		// Hapus semua data dari tabel tb_master_tag_rfid
		$this->db->empty_table('tb_master_tag_rfid');

		// Format response
		$response = [
			'success' => true,
			'message' => 'Semua data RFID tag berhasil dihapus'
		];

		// Kirim response dalam format JSON 
		$this->response($response);
	}

	// sensus

	public function check_unique_single_tag()
	{

		$tid = $this->input->get('tid');

		$check = $this->db->get_where('tb_master_tag_rfid', 
		[
			'kode_tid' => $tid
			// 'status_tag' => 'Y'
		])->num_rows();

		$response_data_aset = [];
		$status_tag = 'N';

		if ($check > 0) {

			$data_aset = $this->model_sensus->getAsetByID($tid);

			if (isset($data_aset) || !(empty($data_aset))){

				$status_tag = 'N';

				$response_data_aset = [
					'id_aset' => $data_aset->id_aset,
					'kode_aset' => $data_aset->kode_aset,
					'nama_aset' => $data_aset->nama_aset,
					'nup' => $data_aset->nup,
					'id_area' => $data_aset->id_area,
					'id_gedung' => $data_aset->id_gedung,
					'id_ruangan' => $data_aset->id_lokasi,
					'kode_tid' => $data_aset->kode_tid,
					'area' => $data_aset->area,
					'gedung' => $data_aset->gedung,
					'ruangan' => $data_aset->ruangan
				];

			} else {

				$status_tag = 'Y';

				$response_data_aset = [
					'id_aset' => '',
					'kode_aset' => '',
					'nama_aset' => '',
					'nup' => '',
					'id_area' => '',
					'id_gedung' => '',
					'id_ruangan' => '',
					'kode_tid' => $tid,
					'area' => '',
					'gedung' => '',
					'ruangan' => ''
				];

			}

			$response = [	
				'check' => $check,
				'data_aset' => $response_data_aset,
				'status_tag' => $status_tag
			];

		} else {

			$response = [
				'check' => $check,
				'data_aset' => $response_data_aset,
				'status_tag' => $status_tag
			];
			
		}

		$this->response($response);

	}

	public function get_all_aset()
	{
		$id_area = $this->input->get('id_area');	
		$id_gedung = $this->input->get('id_gedung');
		$id_ruangan = $this->input->get('id_ruangan');
		$metode_pencarian = $this->input->get('metode_pencarian');

		$filter_data = array();

		$filter_data = array(
			'id_area' => $id_area,
			'id_gedung' => $id_gedung,
			'id_ruangan' => $id_ruangan,
			'metode_pencarian' => $metode_pencarian
		);

		$results = $this->model_manual_sensus->get_all_aset($filter_data);
		
		$response = [
			'success' => true,
			'data' => $results
		];

		$this->response($response);
	}

	
	public function ajax_check_aset_not_available()
	{
		$tid = $this->input->get('tid');
		$flag_moving_in = $this->input->get('flag_moving_in');
		$query = $this->model_sensus->getStatusAsetByTID($tid, $flag_moving_in);

		// echo $this->db->last_query();
		// exit();

		$data = $query->row_array();
		$check = $query->num_rows();

		$response = [
			'check' => $check,
			'data' => $data
		];

		$this->response($response);
	}

	public function get_all_status()
	{
		// Ambil semua data tag dari database
		$tags = $this->db->where_in('id', [1, 5])->get('tb_master_status')->result();

		// Format response
		$response = [
			'success' => true,
			'data' => $tags
		];

		// Kirim response dalam format JSON
		$this->response($response);
	}

	public function get_all_kondisi()
	{
		// Ambil semua data tag dari database
		$tags = $this->db->get('tb_master_kondisi')->result();

		// Format response
		$response = [
			'success' => true,
			'data' => $tags
		];

		// Kirim response dalam format JSON
		$this->response($response);
	}

	function load_dropdown_ruangan()
    {

        if ($this->model_manual_sensus->getRuangan('')->num_rows() > 0) {
            $is_data_ada = TRUE;
            $list_data = $this->model_manual_sensus->getRuangan('')->result_array();
        } else {
            $is_data_ada = FALSE;
        }

        $ddata = array();

        foreach ($list_data as $qryget) {

            $row = array();

            $row['id'] = $qryget['id'];
            $row['ruangan'] = $qryget['ruangan'];
            $ddata[] = $row;
        }

        $output = array(
            "is_data_ada" => $is_data_ada,
            "list_data" => $ddata,
        );

        //output to json format
        echo json_encode($output);
    }

}

/* End of file tb_master_transaksi.php */
/* Location: ./application/controllers/administrator/Tb Master Transaksi.php */