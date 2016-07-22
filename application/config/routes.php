<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'view_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['login'] = 'login_controller';
$route['register'] = 'register_control';
$route['logout'] = 'login_controller/log_out';
