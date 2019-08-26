<?php
$data = array();

include("../helpers/mysqli_connect.php");

if(!empty($_POST['id'])){
    try {
        //check relation data
        $sql = "SELECT COUNT(device_group_id) as cnt FROM devices WHERE device_group_id = {$_POST['id']} ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            //output data of each row
            while($row = $result->fetch_assoc()) {
                $relate_cnt = $row['cnt'];
            }
        }
        if ($relate_cnt > 0) {
            $data[] = array("result" => false,
                            "error" => 'Relation data, Can not delete');
            echo json_encode($data);
            return;
        }

        //del data from the database
        $sql = "DELETE FROM device_group WHERE device_group_id = {$_POST['id']} ";
        $conn->query($sql);

        $data[] = array("result" => true,
                        "error" => '');
        echo json_encode($data);

    } catch (Exception $e) {
        $data[] = array("result" => false,
                        "error" => $e);
        echo json_encode($data);
    }
}

?>