<?php  
header("content-type:text/javascript;charset=utf-8");   

include("mysqli_connect.php"); 

$sql = "SELECT CONCAT('/', content_url, content_name, '.', content_extension) AS local_path FROM contents ORDER BY content_id";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output[] = $row;
    }
}

print(json_encode($output)); 
$conn->close();

// $sql = "UPDATE devices SET device_status_id = 1 WHERE device_imei = '355217061012259' ";
// $conn->query($sql);

//$output = array();

//if(!empty($_POST['id'])){

    //$imei = urldecode($_POST['id']);

    //try {
        // //del data from the database
        // $sql = "UPDATE devices SET device_status_id = 1 WHERE device_imei = '{$imei}' ";
        // $conn->query($sql);

        //echo json_encode(true);

    // } catch (Exception $e) {
    //     echo json_encode(false);
    // }

    // $sql = "SELECT CONCAT('/', c.content_url, c.content_name, '.', c.content_extension) AS local_path, CONCAT(c.content_name, '.', c.content_extension) AS contentName
    // FROM devices a
    // LEFT JOIN device_group b on b.device_group_id = a.device_group_id
    // LEFT JOIN contents c on c.content_id = b.device_group_content_id
    // WHERE a.device_imei = '{$imei}' ";

    // $sql = "SELECT CONCAT('/', content_url, content_name, '.', content_extension) AS local_path FROM contents ORDER BY content_id";

    // $result = $conn->query($sql);
    // if ($result->num_rows > 0) {
    //     // output data of each row
    //     while($row = $result->fetch_assoc()) {
    //         $output[] = $row;
    //     }
    // }

    // print(json_encode($output)); 
    // $conn->close();
//}

?>  
