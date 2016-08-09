<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'view_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['login'] = 'login_controller';
$route['register'] = 'register_control';
$route['logout'] = 'login_controller/log_out';

$route['catelog'] = 'course_controller';
$route['catelog/android'] = 'course_controller/pick_catalog/1';
$route['catelog/non-tech'] = 'course_controller/pick_catalog/2';
$route['catelog/web'] = 'course_controller/pick_catalog/3';
$route['catelog/database'] = 'course_controller/pick_catalog/4';
$route['catelog/datascience'] = 'course_controller/pick_catalog/5';
$route['catelog/filter'] = 'course_controller/filter';
$route['search'] = 'course_controller/search';