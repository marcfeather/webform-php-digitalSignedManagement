<?php
$data = array();

include("../helpers/mysqli_connect.php");

if(!empty($_POST['id'])){
    try {
        //check relation data
        $sql = "SELECT COUNT(device_group_content_id) as cnt FROM device_group WHERE device_group_content_id = {$_POST['id']} ";
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

        $sql = "SELECT CONCAT(content_url, content_name, '.',content_extension) as contentPath FROM contents WHERE content_id = {$_POST['id']} AND content_extension = 'zip' ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            //output data of each row
            while($row = $result->fetch_assoc()) {
                $content_path = $row['contentPath'];
            }
        }else {
            $data[] = array("result" => false,
                            "error" => 'Error get file path');
            echo json_encode($data);
            return;
        }

        $flgDelete = unlink($content_path);
        if($flgDelete)
        {
            //del data from the database
            $sql = "DELETE FROM contents WHERE content_id = {$_POST['id']} AND content_extension = 'zip' ";
            $conn->query($sql);

            //re order data from the database
            $sql = "SELECT content_id FROM contents WHERE content_extension = 'zip' ORDER BY content_order";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                //output data of each row
                $rowNum = 0;
                while($row = $result->fetch_assoc()) {
                    $rowNum = $rowNum + 1;
                
                    $sql = "UPDATE contents SET content_order = {$rowNum} WHERE content_id = {$row['content_id']} AND content_extension = 'zip' ";
                    $conn->query($sql);
                }
            }

            $data[] = array("result" => true,
                            "error" => '');
            echo json_encode($data);
        }

    } catch (Exception $e) {
        $data[] = array("result" => false,
                        "error" => 'Deleting error!');
        echo json_encode($data);
    }
}

?>