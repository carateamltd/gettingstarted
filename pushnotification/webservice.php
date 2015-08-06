<?php
### TESTING PURPOSE

$myFile = "testFile.txt";
$fh = fopen($myFile, 'w') or die("can't open file");
$stringData = '';
foreach($_REQUEST as $key=>$var){
    $stringData.= $key."==>".$var."\n"; 
}
fwrite($fh, $stringData);
fclose($fh);
#### ENDS HERE

define('_TEXEC', 1 );
define('TPATH_BASE', dirname(dirname(dirname(__FILE__)) ));

define('DS', DIRECTORY_SEPARATOR );
include_once("includes/configuration.php");

include_once("includes/defines.php");

set_time_limit(0);
$callback = '';
if (isset($_REQUEST['callback']))
{
    $callback = filter_var($_REQUEST['callback'], FILTER_SANITIZE_STRING);
}




function createuser($push,$appid){
    //    echo $Url;exit;
    // is cURL installed yet?
    //$appid = '1';
    if($push['vType'] != 'Android'){
        $Url = PUSHURL."registerDeviceMysql.php?appId=".$appid."&deviceToken=".$push['vToken']."";
        
        if (!function_exists('curl_init')){
            die('Sorry cURL is not installed!');
        }
     
        // OK cool - then let's create a new cURL resource handle
        $ch = curl_init();
     
        // Now set some options (most are optional)
     
        // Set URL to download
        curl_setopt($ch, CURLOPT_URL, $Url);  
     
        // Set a referer
        curl_setopt($ch, CURLOPT_REFERER, "http://www.example.org/yay.htm");
     
        // User agent
        curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
     
        // Include header in result? (0 = yes, 1 = no)
        curl_setopt($ch, CURLOPT_HEADER, 0);
     
        // Should cURL return or print out the data? (true = return, false = print)
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     
        // Timeout in seconds
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
     
        // Download the given URL, and return output
        $output = curl_exec($ch);
     
        // Close the cURL resource, and free system resources
        curl_close($ch);
    }else{
        $output =1;
    }
 
    return $output;
    
    //$cmd='curl -i -u "i7zSdDfxRy-itsYZ8yet2Q:7FI_ERf3TQyNelFhsxFYsQ" -H "Content-type: application/json" -X PUT --data \''.$json.'\' https://go.urbanairship.com/api/device_tokens/c9d424bb04afe2f04bf78274c052e34cfa32f4185c66d736289260ea243eec9d';
    //exec($cmd,$result);
    //echo "<pre>";
    //print_r($result);exit;
    //return $ret;   
}

function curlpost($Url,$parmas){
    global $site_url;
    //extract data from the post
    //extract($_POST);
    
    //set POST variables
    $url = $Url;
    $fields = $parmas;
    
    //url-ify the data for the POST
    foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
    rtrim($fields_string, '&');
    
    //open connection
    $ch = curl_init();
    //echo $url."?".$fields_string;exit;
    //set the url, number of POST vars, POST data
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, count($fields));
    curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //execute post
    $result = curl_exec($ch);
    
    //close connection
    curl_close($ch);
    return $result;
}

