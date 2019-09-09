<?php
include('_session_use.php');
include('_session_check.php');
$user_id = $_SESSION['session_key'];

include("../helpers/mysqli_connect.php");

$data = false;

function get_device_count($conn, $user_id) {
    //get data from the database
    $sql = "SELECT count(device_id) as cnt
    FROM devices WHERE device_user_id = $user_id ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        //output data of each row
        while($row = $result->fetch_assoc()) {
            $data_cnt = $row['cnt'];
        }
    }

    return $data_cnt;
}

function get_device_Group_count($conn, $user_id) {
    //get data from the database
    $sql = "SELECT count(device_group_id) as cnt
    FROM device_group WHERE device_group_user_id = $user_id ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        //output data of each row
        while($row = $result->fetch_assoc()) {
            $data_cnt = $row['cnt'];
        }
    }

    return $data_cnt;
}

function get_content_count($conn, $user_id) {
    //get data from the database
    $sql = "SELECT count(content_id) as cnt FROM contents WHERE content_user_id = $user_id ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        //output data of each row
        while($row = $result->fetch_assoc()) {
            $data_cnt = $row['cnt'];
        }
    }
    
    return $data_cnt;
}

if(!empty($_POST['moduleId'])){

    $item = array();

    //get data from the database
    $sql = "SELECT c.add_client, c.add_group, c.add_html 
    FROM users a LEFT JOIN packages b ON b.package_id = a.user_package_id
    LEFT JOIN permissions c ON c.permission_id = b.package_permission_id
    WHERE a.user_id = $user_id ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        //output data of each row
        while($row = $result->fetch_assoc()) {
            $item = array("add_client" => $row['add_client'],
                    "add_group" => $row['add_group'],
                    "add_html" => $row['add_html']);
        }
    }

    switch ($_POST['moduleId']) {
        case 111:
            $cnt = get_device_count($conn, $user_id);
            $data = ($cnt < $item['add_client']) ? true : false;
            break;
        case 121:
            $cnt = get_device_Group_count($conn, $user_id);
            $data = ($cnt < $item['add_group']) ? true : false;
            break;
        case 201:
            $cnt = get_content_count($conn, $user_id);
            $data = ($cnt < $item['add_client']) ? true : false;
            break;
        default:
    }
}

//returns data as JSON format
echo json_encode($data);

?>