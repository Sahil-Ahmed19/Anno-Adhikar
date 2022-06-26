<?php

$server = "localhost";
$user = "root";
$pass = "Sahil339273$";
$database = "mywebsite";

$conn = mysqli_connect($server,$user,$pass,$database);

if(!$conn){
    die("<script>alert('Connection Failed.')</script>");
}

?>