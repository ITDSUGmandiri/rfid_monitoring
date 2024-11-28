<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Widged_value extends Cc_widged
{
	public $table_name = 'widged_value';
	public $condition_table_name = 'widged_value_condition';

	public $primary_key = 'id';

	public $widged_type = 'value';

	public function __construct()
	{
		$this->setWidgedInstance($this);
		$this->setWidgedPath(__DIR__);

		app()->load->language('value/widged');
	}

	public function install($migrate)
	{
		$migrate->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'title' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
			),
			'link_label' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
			),
			'link' => array(
				'type' => 'TEXT',
			),
			'icon' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
			),
			'color' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
			),
			'table_reff' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
			),
			'group_by_field' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
			),
			'y_axis_field' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
			),
			'datetime_field' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
			),
			'formula' => array(
				'type' => 'VARCHAR',
				'constraint' => 20,
				'default' => 'SUM'
			),
			'mode' => array(
				'type' => 'VARCHAR',
				'constraint' => 20,
				'default' => 'basic'
			),
			'sql' => array(
				'type' => 'TEXT',
			),
			'box_style' => array(
				'type' => 'VARCHAR',
				'constraint' => 20,
			),
			'widged_id' => array(
				'type' => 'INT',
			)
		));
		$migrate->add_key('id', TRUE);
		$migrate->create_table($this->table_name, true);

		$migrate->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'cond_field' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
				'null' => true
			),
			'cond_operator' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
				'null' => true
			),
			'cond_value' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
				'null' => true
			),
			'cond_logic' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
				'null' => true
			),
			'widged_value_id' => array(
				'type' => 'INT',
			),
			'widged_id' => array(
				'type' => 'INT',
			)
		));
		$migrate->add_key('id', TRUE);
		$migrate->create_table($this->condition_table_name, true);
	}

	public function uninstall($migrate)
	{
		$migrate->drop_table($this->table_name, TRUE);
	}

	/**
	$data = [
		'widged_id',
		'id'
	];
	 */
	public function getWidgedConfig($data)
	{
		$data->set('tables', app()->db->list_tables());
		$conditions = app()->db->get_where($this->condition_table_name, ['widged_id' => $data->id])->result();
		$data->set('conditions', $conditions);
		return [
			'status' => true,
			'contents' => $this->view('widged_value_setting', $data, true)
		];
	}


	public function valueConditionSetting($meta)
	{
		$meta->set('tables', app()->db->list_tables());
		$conditions = app()->db->get_where($this->condition_table_name, ['widged_value_id' => $meta->id])->result();
		$meta->set('conditions', $conditions);
		$view = $this->view('condition_setting', $meta, true);
		return [
			'status' => true,
			'html' => $view
		];
	}

	public function valueNewCondition($input)
	{
		app()->db->insert($this->condition_table_name, [
			'widged_id' => $input->get('widged_id'),
		]);

		$seriesID = app()->db->insert_id();

		$series = app()->db->get_where($this->condition_table_name, [
			'id' => $seriesID
		])->row();

		return [
			'status' => true,
			'data' => [
				'id' => $seriesID,
				'series' => $series
			]
		];
	}

	public function valueRunSql($input)
	{
		$sql = $input->get('sql');
		app()->db->db_debug = FALSE;

		$find_letters = [
			'delete from',
			'truncate',
			'create database',
			'alter',
		];
		$sql = strtolower($sql);
		$match = (str_replace($find_letters, '', $sql) != $sql);

		if ($match) {
			return [
				'status' => false,
				'message' => 'query not accpeted'

			];
		}

		$results = app()->db->query($sql);
		$error = app()->db->error();

		if ($error['code'] != 0) {
			return [
				'status' => false,
				'message' => $error['message']
			];
		}


		$results = $results->result();

		$datavalues = [];

		foreach ($results as $row) {

			if (!isset($row->y_axis)) {
				return [
					'status' => false,
					'message' => 'You need define for y_axis'
				];
			}

			$datavalues[] = $row;
		}


		return [
			'status' => true,
			'message' => 'Ok',
			'data' => $datavalues,
		];
	}

	public function getVal($input)
	{
		$value = app()->db->get_where($this->table_name, ['widged_id' => $input->get('id')])->row();
		if ($value->mode == 'advance') {
			$results = app()->db->query($value->sql)->row();

			$value = $results->y_axis;
		} else {
			$where = '';
			if ($value->datetime_field) {
				$logic = '';
				if ($where != '') {
					$logic = ' AND ';
				}

				if ($input->get('period_type') == 'auto_refresh') {
					$input->set('period_date_from', (new DateTime())->modify('-3 hours')->format('Y-m-d H:i:s'));
					$input->set('period_date_to', (new DateTime())->format('Y-m-d H:i:s'));
				}
			}

			$conditions = app()->db->get_where($this->condition_table_name, ['widged_id' => $input->id])->result();

			foreach ($conditions as $condition) {
				$logic = '';
				if ($where != '') {
					$logic = ' AND ';
				}
				if ($condition->cond_operator != '' && $condition->cond_field) {
					if ($condition->cond_operator == 'in') {
						$vals = explode(',', $condition->cond_value);
						$where .= $logic . ' ' . $condition->cond_field . ' ' . $condition->cond_operator . ' ("' . implode('","', $vals) . '")';
					} else {
						$where .= $logic . ' ' . $condition->cond_field . ' ' . $condition->cond_operator . ' "' . $condition->cond_value . '"';
					}
				}
			}

			$where .= $logic . ' user_id = ' . get_user_data('id');

			$results = app()->db->query('
				SELECT  ' . $value->formula . '(' . $value->group_by_field . ') y_axis FROM ' . $value->table_reff . '
					' . ($where ? 'WHERE ' . $where : '') . '
					GROUP BY ' . $value->group_by_field . '
				')->row();

			echo app()->db->last_query();




			$value = $results->y_axis;
		}


		return [
			'html' => $value
		];
	}

	public function _fieldDataType($table)
	{
		$data = app()->db->field_data($table);
		$metas = [];
		foreach ($data as $d) {
			$metas[$d->name] = $d;
		}
		return $metas;
	}

	public function valueGetField($meta)
	{
		$tables = app()->db->field_data($meta->get('table'));

		return [
			'status' => true,
			'data' => [
				'tables' => $tables
			]
		];
	}


	public function config()
	{
		return [
			'grid_min_height' => 1,
			'grid_min_width' => 2,
			'grid_max_height' => 12,
			'grid_max_width' => 12,
			'grid_default_width' => 2,
			'grid_default_height' => 2,
			'icon' => '<img src="' . $this->widgedAssetUrl('asset/img/logo.png') . '" alt="">',
			'description' => "value widged",
			'use_box_wrapper' => false
		];
	}

	public function updateValidation($data = [])
	{
		return [
			['title', 'title', 'required'],
		];
	}

	public function create($data = [])
	{
		return [
			'widged_id' => $data['widged_id'],
			'color' => 'bg-aqua',
			'link_label' => 'More Info',
			'link' => '/',
			'link' => '/',
			'box_style' => 'style_2',
			'icon' => 'fa-shopping-cart',
		];
	}

	public function update($data = [])
	{
		$input = $data['input'];

		$datetime_field = $input->get('mode') == 'advance' ? '' : $input->datetime_field;
		return [
			'table_reff' => $input->get('table_reff'),
			'group_by_field' => $input->get('group_by_field'),
			'y_axis_field' => $input->get('y_axis_field'),
			'datetime_field' => $datetime_field,
			'formula' => $input->get('formula'),
			'sql' => $input->get('sql'),
			'mode' => $input->get('mode'),
			'color' => $input->get('color'),
			'link' => $input->get('link'),
			'link_label' => $input->get('link_label'),
			'icon' => $input->get('icon'),
			'box_style' => $input->get('box_style'),
		];
	}

	/**
	$data = [
		'widged_id',
	];
	 */
	public function afterUpdate($data = [], $input)
	{
		app()->db->delete($this->condition_table_name, ['widged_id' => $data['widged_id']]);

		$conditions = [];
		foreach ((array)$input->cond as $cond) {
			$conditions[] = [
				'cond_field' => $cond['cond_field'],
				'cond_operator' => $cond['cond_operator'],
				'cond_value' => $cond['cond_value'],
				'cond_logic' => 'AND',
				'widged_id' => $data['widged_id'],
			];
		}
		if (count($conditions)) {
			app()->db->insert_batch($this->condition_table_name, $conditions);
		}
	}

	public function render($meta)
	{
		$meta->set('period_type', 'auto_refresh');
		$meta->set('period_date_from', '');
		$meta->set('period_date_to', '');

		if ($meta->child->get('box_style') == 'style_2') {
			$element = function ($widged) use ($meta) {
				return $widged->el(
					'div.small-box.' . $meta->child->get('color') . '.value-wrapper#-' . $meta->get('id'),
					[
						$widged->el('div.inner', [
							$widged->el('h3', [cwidged()->live('getVal', $meta, '--')]),
							$widged->el('p', [
								$meta->get('title')
							]),
						]),
						$widged->el('div.icon', [
							$widged->el('i.fa.' . $meta->child->get('icon'))
						]),
						$widged->el('a[href="' . $meta->child->get('link') . '"].small-box-footer', [
							$meta->child->get('link_label'),
							' ',
							$widged->el('i.fa.fa-arrow-circle-right')
						]),
					]
				);
			};
		} else if ($meta->child->get('box_style') == 'style_1') {
			$element = function ($widged) use ($meta) {
				return $widged->el(
					'div.widged-value-style-1.info-box.value-wrapper#-' . $meta->get('id'),
					[
						$widged->el('span.info-box-icon ' . $meta->child->get('color'), [
							$widged->el('i.fa.' . $meta->child->get('icon'))
						]),
						$widged->el('div.info-box-content', [
							$widged->el('span.info-box-text', [
								$meta->get('title')
							]),
							$widged->el('span.info-box-number', [
								cwidged()->live('getVal', $meta, '--')
							])
						])
					]
				);
			};
		} else {
			$element = function ($widged) use ($meta) {
				return $widged->el(
					'div.info-box.' . $meta->child->get('color') . '.value-wrapper#-' . $meta->get('id'),
					[
						$widged->el('span.info-box-icon ', [
							$widged->el('i.fa.' . $meta->child->get('icon'))
						]),
						$widged->el('div.info-box-content', [
							$widged->el('span.info-box-text', [
								$meta->get('title')
							]),
							$widged->el('span.info-box-number', [
								cwidged()->live('getVal', $meta, '--')
							]),

							$widged->el('div.progress', [
								$widged->el('div.progress-bar[style="width:70%"]')
							]),
							$widged->el('span.progress-description', [
								$meta->child->get('link_label')
							]),
						])
					]
				);
			};
		}


		return $this->widged([
			'meta' => $meta,
			'body' => $element
		]);
	}


	public function URLResource()
	{
		return [
			'valueGetField',
			'valueNewCondition',
			'valueConditionSetting',
			'valueRunSql',
			'getVal',
		];
	}

	public function JS()
	{
		return [
			'asset/daterange/moment.min.js',
			'asset/daterange/daterangepicker.js',
			'asset/js/highcharts.js',
			'asset/js/exporting.js',
			'asset/js/value.js',
		];
	}

	public function CSS()
	{
		return [
			'asset/daterange/daterangepicker.css',
			'asset/css/value.css'
		];
	}
}
