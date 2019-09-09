<?php
include('_session_use.php');
include('_session_check.php');
$user_id = $_SESSION['session_key'];

$data = array();

include("../helpers/mysqli_connect.php");

if(!empty($_POST['id'])){
    try {
        //set data from the database
        $sql = "UPDATE devices SET device_name = '{$_POST['deviceName']}', device_imei = '{$_POST['deviceImei']}'
        , device_datetime = CURRENT_TIMESTAMP, device_group_id = {$_POST['deviceGroupId']} 
        WHERE device_id = {$_POST['id']} AND device_user_id = $user_id";
        $conn->query($sql);

        $data = array("result" => true,
                        "error" => '');
        echo json_encode($data);

    } catch (Exception $e) {
        $data = array("result" => false,
                        "error" => $e);
        echo json_encode($data);
    }
}else {
    try {
        //check duplicate data
        $sql = "SELECT COUNT(device_id) as cnt FROM devices WHERE device_user_id = $user_id 
        AND device_name = '{$_POST['deviceName']}' OR device_imei = '{$_POST['deviceImei']}' ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            //output data of each row
            while($row = $result->fetch_assoc()) {
                $relate_cnt = $row['cnt'];
            }
        }
        if ($relate_cnt > 0) {
            $data = array("result" => false,
                            "error" => "Duplicate data, Can not insert");
            echo json_encode($data);
            return;
        }

        //set data from the database
        $sql = "INSERT INTO devices (device_name, device_imei, device_status_id, device_datetime, device_group_id, device_user_id) 
        VALUE ('{$_POST['deviceName']}', '{$_POST['deviceImei']}', 0, CURRENT_TIMESTAMP, {$_POST['deviceGroupId']}, $user_id) ";
        $conn->query($sql);

        $data = array("result" => true,
                        "error" => '');
        echo json_encode($data);

    } catch (Exception $e) {
        $data = array("result" => false,
                        "error" => $e);
        echo json_encode($data);
    }
}

?>