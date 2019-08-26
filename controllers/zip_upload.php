<?php

$folder_name = "../content/html/";
$content_url = "content/html/";
$fileType = ".zip";

if(!empty($_FILES))
{
    if($_FILES["zip_file"]["name"]) {
        $filename = $_FILES["zip_file"]["name"];
        $source = $_FILES["zip_file"]["tmp_name"];
        $type = $_FILES["zip_file"]["type"];

        $name = explode(".", $filename);
        $accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
        foreach($accepted_types as $mime_type) {
            if($mime_type == $type) {
                $okay = true;
                break;
            } 
        }
        
        $continue = strtolower($name[1]) == 'zip' ? true : false;
        if(!$continue) {
            $message = "The file you are trying to upload is not a .zip file. Please try again.";
        }

        //Check if the directory already exists.
        if(!is_dir($folder_name)){
            //Directory does not exist, so lets create it.
            mkdir($folder_name, 0777, true);
        }

        $target_file = $folder_name . basename($_FILES["zip_file"]["name"]);
        $filename = pathinfo($target_file, PATHINFO_FILENAME);
        $ext = pathinfo($target_file, PATHINFO_EXTENSION);

        if (move_uploaded_file($_FILES["zip_file"]["tmp_name"], $target_file)) {
            $status = 1;
            
            include("../helpers/mysqli_connect.php");

            //Check dup name
            $sql = "SELECT count(content_name) as countDup FROM contents WHERE content_name = '$filename'";
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
                header('Location: ../index.php?id=31&err=1'); 
                return;
            }

            $sql = "SELECT max(content_order) as maxOrder FROM contents";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $maxOrder = $row['maxOrder'];
                }
            }else {
                $maxOrder = 0;
            }
            $maxOrder++;

            $content_order = $maxOrder;
            $content_name = $filename;
            $content_extension = $ext;
            $content_url = $folder_name;

            $sql = "INSERT INTO `contents` (`content_order`, `content_name`, `content_extension`, `content_url`, `content_datetime`) 
            VALUES ('$content_order', '$content_name', '$content_extension', '$content_url', CURRENT_TIMESTAMP)";
            $conn->query($sql);

            $conn->close();
        }
    }
}

header('Location: ../index.php?id=31'); 

?>