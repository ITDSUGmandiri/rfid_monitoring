<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *| --------------------------------------------------------------------------
 *| Email Template Controller
 *| --------------------------------------------------------------------------
 *| Email Template site
 *|
 */
class Email_template extends Admin
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_email_template');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	 * show all Email Templates
	 *
	 * @var $offset String
	 */
	public function index($offset = 0)
	{
		$this->is_allowed('email_template_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['email_templates'] = $this->model_email_template->get($filter, $field, $this->limit_page, $offset);
		$this->data['email_template_counts'] = $this->model_email_template->count_all($filter, $field);

		$config = [
			'base_url'     => ADMIN_NAMESPACE_URL  . '/email_template/index/',
			'total_rows'   => $this->data['email_template_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Email Template List');
		$this->render('backend/standart/administrator/email_template/email_template_list', $this->data);
	}

	/**
	 * Add new email_templates
	 *
	 */
	public function add()
	{
		$this->is_allowed('email_template_add');

		$this->template->title('Email Template New');
		$this->render('backend/standart/administrator/email_template/email_template_add', $this->data);
	}

	/**
	 * Add New Email Templates
	 *
	 * @return JSON
	 */
	public function add_save()
	{
		if (!$this->is_allowed('email_template_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}





		$this->form_validation->set_rules('subject', 'Subject', 'trim|required');


		$this->form_validation->set_rules('body', 'Body', 'trim|required');




		if ($this->form_validation->run()) {

			$save_data = [
				'subject' => $this->input->post('subject'),
				'body' => $this->input->post('body'),
				'created_at' => date('Y-m-d H:i:s'),
			];



			$save_email_template = $this->model_email_template->store($save_data);


			if ($save_email_template) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_email_template;
					$this->data['message'] = cclang('success_save_data_stay', [
						admin_anchor('/email_template/edit/' . $save_email_template, 'Edit Email Template'),
						admin_anchor('/email_template', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
							admin_anchor('/email_template/edit/' . $save_email_template, 'Edit Email Template')
						]),
						'success'
					);

					$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/email_template');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/email_template');
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
	 * Update view Email Templates
	 *
	 * @var $id String
	 */
	public function edit($id)
	{
		$this->is_allowed('email_template_update');

		$this->data['email_template'] = $this->model_email_template->find($id);

		$this->template->title('Email Template Update');
		$this->render('backend/standart/administrator/email_template/email_template_update', $this->data);
	}

	/**
	 * Update Email Templates
	 *
	 * @var $id String
	 */
	public function edit_save($id)
	{
		if (!$this->is_allowed('email_template_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}
		$this->form_validation->set_rules('key', 'Key', 'trim|required|max_length[255]');


		$this->form_validation->set_rules('subject', 'Subject', 'trim|required');


		$this->form_validation->set_rules('body', 'Body', 'trim|required');



		if ($this->form_validation->run()) {

			$save_data = [
				'key' => $this->input->post('key'),
				'subject' => $this->input->post('subject'),
				'body' => $this->input->post('body'),
				'created_at' => date('Y-m-d H:i:s'),
			];




			$save_email_template = $this->model_email_template->change($id, $save_data);

			if ($save_email_template) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						admin_anchor('/email_template', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', []),
						'success'
					);

					$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/email_template');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/email_template');
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
	 * delete Email Templates
	 *
	 * @var $id String
	 */
	public function delete($id = null)
	{
		$this->is_allowed('email_template_delete');

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
			set_message(cclang('has_been_deleted', 'email_template'), 'success');
		} else {
			set_message(cclang('error_delete', 'email_template'), 'error');
		}

		redirect_back();
	}

	/**
	 * View view Email Templates
	 *
	 * @var $id String
	 */
	public function view($id)
	{
		$this->is_allowed('email_template_view');

		$this->data['email_template'] = $this->model_email_template->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Email Template Detail');
		$this->render('backend/standart/administrator/email_template/email_template_view', $this->data);
	}

	/**
	 * delete Email Templates
	 *
	 * @var $id String
	 */
	private function _remove($id)
	{
		$email_template = $this->model_email_template->find($id);



		return $this->model_email_template->remove($id);
	}


	/**
	 * Export to excel
	 *
	 * @return Files Excel .xls
	 */
	public function export()
	{
		$this->is_allowed('email_template_export');

		$this->model_email_template->export(
			'email_template',
			'email_template',
			$this->model_email_template->field_search
		);
	}

	/**
	 * Export to PDF
	 *
	 * @return Files PDF .pdf
	 */
	public function export_pdf()
	{
		$this->is_allowed('email_template_export');

		$this->model_email_template->pdf('email_template', 'email_template');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('email_template_export');

		$table = $title = 'email_template';
		$this->load->library('HtmlPdf');

		$config = array(
			'orientation' => 'p',
			'format' => 'a4',
			'marges' => array(5, 5, 5, 5)
		);

		$this->pdf = new HtmlPdf($config);
		$this->pdf->setDefaultFont('stsongstdlight');

		$result = $this->db->get($table);

		$data = $this->model_email_template->find($id);
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


/* End of file email_template.php */
/* Location: ./application/controllers/administrator/Email Template.php */