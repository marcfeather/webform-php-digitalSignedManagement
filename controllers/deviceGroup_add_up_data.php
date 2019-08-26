<?php

include("../helpers/mysqli_connect.php");

if(!empty($_POST['id'])){
    try {
        //del data from the database
        $sql = "UPDATE device_group SET device_group_name = '{$_POST['groupName']}', device_group_content_id = {$_POST['contentDataId']} WHERE device_group_id = {$_POST['id']} ";
        $conn->query($sql);

        echo json_encode(true);

    } catch (Exception $e) {
        echo json_encode(false);
    }
}else {
    try {
        //del data from the database
        $sql = "INSERT INTO device_group (device_group_name, device_group_content_id) VALUE ('{$_POST['groupName']}', {$_POST['contentDataId']}) ";
        $conn->query($sql);

        echo json_encode(true);

    } catch (Exception $e) {
        echo json_encode(false);
    }
}

?>