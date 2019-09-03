<?php
$data = array();

include("../helpers/mysqli_connect.php");

if(!empty($_POST['id'])){
    try {
        //del data from the database
        $sql = "UPDATE devices SET device_name = '{$_POST['deviceName']}', device_imei = '{$_POST['deviceImei']}', device_datetime = CURRENT_TIMESTAMP, device_group_id = {$_POST['deviceGroupId']} WHERE device_id = {$_POST['id']} ";
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
        $sql = "SELECT COUNT(device_id) as cnt FROM devices WHERE device_name = '{$_POST['deviceName']}' OR device_imei = '{$_POST['deviceImei']}' ";
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

        //del data from the database
        $sql = "INSERT INTO devices (device_name, device_imei, device_status_id, device_datetime, device_group_id) VALUE ('{$_POST['deviceName']}', '{$_POST['deviceImei']}', 0, CURRENT_TIMESTAMP, {$_POST['deviceGroupId']}) ";
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