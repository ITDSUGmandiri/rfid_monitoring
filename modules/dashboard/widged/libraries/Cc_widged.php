<?php

require_once __DIR__ . '../../vendor/autoload.php';

class Cc_widged
{
	public $instance;
	public $path;

	public function __construct()
	{
		app()->load->library('widged/cc_widged_config');
		app()->load->library('widged/cc_widged_element');
		$this->inputs = array_merge($_POST, $_GET);
	}

	public function response($data)
	{
		return $this->response($data);
	}

	public function widgedAssetUrl($url = '')
	{
		return BASE_URL . 'cc-content/dashboard-widgeds/' . $this->widged_type . '/' . $url;
	}

	public function setWidgedInstance($instance)
	{
		$this->instance = $instance;
		return $this;
	}

	public function setWidgedPath($path)
	{
		$this->path = $path;
		return $this;
	}

	public function createWidged($data = [])
	{
		if (method_exists($this->instance, 'createValidation')) {
			$rules = $this->instance->createValidation();
			$this->setRules($rules);
		}
		if (
			app()->form_validation->run() or
			!method_exists($this->instance, 'createValidation')
		) {
			app()->db->insert(
				$this->instance->table_name,
				$this->instance->create($data)
			);
			$id = app()->db->insert_id();
			if (method_exists($this->instance, 'afterCreate')) {
				$this->instance->afterCreate([
					'widged_id' => $data['widged_id'],
					'id' => $id,
				]);
			}
			return $id;
		} else {
			return false;
		}
	}

	public function updateWidged($data = [])
	{

		if (method_exists($this->instance, 'updateValidation')) {
			$rules = $this->instance->updateValidation();
			$this->setRules($rules);
		}
		if (
			app()->form_validation->run() or
			!method_exists($this->instance, 'updateValidation')
		) {
			app()->db->update(
				$this->instance->table_name,
				$this->instance->update($data),
				[
					'widged_id' => $data['widged_id']
				]
			);
			$inputs = new Cc_widged_config($this->inputs);
			if (method_exists($this->instance, 'afterUpdate')) {
				$this->instance->afterUpdate([
					'widged_id' => $data['widged_id']
				], $inputs);
			}
			return true;
		} else {
			return false;
		}
	}

	public function setRules($rules)
	{
		foreach ($rules as $key => $rule) {
			app()->form_validation->set_rules('title', 'title', 'trim|required|min_length[5]|max_length[12]');
			app()->form_validation->set_rules($rule[0], $rule[1], $rule[2]);
		}
	}

	public function setConfig($config)
	{
		return app()->cc_widged_config->init($config);
	}

	public function widged($data)
	{
		$meta = $data['meta'];
		$body = $data['body'];
		$instance = $this->instance;
		$el = app()->cc_widged_element;
		$metaHtml = '';
		foreach ($meta->all() as $key => $val) {
			if (is_string($val)) {
				$metaHtml .= '<textarea class="display-none widged-meta-data" type="hidden" data-field="' . $key . '" value="" name="meta_' . $key . '">' . $val . '</textarea>';
			}
		}
		$config = $this->setConfig($instance->config());


		if ($config->get('use_box_wrapper') === false) {

			$mainContent = $el->el('div.grid-stack-item-content', [

				$el->el('div.box-tools.pull-right.box-tool-less', [
					$el->el('button.btn.btn-xs.btn-setup-widged', [
						'type' => 'button',
						'data-widged' => 'setting',
					], [
						$el->el('i.fa.fa-cog.big-fa')
					])
				]),
				$el->el('div.widged-body', $body($el))
			]);
		} else {
			$mainContent = $el->el('div.box.box-success.grid-stack-item-content', [
				$el->el('div.box-header.with-border', [
					$el->el('h3.box-title', $meta->get('title')),
					$el->el('div.box-tools.pull-right', [
						$el->el('button.btn.btn-xs.btn-setup-widged', [
							'type' => 'button',
							'data-widged' => 'setting',
						], [
							$el->el('i.fa.fa-cog.big-fa')
						])
					])
				]),
				$el->el('div.box-body.widged-body', $body($el))
			]);
		}

		$html = $el->el('div.col-md-3.widged-box.grid-stack-item', [
			'data-widged-type' => $meta->get('widged_type'),
			'data-widged-uuid' => $meta->get('widged_uuid'),
			'data-widged-id' => $meta->get('id'),
			'data-gs-max-width' => $config->get('grid_max_width', 5),
			'data-gs-max-height' => $config->get('grid_max_height', 5),
			'data-gs-min-height' => $config->get('grid_min_height', 5),
			'data-gs-min-width' => $config->get('grid_min_width', 5),
			'data-gs-x' => $meta->get('x'),
			'data-gs-y' => $meta->get('y'),
			'data-gs-width' => $meta->get('width'),
			'data-gs-height' => $meta->get('height'),
		], [
			$metaHtml,
			$mainContent
		]);

		return $html;
	}

