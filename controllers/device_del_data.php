<?php

include("../helpers/mysqli_connect.php");

if(!empty($_POST['id'])){
    try {
        //del data from the database
        $sql = "DELETE FROM devices WHERE device_id = {$_POST['id']} ";
        $conn->query($sql);

        echo json_encode(true);

    } catch (Exception $e) {
        echo json_encode(false);
    }
}

?>