<?php

$folder_name = 'content/';
$fileType = ".jpg";

if(!empty($_FILES))
{
    //Check if the directory already exists.
    if(!is_dir($folder_name)){
        //Directory does not exist, so lets create it.
        mkdir($folder_name, 0777, true);
    }

    $target_file = $folder_name . basename($_FILES["file"]["name"]);
    $filename = pathinfo($target_file, PATHINFO_FILENAME);
    $ext = pathinfo($target_file, PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        $status = 1;

        include("mysqli_connect.php"); 

        //Check dup name
        $sql = "SELECT content_name FROM contents WHERE content_name = '$filename'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $countDup = $row['content_name'];
            }
        }else {
            $countDup = 0;
        }

        if ($countDup > 0) {
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
        $content_type = $ext;
        $content_url = $folder_name;

        $sql = "INSERT INTO `contents` (`content_order`, `content_name`, `content_type`, `content_url`, `content_datetime`) 
        VALUES ('$content_order', '$content_name', '$content_type', '$content_url', CURRENT_TIMESTAMP)";
        $conn->query($sql);

        $conn->close();
    }
}

?>