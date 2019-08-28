<?php

include("../helpers/mysqli_connect.php");

if(!empty($_POST['id'])){
    try {
        //del data from the database
        $sql = "UPDATE devices SET device_name = '{$_POST['deviceName']}', device_imei = '{$_POST['deviceImei']}', device_datetime = CURRENT_TIMESTAMP, device_group_id = {$_POST['deviceGroupId']} WHERE device_id = {$_POST['id']} ";
        $conn->query($sql);

        echo json_encode(true);

    } catch (Exception $e) {
        echo json_encode(false);
    }
}else {
    try {
        //del data from the database
        $sql = "INSERT INTO devices (device_name, device_imei, device_status_id, device_datetime, device_group_id) VALUE ('{$_POST['deviceName']}', '{$_POST['deviceImei']}', 0, CURRENT_TIMESTAMP, {$_POST['deviceGroupId']}) ";
        $conn->query($sql);

        echo json_encode(true);

    } catch (Exception $e) {
        echo json_encode(false);
    }
}

?>