function pushnotify_Android($push){
  //echo "sa";exit;
    //$json = '{"device_tokens": ["C9D424BB04AFE2F04BF78274C052E34CFA32F4185C66D736289260EA243EEC9D"], "aps":{"alert": "Hello!"}}'; 
    //$json = '{"aps": {"badge": 1, "alert": "test123", "sound": "1"}, "device_tokens": ["C9D424BB04AFE2F04BF78274C052E34CFA32F4185C66D736289260EA243EEC9D"]}';
    $appid = '1';
    $Url = ANDROID_PUSHURL."send_message.php?regId=".$push['device_tokens']."&message=".urlencode($push['message'])."";
    //echo $Url;exit;
    if (!function_exists('curl_init')){
        die('Sorry cURL is not installed!');
    }
 
    // OK cool - then let's create a new cURL resource handle
    $ch = curl_init();
 
    // Now set some options (most are optional)
 
    // Set URL to download
    curl_setopt($ch, CURLOPT_URL, $Url);  
 
    // Set a referer
    curl_setopt($ch, CURLOPT_REFERER, "http://www.example.org/yay.htm");
 
    // User agent
    curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
 
    // Include header in result? (0 = yes, 1 = no)
    curl_setopt($ch, CURLOPT_HEADER, 0);
 
    // Should cURL return or print out the data? (true = return, false = print)
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
    // Timeout in seconds
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
 
    // Download the given URL, and return output
    $output = curl_exec($ch);
 
    // Close the cURL resource, and free system resources
    curl_close($ch);
 
    return $output;
 }

 function pushnotify($push){
  //echo "sa";exit;
    //$json = '{"device_tokens": ["C9D424BB04AFE2F04BF78274C052E34CFA32F4185C66D736289260EA243EEC9D"], "aps":{"alert": "Hello!"}}'; 
    //$json = '{"aps": {"badge": 1, "alert": "test123", "sound": "1"}, "device_tokens": ["C9D424BB04AFE2F04BF78274C052E34CFA32F4185C66D736289260EA243EEC9D"]}';
    $appid = '1';
    $Url = PUSHURL."client/insertmessage.php?appId=".$appid."&submit=submit&deviceToken=".$push['device_tokens']."&certificateId=".$push['certificateId']."&subscriptionId=".$push['subscriptionId']."&message=".urlencode($push['message'])."";
    
    if (!function_exists('curl_init')){
        die('Sorry cURL is not installed!');
    }
 
    // OK cool - then let's create a new cURL resource handle
    $ch = curl_init();
 
    // Now set some options (most are optional)
 
    // Set URL to download
    curl_setopt($ch, CURLOPT_URL, $Url);  
 
    // Set a referer
    curl_setopt($ch, CURLOPT_REFERER, "http://www.example.org/yay.htm");
 
    // User agent
    curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
 
    // Include header in result? (0 = yes, 1 = no)
    curl_setopt($ch, CURLOPT_HEADER, 0);
 
    // Should cURL return or print out the data? (true = return, false = print)
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
    // Timeout in seconds
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
 
    // Download the given URL, and return output
    $output = curl_exec($ch);
 
    // Close the cURL resource, and free system resources
    curl_close($ch);
 
    return $output;
 }
 
 function processNotification($push){
  //echo "sa";exit;
    //$json = '{"device_tokens": ["C9D424BB04AFE2F04BF78274C052E34CFA32F4185C66D736289260EA243EEC9D"], "aps":{"alert": "Hello!"}}'; 
    //$json = '{"aps": {"badge": 1, "alert": "test123", "sound": "1"}, "device_tokens": ["C9D424BB04AFE2F04BF78274C052E34CFA32F4185C66D736289260EA243EEC9D"]}';
    $appid = '1';
    $Url = PUSHURL."processMessageQueueMysql.php";
    //echo $Url;exit;
    if (!function_exists('curl_init')){
        die('Sorry cURL is not installed!');
    }
 
    // OK cool - then let's create a new cURL resource handle
    $ch = curl_init();
 
    // Now set some options (most are optional)
 
    // Set URL to download
    curl_setopt($ch, CURLOPT_URL, $Url);  
 
    // Set a referer
    curl_setopt($ch, CURLOPT_REFERER, "http://www.example.org/yay.htm");
 
    // User agent
    curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
 
    // Include header in result? (0 = yes, 1 = no)
    curl_setopt($ch, CURLOPT_HEADER, 0);
 
    // Should cURL return or print out the data? (true = return, false = print)
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
    // Timeout in seconds
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
 
    // Download the given URL, and return output
    $output = curl_exec($ch);
 
    // Close the cURL resource, and free system resources
    curl_close($ch);
 
    return $output;
 }


