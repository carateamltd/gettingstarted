<?php
//error_reporting(E_ALL);
session_start();

//echo TPATH_CLASS_DATABASE."\class.dbquery.php";exit;
if(!isset($obj))
{
	//echo TPATH_CLASS_DATABASE."class.dbquery.php";exit;
	require_once(TPATH_CLASS_DATABASE."\class.dbquery.php");
	
	//echo TSITE_SERVER, TSITE_DB, TSITE_USERNAME,TSITE_PASS;
	$obj=	new DBConnection(TSITE_SERVER, TSITE_DB, TSITE_USERNAME,TSITE_PASS);
	//print_r($obj);exit;
}
?>
