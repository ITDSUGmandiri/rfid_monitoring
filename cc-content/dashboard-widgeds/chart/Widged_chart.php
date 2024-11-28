<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Widged_chart extends Cc_widged
{
	public $table_name = 'widged_chart';

	public $primary_key = 'id';

	public $widged_type = 'chart';

	public $series_table_name = 'widged_chart_series';

	public $series_condition_table_name = 'widged_chart_series_condition';

	public function __construct()
	{
		$this->setWidgedInstance($this);
		$this->setWidgedPath(__DIR__);
		app()->load->language('chart/widged');
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
			'label' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
			),
			'value_unit' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
			),
			'data_table' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
			),
			'data_field' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
			),
			'formula' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
				'null' => true
			),
			'formula_field' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
				'null' => true
			),
			'x_axis_field' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
			),
			'x_axis_field_type' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
			),
			'x_axis_grouping' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
			),
			'color' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
				'null' => true
			),
			'type' => array(
				'type' => 'VARCHAR',
				'constraint' => 200,
				'null' => true
			),
			'widged_chart_id' => array(
				'type' => 'INT',
			),
			'widged_id' => array(
				'type' => 'INT',
			)
		));
		$migrate->add_key('id', TRUE);
		$migrate->create_table($this->series_table_name, true);


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
			'widged_series_id' => array(
				'type' => 'INT',
			),
			'widged_id' => array(
				'type' => 'INT',
			)
		));
		$migrate->add_key('id', TRUE);
		$migrate->create_table($this->series_condition_table_name, true);
	}


	public function uninstall($migrate)
	{
		$migrate->drop_table($this->table_name, TRUE);
		$migrate->drop_table($this->series_table_name, TRUE);
		$migrate->drop_table($this->series_condition_table_name, TRUE);
	}

	/**
	$data = [
		'widged_id',
		'id'
	];
	 */
	public function getWidgedConfig($data)
	{
		$series = app()->db->get_where(
			$this->series_table_name,
			[
				'widged_id' => $data->get('widged')->id
			]
		)->result();

		$data->set('series', $series);

		return [
			'status' => true,
			'contents' => $this->view('widged_chart_setting', $data, true)
		];
	}

	public function URLResource()
	{
		return [
			'chartRemoveSeries',
			'chartSeriesSetting',
			'chartUpdateSeries',
			'chartNewSeries',
			'chartGetField'
		];
	}

	public function getData($input)
	{
		$series = app()->db->get_where($this->series_table_name, ['widged_id' => $input->get('id')])->result();

		$dataChart = [];
		foreach ($series as $sr) {
			if ($sr->formula == 'count') {
				$formula = 'COUNT(' . $sr->formula_field . ') as _formula';
			} else {
				$formula = 'SUM(' . $sr->formula_field . ') as _formula';
			}


			if (
				$sr->x_axis_grouping == 'yes'
				and $sr->x_axis_field_type == 'datetime'
			) {
				$group = 'GROUP BY DATE_FORMAT(' . $sr->x_axis_field . ', "%Y-%m-%d")';
			} else {
				$group = 'GROUP BY ' . $sr->x_axis_field;
			}

			$condition = app()->db->get_where($this->series_condition_table_name, ['widged_series_id' => $sr->id])->row();

			$where = '';
			if ($condition) {
				if (
					$condition->cond_field != ''
					and $condition->cond_operator != ''
					and $condition->cond_value != ''
				) {
					$where = '' .
						$condition->cond_field . ' ' . $condition->cond_operator . '"' . $condition->cond_value . '"';
				}
			}

			if ($sr->x_axis_field_type == 'datetime') {
				$logic = '';
				if ($where != '') {
					$logic = ' AND ';
				}

				if ($input->get('period_type') == 'auto_refresh') {
					$input->set('period_date_from', (new DateTime())->modify('-3 hours')->format('Y-m-d H:i:s'));
					$input->set('period_date_to', (new DateTime())->format('Y-m-d H:i:s'));
				}
				$where .= $logic . '( DATE_FORMAT(' . $sr->x_axis_field . ', "%Y-%m-%d %H:%i-%s") BETWEEN "' . $input->get('period_date_from') . '" AND  "' . $input->get('period_date_to') . '")';
			}

			$result = app()->db->query('
				SELECT ' . $sr->x_axis_field . ' as _xaxis, ' . $formula . ' FROM ' . $sr->data_table . '
					' . ($where ? 'WHERE ' . $where : '') . '
					' . $group . '
				')->result();
			if ($sr->x_axis_field_type == 'datetime') {
				$result = array_map(function ($data) {
					return [strtotime($data->_xaxis) * 1000, (float)$data->_formula];
				}, $result);
			} else {
				$result = array_map(function ($data) {
					return [$data->_xaxis, (float)$data->_formula];
				}, $result);
			}
			if (count($result) == 0) {
				$result = [
					['', '']
				];
			}

			$dataChart[] = $result;
		}
		return [
			'status' => true,
			'data' => [
				'id' => $input->get('widged_id'),
				'series' => $series,
				'charts' => $dataChart

			]
		];
	}

	public function chartNewSeries($input)
	{
		$label = 'New Series';
		app()->db->insert($this->series_table_name, [
			'widged_id' => $input->get('widged_id'),
			'label' => $label,
			'color' => '#F99696',
			'formula' => 'count',
		]);

		$seriesID = app()->db->insert_id();

		$series = app()->db->get_where($this->series_table_name, [
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

	public function chartUpdateSeries($input)
	{
		$type = $this->_fieldDataType($input->get('data_table'));

		app()->db->update($this->series_table_name, [
			'label' => $input->get('label'),
			'formula' => $input->get('formula'),
			'formula_field' => $input->get('formula_field'),
			'data_table' => $input->get('data_table'),
			'data_field' => $input->get('data_field'),
			'value_unit' => $input->get('value_unit'),
			'x_axis_field' => $input->get('x_axis_field'),
			'x_axis_field_type' => $type[$input->get('x_axis_field')]->type,
			'x_axis_grouping' => $input->get('x_axis_grouping'),
			'type' => $input->get('type'),
			'color' => $input->get('color'),
		], [
			'id' => $input->get('id')
		]);

		$series = app()->db->get_where($this->series_table_name, [
			'id' => $input->get('id')
		])->row();

		app()->db->delete($this->series_condition_table_name, ['widged_series_id' => $input->get('id')]);
		app()->db->insert($this->series_condition_table_name, [
			'cond_field' => $input->get('cond_field'),
			'cond_operator' => $input->get('cond_operator'),
			'cond_value' => $input->get('cond_value'),
			'widged_series_id' => $input->get('id'),
			'widged_id' => $series->widged_id,
			'cond_logic' => 'AND',
		]);

		return [
			'status' => true,
			'data' => [
				'id' => $input->get('id'),
				'label' => $input->get('label'),
				'series' => $series
			]
		];
	}

	public function chartRemoveSeries($input)
	{
		app()->db->delete($this->series_table_name, [
			'id' => $input->get('id')
		]);

		return [
			'status' => true,
			'data' => []
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

	public function chartSeriesSetting($meta)
	{
		$meta->set('tables', app()->db->list_tables());
		$series = app()->db->get_where($this->series_table_name, ['id' => $meta->id])->row();
		$condition = app()->db->get_where($this->series_condition_table_name, ['widged_series_id' => $meta->id])->row();
		$meta->set('series', $series);
		$meta->set('condition', $condition);
		$view = $this->view('series_setting', $meta, true);
		return [
			'status' => true,
			'html' => $view
		];
	}

	public function chartGetField($meta)
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
			'grid_min_height' => 3,
			'grid_min_width' => 3,
			'grid_max_height' => 12,
			'grid_max_width' => 12,
			'grid_default_width' => 6,
			'grid_default_height' => 5,
			'icon' => '<img src="' . $this->widgedAssetUrl('asset/img/logo.png') . '" alt="">',
			'description' => "Chart widged multiple series",
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
		return [
			'widged_id' => $data['widged_id']
		];
	}

	public function render($meta)
	{
		$series = app()->db->get_where($this->series_table_name, ['widged_id' => $meta->get('id')])->result();
		$meta->set('series', json_encode($series));
		$meta->set('period_type', 'auto_refresh');
		$meta->set('period_date_from', '');
		$meta->set('period_date_to', '');

		return $this->widged([
			'meta' => $meta,
			'body' => function ($widged) use ($meta) {
				return $widged->el(
					'div',
					[
						$widged->el('div', [' <div id="dateperiod" >
						    <i class="fa fa-calendar"></i>&nbsp;
						    <span></span> <i class="fa fa-caret-down pull-right"></i>
						</div>']),
						$widged->el('div.chart-wrapper#chart-' . $meta->get('id')),
					]
				);
			}
		]);
	}

	public function afterDuplicate($widged)
	{
		$series = app()->db->get_where($this->series_table_name, ['widged_id' => $widged['id']])->result();

		foreach ($series as $sr) {
			$sr->widged_id = $widged['new_id'];
			$series_id = $sr->id;
			unset($sr->id);

			app()->db->insert($this->series_table_name, (array)$sr);
			$srid = app()->db->insert_id();

			$conditions = app()->db
				->get_where($this->series_condition_table_name, ['widged_series_id' => $series_id])
				->result();

			foreach ($conditions as $condition) {

				unset($condition->id);
				$condition->widged_series_id = $series_id;
				$condition->widged_id = $widged['new_id'];

				$new_condition_data = (array)$condition;
				$cid = app()->db->insert($this->series_condition_table_name, $new_condition_data);
			}
		}
	}

	/**
	$data = [
		'widged_id',
		'id'
	];
	 */
	public function afterDelete($widged)
	{
		app()->db->delete($this->series_table_name, ['widged_id' => $widged['widged_id']]);
		app()->db->delete($this->series_condition_table_name, ['widged_id' => $widged['widged_id']]);
	}

	/**
	$data = [
		'widged_id',
		'id'
	];
	 */
	public function afterCreate($data = [])
	{
	}

	/**
	$data = [
		'widged_id',
		'id'
	];
	 */
	public function afterUpdate($data = [])
	{
	}

	public function JS()
	{
		return [
			'asset/daterange/moment.min.js',
			'asset/daterange/daterangepicker.js',
			'asset/js/highcharts.js',
			'asset/js/exporting.js',
			'asset/js/app.js',
		];
	}

	public function CSS()
	{
		return [
			'asset/daterange/daterangepicker.css',
			'asset/css/chart.css'
		];
	}
}
