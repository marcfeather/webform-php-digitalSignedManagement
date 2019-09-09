<?php
include('_session_use.php');

include("../helpers/mysqli_connect.php");

$data = array("result" => false,
                "ret" => '',
                "error" => 'Parameter is null');

if (!empty($_POST['packageId']) && !empty($_POST['phoneNum']) && !empty($_POST['email']) && !empty($_POST['user']) && !empty($_POST['pass'])) {
    try {
        //set data from the database
        $sql = "INSERT INTO users (user_phoneNumber, user_email, user_name, user_pass, user_status_id, user_dateTime, user_package_id) 
        VALUE ('{$_POST['phoneNum']}', '{$_POST['email']}', '{$_POST['user']}', '{$_POST['pass']}', 1, CURRENT_TIMESTAMP, {$_POST['packageId']}) ";
        $conn->query($sql);

        //get data from the database
        $sql = "SELECT user_id, user_package_id FROM users
        WHERE user_name = '{$_POST['user']}' and user_pass = '{$_POST['pass']}' ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            //output data of each row
            while($row = $result->fetch_assoc()) {
                $user_id = $row['user_id'];
                $package_id = $row['user_package_id'];
            }
        }

        if (!empty($user_id)) {
            // $_SESSION['session_key'] = $user_id;
            // $_SESSION['session_username'] = $_POST['user'];
            // $_SESSION['session_package_id'] = $package_id;
    
            $data = array("result" => true,
                            "ret" => $user_id,
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