<?php
$data = array();

include("../helpers/mysqli_connect.php");

//get data from the database
$sql = "SELECT content_id, CONCAT(content_name, '.',content_extension) as contentName, content_datetime FROM contents WHERE content_extension = 'zip' ORDER BY content_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    //output data of each row
    $rowNum = 0;
    while($row = $result->fetch_assoc()) {
        $rowNum = $rowNum + 1;
        $content_id = $row['content_id'];
        $content_name = $row['contentName'];
        $content_datetime = $row['content_datetime'];
    
        $data[] = array("rowNum" => $rowNum,
                        "content_id" => $content_id,
                        "content_name" => $content_name,
                        "content_datetime" => $content_datetime);
    }
}

//returns data as JSON format
echo json_encode($data);
?>