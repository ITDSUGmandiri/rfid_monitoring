<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Clean

{
        /**

         * ci

         *

         * @var			array

         * @access		public

         */

        protected $ci;



        public function __construct()
        {
                $this->ci = &get_instance();

                $this->ci->load->helper('directory');

                $this->ci->load->helper('file');

                $this->ci->load->dbforge();
        }



        public function clean()

        {

                $this->cleanModule();

                $this->migration();

                $this->make_table();

                $this->make_blog();
        }



        public function migration()

        {

                $this->ci->load->database();

                $this->ci->load->library(['aauth', 'migration']);



                $config = $this->ci->config->item('ignore');



                $tables = $this->ci->db->query('SHOW TABLES FROM ' . $this->ci->db->database)->result();



                foreach ($tables as $table) {

                        $tab = array_values((array)$table)[0];

                        if (!in_array($tab, $config['tables'])) {

                                $result = $this->ci->dbforge->drop_table($tab);

                                $this->print('deleting database', $tab, $result);
                        }
                }



                $this->ci->dbforge->add_field(array(

                        'version' => array(

                                'type' => 'INT',

                        )

                ));

                $this->ci->dbforge->create_table('migrations');



                if ($this->ci->migration->latest() === FALSE) {

                        show_error($this->migration->error_string());
                }



                $this->ci->aauth->create_user('admin@admin.com', 'admin123', 'admin', [

                        'avatar' => '',

                        'full_name' => 'admin'

                ]);



                $this->ci->aauth->create_user('member@member.com', 'member123', 'member', [

                        'avatar' => '',

                        'full_name' => 'member'

                ]);



                add_option('site_name', 'cicool');
        }



        public function cleanModule()

        {

                $this->ci->load->config(DIRNAME . '/clean');

                $config = $this->ci->config->item('ignore');

                $formPath = APPPATH . DIRECTORY_SEPARATOR . 'controllers/form/';

                $formFiles = directory_map($formPath);



                foreach ($formFiles as $file) {

                        $result = @unlink($formPath . $file);

                        $this->print('deleting', $formPath . $file, $result);
                }



                $formPath = APPPATH . DIRECTORY_SEPARATOR . 'views/public/';

                $formFiles = directory_map($formPath);



                foreach ($formFiles as $file => $childs) {

                        $result = delete_files($formPath . $file, true, false, 1);

                        $this->print('deleting', $formPath . $file, $result);
                }



                $formPath = APPPATH . DIRECTORY_SEPARATOR . 'views/backend/standart/administrator/';

                $viewFiles = directory_map($formPath);

                $ignoreViews = $config['views'];

                $ignoreViews = array_fill_keys($ignoreViews, '');

                $viewFiles = array_diff_key($viewFiles, $ignoreViews);



                foreach ($viewFiles as $dir => $childs) {

                        if (is_dir($formPath . $dir)) {

                                $result = delete_files($formPath . $dir, true, false, 2);

                                $this->print('deleting', $formPath . $dir, $result);
                        }
                }



                $formPath = APPPATH . DIRECTORY_SEPARATOR . 'views/backend/standart/administrator/form_builder/';

                $formFiles = directory_map($formPath);



                foreach ($formFiles as $dir => $childs) {

                        $result = delete_files($formPath . $dir, true, false, 1);

                        $this->print('deleting', $formPath . $dir, $result);
                }



                $modelPath = APPPATH . DIRECTORY_SEPARATOR . 'models/';

                $modelFiles = directory_map($modelPath);

                $ignoreModels = $config['models'];

                $modelFiles = array_diff($modelFiles, $ignoreModels);

                foreach ($modelFiles as $file) {

                        $result = @unlink($modelPath . $file);

                        $this->print('deleting', $modelPath . $file, $result);
                }



                $controllerPath = APPPATH . DIRECTORY_SEPARATOR . 'controllers/administrator/';

                $controllerFiles = directory_map($controllerPath);

                $ignoreController = $config['controllers'];

                $controllerFiles = array_diff($controllerFiles, $ignoreController);

                foreach ($controllerFiles as $file) {

                        $result = @unlink($controllerPath . $file);

                        $this->print('deleting', $controllerPath . $file, $result);
                }



                $controllerPath = APPPATH . DIRECTORY_SEPARATOR . 'controllers/api/';

                $controllerFiles = directory_map($controllerPath);

                $ignoreController = $config['apis'];

                $controllerFiles = array_diff($controllerFiles, $ignoreController);

                foreach ($controllerFiles as $file) {

                        $result = @unlink($controllerPath . $file);

                        $this->print('deleting', $controllerPath . $file, $result);
                }
        }



        public function make_table()

        {

                echo "create table";





                $this->ci->dbforge->add_field(array(

                        'id' => array(

                                'type' => 'INT',

                                'constraint' => 11,

                                'unsigned' => TRUE,

                                'auto_increment' => TRUE

                        ),

                        'name' => array(

                                'type' => 'VARCHAR',

                                'constraint' => 250,

                                'null' => TRUE,

                        ),

                        'author' => array(

                                'type' => 'VARCHAR',

                                'constraint' => 250,

                                'null' => TRUE,

                        ),

                        'description' => array(

                                'type' => 'TEXT',

                                'null' => TRUE,

                        ),

                        'image' => array(

                                'type' => 'VARCHAR',

                                'constraint' => 250,

                                'null' => TRUE,

                        ),

                        'stock' => array(

                                'type' => 'INT',

                                'null' => TRUE,

                        ),

                        'price' => array(

                                'type' => 'VARCHAR',

                                'constraint' => 11,

                                'null' => TRUE,

                        ),

                        'publish_date' => array(

                                'type' => 'DATETIME',

                                'null' => TRUE,

                        )

                ));

                $this->ci->dbforge->add_key('id', TRUE);

                $this->ci->dbforge->create_table('book');



                $this->ci->dbforge->add_field(array(

                        'id' => array(

                                'type' => 'INT',

                                'constraint' => 11,

                                'unsigned' => TRUE,

                                'auto_increment' => TRUE

                        ),

                        'name' => array(

                                'type' => 'VARCHAR',

                                'constraint' => 250,

                                'null' => TRUE,

                        ),

                        'full_name' => array(

                                'type' => 'VARCHAR',

                                'constraint' => 250,

                                'null' => TRUE,

                        ),

                        'gender' => array(

                                'type' => 'VARCHAR',

                                'constraint' => 250,

                                'null' => TRUE,

                        ),

                        'description' => array(

                                'type' => 'TEXT',

                                'null' => TRUE,

                        ),

                        'photo' => array(

                                'type' => 'VARCHAR',

                                'constraint' => 250,

                                'null' => TRUE,

                        ),

                        'join_date' => array(

                                'type' => 'DATETIME',

                                'null' => TRUE,

                        ),

                        'office' => array(

                                'type' => 'VARCHAR',

                                'constraint' => 250,

                                'null' => TRUE,

                        )

                ));

                $this->ci->dbforge->add_key('id', TRUE);

                $this->ci->dbforge->create_table('company');



                $this->ci->dbforge->add_field(array(

                        'id' => array(

                                'type' => 'INT',

                                'constraint' => 11,

                                'unsigned' => TRUE,

                                'auto_increment' => TRUE

                        ),

                        'name' => array(

                                'type' => 'VARCHAR',

                                'constraint' => 250,

                                'null' => TRUE,

                        ),

                        'full_name' => array(

                                'type' => 'VARCHAR',

                                'constraint' => 250,

                                'null' => TRUE,

                        ),

                        'gender' => array(

                                'type' => 'VARCHAR',

                                'constraint' => 250,

                                'null' => TRUE,

                        ),

                        'description' => array(

                                'type' => 'TEXT',

                                'null' => TRUE,

                        ),

                        'photo' => array(

                                'type' => 'VARCHAR',

                                'constraint' => 250,

                                'null' => TRUE,

                        ),

                        'join_date' => array(

                                'type' => 'DATETIME',

                                'null' => TRUE,

                        ),

                        'class' => array(

                                'type' => 'VARCHAR',

                                'constraint' => 250,

                                'null' => TRUE,

                        ),

                        'direction' => array(

                                'type' => 'VARCHAR',

                                'constraint' => 250,

                                'null' => TRUE,

                        )

                ));

                $this->ci->dbforge->add_key('id', TRUE);

                $this->ci->dbforge->create_table('student');





                set_option('enable_disqus', '1');

                set_option('disqus_id', 'cicool');
        }



        public function make_blog()

        {

                $this->ci->db->insert_batch('blog', [

                        [

                                'title'           => 'Make CRUD With Cicool Builder',

                                'slug'           => url_title('Make CRUD With Cicool Builder'),

                                'category' => 1,

                                'tags' => 'tutorial,crud',

                                'author' => 'admin',

                                'status' => 'publish',

                                'image' => '',

                                'content' => '

                    <iframe width="100%" height="400" src="https://www.youtube.com/embed/wSnQkgMjyFk" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

                    ',

                                'created_at' => date('Y-m-d H:i:s'),

                        ], [

                                'title'           => 'Make Page With Cicool Builder',

                                'slug'           => url_title('Make Page With Cicool Builder'),

                                'category' => 1,

                                'tags' => 'tutorial,page builder',

                                'author' => 'admin',

                                'status' => 'publish',

                                'image' => '',

                                'content' => '

                    <iframe width="100%" height="400" src="https://www.youtube.com/embed/O9-vFtFciEM" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

                    ',

                                'created_at' => date('Y-m-d H:i:s'),

                        ], [

                                'title'           => 'Make Contact Form With Cicool Builder',

                                'slug'           => url_title('Make Contact Form With Cicool Builder'),

                                'category' => 1,

                                'tags' => 'tutorial,form builder',

                                'author' => 'admin',

                                'status' => 'publish',

                                'image' => '',

                                'content' => '

                    <iframe width="100%" height="400" src="https://www.youtube.com/embed/7nQwLjpOtnE" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

                    ',

                                'created_at' => date('Y-m-d H:i:s'),

                        ], [

                                'title'           => 'Embed Form On Page With Cicool Builder',

                                'slug'           => url_title('Embed Form On Page With Cicool Builder'),

                                'category' => 1,

                                'tags' => 'tutorial,form builder',

                                'author' => 'admin',

                                'status' => 'publish',

                                'image' => '',

                                'content' => '

                    <iframe width="100%" height="400" src="https://www.youtube.com/embed/OoK8XeHcErc" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

                    ',

                                'created_at' => date('Y-m-d H:i:s'),

                        ],

                ]);
        }



        public function print($title, $message, $result = null)

        {

                $result = is_bool($result) ? ($result ? 'success' : 'fail') : $result;

                echo '<b>' . $title . '</b> ' . $message . ' : <b style="color:rgba(0,0,150)">' . $result . '</b><br>';
        }
}



/* End of file Clean.php */
