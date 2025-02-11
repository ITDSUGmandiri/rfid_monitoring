<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *| --------------------------------------------------------------------------
 *| Tb Gedung Master Controller
 *| --------------------------------------------------------------------------
 *| Tb Gedung Master site
 *|
 */
class tb_master_gedung extends Admin
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tb_gedung_master');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	 * show all Tb Gedung Masters
	 *
	 * @var $offset String
	 */
	public function index($offset = 0)
	{
		$this->is_allowed('tb_gedung_master_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');




		$this->data['tb_gedung_masters'] = $this->model_tb_gedung_master->get($filter, $field, $this->limit_page, $offset);
		$this->data['tb_gedung_master_counts'] = $this->model_tb_gedung_master->count_all($filter, $field);

		$config = [
			'base_url'     => ADMIN_NAMESPACE_URL  . '/tb_gedung_master/index/',
			'total_rows'   => $this->data['tb_gedung_master_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->data['tables'] = $this->load->view('backend/standart/administrator/tb_gedung_master/tb_gedung_master_data_table', $this->data, true);

		if ($this->input->get('ajax')) {
			$this->response([
				'tables' => $this->data['tables'],
				'pagination' => $this->data['pagination'],
				'total_row' => $this->data['tb_gedung_master_counts']
			]);
		}

		$this->template->title('Tb Gedung Master List');
		$this->render('backend/standart/administrator/tb_gedung_master/tb_gedung_master_list', $this->data);
	}

	/**
	 * Add new tb_gedung_masters
	 *
	 */
	public function add()
	{
		$this->is_allowed('tb_gedung_master_add');

		$this->template->title('Tb Gedung Master New');
		$this->render('backend/standart/administrator/tb_gedung_master/tb_gedung_master_add', $this->data);
	}

	/**
	 * Add New Tb Gedung Masters
	 *
	 * @return JSON
	 */
	public function add_save()
	{
		if (!$this->is_allowed('tb_gedung_master_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}


		$this->form_validation->set_rules('area_id', 'Area', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('ketgedung', 'Gedung', 'trim|required|max_length[130]');
		$this->form_validation->set_rules('gedung', 'Keterangan', 'trim|required|max_length[130]');


		$rand = rand();
		$ekstensi =  array('png', 'jpg', 'jpeg');
		$filename = $_FILES['fotogedung']['name'];
		$ukuran = $_FILES['fotogedung']['size'];
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		$folderfoto = 'Gedung';


		if ($this->form_validation->run()) {

			$save_data = [
				'id_area' => $this->input->post('area_id'),
				'gedung' => $this->input->post('gedung'),
				'ket_gedung' => $this->input->post('ketgedung'),
				'image_uri' => $rand . '_' . $_FILES['fotogedung']['name'],
			];


			$save_tb_area_master = $this->model_tb_gedung_master->store($save_data);

			if ($save_tb_area_master) {
				if (!in_array($ext, $ekstensi)) {
					header("location:index.php?alert=gagal_ekstensi");
				} else {
					if (!file_exists('uploads/' . $folderfoto)) {
						mkdir('uploads/' . $folderfoto, 0777, true);
					}
					if ($ukuran < 500000) {
						if (file_exists('uploads/' . $folderfoto . basename($_FILES["fotogedung"]["name"]))) {
							echo "Sorry, file already exists.";
						} else {
							move_uploaded_file($_FILES["fotogedung"]["tmp_name"], "uploads/" . $folderfoto . "/" . $rand . '_' . $_FILES['fotogedung']['name']);
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
		}
	}

	/**
	 * Update view Tb Gedung Masters
	 *
	 * @var $id String
	 */
	public function edit($id)
	{
		$this->is_allowed('tb_gedung_master_update');

		$this->data['tb_master_gedung'] = $this->model_tb_gedung_master->get_detail_gedung($id);


		$this->template->title('Tb Gedung Master Update');
		$this->render('backend/standart/administrator/tb_gedung_master/tb_gedung_master_update', $this->data);
	}

	/**
	 * Update Tb Gedung Masters
	 *
	 * @var $id String
	 */
	public function edit_save($id)
	{
		if (!$this->is_allowed('tb_area_master_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}
		$this->form_validation->set_rules('area', 'Area', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('gedung', 'Gedung', 'trim|required|max_length[130]');
		$this->form_validation->set_rules('ket_gedung', 'Keterangan', 'trim|required|max_length[130]');


		$rand = rand();
		$ekstensi =  array('png', 'jpg', 'jpeg');
		$filename = $_FILES['fotogedung']['name'];
		$ukuran = $_FILES['fotogedung']['size'];
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		$folderfoto = 'Gedung';


		if ($this->form_validation->run()) {

			$save_data = [
				'id_area' => $this->input->post('area'),
				'gedung' => $this->input->post('gedung'),
				'ket_gedung' => $this->input->post('ket_gedung'),
				'image_uri' => $rand . '_' . $_FILES['fotogedung']['name'],
			];


			$save_tb_area_master = $this->model_tb_gedung_master->update_gedung($id, $save_data);

			if ($save_tb_area_master) {
				if (!in_array($ext, $ekstensi)) {
					header("location:index.php?alert=gagal_ekstensi");
				} else {
					if (!file_exists('uploads/' . $folderfoto)) {
						mkdir('uploads/' . $folderfoto, 0777, true);
					}
					if ($ukuran < 500000) {
						if (file_exists('uploads/' . $folderfoto . basename($_FILES["fotogedung"]["name"]))) {
							echo "Sorry, file already exists.";
						} else {
							move_uploaded_file($_FILES["fotogedung"]["tmp_name"], "uploads/" . $folderfoto . "/" . $rand . '_' . $_FILES['fotogedung']['name']);
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
		}

		// $this->response($this->data);
	}

	/**
	 * delete Tb Gedung Masters
	 *
	 * @var $id String
	 */
	public function delete($id = null)
	{
		$this->is_allowed('tb_gedung_master_delete');

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
					"message" => cclang('has_been_deleted', 'tb_gedung_master')
				]);
			} else {
				$this->response([
					"success" => true,
					"message" => cclang('error_delete', 'tb_gedung_master')
				]);
			}
		} else {
			if ($remove) {
				set_message(cclang('has_been_deleted', 'tb_gedung_master'), 'success');
			} else {
				set_message(cclang('error_delete', 'tb_gedung_master'), 'error');
			}
			redirect_back();
		}
	}

	/**
	 * View view Tb Gedung Masters
	 *
	 * @var $id String
	 */
	public function view($id)
	{
		$this->is_allowed('tb_gedung_master_view');

		$this->data['tb_master_gedung'] = $this->model_tb_gedung_master->get_detail_gedung($id);

		$length = sizeof($this->data['tb_master_gedung']);
		if ($length == 0) {
			$this->session->set_flashdata('nulldata', 'data kosong');
		}

		$this->template->title('Tb Gedung Master Detail');
		$this->render('backend/standart/administrator/tb_gedung_master/tb_gedung_master_view', $this->data);
	}

	/**
	 * delete Tb Gedung Masters
	 *
	 * @var $id String
	 */
	private function _remove($id)
	{
		$tb_gedung_master = $this->model_tb_gedung_master->find($id);



		return $this->model_tb_gedung_master->remove($id);
	}


	/**
	 * Export to excel
	 *
	 * @return Files Excel .xls
	 */
	public function export()
	{
		$this->is_allowed('tb_gedung_master_export');

		$this->model_tb_gedung_master->export(
			'tb_gedung_master',
			'tb_gedung_master',
			$this->model_tb_gedung_master->field_search
		);
	}

	/**
	 * Export to PDF
	 *
	 * @return Files PDF .pdf
	 */
	public function export_pdf()
	{
		$this->is_allowed('tb_gedung_master_export');

		$this->model_tb_gedung_master->pdf('tb_gedung_master', 'tb_gedung_master');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('tb_gedung_master_export');

		$table = $title = 'tb_gedung_master';
		$this->load->library('HtmlPdf');

		$config = array(
			'orientation' => 'p',
			'format' => 'a4',
			'marges' => array(5, 5, 5, 5)
		);

		$this->pdf = new HtmlPdf($config);
		$this->pdf->setDefaultFont('stsongstdlight');

		$result = $this->db->get($table);

		$data = $this->model_tb_gedung_master->find($id);
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


/* End of file tb_gedung_master.php */
/* Location: ./application/controllers/administrator/Tb Gedung Master.php */