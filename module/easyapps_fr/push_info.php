<?php
$servername = "localhost";
$username = "erestaurant";
$password = "erestaurant@SQL_iih";
$dbname = "erestaurant";

// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
$conn=mysql_connect($servername, $username, $password);
$selected = mysql_select_db("erestaurant",$conn)or die("Could not select examples");


		function savedata($val)
        {
            $registered_project_id = $val['registered_project_id'];
            $devices_type = $val['devices_type'];
            $devices_uuid = $val['devices_uuid'];
            $currentDate =  date('Y-m-d', time());  

            //http://localhost/iih_pushnotification/pushnotification_info.html?registered_project_id=5&devices_type=android&devices_uuid=1658
            
            $q= "INSERT INTO `registered_project_devices`(`registered_project_devices_id`, `registered_project_id`, `devices_type`, `devices_uuid`, `created_date`) 
                                                VALUES ('','".$registered_project_id."','".$devices_type."','".$devices_uuid."','".$currentDate."')";
            $res=mysql_query($q);
            if($res == 1)
            {
            	return mysql_insert_id();
            }
            else{
            	return $res;
            }
        }

        echo $s=savedata($_GET);


?>