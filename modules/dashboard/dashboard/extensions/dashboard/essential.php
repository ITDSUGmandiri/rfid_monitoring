<?php

namespace Product;

spl_autoload_register();

/*define base extension*/
$base_url_extension = url_extension(basename(__DIR__));


if (!app()->db->table_exists('dashboard')) {
    app()->load->dbforge();
    app()->dbforge->add_field(array(
        'id' => array(
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
        ),
        'title' => array(
            'type' => 'VARCHAR',
            'constraint' => 250,
            'null' => TRUE,
        ),
        'slug' => array(
            'type' => 'VARCHAR',
            'constraint' => 250,
            'null' => TRUE,
        ),
        'created_at' => array(
            'type' => 'DATETIME',
        ),
    ));
    app()->dbforge->add_key('id', TRUE);
    app()->dbforge->create_table('dashboard');

    app()->load->dbforge();
    app()->dbforge->add_field(array(
        'id' => array(
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment' => TRUE
        ),
        'title' => array(
            'type' => 'VARCHAR',
            'constraint' => 250,
            'null' => TRUE,
        ),
        'dashboard_id' => array(
            'type' => 'INT',
            'null' => TRUE,
        ),
        'widged_uuid' => array(
            'type' => 'VARCHAR',
            'constraint' => 250,
            'null' => TRUE,
        ),
        'widged_type' => array(
            'type' => 'VARCHAR',
            'constraint' => 250,
            'null' => TRUE,
        ),
        'sort_number' => array(
            'type' => 'INT',
            'null' => TRUE,
        ),
        'height' => array(
            'type' => 'INT',
            'null' => TRUE,
        ),
        'width' => array(
            'type' => 'INT',
            'null' => TRUE,
        ),
        'x' => array(
            'type' => 'INT',
            'null' => TRUE,
        ),
        'y' => array(
            'type' => 'INT',
            'null' => TRUE,
        ),
        'created_at' => array(
            'type' => 'DATETIME',
        ),
    ));
    app()->dbforge->add_key('id', TRUE);
    app()->dbforge->create_table('widgeds');
}
