<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['user']['GET']                   = 'User/get';
$route['user']['POST']                  = 'User/create';
$route['user/change/password']['POST']  = 'User/change_password';
$route['user/delete/(:num)']['POST']    = 'User/delete/$1';
$route['login']['POST']                 = 'User/login';

$route['student/(:num)']['GET']         = 'Student/get/$1';
$route['student/basic']['GET']          = 'Student/get_basic';
$route['student']['POST']               = 'Student/create';
$route['student/edit/(:num)']['POST']   = 'Student/edit/$1';
$route['student/delete/(:num)']['POST'] = 'Student/delete/$1';

$route['finance']['GET']                = 'Finance/get';
$route['finance']['POST']               = 'Finance/create';
$route['fianance/edit/(:num)']['POST']  = 'Finance/edit/$1';
$route['finance/delete/(:num)']['POST'] = 'Finance/delete/$1';