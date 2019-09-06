<?php
$data = array();

include("../helpers/mysqli_connect.php");

if(!empty($_POST['id'])){
    try {
        //set data from the database
        $sql = "UPDATE device_group SET device_group_name = '{$_POST['groupName']}', device_group_content_id = {$_POST['contentDataId']} WHERE device_group_id = {$_POST['id']} ";
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
        $sql = "SELECT COUNT(device_group_id) as cnt FROM device_group WHERE device_group_name = '{$_POST['groupName']}' ";
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
        $sql = "INSERT INTO device_group (device_group_name, device_group_content_id) VALUE ('{$_POST['groupName']}', {$_POST['contentDataId']}) ";
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