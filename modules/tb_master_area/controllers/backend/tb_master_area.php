<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *| --------------------------------------------------------------------------
 *| Tb Area Master Controller
 *| --------------------------------------------------------------------------
 *| Tb Area Master site
 *|
 */
class tb_master_area extends Admin
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tb_area_master');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	 * show all Tb Area Masters
	 *
	 * @var $offset String
	 */
	public function index($offset = 0)
	{
		$this->is_allowed('tb_area_master_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tb_master_areas'] = $this->model_tb_area_master->get($filter, $field, $this->limit_page, $offset);
		$this->data['tb_area_master_counts'] = $this->model_tb_area_master->count_all($filter, $field);

		$config = [
			'base_url'     => ADMIN_NAMESPACE_URL  . '/tb_area_master/index/',
			'total_rows'   => $this->data['tb_area_master_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->data['tables'] = $this->load->view('backend/standart/administrator/tb_area_master/tb_area_master_data_table', $this->data, true);

		if ($this->input->get('ajax')) {
			$this->response([
				'tables' => $this->data['tables'],
				'pagination' => $this->data['pagination'],
				'total_row' => $this->data['tb_area_master_counts']
			]);
		}

		$this->template->title('Tb Area Master List');
		$this->render('backend/standart/administrator/tb_area_master/tb_area_master_list', $this->data);
	}

	/**
	 * Add new tb_area_masters
	 *
	 */
	public function add()
	{
		$this->is_allowed('tb_area_master_add');

		$this->template->title('Tambah Data Area');
		$this->render('backend/standart/administrator/tb_area_master/tb_area_master_add', $this->data);
	}

	/**
	 * Add New Tb Area Masters
	 *
	 * @return JSON
	 */
	public function add_save()
	{
		if (!$this->is_allowed('tb_area_master_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}



		$this->form_validation->set_rules('area', 'Area', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('ket_area', 'Keterangan', 'trim|required|max_length[130]');
		// $this->form_validation->set_rules('image_uri', 'Foto Area', 'trim|required|max_length[200]');

		$rand = rand();
		$ekstensi =  array('png', 'jpg', 'jpeg');
		$filename = $_FILES['fotoarea']['name'];
		$ukuran = $_FILES['fotoarea']['size'];
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		$folderfoto = 'Area';



		if ($this->form_validation->run()) {

			$save_data = [
				'area' => $this->input->post('area'),
				'ket_area' => $this->input->post('ket_area'),
				'image_uri' => $rand . '_' . $_FILES['fotoarea']['name'],
			];

			$save_tb_area_master = $id = $this->model_tb_area_master->store($save_data);


			if ($save_tb_area_master) {

				if (!in_array($ext, $ekstensi)) {
					header("location:index.php?alert=gagal_ekstensi");
				} else {
					if (!file_exists('uploads/' . $folderfoto)) {
						mkdir('uploads/' . $folderfoto, 0777, true);
					}
					if ($ukuran < 500000) {
						if (file_exists('uploads/' . $folderfoto . basename($_FILES["fotoarea"]["name"]))) {
							echo "Sorry, file already exists.";
						} else {
							move_uploaded_file($_FILES["fotoarea"]["tmp_name"], "uploads/" . $folderfoto . "/" . $rand . '_' . $_FILES['fotoarea']['name']);
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
	 * Update view Tb Area Masters
	 *
	 * @var $id String
	 */
	public function edit($id)
	{
		$this->is_allowed('tb_area_master_update');

		$this->data['tb_area_master'] = $this->model_tb_area_master->find($id);

		$this->template->title('Tb Area Master Update');
		$this->render('backend/standart/administrator/tb_area_master/tb_area_master_update', $this->data);
	}

	/**
	 * Update Tb Area Masters
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


		$this->form_validation->set_rules('ket_area', 'Keterangan', 'trim|required|max_length[130]');

		$rand = rand();
		$ekstensi =  array('png', 'jpg', 'jpeg');
		$filename = $_FILES['fotoarea']['name'];
		$ukuran = $_FILES['fotoarea']['size'];
		$ext = pathinfo($filename, PATHINFO_EXTENSION);
		$folderfoto = 'Area';


		if ($this->form_validation->run()) {

			$save_data = [
				'area' => $this->input->post('area'),
				'ket_area' => $this->input->post('ket_area'),
				'image_uri' => $rand . '_' . $_FILES['fotoarea']['name'],
			];


			$save_tb_area_master = $this->model_tb_area_master->update_area($id, $save_data);

			if ($save_tb_area_master) {
				if (!in_array($ext, $ekstensi)) {
					header("location:index.php?alert=gagal_ekstensi");
				} else {
					if (!file_exists('uploads/' . $folderfoto)) {
						mkdir('uploads/' . $folderfoto, 0777, true);
					}
					if ($ukuran < 500000) {
						if (file_exists('uploads/' . $folderfoto . basename($_FILES["fotoarea"]["name"]))) {
							echo "Sorry, file already exists.";
						} else {
							move_uploaded_file($_FILES["fotoarea"]["tmp_name"], "uploads/" . $folderfoto . "/" . $rand . '_' . $_FILES['fotoarea']['name']);
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
	 * delete Tb Area Masters
	 *
	 * @var $id String
	 */
	public function delete($id = null)
	{
		$this->is_allowed('tb_area_master_delete');

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
					"message" => cclang('has_been_deleted', 'tb_area_master')
				]);
			} else {
				$this->response([
					"success" => true,
					"message" => cclang('error_delete', 'tb_area_master')
				]);
			}
		} else {
			if ($remove) {
				set_message(cclang('has_been_deleted', 'tb_area_master'), 'success');
			} else {
				set_message(cclang('error_delete', 'tb_area_master'), 'error');
			}
			redirect_back();
		}
	}

	/**
	 * View view Tb Area Masters
	 *
	 * @var $id String
	 */
	public function view($id)
	{
		$this->is_allowed('tb_area_master_view');

		$this->data['tb_master_area'] = $this->model_tb_area_master->get_detail_area($id);

		$length = sizeof($this->data['tb_master_area']);
		if ($length == 0) {
			$this->session->set_flashdata('nulldata', 'data kosong');
		}

		$this->template->title('Detail Area');
		$this->render('backend/standart/administrator/tb_area_master/tb_area_master_view', $this->data);
	}

	/**
	 * delete Tb Area Masters
	 *
	 * @var $id String
	 */
	private function _remove($id)
	{
		$tb_area_master = $this->model_tb_area_master->find($id);



		return $this->model_tb_area_master->remove($id);
	}


	/**
	 * Export to excel
	 *
	 * @return Files Excel .xls
	 */
	public function export()
	{
		$this->is_allowed('tb_area_master_export');

		$this->model_tb_area_master->export(
			'tb_area_master',
			'tb_area_master',
			$this->model_tb_area_master->field_search
		);
	}

	/**
	 * Export to PDF
	 *
	 * @return Files PDF .pdf
	 */
	public function export_pdf()
	{
		$this->is_allowed('tb_area_master_export');

		$this->model_tb_area_master->pdf('tb_area_master', 'tb_area_master');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('tb_area_master_export');

		$table = $title = 'tb_area_master';
		$this->load->library('HtmlPdf');

		$config = array(
			'orientation' => 'p',
			'format' => 'a4',
			'marges' => array(5, 5, 5, 5)
		);

		$this->pdf = new HtmlPdf($config);
		$this->pdf->setDefaultFont('stsongstdlight');

		$result = $this->db->get($table);

		$data = $this->model_tb_area_master->find($id);
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


/* End of file tb_area_master.php */
/* Location: ./application/controllers/administrator/Tb Area Master.php */