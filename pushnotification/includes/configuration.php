<?php
//phpinfo();exit;
if((strpos($_SERVER["HTTP_HOST"],"localhost") >= 0 || strpos($_SERVER["HTTP_HOST"],"192.168.1") >= 0) && strpos($_SERVER["HTTP_HOST"],"localhost") != '')
{
	$tconfig["tsite_folder"] = "/WEBSERVICE/pushnotification";
	$tconfig["tsite_folder1"] = "/WEBSERVICE/pushnotification";
}	
else
{
	$tconfig["tsite_folder"] = "/pushnotification";
	$tconfig["tsite_folder1"] = "\htdocs\pushnotification";
}

$tconfig["tsite_admin"] = "admin";
$tconfig["tsite_url"] = "http://".$_SERVER["HTTP_HOST"].$tconfig["tsite_folder"];


$site_path	= $_SERVER["DOCUMENT_ROOT"].$tconfig["tsite_folder"];
$site_url = $tconfig["tsite_url"];

//echo $_SERVER["DOCUMENT_ROOT"];exit;
$tconfig["tpanel_url"] = "http://".$_SERVER["HTTP_HOST"]."/".$tconfig["tsite_folder"]."/".$tconfig["tsite_admin"];

$admin_url = $tconfig["tpanel_url"];
$admin_path=$_SERVER["DOCUMENT_ROOT"].$tconfig["tsite_folder"]."/".$tconfig["tsite_admin"];

define('PUSHURL', $tconfig["tsite_url"].'/pushnotify/');
define('ANDROID_PUSHURL', $tconfig["tsite_url"].'/pushnotify_Android/');

define('APPID', '1');
define('CERTID', '1');

if(!defined('DS')) define('DS', DIRECTORY_SEPARATOR);
if(!defined('TPATH_BASE')) define('TPATH_BASE','E:\xampp');

//defined( '_TEXEC' ) or die( 'Restricted access' );
//$parts = explode( DS, TPATH_BASE );

define( 'TPATH_ROOT',			TPATH_BASE.$tconfig["tsite_folder1"] );

define( 'TPATH_ADMINISTRATOR', 	TPATH_ROOT.DS.'admin' );
define( 'TPATH_LIBRARIES', 		TPATH_ROOT.DS.'libraries' );
define( 'TPATH_CLASS_DATABASE', 		TPATH_ROOT.DS.'libraries'.DS.'database' );

define( 'TPATH_CLASS_GEN', 		TPATH_ROOT.DS.'libraries'.DS.'general/' );

$imagemagickinstalldir='/usr/local/bin';
$useimagemagick = "Yes";


if((strpos($_SERVER["HTTP_HOST"],"localhost") >= 0 || strpos($_SERVER["HTTP_HOST"],"192.168.1") >= 0) && strpos($_SERVER["HTTP_HOST"],"localhost") != '')
{

	define( 'TSITE_SERVER','localhost');
	define( 'TSITE_DB','pushnotification_all');
	define( 'TSITE_USERNAME','root');
	define( 'TSITE_PASS','root');
	
	/**
	* Database config variables
	*/
  define("DB_HOST", "localhost");
  define("DB_USER", "root");
  define("DB_PASSWORD", "root");
  define("DB_DATABASE", "emergancycall");
	
  /*
	* Google API Key
	*/
  //define("GOOGLE_API_KEY", "AIzaSyDTrUlkLcYCDF6BFq8pEVU_UaNhtro2Onc"); // Place your Google API Key WETIME
  //define("GOOGLE_API_KEY", "AIzaSyArqIUvORyn7hSZ9jpeyH0idYz2oiQvCys"); // EMERGENCYCALL
  define("GOOGLE_API_KEY", "AIzaSyB3uZ55lOhoD4EUwMLFUPqepLllHxa9Wlg"); // PUSH TEST
}
else
{

	define( 'TSITE_SERVER','localhost');
	define( 'TSITE_DB','pushnotification');
	define( 'TSITE_USERNAME','phpdev');
	define( 'TSITE_PASS','phpdev@SQL_iih');
	/**
	* Database config variables
	*/
  define("DB_HOST", "localhost");
  define("DB_USER", "phpdev");
  define("DB_PASSWORD", "phpdev@SQL_iih");
  define("DB_DATABASE", "pushnotification");
	
  /*
	* Google API Key
	*/
  //define("GOOGLE_API_KEY", "AIzaSyDTrUlkLcYCDF6BFq8pEVU_UaNhtro2Onc"); // Place your Google API Key WETIME
  //define("GOOGLE_API_KEY", "AIzaSyArqIUvORyn7hSZ9jpeyH0idYz2oiQvCys"); // EMERGENCYCALL
  define("GOOGLE_API_KEY", "AIzaSyB3uZ55lOhoD4EUwMLFUPqepLllHxa9Wlg"); // PUSH TEST
}

//Certificate folder
$certificateFolder = 'certificates';


//Push and Feedback servers
//These urls are stored in mySQL in the CertificateTypes table.

//Date settings. Apple uses UTC dates for Feedback info
date_default_timezone_set('UTC');

function p($var){
	echo "<pre>";
	print_r($var);
	echo "<hr>";
}
?>
