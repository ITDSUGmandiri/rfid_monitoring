<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *| --------------------------------------------------------------------------
 *| Email Controller
 *| --------------------------------------------------------------------------
 *| Email site
 *|
 */
class Email extends Admin
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_email');
		$this->load->model('group/model_group');
		$this->load->model('mailer/model_mailer');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	 * show all Emails
	 *
	 * @var $offset String
	 */
	public function index($offset = 0)
	{


		$this->is_allowed('email_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['emails'] = $this->model_email->get($filter, $field, $this->limit_page, $offset);
		$this->data['email_counts'] = $this->model_email->count_all($filter, $field);

		$config = [
			'base_url'     => ADMIN_NAMESPACE_URL  . '/email/index/',
			'total_rows'   => $this->data['email_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Email List');
		$this->render('backend/standart/administrator/email/email_list', $this->data);
	}

	/**
	 * Add new emails
	 *
	 */
	public function add()
	{
		$this->is_allowed('email_add');



		$this->template->title('Email New');
		$this->render('backend/standart/administrator/email/email_add', $this->data);
	}

	/**
	 * Add New Emails
	 *
	 * @return JSON
	 */
	public function add_save()
	{
		if (!$this->is_allowed('email_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}


		$this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('message', 'Message', 'trim|required');
		$this->form_validation->set_rules('receipent', 'Receipent', 'trim|max_length[11]');

		if ($this->form_validation->run()) {

			$save_data = [
				'title' => $this->input->post('title'),
				'message' => $this->input->post('message'),
				'receipent' => '',
				'users' => implode(',', (array)$this->input->post('users')),
				'key' => $this->input->post('key'),
				'created_at' => date('Y-m-d H:i:s'),
			];


			$save_email = $this->model_email->store($save_data);

			if ($save_email) {
				foreach ($this->input->post('users') as $email) {
					$this->model_mailer->store([
						'email_id' => $save_email,
						'mail_to' => $email,
						'status' => 'pending',
						'created_at' => now(),
					]);
				}

				if (isset($users)) {

					foreach ($users as $user) {
						$this->model_mailer->store([
							'email_id' => $save_email,
							'mail_to' => $user->email,
							'status' => 'pending',
							'created_at' => now(),
						]);
					}
				}

				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_email;
					$this->data['message'] = cclang('success_save_data_stay', [
						admin_anchor('/email/edit/' . $save_email, 'Edit Email'),
						admin_anchor('/email', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
							admin_anchor('/email/edit/' . $save_email, 'Edit Email')
						]),
						'success'
					);

					$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/email');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/email');
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
	 * Update view Emails
	 *
	 * @var $id String
	 */
	public function edit($id)
	{
		$this->is_allowed('email_update');

		$this->data['email'] = $this->model_email->find($id);

		$this->template->title('Email Update');
		$this->render('backend/standart/administrator/email/email_update', $this->data);
	}

	/**
	 * Update Emails
	 *
	 * @var $id String
	 */
	public function edit_save($id)
	{
		if (!$this->is_allowed('email_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}
		$this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('message', 'Message', 'trim|required');

		if ($this->form_validation->run()) {
			$save_data = [
				'title' => $this->input->post('title'),
				'message' => $this->input->post('message'),
				'receipent' => $this->input->post('receipent'),
				'users' => implode(',', (array)$this->input->post('users')),
				'key' => $this->input->post('key'),
				'created_at' => date('Y-m-d H:i:s'),
			];

			$save_email = $this->model_email->change($id, $save_data);

			if ($save_email) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						admin_anchor('/email', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', []),
						'success'
					);

					$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/email');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/email');
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
	 * delete Emails
	 *
	 * @var $id String
	 */
	public function delete($id = null)
	{
		$this->is_allowed('email_delete');

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
			set_message(cclang('has_been_deleted', 'email'), 'success');
		} else {
			set_message(cclang('error_delete', 'email'), 'error');
		}

		redirect_back();
	}

	/**
	 * duplicate Emails
	 *
	 * @var $id String
	 */
	public function duplicate($id = null)
	{
		$this->is_allowed('email_update');


		$duplicate = $this->model_email->find($id);

		unset($duplicate->id);

		$store = $this->model_email->store((array) $duplicate);

		if ($store) {
			set_message(cclang('has_been_deleted', 'email'), 'success');
		} else {
			set_message(cclang('error_delete', 'email'), 'error');
		}

		redirect_back();
	}

	/**
	 * duplicate Emails
	 *
	 * @var $id String
	 */
	public function resend($id = null)
	{
		$this->is_allowed('email_update');


		$email = $this->model_email->find($id);

		foreach (explode(',', $email->users) as $to) {

			if ($to) {

				$this->model_mailer->store([
					'email_id' => $email->id,
					'mail_to' => $to,
					'status' => 'pending',
					'created_at' => now(),
				]);
			}
		}

		if (isset($users)) {

			foreach ($users as $user) {
				$this->model_mailer->store([
					'email_id' => $email->id,
					'mail_to' => $user->email,
					'status' => 'pending',
					'created_at' => now(),
				]);
			}
		}

		set_message(cclang('resend_email'), 'success');

		redirect_back();
	}

	/**
	 * View view Emails
	 *
	 * @var $id String
	 */
	public function view($id)
	{
		$this->is_allowed('email_view');

		$this->data['email'] = $this->model_email->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Email Detail');
		$this->render('backend/standart/administrator/email/email_view', $this->data);
	}

	/**
	 * delete Emails
	 *
	 * @var $id String
	 */
	private function _remove($id)
	{
		$email = $this->model_email->find($id);

		return $this->model_email->remove($id);
	}


	/**
	 * Export to excel
	 *
	 * @return Files Excel .xls
	 */
	public function export()
	{
		$this->is_allowed('email_export');

		$this->model_email->export(
			'email',
			'email',
			$this->model_email->field_search
		);
	}

	/**
	 * Export to PDF
	 *
	 * @return Files PDF .pdf
	 */
	public function export_pdf()
	{
		$this->is_allowed('email_export');

		$this->model_email->pdf('email', 'email');
	}
}


/* End of file email.php */
/* Location: ./application/controllers/administrator/Email.php */