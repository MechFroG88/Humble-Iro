<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;


define("T_USERS"                   , "users");
define("T_STUDENTS"                , "students");
define("T_PARENTS"                 , "parents");
define("T_SIBLINGS"                , "siblings");
define("T_FAMILY"                  , "family");
define("T_FINANCE"                 , "finance");
define("T_AIRCOND"                 , "aircond");
define("T_HOUSE"                   , "house");
define("T_TRANSPORT"               , "transport");
define("T_FINANCIAL_AID"           , "financial_aid");
define("T_PARENTS_CMS"             , "parents_cms");
define("T_STUDENTS_CMS"            , "students_cms");
define("T_SIBLINGS_CMS"            , "siblings_cms");
define("T_HOUSE_CMS"               , "house_cms");
define("T_TRANSPORT_CMS"           , "transport_cms");
define("T_FINANCE_INCOME"          , "finance_income");
define("T_FINANCE_EXPENDITURE"     , "finance_expenditure");
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
