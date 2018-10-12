<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;


define("T_USERS"                   , "users");
define("T_STUDENTS"                , "students");
define("T_PARENTS"                 , "parents");
define("T_SIBLINGS"                , "siblings");
define("T_FAMILIES"                , "families");
define("T_FINANCES"                , "finances");
define("T_AIRCONDS"                , "airconds");
define("T_HOUSES"                  , "houses");
define("T_TRANSPORTS"              , "transports");
define("T_FINANCIAL_AIDS"          , "financial_aids");
define("T_PARENT_CMS"              , "parent_cms");
define("T_STUDENT_CMS"             , "student_cms");
define("T_SIBLING_CMS"             , "sibling_cms");
define("T_HOUSE_CMS"               , "house_cms");
define("T_TRANSPORT_CMS"           , "transport_cms");
define("T_STUDENT_FINANCIALS"      , "student_financials");
define("T_FINANCE_INCOMES"         , "finance_incomes");
define("T_FINANCE_EXPENDITURES"    , "finance_expenditures");
define("T_FINANCE_INCOME_CMS"      , "finance_income_cms");
define("T_FINANCE_EXPENDITURE_CMS" , "finance_expenditure_cms");


$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => 'root',
	'database' => 'fulichu',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