function notify_Ios($msg,$devicetoken){
    global  $obj,$site_url;
    
    $contents = array(); 
    $contents['badge'] = "+2"; 
    $contents['alert'] = "".$msg.""; 
    $contents['sound'] = "push.wav";
    $contents['certificateId'] = CERTID;
    $contents['subscriptionId'] = 0;
    $contents['message'] = "".$msg."";
    
    $push = $contents; 
    $push['device_tokens'] = $devicetoken;//'C9D424BB04AFE2F04BF78274C052E34CFA32F4185C66D736289260EA243EEC9D';
    $s =  pushnotify($push);
    
    $s1 =  processNotification($push);
                         
    return $s1;
}


function notify_Android($msg,$devicetoken){
    global  $obj,$site_url;
    
    $contents = array(); 
    $contents['badge'] = "+2"; 
    $contents['alert'] = "".$msg.""; 
    $contents['sound'] = "push.wav";
    $contents['certificateId'] = CERTID;
    $contents['subscriptionId'] = 0;
    $contents['message'] = "".$msg."";
    
    $push = $contents; 
    $push['device_tokens'] = $devicetoken;//'C9D424BB04AFE2F04BF78274C052E34CFA32F4185C66D736289260EA243EEC9D';
    
    $s =  pushnotify_Android($push);
    return $s;
}
## DEFAULT REQUIRED VARIABLE 
$action = $_REQUEST['action'];
$arr = array();
$vDeviceid = $_REQUEST['vDeviceid'];

