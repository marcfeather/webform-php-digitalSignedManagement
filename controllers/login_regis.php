<?php
if (session_status() == PHP_SESSION_NONE) { session_start();}

include("../helpers/mysqli_connect.php");

$data = array("result" => false,
                "ret" => '',
                "error" => 'Parameter is null');

if (!empty($_POST['packageId']) && !empty($_POST['phoneNum']) && !empty($_POST['email']) && !empty($_POST['user']) && !empty($_POST['pass'])) {
    try {
        //set data from the database
        $sql = "INSERT INTO users (users_phoneNumber, users_email, users_name, users_pass, users_status_id, users_dateTime, users_package_id) 
        VALUE ('{$_POST['phoneNum']}', '{$_POST['email']}', '{$_POST['user']}', '{$_POST['pass']}', 0, CURRENT_TIMESTAMP, {$_POST['packageId']}) ";
        $conn->query($sql);

        //get data from the database
        $sql = "SELECT users_id, users_package_id FROM users
        WHERE users_name = '{$_POST['user']}' and users_pass = '{$_POST['pass']}' ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            //output data of each row
            while($row = $result->fetch_assoc()) {
                $users_id = $row['users_id'];
                $package_id = $row['users_package_id'];
            }
        }

        if (!empty($users_id)) {
            $_SESSION['session_key'] = $users_id;
            $_SESSION['session_username'] = $_POST['user'];
            $_SESSION['session_package_id'] = $package_id;
    
            $data = array("result" => true,
                            "ret" => $users_id,
                            "error" => '');
        }else {
            $data = array("result" => false,
                        "ret" => '',
                        "error" => 'Get users_id failed!');
        }

    } catch (Exception $e) {
        $data = array("result" => false,
                        "ret" => '',
                        "error" => $e);
    }
}

echo json_encode($data);

?>