<?php
include('_session_use.php');
include('_session_check.php');
$user_id = $_SESSION['session_key'];

$data = array();

include("../helpers/mysqli_connect.php");

if(!empty($_POST['id'])){
    try {
        //check relation data
        $sql = "SELECT COUNT(device_group_id) as cnt FROM devices WHERE device_group_id = {$_POST['id']} AND device_user_id = $user_id ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            //output data of each row
            while($row = $result->fetch_assoc()) {
                $relate_cnt = $row['cnt'];
            }
        }
    
        if ($relate_cnt > 0) {
            $data = array("result" => false,
                            "error" => 'ไม่สามารถลบได้ เนื่องจากมีการใช้งาน ข้อมูลนี้ กับ ข้อมูลอุปกรณ์');
            echo json_encode($data);
            return;
        }

        //del data from the database
        $sql = "DELETE FROM device_group WHERE device_group_id = {$_POST['id']} AND device_group_user_id = $user_id ";
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