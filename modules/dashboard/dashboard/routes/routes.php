<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route[ADMIN_NAMESPACE_URL.'/dashboard/(:num)-(:any)'] = 'dashboard/backend/dashboard/edit/$1-$2';