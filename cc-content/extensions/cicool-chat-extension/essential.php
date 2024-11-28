<?php 
spl_autoload_register();

$base_url_extension = _ent(url_extension(basename(__DIR__))); 

cicool()->addTabSetting([
    'id' => 'firebase',
    'label' => 'Chat',
    'icon' => 'fa fa-comments-o',
])->addTabContent([
    'content' => ' 
    <div class="col-md-6">
      <div class="col-sm-12">
          <label>Firebase URL</label>
          <input type="text" class="form-control" name="chat_fb_url" id="chat_fb_url" value="'._ent(get_option('chat_fb_url')).'">
          <small class="info help-block">The URL of your firebase application like 
          http://cicool-chat.firebase.io/
          <br>
          You can get this on '.anchor('http://console.firebase.google.com', '', ['target' => 'blank']).' .</small>
      </div>
    </div>
    '
])
->settingBeforeSave(function($form){
})
->settingOnSave(function($ci){
    set_option('chat_fb_url', $ci->input->post('chat_fb_url'));
});
if (!app()->db->table_exists('chat')) {

	app()->load->dbforge();
	app()->dbforge->add_field(array(
            'id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
            ),
            'chat_uid' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 100,
                    'null' => false,
            ),
            'user_one' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'null' => false,
            ),
            'user_two' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'null' => false,
            ),
            'type' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 100,
                    'null' => false,
            ),
            'created_at' => array(
                    'type' => 'DATETIME',
                    'null' => false,
            ),
            'updated_at' => array(
                    'type' => 'DATETIME',
                    'null' => TRUE,
            )
    ));
    app()->dbforge->add_key('id', TRUE);
    app()->dbforge->create_table('chat');

    app()->dbforge->add_field(array(
            'id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
            ),
            'message_user_id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'null' => false,
            ),
            'chat_id' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 100,
                    'null' => false,
            ),
            'uid' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 100,
                    'null' => false,
            ),
            'message' => array(
                    'type' => 'TEXT',
                    'null' => false,
            ),
            'status' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 100,
                    'null' => false,
            ),
            'created_at' => array(
                    'type' => 'DATETIME',
                    'null' => false,
            )
    ));
    app()->dbforge->add_key('id', TRUE);
    app()->dbforge->create_table('chat_message');

    app()->dbforge->add_field(array(
            'id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
            ),
            'user_id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'null' => false,
            ),
            'contact_id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'null' => false,
            )
    ));
    app()->dbforge->add_key('id', TRUE);
    app()->dbforge->create_table('chat_contact');

    app()->load->library('session');
    set_message(
		cclang('You can fill firebase URL, follow link in description for detail.'
	), 'success');

	redirect(admin_url('setting?tab=tab_firebase'));

}
