<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if($_SERVER["HTTP_HOST"] == '188.165.238.102')
{
	//-- Added for new server configuration on 01 September
	$sitefolder = "/";
}
else if($_SERVER["HTTP_HOST"] == 'admin.easyapps.fr' || $_SERVER["HTTP_HOST"] == 'www.admin.easyapps.fr' || $_SERVER["HTTP_HOST"] == 'admin.metappli.com' || $_SERVER["HTTP_HOST"] == 'www.admin.metappli.com' || $_SERVER["HTTP_HOST"] == 'admin.metappli.fr' || $_SERVER["HTTP_HOST"] == 'www.admin.metappli.fr')
{
	//-- Added for new server configuration on 01 September
	$sitefolder = "/";
}
else
{
	$sitefolder = "/easyapps/gettingstarted/";;
}

if($_SERVER["HTTP_HOST"] == '188.165.238.102' || $_SERVER["HTTP_HOST"] == 'admin.easyapps.fr' || $_SERVER["HTTP_HOST"] == 'www.admin.easyapps.fr')
{
	//-- Added for new server configuration on 01 September
	$config['logo_name_en']	= "logo.png";
	$config['logo_name_fr']	= "logo_french.png";
	$config['domain_title']	= "EasyApps";
}
else if ($_SERVER["HTTP_HOST"] == 'admin.metappli.com' || $_SERVER["HTTP_HOST"] == 'www.admin.metappli.com' || $_SERVER["HTTP_HOST"] == 'admin.metappli.fr' || $_SERVER["HTTP_HOST"] == 'www.admin.metappli.fr')
{
	$config['logo_name_en']	= "mattapli-logo.png";
	$config['logo_name_fr']	= "mattapli-logo.png";
	$config['domain_title']	= "METAPPLI";
}
else
{
	$config['logo_name_en']	= "logo.png";
	$config['logo_name_fr']	= "logo_french.png";
	$config['domain_title']	= "EasyApps";
}
 
$config['base_url']	= "http://".$_SERVER["HTTP_HOST"].$sitefolder;

$config['basedatatable_js']	= $config['base_url']."assets/data-tables/js/";
$config['basedatatable_css'] = $config['base_url']."assets/data-tables/css/";
$config['base_assets']	= $config['base_url']."assets/";
$config['base_js']	= $config['base_url']."assets/js/";
$config['base_image']	= $config['base_url']."assets/images/";
$config['base_logo']	= $config['base_url']."assets/images/";
$config['base_css']	= $config['base_url']."assets/css/";
$config['base_font_awsome']	= $config['base_url']."assets/font-awesome/";
$config['base_bootstrap']	= $config['base_url']."assets/bootstrap/";
$config['base_path']	= $_SERVER["DOCUMENT_ROOT"].$sitefolder;
$config['base_upload']	= $config['base_url']."uploads/";
$config['permitted_uri_chars']  = '';
$config['empty_image']	= $config['base_image']."empty.png";
$config['empty_image_app']	= $_SERVER["HTTP_HOST"].$sitefolder."assets/images/empty.png";

$config['googleplus']['api_key'] = 'AIzaSyBjpOX7w0lG1YJEzvxj5dCLIP_9vO_gi74';
$config['base_download_url']	= $config['base_url']."downloads/";
$config['base_path'] =  $_SERVER['DOCUMENT_ROOT'].$sitefolder;

$config['base_download_path'] =$_SERVER['DOCUMENT_ROOT'].$sitefolder."downloads/";

$config['index_page'] = 'index.php';
$config['uri_protocol']	= 'AUTO';
$config['url_suffix'] = '';
$config['language']	= 'english';
$config['charset'] = 'UTF-8';
$config['enable_hooks'] = FALSE;
$config['subclass_prefix'] = 'MY_';
$config['permitted_uri_chars'] = 'a-z 0-9~%.:_\-';
$config['allow_get_array']		= TRUE;
$config['enable_query_strings'] = FALSE;
$config['controller_trigger']	= 'c';
$config['function_trigger']		= 'm';
$config['directory_trigger']	= 'd';
$config['log_threshold'] = 0;
$config['log_path'] = '';
$config['log_date_format'] = 'Y-m-d H:i:s';
$config['cache_path'] = '';
$config['encryption_key'] = '12345';
$config['sess_cookie_name']		= 'ci_session';
$config['sess_expiration']		= 7200;
$config['sess_expire_on_close']	= FALSE;
$config['sess_encrypt_cookie']	= FALSE;
$config['sess_use_database']	= FALSE;
$config['sess_table_name']		= 'ci_sessions';
$config['sess_match_ip']		= FALSE;
$config['sess_match_useragent']	= TRUE;
$config['sess_time_to_update']	= 300;
$config['cookie_prefix']	= "";
$config['cookie_domain']	= "";
$config['cookie_path']		= "/";
$config['cookie_secure']	= FALSE;
$config['global_xss_filtering'] = FALSE;
$config['csrf_protection'] = FALSE;
$config['csrf_token_name'] = 'csrf_test_name';
$config['csrf_cookie_name'] = 'csrf_cookie_name';
$config['csrf_expire'] = 7200;
$config['compress_output'] = FALSE;
$config['time_reference'] = 'local';
$config['rewrite_short_tags'] = FALSE;
$config['proxy_ips'] = '';