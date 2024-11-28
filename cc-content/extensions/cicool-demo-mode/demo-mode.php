<?php 
app()->load->library('cc_app');

cicool()->onEvent('extension_info_cicool-demo-mode', function(){
	echo '<div class="callout callout-warning-cc ">this extension for demo mode you can\'t delete data</div>';
});

define('TIME_BLOCKED', '5');
$date = new Datetime();
$now = $date->format('Y-m-d H:i:s');
define('NOW', $now);

$blocked_rules = [
	[
		'time_limit' => 5,
		'max_post' => 10
	],
	[
		'time_limit' => 10,
		'max_post' => 15
	],
	[
		'time_limit' => 60,
		'max_post' => 30
	],
	[
		'time_limit' => 120,
		'max_post' => 50
	],
	[
		'time_limit' => 160,
		'max_post' => 70
	],
];

app()->load->dbforge();

app()->dbforge->add_field(array(
        'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
        ),
        'ip_address' => array(
                'type' => 'TEXT',
                'null' => TRUE,
        ),
        'blocked_date' => array(
                'type' => 'DATETIME',
                'null' => TRUE,
        ),
        'blocked_until' => array(
                'type' => 'DATETIME',
                'null' => TRUE,
        ),
        'blocked_status' => array(
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => TRUE,
        ),
        'description' => array(
        		'type' => 'TEXT'
        )
));
app()->dbforge->add_key('id', TRUE);
app()->dbforge->create_table('cc_block_client', true);

app()->dbforge->add_field(array(
        'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
        ),
        'ip_address' => array(
                'type' => 'TEXT',
                'null' => TRUE,
        ),
        'counter' => array(
                'constraint' => 11,
        		'type' => 'INT'
        ),
        'last_visit' => array(
        		'type' => 'DATETIME'
        ),
        'description' => array(
        		'type' => 'TEXT'
        ),

));
app()->dbforge->add_key('id', TRUE);
app()->dbforge->create_table('cc_visitor', true);


if (!function_exists('updateVIsitor')) {


function updateVIsitor() {

	app()->load->library('user_agent');

	$date = new Datetime();

	if (app()->agent->is_browser()) {
	    $agent = app()->agent->browser().' '.app()->agent->version();
	} elseif (app()->agent->is_robot()) {
	    $agent = app()->agent->robot();
	} elseif (app()->agent->is_mobile()) {
	    $agent = app()->agent->mobile();
	} else {
	    $agent = 'Unidentified User Agent';
	}

	$desc = $agent .' | ' . app()->agent->platform();

	$query = app()->db
		->from('cc_visitor')
	    ->where(['ip_address' => app()->input->ip_address()])
	    ->get();

	if (!$query->row()) {
		$data = [
			'ip_address' => app()->input->ip_address(),
			'last_visit' => NOW,
			'counter' => 1,
			'description' => $desc
		];
		app()->db->insert('cc_visitor', $data);
	} else {
		$row = $query->row();
		$data = [
			'last_visit' => NOW,
			'counter' => $row->counter + 1
		];
		app()->db
			->where('ip_address', app()->input->ip_address())
		    ->update('cc_visitor', $data);
	}

}
}


if (!function_exists('blockedIsEnd')) {

function blockedIsEnd() {
	$date = new Datetime();
	$now = $date->format('Y-m-d H:i:s');
	$query = app()->db->query('UPDATE cc_block_client SET blocked_status = "end" WHERE TIME_TO_SEC(TIMEDIFF( blocked_until, "'.$now.'")) <= 1 ');
}
}

if (!function_exists('userIsBlocked')) {
function userIsBlocked($ip) {
	$query = app()->db->query('SELECT *, count(*) as count FROM cc_block_client WHERE ip_address = "'.$ip.'" AND blocked_status = "active"');
	if ($row = $query->row()) {
		if ($row->count >= 1) {
			return $query->row();
		}
	} 

	return false;
}
}

if (!function_exists('countUserBlocked')) {
function countUserBlocked($ip) {
	$query = app()->db->query('SELECT count(*) as count FROM cc_block_client WHERE ip_address = "'.$ip.'" ');
	if ($row = $query->row()) {
		if ($row->count >= 1) {
			return $row->count;
		}
	} 

	return 1;
}
}

if (!function_exists('blockUser')) {
function blockUser() {
	app()->load->library('user_agent');

	$date = new Datetime();
	$total_blocked = (int) countUserBlocked(app()->input->ip_address());

	$date->add(date_interval_create_from_date_string((TIME_BLOCKED * $total_blocked) . ' minutes'));

	if (app()->agent->is_browser()) {
	    $agent = app()->agent->browser().' '.app()->agent->version();
	} elseif (app()->agent->is_robot()) {
	    $agent = app()->agent->robot();
	} elseif (app()->agent->is_mobile()) {
	    $agent = app()->agent->mobile();
	} else {
	    $agent = 'Unidentified User Agent';
	}

	$desc = $agent .' | ' . app()->agent->platform();

	$data = [
		'ip_address' => app()->input->ip_address(),
		'blocked_date' => NOW,
		'blocked_until' => $date->format('Y-m-d H:i:s'),
		'blocked_status' => 'active',
		'description' => $desc
	];
	app()->db->insert('cc_block_client', $data);
}
}

