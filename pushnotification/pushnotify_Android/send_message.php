<?php
if (isset($_GET["regId"]) && isset($_GET["message"])) {
    $regId = $_GET["regId"];
    $message = $_GET["message"];
 
    include_once './GCM.php';
 
    $gcm = new GCM();
 
    $registatoin_ids = array($regId);
    $message = array("message" => $message,"msgcnt"=>1);
 
    $result = $gcm->send_notification($registatoin_ids, $message);
 
    echo $result;
}
?>