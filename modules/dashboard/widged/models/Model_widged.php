<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_widged extends MY_Model {

	private $primary_key 	= 'id';
	private $table_name 	= 'widgeds';
	private $field_search 	= ['title', 'slug', 'created_at'];

	public function __construct()
	{
		$config = array(
			'primary_key' 	=> $this->primary_key,
		 	'table_name' 	=> $this->table_name,
		 	'field_search' 	=> $this->field_search,
		 );
		parent::__construct($config);
	}

	public function join_avaiable()
	{
		return $this;
	}
	public function filter_avaiable()
	{
		return $this;
	}
	public function find_by_dashboard_id($id)
	{
		return $this->db->get_where($this->table_name, ['dashboard_id' => $id])->result();
	}

	public function get_all_widged_type()
	{
		$this->load->helper('directory');
		$widgeds = directory_map(FCPATH . '/cc-content/dashboard-widgeds', 1);
		$widgeds = str_replace(DIRECTORY_SEPARATOR, '', $widgeds);
		return $widgeds;
	}



}

/* End of file Model_dashboard.php */
/* Location: ./application/models/Model_dashboard.php */