<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Widged extends Admin
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_widged');
		$this->load->model('dashboard/model_dashboard');
		$this->load->library('cc_widged');
	}

	public function manage()
	{
		if (!$this->aauth->is_allowed('dashboard')) {
			redirect('/', 'refresh');
		}
		$widgeds = $this->cc_widged->_load_widgeds();
		$data = [
			'widgeds' => $widgeds
		];
		$this->render('backend/standart/administrator/widged/manage', $data);
	}

	public function install($type)
	{
		$this->load->dbforge();
		$widged = $this->loadWidged($type);
		if (method_exists($widged, 'install')) {
			$widged->install($this->dbforge);
		}
		set_message(cclang('widged_installed'), 'success');
		redirect_back();
	}

	public function uninstall($type)
	{
		$this->load->dbforge();
		$widged = $this->loadWidged($type);
		if (method_exists($widged, 'uninstall')) {
			$widged->uninstall($this->dbforge);
		}
		$this->db->delete('widgeds', ['widged_type' => $widged->widged_type]);
		set_message(cclang('widged_removed'), 'success');
		redirect_back();
	}

	public function loadWidged($type = null)
	{
		$lib = 'Widged_' . $type;
		list($path, $_library) = Modules::find($lib, $type, '/');
		require_once($path . $lib . '.' . 'php');
		$this->load->library($lib);
		$ccWidged = $this->cc_widged->setWidgedInstance($this->{strtolower($lib)});

		return $this->cc_widged->instance;
	}

	public function index()
	{
		if (!$this->aauth->is_allowed('dashboard')) {
			redirect('/', 'refresh');
		}
		$data = [];
		$this->render('backend/standart/dashboard', $data);
	}

	public function add()
	{
		$type = $this->input->get('type');
		$instance = $this->loadWidged($type);

		$dashboard_slug = $this->input->get('dashboard');
		$widged_uuid = md5(time());
		$cc_widged = $this->cc_widged->setWidgedInstance($instance);

		$dashboard = $this->model_dashboard->find_by_slug($dashboard_slug);

		$config = $cc_widged->setConfig($instance->config());

		$data = [
			'title' => 'New ' . $type,
			'widged_uuid' => $widged_uuid,
			'widged_type' => $type,
			'sort_number' => $config->get('default_sort', 0),
			'width' => $config->get('grid_default_width'),
			'height' => $config->get('grid_default_height'),
			'dashboard_id' => $dashboard->id,
			'y' => '1',
			'x' => '1',
			'created_at' => now()
		];
		$id = $this->model_widged->store($data);

		$widgedId = $this->cc_widged->createWidged([
			'widged_id' => $id
		]);

		$widged = app()->db->get_where('widgeds', ['id' => $id])->row();

		$child = $this->db->get_where(
			$instance->table_name,
			[
				'widged_id' => $widged->id
			]
		)->row();


		$meta = new Cc_widged_config((array)$widged);
		$meta->set('child', $meta);
		$view = $instance->render(
			$meta
		);
		if ($widgedId == false) {
			$this->response([
				'status' => false,
				'message' => validation_errors(),
			]);
		} else {
			$this->response([
				'status' => true,
				'data' => [
					'view' => $view
				]
			]);
		}
	}

	public function update()
	{
		$type = $this->input->get_post('type');
		$instance = $this->loadWidged($type);

		$id = $this->input->post('id');
		$this->model_widged->change($id, [
			'title' => $this->input->post('title'),
		]);

		$params = array_merge($_POST, $_GET);

		$widgedId = $this->cc_widged->updateWidged([
			'widged_id' => $id,
			'input' => new Cc_widged_config((array)$params)
		]);
		$widged = $this->model_widged->find($id);

		$child = $this->db->get_where(
			$instance->table_name,
			[
				'widged_id' => $widged->id
			]
		)->row();

		$meta = new Cc_widged_config((array)$widged);
		$meta->set('child', $meta);
		$view = $instance->render(
			$meta
		);

		if ($widgedId == false) {
			$this->response([
				'status' => false,
				'message' => validation_errors(),
			]);
		} else {
			$this->response([
				'status' => true,
				'data' => [
					'id' => $id,
					'view' => $view,
					'title' => $this->input->post('title'),
				]
			]);
		}
	}

	public function setting()
	{
		$type = $this->input->get('widged_type');
		$resource = 'getWidgedConfig';
		$instance = $this->loadWidged($type);

		$params = array_merge($_POST, $_GET);
		$params = $this->cc_widged->setConfig($params);
		if (method_exists($instance, $resource)) {
			$widged = app()->db->get_where('widgeds', [
				'id' => $params->get('id')
			])->row();

			$child = $this->db->get_where(
				$instance->table_name,
				[
					'widged_id' => $widged->id
				]
			)->row();

			$params->set('child', new Cc_widged_config($child));
			$params->set('widged', new Cc_widged_config($widged));

			$params->set('_view', $this->cc_widged);

			$response = $instance->getWidgedConfig($params);
			if (is_array($response)) {
				if (!isset($response['status'])) {
					throw new Exception('getWidgedConfig array required status');
				}
				$this->response($response);
			}
		} else {
			show_404();
		}
	}

	public function remove()
	{
		$params = array_merge($_POST, $_GET);
		$params = $this->cc_widged->setConfig($params);
		$type = $params->get('type');
		$instance = $this->loadWidged($type);

		$widged = app()->db->get_where('widgeds', ['id' => $params->get('id')])->row();
		app()->db->delete('widgeds', [
			'id' => $params->get('id')
		]);

		$child = $this->db->delete(
			$instance->table_name,
			[
				'widged_id' => $params->get('id')
			]
		);

		if (method_exists($instance, 'afterDelete')) {
			$instance->afterDelete([
				'widged_id' => $widged->id,
			]);
		}

		$this->response([
			'status' => true,
			'data' => [
				'uuid' => $widged->widged_uuid
			]
		]);
	}



	public function duplicate()
	{
		$params = array_merge($_POST, $_GET);
		$params = $this->cc_widged->setConfig($params);
		$type = $params->get('type');
		$instance = $this->loadWidged($type);

		$widged = app()->db->get_where('widgeds', ['id' => $params->get('id')])->row();
		$widged_id = $widged->id;
		$widged->widged_uuid = md5(time());
		unset($widged->id);
		$widged->title = $widged->title . '(Duplicated)';

		app()->db->insert('widgeds', (array)$widged);
		$new_widged_id = $this->db->insert_id();

		$child = app()->db->get_where($instance->table_name, ['widged_id' => $params->get('id')])->row();

		unset($child->id);
		$child->widged_id = $new_widged_id;

		$this->db->insert($instance->table_name, (array) $child);

		if (method_exists($instance, 'afterDuplicate')) {
			$instance->afterDuplicate([
				'id' => $widged_id,
				'new_id' => $new_widged_id,
			]);
		}

		$new_widged = app()->db->get_where('widgeds', ['id' => $widged_id])->row();
		$this->response([
			'status' => true,
			'data' => [
				'uuid' => $widged->widged_uuid
			]
		]);
	}

	public function chart()
	{
		if (!$this->aauth->is_allowed('dashboard')) {
			redirect('/', 'refresh');
		}

		$data = [];
		$this->render('backend/standart/chart', $data);
	}

	public function resource()
	{
		$type = $this->input->get('_widged_type');
		$resource = $this->input->get('_resource');
		$instance = $this->loadWidged($type);

		$resources = $this->cc_widged->instance->URLResource();
		$params = array_merge($_POST, $_GET);
		$params = $this->cc_widged->setConfig($params);

		if (
			in_array($resource, $resources) and
			method_exists($instance, $resource)
		) {
			$response = $instance->{$resource}($params);
			if (is_array($response)) {
				$this->response($response);
			}
		} else {
			show_404();
		}
	}

	public function get_data()
	{
		$type = $this->input->get('widged_type');
		$resource = 'getData';
		$instance = $this->loadWidged($type);

		$params = array_merge($_POST, $_GET);
		$params = $this->cc_widged->setConfig($params);
		if (method_exists($instance, $resource)) {
			$response = $instance->getData($params);
			if (is_array($response)) {
				if (!isset($response['status'])) {
					throw new Exception('getData array required status');
				}
				$this->response($response);
			}
		} else {
			show_404();
		}
	}


	public function save_size()
	{
		foreach ($_POST['widgeds'] as $post) {
			$uuid = $post['id'];
			$height = $post['height'];
			$width = $post['width'];
			$x = $post['x'];
			$y = $post['y'];

			$data = [
				'height' => $height,
				'width' => $width,
				'x' => $x,
				'y' => $y,
			];

			$this->db->update('widgeds', $data, ['widged_uuid' => $uuid]);
		}

		$this->response([
			'status' => true,
			'message' => cclang('widged_resize')
		]);
	}


	public function show_all_widged($slug = '')
	{
		$dashboard = $this->model_dashboard->find_by_slug($slug);

		$widgeds = $this->model_widged->find_by_dashboard_id($dashboard->id);

		$widged_view = [];
		foreach ($widgeds as $widged) :
			$instance = $this->loadWidged($widged->widged_type);

			$child = $this->db->get_where(
				$instance->table_name,
				[
					'widged_id' => $widged->id
				]
			)->row();


			$meta = new Cc_widged_config((array)$widged);
			$child = new Cc_widged_config((array)$child);
			$meta->set('child', $child);

			$widged_view[] = $instance->render(
				$meta
			);
		endforeach;

		$this->response([
			'status' => true,
			'widgeds' => ($widged_view)
		]);
	}
}
