<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Widged_pie extends Cc_widged
{
	public $table_name = 'widged_pie';
	public $condition_table_name = 'widged_pie_condition';

	public $primary_key = 'id';

	public $widged_type = 'pie';

	public function __construct()
	{
		$this->setWidgedInstance($this);
		$this->setWidgedPath(__DIR__);

		app()->load->language('pie/widged');
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
			'widged_pie_id' => array(
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
			'contents' => $this->view('widged_pie_setting', $data, true)
		];
	}


	public function pieConditionSetting($meta)
	{
		$meta->set('tables', app()->db->list_tables());
		$conditions = app()->db->get_where($this->condition_table_name, ['widged_pie_id' => $meta->id])->result();
		$meta->set('conditions', $conditions);
		$view = $this->view('condition_setting', $meta, true);
		return [
			'status' => true,
			'html' => $view
		];
	}

	public function pieNewCondition($input)
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

	public function pieRunSql($input)
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

		$dataPies = [];

		foreach ($results as $row) {


			if (!isset($row->x_axis)) {
				return [
					'status' => false,
					'message' => 'You need define for x_axis'

				];
			}
			if (!isset($row->y_axis)) {
				return [
					'status' => false,
					'message' => 'You need define for y_axis'
				];
			}

			$dataPies[] = $row;
		}


		return [
			'status' => true,
			'message' => 'Ok',
			'data' => $dataPies,
		];
	}

	public function getData($input)
	{
		$pie = app()->db->get_where($this->table_name, ['widged_id' => $input->get('id')])->row();
		if ($pie->mode == 'advance') {
			$results = app()->db->query($pie->sql)->result();

			$dataPies = [];

			foreach ($results as $row) {
				$dataPies[] = [
					'name' => $row->x_axis,
					'y' => (float)$row->y_axis,
				];
			}
		} else {
			$where = '';
			if ($pie->datetime_field) {
				$logic = '';
				if ($where != '') {
					$logic = ' AND ';
				}

				if ($input->get('period_type') == 'auto_refresh') {
					$input->set('period_date_from', (new DateTime())->modify('-3 hours')->format('Y-m-d H:i:s'));
					$input->set('period_date_to', (new DateTime())->format('Y-m-d H:i:s'));
				}
				$where .= $logic . '( DATE_FORMAT(' . $pie->datetime_field . ', "%Y-%m-%d %H:%i-%s") BETWEEN "' . $input->get('period_date_from') . '" AND  "' . $input->get('period_date_to') . '")';
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


			$results = app()->db->query('
				SELECT  *, ' . $pie->formula . '(' . $pie->y_axis_field . ') y_axis FROM ' . $pie->table_reff . '
					' . ($where ? 'WHERE ' . $where : '') . '
					GROUP BY ' . $pie->group_by_field . '
				')->result();

			$dataPies = [];

			foreach ($results as $row) {
				$dataPies[] = [
					'name' => $row->{$pie->group_by_field},
					'y' => (float)$row->y_axis,
				];
			}
		}


		return [
			'status' => true,
			'data' => [
				'id' => $input->get('id'),
				'pies' => $dataPies
			]
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

	public function pieGetField($meta)
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
			'grid_min_height' => 2,
			'grid_min_width' => 2,
			'grid_max_height' => 12,
			'grid_max_width' => 12,
			'grid_default_width' => 3,
			'grid_default_height' => 3,
			'icon' => '<img src="' . $this->widgedAssetUrl('asset/img/logo.png') . '" alt="">',
			'description' => "Pie widged",
			'use_box_wrapper' => true

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
			'widged_id' => $data['widged_id']
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
		return $this->widged([
			'meta' => $meta,
			'body' => function ($widged) use ($meta) {
				$export = $meta->child->datetime_field ? ' <div id="dateperiod" >
						    <i class="fa fa-calendar"></i>&nbsp;
						    <span></span> <i class="fa fa-caret-down pull-right"></i>
						</div>' : '';

				return $widged->el(
					'div',
					[
						/* 
						$widged->el('div', [
							cwidged()->live('checkUser', $meta)
						]),
						$widged->el('div', [
							cwidged()->live('checkUser2', $meta)
						]), */
						$widged->el('div', [
							$export
						]),
						$widged->el('div.pie-wrapper#pie-' . $meta->get('id')),
					]
				);
			}
		]);
	}


	public function URLResource()
	{
		return [
			'pieGetField',
			'pieNewCondition',
			'pieConditionSetting',
			'pieRunSql',
			'checkUser',
			'checkUser2',
		];
	}

	public function JS()
	{
		return [
			'asset/daterange/moment.min.js',
			'asset/daterange/daterangepicker.js',
			'asset/js/highcharts.js',
			'asset/js/exporting.js',
			'asset/js/pie.js',
		];
	}

	public function CSS()
	{
		return [
			'asset/daterange/daterangepicker.css',
			'asset/css/pie.css'
		];
	}
}
