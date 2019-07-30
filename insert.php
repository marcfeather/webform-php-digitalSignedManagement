<?php
include("db_connect.php"); // incude ครั้งเดียวในไฟล์ที่เรียกใช้งาน
connect(); // เชื่อมต่อกับฐานข้อมูล
$data = array(
    "province_name"=>$_POST['test'],
    "province_lat"=>"10.0015414",
    "province_lon"=>time(),
);
// insert ข้อมูลลงในตาราง content โดยฃื่อฟิลด์ และค่าตามตัวแปร array ชื่อ $data
insert("content",$data)
?>