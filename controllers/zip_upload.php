<?php
include('_session_use.php');
include('_session_check.php');
$user_id = $_SESSION['session_key'];

if(empty($_FILES))
{
    $data = array("result" => false,
    "error" => "The file is empty");
    echo json_encode($data);
    return;
}

if ( 0 < $_FILES['file']['error'] ) {
    $data = array("result" => false,
                "error" => $_FILES['file']['error']);
    echo json_encode($data);
    return;
}

if(!$_FILES["file"]["name"]) {
    $data = array("result" => false,
                    "error" => "The file name is wrong");
    echo json_encode($data);
    return;
}

$data = array();

$folder_name = "../contents/html/";
$content_url = "contents/html/";
$fileType = "zip";

$filename = $_FILES["file"]["name"];
$source = $_FILES["file"]["tmp_name"];
$type = $_FILES["file"]["type"];

$name = explode(".", $filename);
$accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
foreach($accepted_types as $mime_type) {
    if($mime_type == $type) {
        $okay = true;
        break;
    } 
}

$continue = strtolower($name[1]) == $fileType ? true : false;
if(!$continue) {
    $data = array("result" => false,
                    "error" => "The file you are trying to upload is not a .zip file. Please try again.");
    echo json_encode($data);
    return;
}

//Check if the directory already exists.
if(!is_dir($folder_name)){
    //Directory does not exist, so lets create it.
    mkdir($folder_name, 0777, true);
}

$target_file = $folder_name . basename($_FILES["file"]["name"]);
$filename = pathinfo($target_file, PATHINFO_FILENAME);
$ext = pathinfo($target_file, PATHINFO_EXTENSION);

if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {

    include("../helpers/mysqli_connect.php");

    //Check dup name
    $sql = "SELECT count(content_name) as countDup FROM contents WHERE content_user_id = $user_id AND content_name = '$filename'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $countDup = $row['countDup'];
        }
    }else {
        $countDup = 0;
    }

    if ($countDup > 0) {
        $data = array("result" => false,
                        "error" => "Duplicate data !");
        echo json_encode($data);
        return;
    }

    $content_name = $filename;
    $content_extension = $ext;

    $sql = "INSERT INTO contents (content_name, content_extension, content_url, content_datetime, content_user_id) 
    VALUES ('$content_name', '$content_extension', '$content_url', CURRENT_TIMESTAMP, $user_id)";
    $conn->query($sql);

    $conn->close();

    $data = array("result" => true,
                    "error" => '');

}else {
    $data = array("result" => false,
                    "error" => 'Upload file is failed');
}

echo json_encode($data);

?>