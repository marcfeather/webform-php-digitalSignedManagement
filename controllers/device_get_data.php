<?php
$data = array();

include("../helpers/mysqli_connect.php");

if(!empty($_POST['id'])){
    //get data from the database
    $sql = "SELECT device_id, device_imei, device_name, device_status_id, device_date, device_group_id 
    FROM devices WHERE device_id = {$_POST['id']}";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        //output data of each row
        while($row = $result->fetch_assoc()) {
            $device_id = $row['device_id'];
            $device_name = $row['device_name'];
            $device_imei = $row['device_imei'];
            $device_status_id = $row['device_status_id'];
            $device_date = $row['device_date'];
            $device_group_id = $row['device_group_id'];
        
            $data[] = array("device_id" => $device_id,
                            "device_name" => $device_name,
                            "device_imei" => $device_imei,
                            "device_status_id" => $device_status_id,
                            "device_date" => $device_date,
                            "device_group_id" => $device_group_id);
        }
    }

}else {
    //get data from the database
    $sql = "SELECT a.device_id, b.device_group_name, a.device_imei, a.device_name, c.device_status_name, a.device_date 
    FROM devices a 
    LEFT JOIN device_group b on b.device_group_id = a.device_group_id
    LEFT JOIN ms_device_status c on c.device_status_id = a.device_status_id
    ORDER BY a.device_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        //output data of each row
        $rowNum = 0;
        while($row = $result->fetch_assoc()) {
            $rowNum = $rowNum + 1;
            $device_id = $row['device_id'];
            $device_group_name = $row['device_group_name'];
            $device_name = $row['device_name'];
            $device_imei = $row['device_imei'];
            $device_status_name = $row['device_status_name'];
            $device_date = $row['device_date'];
        
            $data[] = array("rowNum" => $rowNum,
                            "device_id" => $device_id,
                            "device_group_name" => $device_group_name,
                            "device_name" => $device_name,
                            "device_imei" => $device_imei,
                            "device_status_name" => $device_status_name,
                            "device_date" => $device_date);
        }
    }
}

//returns data as JSON format
echo json_encode($data);
?>