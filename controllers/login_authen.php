<?php
if (session_status() == PHP_SESSION_NONE) { session_start();}

include("../helpers/mysqli_connect.php");

$data = array("result" => false,
                "ret" => '',
                "error" => 'Parameter is null');

if (!empty($_POST['user']) && !empty($_POST['pass'])) {
    try {
        //get data from the database
        $sql = "SELECT count(users_id) as cnt FROM users WHERE users_name = '{$_POST['user']}' ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            //output data of each row
            while($row = $result->fetch_assoc()) {
                $count = $row['cnt'];
            }
        }

        if ($count > 0) {
            //get data from the database
            $sql = "SELECT users_id FROM users WHERE users_name = '{$_POST['user']}' and users_pass = '{$_POST['pass']}' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                //output data of each row
                while($row = $result->fetch_assoc()) {
                    $users_id= $row['users_id'];
                }
            }

            if (!empty($users_id)) {

                $_SESSION['session_key'] = $users_id;
                $_SESSION['session_username'] = $_POST['user'];

                $data = array("result" => true,
                                "ret" => $users_id,
                                "error" => '');
            }else {
                $data = array("result" => false,
                            "ret" => '',
                            "error" => 'Password invalid!');
            }

        }else {
            $data = array("result" => false,
                            "ret" => '',
                            "error" => 'This user not register!');
        }

    } catch (Exception $e) {
        $data = array("result" => false,
                        "ret" => '',
                        "error" => $e);
    }
}

echo json_encode($data);

?>