	public function live($resource, $meta, $default = null)
	{
		$uniq = 'fun' . md5($meta->get('widged_uuid'));
		$data = [
			'uniq' => $uniq,
			'meta' => $meta,
			'resource' => $resource,
		];


		$script = app()->load->view('widged/live_data', $data, true);

		app()->cc_html->registerScriptFileBottom($script, 'script');
		$html = '<span data-live-id="' . $uniq . '">' . $default . '</span>';

		return $html;
	}

	public function view($path, $data)
	{
		return app()->load->view($this->widged_type . '/' . $path, $data->all(), true);
	}

	public function endForm()
	{
		return '
	        <div class="cc-page-setting-wrapper">
	        <span class="loading loading-hide"><img src="' . BASE_ASSET . '/img/loading-spin-primary.svg"> <i>' . cclang('loading_getting_data') . '</i></span>
	        <button type="submit" id="btnSaveWidged" class="btn cc-button-sidebar btn-save-widged btn-primary btn-flat">' . cclang('save_change') . '</button>
	        <a class="btn cc-button-sidebar text-muted   btn-duplicate-widged" data-dismiss="modal">' . cclang('duplicate') . '</a>
	        <a class="btn cc-button-sidebar text-danger   btn-delete-widged" data-dismiss="modal">' . cclang('delete_widged') . '</a>
	    </div>
	    </form>';
	}


	public function startForm($widged)
	{
		return
			form_open('', [
				'class' => 'form-horizontal',
				'id' => 'formSetupWidged',
				'medhod' => 'POST'
			]) . '
     		<div class="cc-page-setting-wrapper">

		 	<input type="hidden" name="id" id="id" value="' . $widged->id . '">
		 	<input type="hidden" name="type" id="type" value="' . $widged->widged_type . '">
			<div class="cc-input-wrapper">
	          <b>' . cclang('title') . '<i class="required">*</i></b>
	          <input type="" name="title" class="cc-input-sidebar" id="title" placeholder="Title" value="' . $widged->title . '">
	        </div>
	        </div>
			';
	}

	public function loadWidged($type = null)
	{
		$lib = 'Widged_' . $type;
		list($path, $_library) = Modules::find($lib, $type, '/');
		require_once($path . $lib . '.' . 'php');
		app()->load->library($lib);

		$ccWidged = $this->setWidgedInstance(app()->{strtolower($lib)});

		return $this->instance;
	}

	public function _load_widgeds()
	{
		$path = FCPATH . '/cc-content/dashboard-widgeds';

		$widgeds = directory_map($path, 1);

		$widgeds = array_map(function ($item) {
			return str_replace(DIRECTORY_SEPARATOR, '', $item);
		}, $widgeds);

		$wgobjs = [];

		foreach ($widgeds as $widged) {
			$ccWidged = (new Cc_widged);
			$instance = $ccWidged->loadWidged($widged);

			$ccWidged->setWidgedInstance($instance);
			$config = new cc_widged_config($instance->config());

			$meta = new Cc_widged_config((array)$widged);
			$config->set('name', $instance->widged_type);
			$config->instance = $instance;
			$wgobjs[] = $config;
		}

		return $wgobjs;
	}
}


if (!function_exists('cwidged')) {
	function cwidged()
	{
		return new Cc_widged;
	}
}
