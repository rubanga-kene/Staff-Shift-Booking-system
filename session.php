<?php 
include 'connection.php';
session_start();

if(isset($_SESSION['staff'])){
    $sql = "SELECT * FROM staff WHERE id = '".$_SESSION['staff']."'";
    $query = $conn->query($sql);
    $staff = $query->fetch_assoc();
}
else{
    header('location: index.php');
    exit();
}
?>