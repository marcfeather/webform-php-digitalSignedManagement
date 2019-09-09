<?php
include('_session_use.php');
include('_session_check.php');
$user_id = $_SESSION['session_key'];

$data = array();

include("../helpers/mysqli_connect.php");

if(!empty($_POST['id'])){
    try {
        //del data from the database
        $sql = "DELETE FROM devices WHERE device_id = {$_POST['id']} AND device_user_id = $user_id ";
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