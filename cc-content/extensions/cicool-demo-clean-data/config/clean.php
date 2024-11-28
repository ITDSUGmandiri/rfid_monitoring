<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['ignore'] = [
	'controllers' => [
		'Access.php',
		'Auth.php',
		'Crud.php',
		'Dashboard.php',
		'Doc.php',
		'File.php',
		'Form.php',
		'Group.php',
		'Keys.php',
		'Menu.php',
		'Menu_type.php',
		'Page.php',
		'Permission.php',
		'Rest.php',
		'Setting.php',
		'Extension.php',
		'Blog.php',
		'User.php'
	],
	'apis' => [
		'apidoc.json',
		'Example.php',
		'Group.php',
		'Key.php',
		'User.php'
	],
	'views' => [
		'access' . DIRECTORY_SEPARATOR,
		'crud' . DIRECTORY_SEPARATOR,
		'form' . DIRECTORY_SEPARATOR,
		'form_builder' . DIRECTORY_SEPARATOR,
		'group' . DIRECTORY_SEPARATOR,
		'keys' . DIRECTORY_SEPARATOR,
		'menu' . DIRECTORY_SEPARATOR,
		'menu_type' . DIRECTORY_SEPARATOR,
		'page' . DIRECTORY_SEPARATOR,
		'permission' . DIRECTORY_SEPARATOR,
		'rest' . DIRECTORY_SEPARATOR,
		'setting' . DIRECTORY_SEPARATOR,
		'extension' . DIRECTORY_SEPARATOR,
		'blog' . DIRECTORY_SEPARATOR,
		'user'. DIRECTORY_SEPARATOR
	],
	'models' => [
		'index.html',
		'Model_aauth_groups.php',
		'Model_access.php',
		'Model_crud.php',
		'Model_form.php',
		'Model_group.php',
		'Model_keys.php',
		'Model_menu.php',
		'Model_menu_type.php',
		'Model_page.php',
		'Model_permission.php',
		'Model_rest.php',
		'Model_rest_field.php',
		'Model_setting.php',
		'Model_extension.php',
		'Model_blog.php',
		'Model_user.php'
	],
	'tables' => [
		'cc_visitor',
		'cc_log',
		'blogs',
		'cc_block_client'
	]
];

/* End of file clean.php */