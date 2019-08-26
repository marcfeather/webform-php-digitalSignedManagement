<?php

include("../helpers/mysqli_connect.php");

if(!empty($_POST['id'])){
    try {
        $sql = "SELECT CONCAT(content_url, content_name, '.',content_extension) as contentPath FROM contents WHERE content_id = {$_POST['id']} AND content_extension = 'zip' ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            //output data of each row
            while($row = $result->fetch_assoc()) {
                $content_path = $row['contentPath'];
            }
        }else {
            echo json_encode(false);
            return;
        }

        $flgDelete = unlink($content_path);
        if($flgDelete)
        {
            //del data from the database
            $sql = "DELETE FROM contents WHERE content_id = {$_POST['id']} AND content_extension = 'zip' ";
            $conn->query($sql);

            //re order data from the database
            $sql = "SELECT content_id FROM contents WHERE content_extension = 'zip' ORDER BY content_order";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                //output data of each row
                $rowNum = 0;
                while($row = $result->fetch_assoc()) {
                    $rowNum = $rowNum + 1;
                
                    $sql = "UPDATE contents SET content_order = {$rowNum} WHERE content_id = {$row['content_id']} AND content_extension = 'zip' ";
                    $conn->query($sql);
                }
            }

            echo json_encode(true);
        }

    } catch (Exception $e) {
        echo json_encode(false);
    }
}

?>