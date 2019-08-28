<?php  
header("content-type:text/javascript;charset=utf-8");   

include("../helpers/mysqli_connect.php");

$output = array();

if(!empty($_POST['id'])){

    $imei_number = $_POST['id'];

    $sql = "UPDATE devices SET device_status_id = 1 WHERE device_imei = '{$imei_number}'";
    $conn->query($sql);

    $sql = "SELECT CONCAT('/', c.content_url, c.content_name, '.', c.content_extension) AS local_path, CONCAT(c.content_name, '.', c.content_extension) AS contentName
    FROM devices a
    LEFT JOIN device_group b on b.device_group_id = a.device_group_id
    LEFT JOIN contents c on c.content_id = b.device_group_content_id
    WHERE a.device_imei = '{$imei_number}' ";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
    }

    print(json_encode($output)); 
    $conn->close();
}

?>  
