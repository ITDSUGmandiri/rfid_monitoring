<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *| --------------------------------------------------------------------------
 *| Tb Master Transaksi Controller
 *| --------------------------------------------------------------------------
 *| Tb Master Transaksi site
 *|
 */
class perbaikan extends Admin
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('tb_master_aset/model_tb_master_aset');

		$this->load->model('model_perbaikan');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	 * show all Tb Master Transaksis
	 *
	 * @var $offset String
	 */
	public function index($offset = 0)
	{
		$this->is_allowed('perbaikan_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['perbaikans'] = $this->model_perbaikan->get($filter, $field, $this->limit_page, $offset);
		$this->data['perbaikan_counts'] = $this->model_perbaikan->count_all($filter, $field);

		$config = [
			'base_url'     => ADMIN_NAMESPACE_URL  . '/perbaikan/index/',
			'total_rows'   => $this->data['perbaikan_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->data['tables'] = $this->load->view('backend/standart/administrator/perbaikan/tb_master_transaksi_data_table', $this->data, true);

		if ($this->input->get('ajax')) {
			$this->response([
				'tables' => $this->data['tables'],
				'pagination' => $this->data['pagination'],
				'total_row' => $this->data['perbaikan_counts']
			]);
		}

		$this->template->title('Perbaikan List');
		$this->render('backend/standart/administrator/perbaikan/perbaikan_list', $this->data);
	}

	/**
	 * Add new tb_master_transaksis
	 *
	 */
	public function add()
	{
		$this->is_allowed('perbaikan_add');

		$this->data['pengaturan_sistem'] = $this->model_perbaikan->getPengaturanSistem();
		$this->data['tb_master_asets'] = $this->model_tb_master_aset->get_aset();

		$this->template->title('Perbaikan Aset');
		$this->render('backend/standart/administrator/perbaikan/perbaikan_add', $this->data);
	}

	public function serverSideData()
    {
        
        $columns = array(
            0 => 'checkbox_id_master_aset',
            1 => 'id_aset',
            2 => 'nama_aset',
            3 => 'kode_aset',
            4 => 'nup',
			5 => 'kode_tid'
        );

        $limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];

        $id_area = $this->input->post('id_area');
        $id_gedung = $this->input->post('id_gedung');
        $id_ruangan = $this->input->post('id_ruangan');
        $select_all = $this->input->post('select_all');

		$filter_data = array();

		$filter_data['id_area'] = $id_area;
		$filter_data['id_gedung'] = $id_gedung;
		$filter_data['id_ruangan'] = $id_ruangan;

        $totalData = $this->model_perbaikan->count_all_content();
        $totalFiltered = $totalData;

        if(empty($this->input->post('search')['value'])) {
            $contents = $this->model_perbaikan->get_content($limit, $start, $order, $dir, $select_all, $filter_data);
        } else {
            $search = $this->input->post('search')['value'];
            $contents =  $this->model_perbaikan->content_search($limit, $start, $search, $order, $dir, $select_all, $filter_data);
            $totalFiltered = $this->model_perbaikan->content_search_count($search, $select_all, $filter_data);
        }

        $data = array();
        if(!empty($contents)) {
            $autoNumber = $start + 1;
            foreach($contents as $row) {
                $nestedData['checkbox_id_master_aset'] = '<input type="checkbox" value="'.$row->id_aset.'" class="cekbok" data-id="'.$row->id_aset.'" data-kode-aset="'.$row->kode_aset.'" data-nup="'.$row->nup.'" data-nama-aset="'.$row->nama_aset.'" data-kode-tid="'.$row->kode_tid.'">';
				$nestedData['auto_number'] = $autoNumber;
				$nestedData['id'] = $row->id_aset;
                $autoNumber++;
                $nestedData['nama_aset'] = $row->nama_aset;
                $nestedData['kode_aset'] = $row->kode_aset;
                $nestedData['nup'] = $row->nup;
                $nestedData['kode_tid'] = $row->kode_tid;
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
	 * Add New Tb Master Transaksis
	 *
	 * @return JSON
	 */
	public function add_save()
	{

		if (!$this->is_allowed('perbaikan_add', false)) {
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
				'id_pegawai_input' => $this->input->post('id_pegawai_input'),
				'nama_pegawai_input' => $this->input->post('nama_pegawai_input'),
				'id_pegawai' => $this->input->post('id_pegawai'),
				'nama_pegawai' => $this->input->post('nama_pegawai'),
				'ket_transaksi' => $this->input->post('ket_transaksi'),
				'id_area' => $this->input->post('id_area'),
				'id_gedung' => $this->input->post('id_gedung'),
				'id_ruangan' => $this->input->post('id_ruangan'),
			];

			$save_data_detail_transaksi = [
				// 'id_transaksi' => $id_transaksi,
				// 'kode_transaksi' => $save_data_master_transaksi['kode_transaksi'],
				// 'id_aset' => $id_aset,
				// 'id_area' => $save_data_master_transaksi['id_area'],
				// 'id_gedung' => $save_data_master_transaksi['id_gedung'], 
				// 'id_ruangan' => $save_data_master_transaksi['id_ruangan'],
				'status' => 1,
				// 'id_kondisi' => 1
			];

			$string_id = $this->input->post('string_id');

			// Ambil data array aset dan tag dari ajax post
			$array_data_aset = json_decode($this->input->post('data_array_aset'), true);
			$uniqueDataArray = json_decode($this->input->post('uniqueDataArray'), true);

			// Link array aset dengan array tag berdasarkan index
			$linked_data = array();
			for ($i = 0; $i < count($array_data_aset); $i++) {
				$linked_data[] = array(
					'aset' => $array_data_aset[$i],
					'aset' => $uniqueDataArray[$i]
				);
			}

			// echo '<pre>';
			// print_r($array_data_aset);
			// echo '</pre>';
			// exit();

			$save_register_aset = $id = $this->model_perbaikan->saveRegisterAset($save_data_master_transaksi, $save_data_detail_transaksi, $array_data_aset);
			// $save_register_aset = $this->model_tb_master_transaksi->saveRegisterAset($save_data_master_transaksi, $save_data_detail_transaksi, $linked_data);

			// echo '<pre>';
			// print_r($save_register_aset);
			// echo '</pre>';
			// exit();

			if ($save_register_aset) {
				

				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_register_aset;
					$this->data['message'] = cclang('success_save_data_stay', [admin_anchor('/perbaikan', 'Go back to list')]);
				} else {
					set_message(cclang('success_save_data_redirect', [admin_anchor('/perbaikan/view/' . $save_register_aset, 'See detail')]), 'success');
					$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/perbaikan');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/perbaikan');
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
		$this->is_allowed('perbaikan_update');

		$this->data['perbaikan'] = $this->model_perbaikan->find($id);

		$this->template->title('Perbaikan Update');
		$this->render('backend/standart/administrator/perbaikan/perbaikan_update', $this->data);
	}

	/**
	 * Update Tb Master Transaksis
	 *
	 * @var $id String
	 */
	public function edit_save($id)
	{
		if (!$this->is_allowed('perbaikan_update', false)) {
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








			$save_tb_master_transaksi = $this->model_perbaikan->change($id, $save_data);

			if ($save_tb_master_transaksi) {





				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						admin_anchor('/perbaikan', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', []),
						'success'
					);

					$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/perbaikan');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/perbaikan');
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
		$this->is_allowed('perbaikan_delete');

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
					"message" => cclang('has_been_deleted', 'perbaikan')
				]);
			} else {
				$this->response([
					"success" => true,
					"message" => cclang('error_delete', 'perbaikan')
				]);
			}
		} else {
			if ($remove) {
				set_message(cclang('has_been_deleted', 'perbaikan'), 'success');
			} else {
				set_message(cclang('error_delete', 'perbaikan'), 'error');
			}
			redirect_back();
		}
	}

	/**
	 * View view Tb Master Transaksis
	 *
	 * @var $id String
	 */
	public function view($id)
	{
		$this->is_allowed('perbaikan_view');

		$this->data['tb_master_transaksi'] = $this->model_perbaikan->getTransaksiById($id);
		$this->data['tb_detail_transaksi'] = $this->model_perbaikan->getDetailTransaksiById($id);
		$this->template->title('Detail Perbaikan');
		$this->render('backend/standart/administrator/perbaikan/perbaikan_view', $this->data);
	}

	/**
	 * delete Tb Master Transaksis
	 *
	 * @var $id String
	 */
	private function _remove($id)
	{
		$tb_master_transaksi = $this->model_perbaikan->find($id);
		return $this->model_perbaikan->remove($id);
	}


	/**
	 * Export to excel
	 *
	 * @return Files Excel .xls
	 */
	public function export()
	{
		$this->is_allowed('perbaikan_export');

		$this->model_perbaikan->export(
			'perbaikan',
			'perbaikan',
			$this->model_perbaikan->field_search
		);
	}

	/**
	 * Export to PDF
	 *
	 * @return Files PDF .pdf
	 */
	public function export_pdf()
	{
		$this->is_allowed('perbaikan_export');

		$this->model_tb_master_transaksi->pdf('perbaikan', 'perbaikan');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('perbaikan_export');

		$table = $title = 'perbaikan';
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
		if (!$this->is_allowed('perbaikan_list', false)) {
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
		if (!$this->is_allowed('perbaikan_list', false)) {
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

	public function check_unique_single_tag()
	{
		$tid = $this->input->get('tid');
		$check = $this->db->get_where(
			'tb_master_tag_rfid',
			[
				'kode_tid' => $tid,
				'status_tag' => 'Y'
			]
		)->num_rows();

		$response = [
			'check' => $check
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

	public function get_all_aset()
	{
		$id_area = $this->input->get('id_area');	
		$id_gedung = $this->input->get('id_gedung');
		$id_ruangan = $this->input->get('id_ruangan');

		$filter_data = array();

		$filter_data = array(
			'id_area' => $id_area,
			'id_gedung' => $id_gedung,
			'id_ruangan' => $id_ruangan
		);

		$results = $this->model_perbaikan->get_all_aset($filter_data);
		
		$response = [
			'success' => true,
			'data' => $results
		];

		$this->response($response);
	}
}

/* End of file tb_master_transaksi.php */
/* Location: ./application/controllers/administrator/Tb Master Transaksi.php */