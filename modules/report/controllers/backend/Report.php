<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *| --------------------------------------------------------------------------
 *| Tag Reader Controller
 *| --------------------------------------------------------------------------
 *| Tag Reader site
 *|
 */
class Report extends Admin
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tag_reader');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	 * show all Tag Readers
	 *
	 * @var $offset String
	 */
	public function index($offset = 0)
	{

		// $this->is_allowed('tag_reader_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tag_readers'] = $this->model_tag_reader->get($filter, $field, $this->limit_page, $offset);
		$this->data['tag_reader_counts'] = $this->model_tag_reader->count_all($filter, $field);

		$config = [
			'base_url'     => ADMIN_NAMESPACE_URL  . '/tag_reader/index/',
			'total_rows'   => $this->data['tag_reader_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);



		$this->data['tables'] = $this->load->view('backend/standart/administrator/laporan/tag_reader_data_table', $this->data, true);

		if ($this->input->get('ajax')) {
			$this->response([
				'tables' => $this->data['tables'],
				'pagination' => $this->data['pagination'],
				'total_row' => $this->data['tag_reader_counts']
			]);
		}

		$this->template->title('Reader Info List');
		$this->render('backend/standart/administrator/laporan/tag_reader_list', $this->data);
	}


	public function ambildata()
	{


		$jl = $this->input->post('jenlap');
		$room = $this->input->post('room_id');
		$date = $this->input->post('detreng');


		$dates = explode(' - ', $date);
		$start_date = $dates[0]; // Tanggal mulai (start_date)
		$date = new DateTime($start_date);
		$tglawal = $date->format('Y-m-d');

		$end_date = $dates[1];
		$dates = new DateTime($end_date);
		$tglakhir = $dates->format('Y-m-d');

		$this->data['list_aset'] = array();

		$this->data['list_aset'] = $this->model_tag_reader->getDataLaporan($room, $tglawal, $tglakhir);
		$this->data['area'] = $this->model_tag_reader->get_detail_area($room);

		echo json_encode($this->data);
		exit();
	}

	public function ambiltransaksi()
	{


		// $jl = $this->input->post('jenlap');
		$tipe = $this->input->post('tipe');
		$date = $this->input->post('detreng');


		$dates = explode(' - ', $date);
		$start_date = $dates[0]; // Tanggal mulai (start_date)
		$date = new DateTime($start_date);
		$tglawal = $date->format('Y-m-d');

		$end_date = $dates[1];
		$dates = new DateTime($end_date);
		$tglakhir = $dates->format('Y-m-d');

		$this->data['transaksi'] = array();

		$this->data['transaksi'] = $this->model_tag_reader->getDataTransaksi($tipe, $tglawal, $tglakhir);

		echo json_encode($this->data);
		exit();
	}

	/**
	 * Add new tag_readers
	 *
	 */
	public function add()
	{
		$this->is_allowed('tag_reader_add');

		$this->template->title('Reader Info New');
		$this->render('backend/standart/administrator/tag_reader/tag_reader_add', $this->data);
	}

	/**
	 * Add New Tag Readers
	 *
	 * @return JSON
	 */
	public function add_save()
	{
		if (!$this->is_allowed('tag_reader_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}



		$this->form_validation->set_rules('room_id', 'Ruangan', 'trim|required');


		$this->form_validation->set_rules('reader_name', 'Nama Reader', 'trim|required|max_length[50]');


		$this->form_validation->set_rules('setfor', 'Posisi Untuk IN/OUT?', 'trim|required');


		$this->form_validation->set_rules('reader_serialnumber', 'Serial Number', 'trim|required|max_length[10]');


		$this->form_validation->set_rules('reader_type', 'Tipe', 'trim|required');


		$this->form_validation->set_rules('reader_ip', 'IP Address', 'trim|required|max_length[45]');


		$this->form_validation->set_rules('reader_port', 'Port', 'trim|required|max_length[7]');


		$this->form_validation->set_rules('reader_com', 'COM', 'trim|required');


		$this->form_validation->set_rules('reader_baudrate', 'Baudrate', 'trim|required');


		$this->form_validation->set_rules('reader_power', 'Power', 'trim|required');


		$this->form_validation->set_rules('reader_interval', 'Interval', 'trim|required');


		$this->form_validation->set_rules('reader_mode', 'Mode', 'trim|required');


		$this->form_validation->set_rules('reader_updatedby', 'Update By', 'trim|required');


		$this->form_validation->set_rules('reader_updated', 'Updated', 'trim|required');


		$this->form_validation->set_rules('reader_createdby', 'Created By', 'trim|required');


		$this->form_validation->set_rules('reader_created', 'Created', 'trim|required');


		$this->form_validation->set_rules('reader_family', 'Reader Series', 'trim|required');


		$this->form_validation->set_rules('reader_model', 'Model', 'trim|required|max_length[50]');


		$this->form_validation->set_rules('reader_identity', 'Reader Identity', 'trim|required|max_length[50]');


		$this->form_validation->set_rules('reader_antena', 'Antena', 'trim|required');








		if ($this->form_validation->run()) {

			$save_data = [
				'room_id' => $this->input->post('room_id'),
				'reader_name' => $this->input->post('reader_name'),
				'setfor' => $this->input->post('setfor'),
				'reader_serialnumber' => $this->input->post('reader_serialnumber'),
				'reader_type' => $this->input->post('reader_type'),
				'reader_ip' => $this->input->post('reader_ip'),
				'reader_port' => $this->input->post('reader_port'),
				'reader_com' => $this->input->post('reader_com'),
				'reader_baudrate' => $this->input->post('reader_baudrate'),
				'reader_power' => $this->input->post('reader_power'),
				'reader_interval' => $this->input->post('reader_interval'),
				'reader_mode' => $this->input->post('reader_mode'),
				'reader_updatedby' => $this->input->post('reader_updatedby'),
				'reader_updated' => $this->input->post('reader_updated'),
				'reader_createdby' => $this->input->post('reader_createdby'),
				'reader_created' => $this->input->post('reader_created'),
				'reader_family' => $this->input->post('reader_family'),
				'connecting' => $this->input->post('connecting'),
				'reader_model' => $this->input->post('reader_model'),
				'reader_identity' => $this->input->post('reader_identity'),
				'reader_antena' => $this->input->post('reader_antena'),
				'alias_antenna' => $this->input->post('alias_antenna'),
			];








			$save_tag_reader = $id = $this->model_tag_reader->store($save_data);


			if ($save_tag_reader) {




				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_tag_reader;
					$this->data['message'] = cclang('success_save_data_stay', [
						admin_anchor('/tag_reader/edit/' . $save_tag_reader, 'Edit Tag Reader'),
						admin_anchor('/tag_reader', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
							admin_anchor('/tag_reader/edit/' . $save_tag_reader, 'Edit Tag Reader')
						]),
						'success'
					);

					$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/tag_reader');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/tag_reader');
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
	 * Update view Tag Readers
	 *
	 * @var $id String
	 */
	public function edit($id)
	{
		$this->is_allowed('tag_reader_update');

		$this->data['tag_reader'] = $this->model_tag_reader->find($id);

		$this->template->title('Reader Info Update');
		$this->render('backend/standart/administrator/tag_reader/tag_reader_update', $this->data);
	}

	/**
	 * Update Tag Readers
	 *
	 * @var $id String
	 */
	public function edit_save($id)
	{
		if (!$this->is_allowed('tag_reader_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}
		$this->form_validation->set_rules('room_id', 'Ruangan', 'trim|required');


		$this->form_validation->set_rules('reader_name', 'Nama Reader', 'trim|required|max_length[50]');


		$this->form_validation->set_rules('setfor', 'Posisi Untuk IN/OUT?', 'trim|required');


		$this->form_validation->set_rules('reader_serialnumber', 'Serial Number', 'trim|required|max_length[10]');


		$this->form_validation->set_rules('reader_type', 'Tipe', 'trim|required');


		$this->form_validation->set_rules('reader_ip', 'IP Address', 'trim|required|max_length[45]');


		$this->form_validation->set_rules('reader_port', 'Port', 'trim|required|max_length[7]');


		$this->form_validation->set_rules('reader_com', 'COM', 'trim|required');


		$this->form_validation->set_rules('reader_baudrate', 'Baudrate', 'trim|required');


		$this->form_validation->set_rules('reader_power', 'Power', 'trim|required');


		$this->form_validation->set_rules('reader_interval', 'Interval', 'trim|required');


		$this->form_validation->set_rules('reader_mode', 'Mode', 'trim|required');


		$this->form_validation->set_rules('reader_updatedby', 'Update By', 'trim|required');


		$this->form_validation->set_rules('reader_updated', 'Updated', 'trim|required');


		$this->form_validation->set_rules('reader_createdby', 'Created By', 'trim|required');


		$this->form_validation->set_rules('reader_created', 'Created', 'trim|required');


		$this->form_validation->set_rules('reader_family', 'Reader Series', 'trim|required');


		$this->form_validation->set_rules('reader_model', 'Model', 'trim|required|max_length[50]');


		$this->form_validation->set_rules('reader_identity', 'Reader Identity', 'trim|required|max_length[50]');


		$this->form_validation->set_rules('reader_antena', 'Antena', 'trim|required');







		if ($this->form_validation->run()) {

			$save_data = [
				'room_id' => $this->input->post('room_id'),
				'reader_name' => $this->input->post('reader_name'),
				'setfor' => $this->input->post('setfor'),
				'reader_serialnumber' => $this->input->post('reader_serialnumber'),
				'reader_type' => $this->input->post('reader_type'),
				'reader_ip' => $this->input->post('reader_ip'),
				'reader_port' => $this->input->post('reader_port'),
				'reader_com' => $this->input->post('reader_com'),
				'reader_baudrate' => $this->input->post('reader_baudrate'),
				'reader_power' => $this->input->post('reader_power'),
				'reader_interval' => $this->input->post('reader_interval'),
				'reader_mode' => $this->input->post('reader_mode'),
				'reader_updatedby' => $this->input->post('reader_updatedby'),
				'reader_updated' => $this->input->post('reader_updated'),
				'reader_createdby' => $this->input->post('reader_createdby'),
				'reader_created' => $this->input->post('reader_created'),
				'reader_family' => $this->input->post('reader_family'),
				'connecting' => $this->input->post('connecting'),
				'reader_model' => $this->input->post('reader_model'),
				'reader_identity' => $this->input->post('reader_identity'),
				'reader_antena' => $this->input->post('reader_antena'),
				'alias_antenna' => $this->input->post('alias_antenna'),
			];








			$save_tag_reader = $this->model_tag_reader->change($id, $save_data);

			if ($save_tag_reader) {





				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						admin_anchor('/tag_reader', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', []),
						'success'
					);

					$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/tag_reader');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/tag_reader');
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
	 * delete Tag Readers
	 *
	 * @var $id String
	 */
	public function delete($id = null)
	{
		$this->is_allowed('tag_reader_delete');

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
					"message" => cclang('has_been_deleted', 'tag_reader')
				]);
			} else {
				$this->response([
					"success" => true,
					"message" => cclang('error_delete', 'tag_reader')
				]);
			}
		} else {
			if ($remove) {
				set_message(cclang('has_been_deleted', 'tag_reader'), 'success');
			} else {
				set_message(cclang('error_delete', 'tag_reader'), 'error');
			}
			redirect_back();
		}
	}

	/**
	 * View view Tag Readers
	 *
	 * @var $id String
	 */
	public function view($id)
	{
		$this->is_allowed('tag_reader_view');

		$this->data['tag_reader'] = $this->model_tag_reader->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Reader Info Detail');
		$this->render('backend/standart/administrator/tag_reader/tag_reader_view', $this->data);
	}

	/**
	 * delete Tag Readers
	 *
	 * @var $id String
	 */
	private function _remove($id)
	{
		$tag_reader = $this->model_tag_reader->find($id);



		return $this->model_tag_reader->remove($id);
	}


	/**
	 * Export to excel
	 *
	 * @return Files Excel .xls
	 */
	public function export()
	{
		$this->is_allowed('tag_reader_export');

		$this->model_tag_reader->export(
			'tag_reader',
			'tag_reader',
			$this->model_tag_reader->field_search
		);
	}

	/**
	 * Export to PDF
	 *
	 * @return Files PDF .pdf
	 */
	public function export_pdf()
	{
		$this->is_allowed('tag_reader_export');

		$this->model_tag_reader->pdf('tag_reader', 'tag_reader');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('tag_reader_export');

		$table = $title = 'tag_reader';
		$this->load->library('HtmlPdf');

		$config = array(
			'orientation' => 'p',
			'format' => 'a4',
			'marges' => array(5, 5, 5, 5)
		);

		$this->pdf = new HtmlPdf($config);
		$this->pdf->setDefaultFont('stsongstdlight');

		$result = $this->db->get($table);

		$data = $this->model_tag_reader->find($id);
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


/* End of file tag_reader.php */
/* Location: ./application/controllers/administrator/Tag Reader.php */