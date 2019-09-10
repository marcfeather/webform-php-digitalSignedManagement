<?php
include('_session_use.php');

include("../helpers/mysqli_connect.php");

include('_dateTime_diff.php');

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

        $user_expire_date = "";
        $countDown = "";
        //get data from the database
        $sql = "SELECT count(user_expire_date) as cnt, user_expire_date FROM users WHERE user_name = '{$_POST['user']}' AND user_status_id = 1 AND user_expire_date <> '0000-00-00 00:00:00' ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            //output data of each row
            while($row = $result->fetch_assoc()) {
                $cnt = $row['cnt'];
                $user_expire_date = $row['user_expire_date'];
            }
        }

        if ($cnt > 0) {
            $ret = cal_dateTime_diff(date("Y-m-d H:i:s"), $user_expire_date);

            $countDown = $ret['item'];
            if ($ret['result']) {
                $data = array("result" => false,
                                "ret" => '',
                                "error" => 'This user is expired! (Now: '.date("Y-m-d H:i:s").', Expired date: '.$user_expire_date.')');
                echo json_encode($data);
                return;
            }
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
            //set data from the database
            $sql = "UPDATE users SET user_loginDateTime = CURRENT_TIMESTAMP WHERE user_id = $user_id";
            $conn->query($sql);

            $_SESSION['session_key'] = $user_id;
            $_SESSION['session_username'] = $_POST['user'];
            $_SESSION['session_package_id'] = $package_id;
            
            if ($package_id == 1) {
                // $date1 = date_create(date("Y-m-d H:i:s"));
                // $date2 = date_create($user_expire_date);
                // $diff = date_diff($date1, $date2);
                // $dateDiff = $diff->format("%a");
                
                $_SESSION['session_expire_date'] = $user_expire_date;
                $_SESSION['session_countdown_date'] = $countDown;
            }else {
                $_SESSION['session_expire_date'] = "";
                $_SESSION['session_countdown_date'] = "";
            }

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