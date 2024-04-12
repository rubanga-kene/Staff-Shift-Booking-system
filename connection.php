<?php
// error_reporting(0);
$host = "localhost";
$username = "root";
$password = "";
$db = "kadama";

$conn = mysqli_connect($host, $username, $password, $db);

if($conn === false){
    die("connection error");
}

?>