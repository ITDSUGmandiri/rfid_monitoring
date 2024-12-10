<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *| --------------------------------------------------------------------------
 *| Tb Master Aset Controller
 *| --------------------------------------------------------------------------
 *| Tb Master Aset site
 *|
 */
class Tb_master_aset extends Admin
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tb_master_aset');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	 * show all Tb Master Asets
	 *
	 * @var $offset String
	 */
	public function index($offset = 0)
	{

		$this->is_allowed('tb_master_aset_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tb_master_asets'] = $this->model_tb_master_aset->get($filter, $field, $this->limit_page, $offset);

		$this->data['tb_master_aset_counts'] = $this->model_tb_master_aset->count_all($filter, $field);

		$config = [
			'base_url'     => ADMIN_NAMESPACE_URL  . '/tb_master_aset/index/',
			'total_rows'   => $this->data['tb_master_aset_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);


		$this->data['tables'] = $this->load->view('backend/standart/administrator/tb_master_aset/tb_master_aset_data_table', $this->data, true);

		if ($this->input->get('ajax')) {
			$this->response([
				'tables' => $this->data['tables'],
				'pagination' => $this->data['pagination'],
				'total_row' => $this->data['tb_master_aset_counts']
			]);
		}

		$this->template->title('Tb Master Aset List');
		$this->render('backend/standart/administrator/tb_master_aset/tb_master_aset_list', $this->data);
	}

	/**
	 * Add new tb_master_asets
	 *
	 */
	public function add()
	{
		$this->is_allowed('tb_master_aset_add');

		$this->template->title('Tb Master Aset New');
		$this->render('backend/standart/administrator/tb_master_aset/tb_master_aset_add', $this->data);
	}

	/**
	 * Add New Tb Master Asets
	 *
	 * @return JSON
	 */
	public function add_save()
	{
		if (!$this->is_allowed('tb_master_aset_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}


		$this->form_validation->set_rules('kode_aset', 'Kode Aset', 'trim|required|max_length[50]');


		$this->form_validation->set_rules('nup', 'Nup', 'trim|required|max_length[50]');

		$this->form_validation->set_rules('nama_aset', 'Nama Aset', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('merk', 'Merk', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('tipe', 'Tipe', 'trim|required');

		$this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');

		$this->form_validation->set_rules('area', 'Area', 'trim|required');
		$this->form_validation->set_rules('gedung', 'Gedung', 'trim|required');
		$this->form_validation->set_rules('room', 'Room', 'trim|required');
		$this->form_validation->set_rules('pic', 'Pic', 'trim|required');


		$rand = rand();
		$ekstensi =  array('png', 'jpg', 'jpeg');
		$filename = $_FILES['fotoaset']['name'];
		$ukuran = $_FILES['fotoaset']['size'];
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		$folderfoto = $this->input->post('kategori') === 1 ? 'Seni' : 'Elektronik';

		if ($this->form_validation->run()) {

			$save_data = [
				'kode_aset' => $this->input->post('kode_aset'),
				'nup' => $this->input->post('nup'),
				'nama_aset' => $this->input->post('nama_aset'),
				'merk' => $this->input->post('merk'),
				'tipe' => $this->input->post('tipe'),
				'kategori' => $this->input->post('kategori'),
				'id_area' => $this->input->post('area'),
				'id_gedung' => $this->input->post('gedung'),
				'id_lokasi' => $this->input->post('room'),
				'id_pegawai' => $this->input->post('pic'),
				'tgl_perolehan' => $this->input->post('tgl_perolehan'),
				'image_uri' => $rand . '_' . $_FILES['fotoaset']['name'],
			];



			$save_tb_master_aset = $id = $this->model_tb_master_aset->store($save_data);


			if ($save_tb_master_aset) {

				if (!in_array($ext, $ekstensi)) {
					header("location:index.php?alert=gagal_ekstensi");
				} else {
					if (!file_exists('uploads/' . $folderfoto)) {
						mkdir('uploads/' . $folderfoto, 0777, true);
					}
					if ($ukuran < 500000) {
						if (file_exists('uploads/' . $folderfoto . basename($_FILES["fotoaset"]["name"]))) {
							echo "Sorry, file already exists.";
						} else {
							move_uploaded_file($_FILES["fotoaset"]["tmp_name"], "uploads/" . $folderfoto . "/" . $rand . '_' . $_FILES['fotoaset']['name']);
						}
					} else {
						header("location:index.php?alert=Ukuran File Maks .500 Kb");
					}
				}
				$this->session->set_flashdata('success', 'succes_save');


				// if ($this->input->post('save_type') == 'stay') {
				// 	$this->data['success'] = true;
				// 	$this->data['id'] 	   = $save_tb_master_aset;
				// 	$this->data['message'] = cclang('success_save_data_stay', [
				// 		admin_anchor('/tb_master_aset/edit/' . $save_tb_master_aset, 'Edit Tb Master Aset'),
				// 		admin_anchor('/tb_master_aset', ' Go back to list')
				// 	]);
				// } else {
				// 	set_message(
				// 		cclang('success_save_data_redirect', [
				// 			admin_anchor('/tb_master_aset/edit/' . $save_tb_master_aset, 'Edit Tb Master Aset')
				// 		]),
				// 		'success'
				// 	);

				// 	$this->data['success'] = true;
				// 	$this->data['redirect'] = admin_base_url('/tb_master_aset');
				// }
				redirect_back();
			} else {
				// if ($this->input->post('save_type') == 'stay') {
				// 	$this->data['success'] = false;
				// 	$this->data['message'] = cclang('data_not_change');
				// } else {
				// 	$this->data['success'] = false;
				// 	$this->data['message'] = cclang('data_not_change');
				// 	$this->data['redirect'] = admin_base_url('/tb_master_aset');
				// }
				$this->session->set_flashdata('failsave', 'cannot save data');
			}
		} else {

			$this->session->set_flashdata('err_val', 'error_validasi');
			// $this->data['success'] = false;
			// $this->data['message'] = 'Opss validation failed';
			// $this->data['errors'] = $this->form_validation->error_array();
		}
	}

	/**
	 * Update view Tb Master Asets
	 *
	 * @var $id String
	 */
	public function edit($id)
	{
		$this->is_allowed('tb_master_aset_update');

		$this->data['tb_master_aset'] = $this->model_tb_master_aset->find($id);

		$this->template->title('Tb Master Aset Update');
		$this->render('backend/standart/administrator/tb_master_aset/tb_master_aset_update', $this->data);
	}

	/**
	 * Update Tb Master Asets
	 *
	 * @var $id String
	 */
	public function edit_save($id)
	{
		if (!$this->is_allowed('tb_master_aset_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}
		$this->form_validation->set_rules('kode_tid', 'Kode Tid', 'trim|required');


		$this->form_validation->set_rules('kode_aset', 'Kode Aset', 'trim|required|max_length[50]');


		$this->form_validation->set_rules('nup', 'Nup', 'trim|required|max_length[50]');


		$this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');


		$this->form_validation->set_rules('merk', 'Merk', 'trim|required|max_length[50]');


		$this->form_validation->set_rules('tipe', 'Tipe', 'trim|required|max_length[50]');


		$this->form_validation->set_rules('id_kondisi', 'Id Kondisi', 'trim|required');


		$this->form_validation->set_rules('status', 'Status', 'trim|required');


		$this->form_validation->set_rules('tipe_moving', 'Tipe Moving', 'trim|required');


		$this->form_validation->set_rules('nama_aset', 'Nama Aset', 'trim|required|max_length[100]');


		$this->form_validation->set_rules('id_area', 'Id Area', 'trim|required');


		$this->form_validation->set_rules('id_gedung', 'Id Gedung', 'trim|required');


		$this->form_validation->set_rules('id_ruangan', 'Id Ruangan', 'trim|required');


		$this->form_validation->set_rules('tgl_perolehan', 'Tgl Perolehan', 'trim|required');


		$this->form_validation->set_rules('tgl_inventarisasi', 'Tgl Inventarisasi', 'trim|required');


		$this->form_validation->set_rules('flag_inventarisasi', 'Flag Inventarisasi', 'trim|required');


		$this->form_validation->set_rules('tgl_peminjaman', 'Tgl Peminjaman', 'trim|required');


		$this->form_validation->set_rules('tgl_pengembalian', 'Tgl Pengembalian', 'trim|required');


		$this->form_validation->set_rules('tgl_mutasi', 'Tgl Mutasi', 'trim|required');


		$this->form_validation->set_rules('id_lokasi_moving', 'Id Lokasi Moving', 'trim|required');


		$this->form_validation->set_rules('id_pegawai', 'Id Pegawai', 'trim|required');



		if ($this->form_validation->run()) {

			$save_data = [
				'kode_tid' => $this->input->post('kode_tid'),
				'kode_aset' => $this->input->post('kode_aset'),
				'nup' => $this->input->post('nup'),
				'kategori' => $this->input->post('kategori'),
				'merk' => $this->input->post('merk'),
				'tipe' => $this->input->post('tipe'),
				'id_kondisi' => $this->input->post('id_kondisi'),
				'status' => $this->input->post('status'),
				'tipe_moving' => $this->input->post('tipe_moving'),
				'nama_aset' => $this->input->post('nama_aset'),
				'id_area' => $this->input->post('id_area'),
				'id_gedung' => $this->input->post('id_gedung'),
				'id_ruangan' => $this->input->post('id_ruangan'),
				'tgl_perolehan' => $this->input->post('tgl_perolehan'),
				'tgl_inventarisasi' => $this->input->post('tgl_inventarisasi'),
				'flag_inventarisasi' => $this->input->post('flag_inventarisasi'),
				'tgl_peminjaman' => $this->input->post('tgl_peminjaman'),
				'tgl_pengembalian' => $this->input->post('tgl_pengembalian'),
				'tgl_mutasi' => $this->input->post('tgl_mutasi'),
				'id_lokasi_moving' => $this->input->post('id_lokasi_moving'),
				'id_pegawai' => $this->input->post('id_pegawai'),
			];








			$save_tb_master_aset = $this->model_tb_master_aset->change($id, $save_data);

			if ($save_tb_master_aset) {





				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						admin_anchor('/tb_master_aset', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', []),
						'success'
					);

					$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/tb_master_aset');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/tb_master_aset');
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
	 * delete Tb Master Asets
	 *
	 * @var $id String
	 */
	public function delete($id = null)
	{
		$this->is_allowed('tb_master_aset_delete');

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
					"message" => cclang('has_been_deleted', 'tb_master_aset')
				]);
			} else {
				$this->response([
					"success" => true,
					"message" => cclang('error_delete', 'tb_master_aset')
				]);
			}
		} else {
			if ($remove) {
				set_message(cclang('has_been_deleted', 'tb_master_aset'), 'success');
			} else {
				set_message(cclang('error_delete', 'tb_master_aset'), 'error');
			}
			redirect_back();
		}
	}

	/**
	 * View view Tb Master Asets
	 *
	 * @var $id String
	 */
	public function view($id)
	{
		$this->is_allowed('tb_master_aset_view');

		$this->data['tb_master_aset'] = $this->model_tb_master_aset->get_detail_aset($id);

		$length = sizeof($this->data['tb_master_aset']);
		if ($length == 0) {
			$this->session->set_flashdata('nulldata', 'data kosong');
		} else {
			$kode = json_encode($this->data['tb_master_aset'][0]->kode_tid);
			$this->data['history'] = $this->model_tb_master_aset->get_history(str_replace('"', '', $kode));
			$this->data['transaksi'] = [];
		}

		$this->template->title('Tb Master Aset Detail');
		$this->render('backend/standart/administrator/tb_master_aset/tb_master_aset_view', $this->data);
	}

	/**
	 * delete Tb Master Asets
	 *
	 * @var $id String
	 */
	private function _remove($id)
	{
		$tb_master_aset = $this->model_tb_master_aset->find($id);



		return $this->model_tb_master_aset->remove($id);
	}


	/**
	 * Export to excel
	 *
	 * @return Files Excel .xls
	 */
	public function export()
	{
		$this->is_allowed('tb_master_aset_export');

		$this->model_tb_master_aset->export(
			'tb_master_aset',
			'tb_master_aset',
			$this->model_tb_master_aset->field_search
		);
	}

	/**
	 * Export to PDF
	 *
	 * @return Files PDF .pdf
	 */
	public function export_pdf()
	{
		$this->is_allowed('tb_master_aset_export');

		$this->model_tb_master_aset->pdf('tb_master_aset', 'tb_master_aset');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('tb_master_aset_export');

		$table = $title = 'tb_master_aset';
		$this->load->library('HtmlPdf');

		$config = array(
			'orientation' => 'p',
			'format' => 'a4',
			'marges' => array(5, 5, 5, 5)
		);

		$this->pdf = new HtmlPdf($config);
		$this->pdf->setDefaultFont('stsongstdlight');

		$result = $this->db->get($table);

		$data = $this->model_tb_master_aset->find($id);
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


/* End of file tb_master_aset.php */
/* Location: ./application/controllers/administrator/Tb Master Aset.php */