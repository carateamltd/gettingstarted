<?php
# -*- coding: utf-8 -*-
##
##     Copyright (c) 2010 Benjamin Ortuzar Seconde <bortuzar@gmail.com>
##
##     This file is part of APNS.
##
##     APNS is free software: you can redistribute it and/or modify
##     it under the terms of the GNU Lesser General Public License as
##     published by the Free Software Foundation, either version 3 of
##     the License, or (at your option) any later version.
##
##     APNS is distributed in the hope that it will be useful,
##     but WITHOUT ANY WARRANTY; without even the implied warranty of
##     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
##     GNU General Public License for more details.
##
##     You should have received a copy of the GNU General Public License
##     along with APNS.  If not, see <http://www.gnu.org/licenses/>.
##
##
## $Id: processMessageQueue.php 168 2010-08-28 01:24:04Z Benjamin Ortuzar Seconde $
##


require_once('config1.php');
require_once('classes/MessageStatus.php');
require_once('classes/DataServiceMysql.php');
require_once('classes/Apns.php');

//echo "<pre>";
//echo "<br/>Started processing message queue";

//get the certificates
$certificates = DataService::singleton()->getCertificates();

//echo "<pre>";

foreach ($certificates as $certificate) {

    //get N new messages from queue. We can get more messages on the next schedule
    //echo "<br/>Getting messages for: [{$certificate['CertificateName']}]";
    
    $messagesArray = DataService::singleton()->getMessages($certificate['CertificateId'], MessageStatus::UNPROCESSED, 1000);
    //print_r($messagesArray);exit;    
    //if no messages for app continue with next
    if (count($messagesArray) == 0) {
        continue;
    }

    //connect to apple push notification server with the app credentials
    $certificatePath = $certificateFolder . '/' . $certificate['KeyCertFile'];
    //echo $certificatePath;
    
    $server = DataService::singleton()->getCertificateServer($certificate['CertificateId'], 1);
    //print_r($server);exit;    
    //var_dump($server);
    //var_dump($certificate['Passphrase']);
    //echo $server[0]['ServerUrl'];
    
    $apns = new apns($server[0]['ServerUrl'], $certificatePath, $certificate['Passphrase']);
    
    
    //send each message
    foreach ($messagesArray as $message) {

        //send payload to device
        //echo $message->DeviceToken, $message->Message, $message->Badge, $message->Sound;
        $apns->sendMessage($message['DeviceToken'], $message['Message'], $message['Badge'], $message['Sound']);

        //mark as sent
        DataService::singleton()->setMessageStatus($message['MessageId'], 2);
    }

    //execute the APNS desctructor so the connection is closed.
    unset($apns);
}
echo "Success";


?>