switch($action){
    case "register":
        $vDevicename = $_REQUEST['vDevicename'];
        $devicetoken = $_REQUEST['deviceToken'];
        $vType = $_REQUEST['vType'];
        
        $devicetoken = str_replace("<","",$devicetoken);
        $devicetoken = str_replace(">","",$devicetoken);
        $devicetoken = str_replace(" ","",$devicetoken);

        if($vDeviceid != ''){
            $sql="select * from user where vDeviceid='".$vDeviceid."'";  
            $db_res = $obj->MySQLSelect($sql);
            
            if(count($db_res) > 0){
                    $data['vDeviceid']=$vDeviceid;
                    $data['vDevicename']=$vDevicename;
                    $data['vToken']=$devicetoken;
                    $data['vType']=$vType;
                    
                    $student_url = "http://122.170.107.160/pushnotification/student.xml";
                    $response_xml_data = file_get_contents($student_url);
                    $a = json_decode(json_encode((array) simplexml_load_string($response_xml_data)),1);
                    $items = $a['item'];
                    $already = 0;
                    for($i=0;$i<count($items);$i++){
                        if($vDeviceid == $items[$i]['deviceid']){
                            $already    = 1;
                        }
                    }
                    
                    $newArray = $items;
                    $currenStr  = "";
                    if($already == 0){
                        $currentArray = array("name"=>$vDevicename,"id"=>count($items)+1,"deviceid"=>$vDeviceid,"group"=>$vType);
                        $newArray[] = $currentArray;
                    }
                    for($i=0;$i<count($newArray);$i++){
                        $currenStr.= '<item>'."\n"
                                    .'<name>'.$newArray[$i]['name'].'</name>'."\n"
                                    .'<id>'.$newArray[$i]['id'].'</id>'."\n"
                                    .'<deviceid>'.$newArray[$i]['deviceid'].'</deviceid>'."\n"
                                    .'<group>'.$newArray[$i]['group'].'</group>'."\n"
                                .'</item>'."\n"."\n";
                    }            
                    $xml = '<?xml version="1.0" encoding="ISO-8859-1"?>'."\n"
                            .'<student>'."\n"."\n"
                            .$currenStr
                            .'</student>'."\n";
                    
                    $file = fopen("student.xml","w");
                    fwrite($file,$xml);
                    fclose($file);
                    
                    if($vDeviceid == $db_res[0]['vDeviceid']){
                        //createuser($data,APPID);
                        $id = $obj->MySQLQueryPerform("user",$data,'update'," vDeviceid='".$vDeviceid."'");
                    }else{
                        
                        $id = $obj->MySQLQueryPerform("user",$data,'insert');
                    }
                    
                    
                    if($id > 0){
                        $var_msg = 1;
                        $s =  createuser($data,APPID);
                        $arr['id'] = $id;
                        $arr['success'] = "yes";
                        $arr['msg'] = "Registered successfully.";
                    }else{
                        $arr['success'] = "no";
                        $arr['msg'] = "Error-in register. Please try again.";
                    }
                
            }else{
                $data['vDeviceid']=$vDeviceid;
                $data['vDevicename']=$vDevicename;
                $data['vToken']=$devicetoken;
                $data['vType']=$vType;
                $id = $obj->MySQLQueryPerform("user",$data,'insert');
                
                $student_url = "http://122.170.107.160/pushnotification/student.xml";
                    $response_xml_data = file_get_contents($student_url);
                    $a = json_decode(json_encode((array) simplexml_load_string($response_xml_data)),1);
                    $items = $a['item'];
                    $already = 0;
                    for($i=0;$i<count($items);$i++){
                        if($vDeviceid == $items[$i]['deviceid']){
                            $already    = 1;
                        }
                    }
                    
                    $newArray = $items;
                    $currenStr  = "";
                    if($already == 0){
                        $currentArray = array("name"=>$vDevicename,"id"=>count($items)+1,"deviceid"=>$vDeviceid,"group"=>$vType);
                        $newArray[] = $currentArray;
                    }
                    for($i=0;$i<count($newArray);$i++){
                        $currenStr.= '<item>'."\n"
                                    .'<name>'.$newArray[$i]['name'].'</name>'."\n"
                                    .'<id>'.$newArray[$i]['id'].'</id>'."\n"
                                    .'<deviceid>'.$newArray[$i]['deviceid'].'</deviceid>'."\n"
                                    .'<group>'.$newArray[$i]['group'].'</group>'."\n"
                                .'</item>'."\n"."\n";
                    }            
                    $xml = '<?xml version="1.0" encoding="ISO-8859-1"?>'."\n"
                            .'<student>'."\n"."\n"
                            .$currenStr
                            .'</student>'."\n";
                    
                    $file = fopen("student.xml","w");
                    fwrite($file,$xml);
                    fclose($file);
                    
                if($id > 0){
                    $var_msg = 1;
                    $s =  createuser($data,APPID);
                    $arr['id'] = $id;
                    $arr['success'] = "yes";
                    $arr['msg'] = "Registered successfully.";
                }else{
                    $arr['success'] = "no";
                    $arr['msg'] = "Error-in register. Please try again.";
                }
                
            }
        }else{
            $arr['success'] = "no";
            $arr['msg'] = "No Device found.";
        }
    break;
    case "sendNotification":
        $msg = $_REQUEST['msg'];
        if($vDeviceid != ''){
            $sql="select * from user where vDeviceid='".$vDeviceid."'";  
            $db_res = $obj->MySQLSelect($sql);
            
            if(count($db_res) > 0){
                    $toDeviceType = $db_res[0]['vType'];
                    $id = $db_res[0]['iUserId'];
                    $devicetoken = $db_res[0]['vToken'];
                    
                    if($id > 0){
                        if($toDeviceType =='IOS'){
                            notify_Ios($msg,$devicetoken);
                        }else{
                            notify_Android($msg,$devicetoken);
                        }
                        $arr['id'] = $id;
                        $arr['success'] = "yes";
                        $arr['msg'] = "Sent successfully.";
                    }else{
                        $arr['success'] = "no";
                        $arr['msg'] = "Error-in sending notification. Please try again.";
                    }
                
            }else{
                $arr['success'] = "no";
                $arr['msg'] = "No Device found.";
            }
        }else{
            $arr['success'] = "no";
            $arr['msg'] = "No Device found.";
        }
    break;
}


header('Content-type: text/html');
$main = (json_encode($arr));
if($callback != ''){
    echo $callback . '('.$main.');';
}else{
    echo $main;
}
exit;
?>
