<?php
    $servername = "localhost";
    $username = "coretera_cvmadmin";
    $password = "cvm789P@ss";
    $dbname = "coretera_dsm";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    mysqli_set_charset($conn, "utf8");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
?>