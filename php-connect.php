<?php 
//these variables are used for database connection 
$host = "localhost"; 
$user = "cvm"; 
$password = "cvm789P@ss"; 
$database_name = "digital_signed"; 

//connect to the database. 
mysql_connect($host, $user, $password); 
mysql_select_db($database_name);  
?>