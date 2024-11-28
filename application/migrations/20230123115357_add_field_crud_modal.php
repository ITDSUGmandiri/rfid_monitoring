<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_field_crud_modal extends CI_Migration {

	/**
	 * Name of the table to be used in this migration!
	 *
	 * @var string
	 */
	protected $_table_name = "crud";


	public function up()
	{
		$this->dbforge->add_column($this->_table_name, [
			'crud_modal' => [
				'type' => 'VARCHAR',
				'constraint' => 20,
				'null' => true,
			],
		], 'id');
	}

	public function down()
	{
		$this->dbforge->drop_column($this->_table_name, 'crud_modal');
	}

}
