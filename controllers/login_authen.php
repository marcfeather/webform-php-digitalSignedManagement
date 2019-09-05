<?php
if (session_status() == PHP_SESSION_NONE) { session_start();}

include("../helpers/mysqli_connect.php");

$data = array("result" => false,
                "ret" => '',
                "error" => 'user or pass value is null');

if(!empty($_POST['user']) && !empty($_POST['pass'])){
    try {
        // //get data from the database
        // $sql = "SELECT users_id FROM users WHERE users_name = '{$_POST['user']}' and users_pass = '{$_POST['pass']}' ";
        // $result = $conn->query($sql);
        // if ($result->num_rows > 0) {
        //     //output data of each row
        //     while($row = $result->fetch_assoc()) {
        //         $users_id= $row['users_id'];
        //     }
        // }
        // if (!empty($users_id)) {

        //     $_SESSION['session_key'] = $users_id;
    
        //     $data = array("result" => true,
        //                     "ret" => $users_id,
        //                     "error" => '');
        // }else {
        //     $data = array("result" => false,
        //                 "ret" => '',
        //                 "error" => 'Username or Password invalid !');
        // }

        if (($_POST['user'] == 'admin') && ($_POST['pass'] == 'inmad')) {
            $users_id = $_POST['user'];

            $_SESSION['session_key'] = $users_id;
    
            $data = array("result" => true,
                            "ret" => $users_id,
                            "error" => '');
        }else {
            $data = array("result" => false,
                        "ret" => '',
                        "error" => 'Username or Password invalid !');
        }

    } catch (Exception $e) {
        $data = array("result" => false,
                        "ret" => '',
                        "error" => $e);
    }
}

echo json_encode($data);

?>