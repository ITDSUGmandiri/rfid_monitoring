<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *| --------------------------------------------------------------------------
 *| Blog Category Controller
 *| --------------------------------------------------------------------------
 *| Blog Category site
 *|
 */
class Blog_category extends Admin
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_blog_category');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	 * show all Blog Categorys
	 *
	 * @var $offset String
	 */
	public function index($offset = 0)
	{
		$this->is_allowed('blog_category_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['blog_categorys'] = $this->model_blog_category->get($filter, $field, $this->limit_page, $offset);
		$this->data['blog_category_counts'] = $this->model_blog_category->count_all($filter, $field);

		$config = [
			'base_url'     => ADMIN_NAMESPACE_URL  . '/blog_category/index/',
			'total_rows'   => $this->data['blog_category_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->data['tables'] = $this->load->view('backend/standart/administrator/blog_category/blog_category_data_table', $this->data, true);

		if ($this->input->get('ajax')) {
			$this->response([
				'tables' => $this->data['tables'],
				'pagination' => $this->data['pagination'],
				'total_row' => $this->data['blog_category_counts']
			]);
		}

		$this->template->title('Blog Category List');
		$this->render('backend/standart/administrator/blog_category/blog_category_list', $this->data);
	}

	/**
	 * Add new blog_categorys
	 *
	 */
	public function add()
	{
		$this->is_allowed('blog_category_add');

		$this->template->title('Blog Category New');
		$this->render('backend/standart/administrator/blog_category/blog_category_add', $this->data);
	}

	/**
	 * Add New Blog Categorys
	 *
	 * @return JSON
	 */
	public function add_save()
	{
		if (!$this->is_allowed('blog_category_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}



		$this->form_validation->set_rules('category_name', 'Category Name', 'trim|required|max_length[200]');


		$this->form_validation->set_rules('blog_category_category_desc_name[]', 'Category Desc', 'trim|required');




		if ($this->form_validation->run()) {

			$save_data = [
				'category_name' => $this->input->post('category_name'),
			];




			if (!is_dir(FCPATH . '/uploads/blog_category/')) {
				mkdir(FCPATH . '/uploads/blog_category/');
			}

			if (count((array) $this->input->post('blog_category_category_desc_name'))) {
				foreach ((array) $_POST['blog_category_category_desc_name'] as $idx => $file_name) {
					$blog_category_category_desc_name_copy = date('YmdHis') . '-' . $file_name;

					rename(
						FCPATH . 'uploads/tmp/' . $_POST['blog_category_category_desc_uuid'][$idx] . '/' .  $file_name,
						FCPATH . 'uploads/blog_category/' . $blog_category_category_desc_name_copy
					);

					$listed_image[] = $blog_category_category_desc_name_copy;

					if (!is_file(FCPATH . '/uploads/blog_category/' . $blog_category_category_desc_name_copy)) {
						echo json_encode([
							'success' => false,
							'message' => 'Error uploading file'
						]);
						exit;
					}
				}

				$save_data['category_desc'] = implode($listed_image, ',');
				$listed_image = [];
			}

			if (count((array) $this->input->post('blog_category_pilihan_name'))) {
				foreach ((array) $_POST['blog_category_pilihan_name'] as $idx => $file_name) {
					$blog_category_pilihan_name_copy = date('YmdHis') . '-' . $file_name;

					rename(
						FCPATH . 'uploads/tmp/' . $_POST['blog_category_pilihan_uuid'][$idx] . '/' .  $file_name,
						FCPATH . 'uploads/blog_category/' . $blog_category_pilihan_name_copy
					);

					$listed_image[] = $blog_category_pilihan_name_copy;

					if (!is_file(FCPATH . '/uploads/blog_category/' . $blog_category_pilihan_name_copy)) {
						echo json_encode([
							'success' => false,
							'message' => 'Error uploading file'
						]);
						exit;
					}
				}

				$save_data['pilihan'] = implode($listed_image, ',');
				$listed_image = [];
			}

			if (count((array) $this->input->post('blog_category_check_name'))) {
				foreach ((array) $_POST['blog_category_check_name'] as $idx => $file_name) {
					$blog_category_check_name_copy = date('YmdHis') . '-' . $file_name;

					rename(
						FCPATH . 'uploads/tmp/' . $_POST['blog_category_check_uuid'][$idx] . '/' .  $file_name,
						FCPATH . 'uploads/blog_category/' . $blog_category_check_name_copy
					);

					$listed_image[] = $blog_category_check_name_copy;

					if (!is_file(FCPATH . '/uploads/blog_category/' . $blog_category_check_name_copy)) {
						echo json_encode([
							'success' => false,
							'message' => 'Error uploading file'
						]);
						exit;
					}
				}

				$save_data['check'] = implode($listed_image, ',');
				$listed_image = [];
			}


			$save_blog_category = $id = $this->model_blog_category->store($save_data);


			if ($save_blog_category) {




				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_blog_category;
					$this->data['message'] = cclang('success_save_data_stay', [
						admin_anchor('/blog_category/edit/' . $save_blog_category, 'Edit Blog Category'),
						admin_anchor('/blog_category', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
							admin_anchor('/blog_category/edit/' . $save_blog_category, 'Edit Blog Category')
						]),
						'success'
					);

					$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/blog_category');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/blog_category');
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
	 * Update view Blog Categorys
	 *
	 * @var $id String
	 */
	public function edit($id)
	{
		$this->is_allowed('blog_category_update');

		$this->data['blog_category'] = $this->model_blog_category->find($id);

		$this->template->title('Blog Category Update');
		$this->render('backend/standart/administrator/blog_category/blog_category_update', $this->data);
	}

	/**
	 * Update Blog Categorys
	 *
	 * @var $id String
	 */
	public function edit_save($id)
	{
		if (!$this->is_allowed('blog_category_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}
		$this->form_validation->set_rules('category_name', 'Category Name', 'trim|required|max_length[200]');


		$this->form_validation->set_rules('blog_category_category_desc_name[]', 'Category Desc', 'trim|required');



		if ($this->form_validation->run()) {

			$save_data = [
				'category_name' => $this->input->post('category_name'),
			];







			$listed_image = [];
			if (count((array) $this->input->post('blog_category_category_desc_name'))) {
				foreach ((array) $_POST['blog_category_category_desc_name'] as $idx => $file_name) {
					if (isset($_POST['blog_category_category_desc_uuid'][$idx]) and !empty($_POST['blog_category_category_desc_uuid'][$idx])) {
						$blog_category_category_desc_name_copy = date('YmdHis') . '-' . $file_name;

						rename(
							FCPATH . 'uploads/tmp/' . $_POST['blog_category_category_desc_uuid'][$idx] . '/' .  $file_name,
							FCPATH . 'uploads/blog_category/' . $blog_category_category_desc_name_copy
						);

						$listed_image[] = $blog_category_category_desc_name_copy;

						if (!is_file(FCPATH . '/uploads/blog_category/' . $blog_category_category_desc_name_copy)) {
							echo json_encode([
								'success' => false,
								'message' => 'Error uploading file'
							]);
							exit;
						}
					} else {
						$listed_image[] = $file_name;
					}
				}
			}

			$save_data['category_desc'] = implode($listed_image, ',');
			$listed_image = [];


			$listed_image = [];
			if (count((array) $this->input->post('blog_category_pilihan_name'))) {
				foreach ((array) $_POST['blog_category_pilihan_name'] as $idx => $file_name) {
					if (isset($_POST['blog_category_pilihan_uuid'][$idx]) and !empty($_POST['blog_category_pilihan_uuid'][$idx])) {
						$blog_category_pilihan_name_copy = date('YmdHis') . '-' . $file_name;

						rename(
							FCPATH . 'uploads/tmp/' . $_POST['blog_category_pilihan_uuid'][$idx] . '/' .  $file_name,
							FCPATH . 'uploads/blog_category/' . $blog_category_pilihan_name_copy
						);

						$listed_image[] = $blog_category_pilihan_name_copy;

						if (!is_file(FCPATH . '/uploads/blog_category/' . $blog_category_pilihan_name_copy)) {
							echo json_encode([
								'success' => false,
								'message' => 'Error uploading file'
							]);
							exit;
						}
					} else {
						$listed_image[] = $file_name;
					}
				}
			}

			$save_data['pilihan'] = implode($listed_image, ',');
			$listed_image = [];


			$listed_image = [];
			if (count((array) $this->input->post('blog_category_check_name'))) {
				foreach ((array) $_POST['blog_category_check_name'] as $idx => $file_name) {
					if (isset($_POST['blog_category_check_uuid'][$idx]) and !empty($_POST['blog_category_check_uuid'][$idx])) {
						$blog_category_check_name_copy = date('YmdHis') . '-' . $file_name;

						rename(
							FCPATH . 'uploads/tmp/' . $_POST['blog_category_check_uuid'][$idx] . '/' .  $file_name,
							FCPATH . 'uploads/blog_category/' . $blog_category_check_name_copy
						);

						$listed_image[] = $blog_category_check_name_copy;

						if (!is_file(FCPATH . '/uploads/blog_category/' . $blog_category_check_name_copy)) {
							echo json_encode([
								'success' => false,
								'message' => 'Error uploading file'
							]);
							exit;
						}
					} else {
						$listed_image[] = $file_name;
					}
				}
			}

			$save_data['check'] = implode($listed_image, ',');
			$listed_image = [];



			$save_blog_category = $this->model_blog_category->change($id, $save_data);

			if ($save_blog_category) {





				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						admin_anchor('/blog_category', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', []),
						'success'
					);

					$this->data['success'] = true;
					$this->data['redirect'] = admin_base_url('/blog_category');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = admin_base_url('/blog_category');
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
	 * delete Blog Categorys
	 *
	 * @var $id String
	 */
	public function delete($id = null)
	{
		$this->is_allowed('blog_category_delete');

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
					"message" => cclang('has_been_deleted', 'blog_category')
				]);
			} else {
				$this->response([
					"success" => true,
					"message" => cclang('error_delete', 'blog_category')
				]);
			}
		} else {
			if ($remove) {
				set_message(cclang('has_been_deleted', 'blog_category'), 'success');
			} else {
				set_message(cclang('error_delete', 'blog_category'), 'error');
			}
			redirect_back();
		}
	}

	/**
	 * View view Blog Categorys
	 *
	 * @var $id String
	 */
	public function view($id)
	{
		$this->is_allowed('blog_category_view');

		$this->data['blog_category'] = $this->model_blog_category->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Blog Category Detail');
		$this->render('backend/standart/administrator/blog_category/blog_category_view', $this->data);
	}

	/**
	 * delete Blog Categorys
	 *
	 * @var $id String
	 */
	private function _remove($id)
	{
		$blog_category = $this->model_blog_category->find($id);


		if (!empty($blog_category->category_desc)) {
			foreach ((array) explode(',', $blog_category->category_desc) as $filename) {
				$path = FCPATH . '/uploads/blog_category/' . $filename;

				if (is_file($path)) {
					$delete_file = unlink($path);
				}
			}
		}
		if (!empty($blog_category->pilihan)) {
			foreach ((array) explode(',', $blog_category->pilihan) as $filename) {
				$path = FCPATH . '/uploads/blog_category/' . $filename;

				if (is_file($path)) {
					$delete_file = unlink($path);
				}
			}
		}
		if (!empty($blog_category->check)) {
			foreach ((array) explode(',', $blog_category->check) as $filename) {
				$path = FCPATH . '/uploads/blog_category/' . $filename;

				if (is_file($path)) {
					$delete_file = unlink($path);
				}
			}
		}

		return $this->model_blog_category->remove($id);
	}


	/**
	 * Upload Image Blog Category	* 
	 * @return JSON
	 */
	public function upload_category_desc_file()
	{
		if (!$this->is_allowed('blog_category_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'blog_category',
		]);
	}

	/**
	 * Delete Image Blog Category	* 
	 * @return JSON
	 */
	public function delete_category_desc_file($uuid)
	{
		if (!$this->is_allowed('blog_category_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}

		echo $this->delete_file([
			'uuid'              => $uuid,
			'delete_by'         => $this->input->get('by'),
			'field_name'        => 'category_desc',
			'upload_path_tmp'   => './uploads/tmp/',
			'table_name'        => 'blog_category',
			'primary_key'       => 'category_id',
			'upload_path'       => 'uploads/blog_category/'
		]);
	}

	/**
	 * Get Image Blog Category	* 
	 * @return JSON
	 */
	public function get_category_desc_file($id)
	{
		if (!$this->is_allowed('blog_category_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
			]);
			exit;
		}

		$blog_category = $this->model_blog_category->find($id);

		echo $this->get_file([
			'uuid'              => $id,
			'delete_by'         => 'id',
			'field_name'        => 'category_desc',
			'table_name'        => 'blog_category',
			'primary_key'       => 'category_id',
			'upload_path'       => 'uploads/blog_category/',
			'delete_endpoint'   => ADMIN_NAMESPACE_URL  .  '/blog_category/delete_category_desc_file'
		]);
	}

	/**
	 * Upload Image Blog Category	* 
	 * @return JSON
	 */
	public function upload_pilihan_file()
	{
		if (!$this->is_allowed('blog_category_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'blog_category',
		]);
	}

	/**
	 * Delete Image Blog Category	* 
	 * @return JSON
	 */
	public function delete_pilihan_file($uuid)
	{
		if (!$this->is_allowed('blog_category_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}

		echo $this->delete_file([
			'uuid'              => $uuid,
			'delete_by'         => $this->input->get('by'),
			'field_name'        => 'pilihan',
			'upload_path_tmp'   => './uploads/tmp/',
			'table_name'        => 'blog_category',
			'primary_key'       => 'category_id',
			'upload_path'       => 'uploads/blog_category/'
		]);
	}

	/**
	 * Get Image Blog Category	* 
	 * @return JSON
	 */
	public function get_pilihan_file($id)
	{
		if (!$this->is_allowed('blog_category_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
			]);
			exit;
		}

		$blog_category = $this->model_blog_category->find($id);

		echo $this->get_file([
			'uuid'              => $id,
			'delete_by'         => 'id',
			'field_name'        => 'pilihan',
			'table_name'        => 'blog_category',
			'primary_key'       => 'category_id',
			'upload_path'       => 'uploads/blog_category/',
			'delete_endpoint'   => ADMIN_NAMESPACE_URL  .  '/blog_category/delete_pilihan_file'
		]);
	}

	/**
	 * Upload Image Blog Category	* 
	 * @return JSON
	 */
	public function upload_check_file()
	{
		if (!$this->is_allowed('blog_category_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'blog_category',
		]);
	}

	/**
	 * Delete Image Blog Category	* 
	 * @return JSON
	 */
	public function delete_check_file($uuid)
	{
		if (!$this->is_allowed('blog_category_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
			]);
			exit;
		}

		echo $this->delete_file([
			'uuid'              => $uuid,
			'delete_by'         => $this->input->get('by'),
			'field_name'        => 'check',
			'upload_path_tmp'   => './uploads/tmp/',
			'table_name'        => 'blog_category',
			'primary_key'       => 'category_id',
			'upload_path'       => 'uploads/blog_category/'
		]);
	}

	/**
	 * Get Image Blog Category	* 
	 * @return JSON
	 */
	public function get_check_file($id)
	{
		if (!$this->is_allowed('blog_category_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
			]);
			exit;
		}

		$blog_category = $this->model_blog_category->find($id);

		echo $this->get_file([
			'uuid'              => $id,
			'delete_by'         => 'id',
			'field_name'        => 'check',
			'table_name'        => 'blog_category',
			'primary_key'       => 'category_id',
			'upload_path'       => 'uploads/blog_category/',
			'delete_endpoint'   => ADMIN_NAMESPACE_URL  .  '/blog_category/delete_check_file'
		]);
	}

	/**
	 * Export to excel
	 *
	 * @return Files Excel .xls
	 */
	public function export()
	{
		$this->is_allowed('blog_category_export');

		$this->model_blog_category->export(
			'blog_category',
			'blog_category',
			$this->model_blog_category->field_search
		);
	}

	/**
	 * Export to PDF
	 *
	 * @return Files PDF .pdf
	 */
	public function export_pdf()
	{
		$this->is_allowed('blog_category_export');

		$this->model_blog_category->pdf('blog_category', 'blog_category');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('blog_category_export');

		$table = $title = 'blog_category';
		$this->load->library('HtmlPdf');

		$config = array(
			'orientation' => 'p',
			'format' => 'a4',
			'marges' => array(5, 5, 5, 5)
		);

		$this->pdf = new HtmlPdf($config);
		$this->pdf->setDefaultFont('stsongstdlight');

		$result = $this->db->get($table);

		$data = $this->model_blog_category->find($id);
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


/* End of file blog_category.php */
/* Location: ./application/controllers/administrator/Blog Category.php */