<?php
error_reporting(0);

define('_TEXEC', 1 );
define('TPATH_BASE', dirname(dirname(dirname(__FILE__)) ));

define('DS', DIRECTORY_SEPARATOR );
include_once("includes/configuration.php");

include_once("includes/defines.php");


?>
<?php
function send($push,$appid){
    //    echo $Url;exit;
    // is cURL installed yet?
    //$appid = '1';
    //if($push['vType'] != 'Android'){
        $Url = "http://122.170.107.160/pushnotification/webservice.php?action=sendNotification&vDeviceid=".$push['deviceid']."&msg=".urlencode($push['message'])."";
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
    
    //$cmd='curl -i -u "i7zSdDfxRy-itsYZ8yet2Q:7FI_ERf3TQyNelFhsxFYsQ" -H "Content-type: application/json" -X PUT --data \''.$json.'\' https://go.urbanairship.com/api/device_tokens/c9d424bb04afe2f04bf78274c052e34cfa32f4185c66d736289260ea243eec9d';
    //exec($cmd,$result);
    //echo "<pre>";
    //print_r($result);exit;
    //return $ret;   
}

function create(){	   
	   	   	   
    }
if($_POST){
    if($_POST){
		  
		  $xml=simplexml_load_file('http://122.170.107.160/pushnotification/student.xml');
		  
        $post=$_POST;
        
		  $Data=$_POST['Data'];
		  $json = json_encode($xml);
		  
		  $array = json_decode($json,TRUE);	   
		  $totStudent = $array['item'];
		  
        $sql="select * from user";  
        $db_res = $obj->MySQLSelect($sql);
    
		  for($i=0;$i<count($db_res);$i++){			 
			 if($Data['eType']=='Group'){
				if($totStudent[$i]['group']==$post['group_name']){			
				    $arrrr['deviceid']= $db_res[$i]['vDeviceid'];
				    $arrrr['message']= $post['message'];
				}
			 }else{
				
				$startingclause='Hello '.$db_res[$i]['vDevicename'].',';
				$arrrr['deviceid']= $db_res[$i]['vDeviceid'];
				$arrrr['message']= $startingclause.$post['message'];
			 }
          /*echo "<pre>";
          print_r($arrrr);*/
			 send($arrrr,1);
		  }
		 //exit;
	   }
    ?>
    <script>window.location='http://dashboard.schoollifebroadcasting.com/notification?msg=Notification Sent Successfully';</script>
    
    <?php
    exit;
    /*
    $xml=simplexml_load_file("student.xml");
    $json = json_encode($xml);
    $array = json_decode($json,TRUE);
    
    
    //$totStudent = $array['item'];
    $sql="select * from user WHERE vType = 'IOS'";  
    $db_res = $obj->MySQLSelect($sql);
    
    for($i=0;$i<count($db_res);$i++){
        $arrrr['deviceid']= $db_res[$i]['vDeviceid'];
        $arrrr['message']= $_POST['message'];    
        send($arrrr,1);
    }
    */
}

?>
<form name="frm" id="frm" action="" method="post">
    <div>Reading XML from  : <a href="http://184.107.213.34/~projects/demo_projects/mobile/pushnotification/student.xml">http://184.107.213.34/~projects/demo_projects/mobile/pushnotification/student.xml</a></div>
    <div><br/>Message : <textarea name="message" id="message"></textarea></div>
    <input type="submit" name="submit" value="Send">
</form>