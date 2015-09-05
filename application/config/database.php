<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$active_group = 'default';
$active_record = TRUE;
if($_SERVER["HTTP_HOST"] == '188.165.238.102')
{
	//-- Added for new server configuration on 01 September
	$db['default']['hostname'] = 'localhost';
	$db['default']['username'] = 'easyappcarateam';
	$db['default']['password'] = 'neweraeasyapps123';
	$db['default']['database'] = 'easyappsdb';
}
else if($_SERVER["HTTP_HOST"] == 'admin.easyapps.fr')
{
	//-- Added for new server configuration on 01 September
	$db['default']['hostname'] = 'localhost';
	$db['default']['username'] = 'easyappcarateam';
	$db['default']['password'] = 'neweraeasyapps123';
	$db['default']['database'] = 'easyappsdb';
}
else 
{
	$db['default']['hostname'] = 'localhost';
	$db['default']['username'] = 'root';
	$db['default']['password'] = '';
	$db['default']['database'] = 'easyappsdb';
}
$db['default']['dbdriver'] = 'mysql';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;