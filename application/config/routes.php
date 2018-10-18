<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/**
 * User CRUD 
 *
 */
$route['user/current']['GET']           = 'User/get_current';
$route['user']['GET']                   = 'User/get';
$route['user']['POST']                  = 'User/create';
$route['user/change/password']['POST']  = 'User/change_password';
$route['user/edit/(:num)']['POST']      = 'User/edit/$1';
$route['user/delete/(:num)']['POST']    = 'User/delete/$1';
$route['login']['POST']                 = 'User/login';

/**
 * Financial_aid CRUD
 * 
 */
$route['financial_aid']['GET']                = 'Financial_aid/get';
$route['financial_aid/(:num)']['GET']         = 'Financial_aid/get/$1';
$route['financial_aid']['POST']               = 'Financial_aid/create';
$route['financial_aid/edit/(:num)']['POST']   = 'Financial_aid/edit/$1';
$route['financial_aid/delete/(:num)']['POST'] = 'Financial_aid/delete/$1';

/**
 * Link financial_aid with student
 */
$route['student_financial']['POST']           = 'Student_financial/create';
$route['student_financial/verify']['POST']    = 'Student_financial/verify';
$route['student_financial/delete']['POST']    = 'Student_financial/delete';
/**
 * FULL
 * 
 */
$route['student/full/(:num)']['GET']          = 'Full/get/$1';

/**
 * Student CRUD
 * 
 */
$route['student/(:num)']['GET']                = 'Student/get/$1';
$route['student/basic']['GET']                 = 'Student/get_basic';
$route['student/basic/(:num)']['GET']          = 'Student/get_basic/$1';
$route['student']['POST']                      = 'Student/create';
$route['student/edit/(:num)']['POST']          = 'Student/edit/$1';
$route['student/delete/(:num)']['POST']        = 'Student/delete/$1';

/**
 * Parent CRUD
 * 
 */
$route['parent/(:num)']['GET']                 = 'Parents/get/$1';
$route['parent/basic/(:num)']['GET']           = 'Parents/get_basic/$1';
$route['parent/(:num)']['POST']                = 'Parents/create/$1';
$route['parent/edit/(:num)']['POST']           = 'Parents/edit/$1';
$route['parent/delete/(:num)']['POST']         = 'Parents/delete/$1';

/**
 * Sibling CRUD
 * 
 */
$route['sibling/(:num)']['GET']                = 'Siblings/get/$1';
$route['sibling/basic/(:num)']['GET']          = 'Siblings/get_basic/$1';
$route['sibling/(:num)']['POST']               = 'Siblings/create/$1';
$route['sibling/edit/(:num)']['POST']          = 'Siblings/edit/$1';
$route['sibling/delete/(:num)']['POST']        = 'Siblings/delete/$1';

/**
 * Family CRUD
 * 
 */
$route['family/(:num)']['GET']                 = 'Family/get/$1';
$route['family/edit/(:num)']['POST']           = 'Family/edit/$1';

/**
 * Finance CRUD
 * 
 */
$route['finance/(:num)']['GET']                = 'Finance/get/$1';
$route['finance/edit/(:num)']['POST']          = 'Finance/edit/$1';

/**
 * Finance_income CRUD
 * 
 */
$route['finance_income/(:num)']['GET']         = 'Finance_income/get/$1';
$route['finance_income/(:num)']['POST']        = 'Finance_income/create/$1';
$route['finance_income/edit/(:num)']['POST']   = 'Finance_income/edit/$1';
$route['finance_income/delete/(:num)']['POST'] = 'Finance_income/delete/$1';

/**
 * Finance_expenditure CRUD
 * 
 */
$route['finance_expenditure/(:num)']['GET']         = 'Finance_expenditure/get/$1';
$route['finance_expenditure/(:num)']['POST']        = 'Finance_expenditure/create/$1';
$route['finance_expenditure/edit/(:num)']['POST']   = 'Finance_expenditure/edit/$1';
$route['finance_expenditure/delete/(:num)']['POST'] = 'Finance_expenditure/delete/$1';

/**
 *  Aircond CRUD
 */
$route['aircond/(:num)']['GET']       = 'Aircond/get/$1';
$route['aircond/edit/(:num)']['POST'] = 'Aircond/edit/$1';

/**
 * House CRUD
 * 
 */
$route['house/(:num)']['GET']         = 'House/get/$1';
$route['house/(:num)']['POST']        = 'House/create/$1';
$route['house/edit/(:num)']['POST']   = 'House/edit/$1';
$route['house/delete/(:num)']['POST'] = 'House/delete/$1';

/**
 * Transport CRUD
 * 
 */
$route['transport/(:num)']['GET']         = 'Transport/get/$1';
$route['transport/(:num)']['POST']        = 'Transport/create/$1';
$route['transport/edit/(:num)']['POST']   = 'Transport/edit/$1';
$route['transport/delete/(:num)']['POST'] = 'Transport/delete/$1';
