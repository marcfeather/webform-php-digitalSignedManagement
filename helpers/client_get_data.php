<?php  
header("content-type:text/javascript;charset=utf-8");   

include("mysqli_connect.php"); 

$sql = "SELECT CONCAT('/', content_url, content_name, '.', content_extension) AS local_path FROM contents ORDER BY content_id";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $output[] = $row;
    }
}

print(json_encode($output)); 
$conn->close();
?>  
