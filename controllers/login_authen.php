<?php
include('_session_use.php');

include("../helpers/mysqli_connect.php");

$data = array("result" => false,
                "ret" => '',
                "error" => 'Parameter is null');

if (!empty($_POST['user']) && !empty($_POST['pass'])) {
    try {
        //get data from the database
        $sql = "SELECT count(user_id) as cnt FROM users WHERE user_name = '{$_POST['user']}' ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            //output data of each row
            while($row = $result->fetch_assoc()) {
                $count = $row['cnt'];
            }
        }
        if ($count == 0) {
            $data = array("result" => false,
                            "ret" => '',
                            "error" => 'This user not register!');
            echo json_encode($data);
            return;
        }

        //get data from the database
        $sql = "SELECT count(user_id) as cnt FROM users WHERE user_name = '{$_POST['user']}' AND user_status_id = 1 ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            //output data of each row
            while($row = $result->fetch_assoc()) {
                $count = $row['cnt'];
            }
        }
        if ($count == 0) {
            $data = array("result" => false,
                            "ret" => '',
                            "error" => 'This user is status pending');
            echo json_encode($data);
            return;
        }

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
            $_SESSION['session_key'] = $user_id;
            $_SESSION['session_username'] = $_POST['user'];
            $_SESSION['session_package_id'] = $package_id;

            $data = array("result" => true,
                            "ret" => $user_id,
                            "error" => '');
        }else {
            $data = array("result" => false,
                        "ret" => '',
                        "error" => 'Password invalid!');
        }

    } catch (Exception $e) {
        $data = array("result" => false,
                        "ret" => '',
                        "error" => $e);
    }
}

echo json_encode($data);

?>