if (!function_exists('time_ago')) {

function time_ago($time, $akhiran = " ago"){
	$datetime1 = date_create(date("Y-m-d H:i:s"));
	$datetime2 = date_create($time);
	$interval = date_diff($datetime1, $datetime2);
	$keterangan = "a few seconds " . $akhiran;
	if($interval->y != 0){
		$keterangan = $interval->y . " years " . $akhiran;
	}elseif($interval->m != 0){
		$keterangan = $interval->m . " month " . $akhiran;
	}elseif($interval->d != 0){
		$keterangan = $interval->d . " days " . $akhiran;
	}elseif($interval->h != 0){
		$keterangan = $interval->h . " hours " . $akhiran;
	}elseif($interval->i != 0){
		$keterangan = $interval->i . " minutes " . $akhiran;
	}elseif($interval->s != 0){
		$keterangan = $interval->s . " seconds " . $akhiran;
	}

	return $keterangan;

}
}

blockedIsEnd();
updateVIsitor();

if ($user_block = userIsBlocked(app()->input->ip_address())) {
	$data = [
		'uri' => app()->uri->uri_string,
		'module' => 'block',
		'method' => app()->input->method(),
		'param_post' => json_encode($_POST),
		'ip_address' => app()->input->ip_address(),
		'created_at' => $now
	];
	app()->db->insert('cc_log', $data);
	
	app()->load->library('aauth');
	app()->aauth->logout();
	if (app()->input->is_ajax_request()) {
		return app()->response([
			'success' => false,
			'message' => 'Sorry you are blocked by system because doing post excessive, you can perform post activities until '.time_ago($user_block->blocked_until, 'later :)')
			]);
	} else {
		$base_url_extension = url_extension(basename(__DIR__)); 
		$user_block = $user_block;
		require_once  __DIR__ . '/block_notif.php'; 
	}
	exit;
}

if (app()->input->method() == 'post') {

	app()->load->dbforge();
	app()->dbforge->add_field(array(
	        'id' => array(
	                'type' => 'INT',
	                'constraint' => 11,
	                'unsigned' => TRUE,
	                'auto_increment' => TRUE
	        ),
	        'uri' => array(
	                'type' => 'TEXT',
	                'null' => TRUE,
	        ),
	        'module' => array(
	                'type' => 'VARCHAR',
	                'constraint' => '250',
	                'null' => TRUE,
	        ),
	        'method' => array(
	                'type' => 'VARCHAR',
	                'constraint' => '250',
	                'null' => TRUE,
	        ),
	        'param_post' => array(
	                'type' => 'TEXT',
	                'null' => TRUE,
	        ),
	        'ip_address' => array(
	                'type' => 'VARCHAR',
	                'constraint' => '250',
	                'null' => TRUE,
	        ),
	        'created_at' => array(
	                'type' => 'DATETIME',
	                'null' => TRUE,
	        ),
	));
	app()->dbforge->add_key('id', TRUE);
	app()->dbforge->create_table('cc_log', true);

	$data = [
		'uri' => app()->uri->uri_string,
		'module' => app()->uri->segment(2),
		'method' => app()->input->method(),
		'param_post' => json_encode($_POST),
		'ip_address' => app()->input->ip_address(),
		'created_at' => $now
	];
	app()->db->insert('cc_log', $data);

	foreach ($blocked_rules as $rules) {
		$query = app()->db->query('
			SELECT 
				*,COUNT(*) AS totals,ABS(TIME_TO_SEC(TIMEDIFF( created_at, "'.$now.'"))) as diff 
			FROM cc_log 
			WHERE ip_address = "'.app()->input->ip_address().'" AND ABS(TIME_TO_SEC(TIMEDIFF( created_at, "'.$now.'"))) <= '.$rules['time_limit']);

		$row = $query->row();

		if ($row->totals >= $rules['max_post']) {
			blockUser();
		}
	}
}

if (!function_exists('get_perm_denied')) {
function get_perm_denied() {
	return require_once __DIR__ . '/config_perm_denied.php';
}
}

if (!function_exists('inject_allowed_perm')) {
function inject_allowed_perm($perm) {
	$perm_denied = get_perm_denied();


	foreach ((array) $perm_denied as $mod) {
		if ($mod['perm'] == $perm) {

			if (in_array(app()->input->method(), explode(',', $mod['method']))) {
				if (app()->input->is_ajax_request()) {

					echo json_encode([
						'success' => false,
						'message' => 'Sorry this feature disabled in demo version'
						]); exit;
				} else {
					app()->session->set_flashdata('f_message', 'Sorry this feature disabled in demo version');
                    app()->session->set_flashdata('f_type', 'warning');
                    redirect_back('administrator/dashboard','refresh');
				}
			}
		}
	}
}
}
app()->cc_app->onEvent('auth_allowed_permission', 'inject_allowed_perm');
?>