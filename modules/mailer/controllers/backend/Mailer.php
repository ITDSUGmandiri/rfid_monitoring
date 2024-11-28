<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *| --------------------------------------------------------------------------
 *| Mailer Controller
 *| --------------------------------------------------------------------------
 *| Mailer site
 *|
 */
class Mailer extends Admin
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_mailer');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	 * show all Mailers
	 *
	 * @var $offset String
	 */
	public function index($offset = 0)
	{
		$this->is_allowed('mailer_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['mailers'] = $this->model_mailer->get($filter, $field, $this->limit_page, $offset);
		$this->data['mailer_counts'] = $this->model_mailer->count_all($filter, $field);

		$config = [
			'base_url'     => ADMIN_NAMESPACE_URL  . '/mailer/index/',
			'total_rows'   => $this->data['mailer_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Mailer List');
		$this->render('backend/standart/administrator/mailer/mailer_list', $this->data);
	}

	/**
	 * Add new mailers
	 *
	 */
	public function add()
	{
		$this->is_allowed('mailer_add');

		$this->template->title('Mailer New');
		$this->render('backend/standart/administrator/mailer/mailer_add', $this->data);
	}

	/**
	 * Add New Mailers
	 *
	 * @return JSON
	 */
	public function add_save()
	{
		if (!$this->is_allowed('mailer_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}



		$this->form_validation->set_rules('email_id', 'Email Id', 'trim|required|max_length[11]');


		$this->form_validation->set_rules('mail_to', 'Mail To', 'trim|required|max_length[255]');


		$this->form_validation->set_rules('status', 'Status', 'trim|required');




		if ($this->form_validation->run()) {

			$save_data = [
				'email_id' => $this->input->post('email_id'),
				'mail_to' => $this->input->post('mail_to'),
				'status' => $this->input->post('status'),
				'created_at' => date('Y-m-d H:i:s'),
			];



			$save_mailer = $this->model_mailer->store($save_data);


			if ($save_mailer) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_mailer;
					$this->data['message'] = cclang('success_save_data_stay', [
						admin_anchor('/mailer/edit/' . $save_mailer, 'Edit Mailer'),
						admin_anchor('/mailer', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
							admin_anchor('/mailer/edit/' . $save_mailer, 'Edit Mailer')
						]),
						'success'
					);

					$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/mailer');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/mailer');
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
	 * Update view Mailers
	 *
	 * @var $id String
	 */
	public function edit($id)
	{
		$this->is_allowed('mailer_update');

		$this->data['mailer'] = $this->model_mailer->find($id);

		$this->template->title('Mailer Update');
		$this->render('backend/standart/administrator/mailer/mailer_update', $this->data);
	}

	/**
	 * Update Mailers
	 *
	 * @var $id String
	 */
	public function edit_save($id)
	{
		if (!$this->is_allowed('mailer_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}
		$this->form_validation->set_rules('email_id', 'Email Id', 'trim|required|max_length[11]');


		$this->form_validation->set_rules('mail_to', 'Mail To', 'trim|required|max_length[255]');


		$this->form_validation->set_rules('status', 'Status', 'trim|required');



		if ($this->form_validation->run()) {

			$save_data = [
				'email_id' => $this->input->post('email_id'),
				'mail_to' => $this->input->post('mail_to'),
				'status' => $this->input->post('status'),
				'created_at' => date('Y-m-d H:i:s'),
			];




			$save_mailer = $this->model_mailer->change($id, $save_data);

			if ($save_mailer) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						admin_anchor('/mailer', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', []),
						'success'
					);

					$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/mailer');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/mailer');
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
	 * delete Mailers
	 *
	 * @var $id String
	 */
	public function delete($id = null)
	{
		$this->is_allowed('mailer_delete');

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

		if ($remove) {
			set_message(cclang('has_been_deleted', 'mailer'), 'success');
		} else {
			set_message(cclang('error_delete', 'mailer'), 'error');
		}

		redirect_back();
	}

	/**
	 * View view Mailers
	 *
	 * @var $id String
	 */
	public function view($id)
	{
		$this->is_allowed('mailer_view');

		$this->data['mailer'] = $this->model_mailer->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Mailer Detail');
		$this->render('backend/standart/administrator/mailer/mailer_view', $this->data);
	}

	/**
	 * delete Mailers
	 *
	 * @var $id String
	 */
	private function _remove($id)
	{
		$mailer = $this->model_mailer->find($id);



		return $this->model_mailer->remove($id);
	}


	/**
	 * Export to excel
	 *
	 * @return Files Excel .xls
	 */
	public function export()
	{
		$this->is_allowed('mailer_export');

		$this->model_mailer->export(
			'mailer',
			'mailer',
			$this->model_mailer->field_search
		);
	}

	/**
	 * Export to PDF
	 *
	 * @return Files PDF .pdf
	 */
	public function export_pdf()
	{
		$this->is_allowed('mailer_export');

		$this->model_mailer->pdf('mailer', 'mailer');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('mailer_export');

		$table = $title = 'mailer';
		$this->load->library('HtmlPdf');

		$config = array(
			'orientation' => 'p',
			'format' => 'a4',
			'marges' => array(5, 5, 5, 5)
		);

		$this->pdf = new HtmlPdf($config);
		$this->pdf->setDefaultFont('stsongstdlight');

		$result = $this->db->get($table);

		$data = $this->model_mailer->find($id);
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


/* End of file mailer.php */
/* Location: ./application/controllers/administrator/Mailer.php */