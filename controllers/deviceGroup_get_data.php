<?php
$data = array();

include("../helpers/mysqli_connect.php");

if(!empty($_POST['id'])){
    //get data from the database
    $sql = "SELECT device_group_id, device_group_name, device_group_content_id FROM device_group WHERE device_group_id = {$_POST['id']}";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        //output data of each row
        $rowNum = 0;
        while($row = $result->fetch_assoc()) {
            $rowNum = $rowNum + 1;
            $device_group_id = $row['device_group_id'];
            $device_group_name = $row['device_group_name'];
            $device_group_content_id = $row['device_group_content_id'];
        
            $data[] = array("rowNum" => $rowNum,
                            "device_group_id" => $device_group_id,
                            "device_group_name" => $device_group_name,
                            "device_group_content_id" => $device_group_content_id);
        }
    }

}else {
    //get data from the database
    $sql = "SELECT a.device_group_id, a.device_group_name, CONCAT(b.content_name, '.', b.content_extension) as contentName FROM device_group a LEFT JOIN contents b on b.content_id = a.device_group_content_id ORDER BY a.device_group_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        //output data of each row
        $rowNum = 0;
        while($row = $result->fetch_assoc()) {
            $rowNum = $rowNum + 1;
            $device_group_id = $row['device_group_id'];
            $device_group_name = $row['device_group_name'];
            $content_name = $row['contentName'];
        
            $data[] = array("rowNum" => $rowNum,
                            "device_group_id" => $device_group_id,
                            "device_group_name" => $device_group_name,
                            "content_name" => $content_name);
        }
    }
}

//returns data as JSON format
echo json_encode($data);
?>