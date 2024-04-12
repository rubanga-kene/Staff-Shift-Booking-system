<?php 
  session_start();
  error_reporting(0);

  require 'connection.php';

  if($_GET['shift_id']){
    $shift_id = $_GET['shift_id'];
    $sql_clear = "DELETE FROM bookings WHERE shift_id = '$shift_id' ";

    $result_clear = mysqli_query($conn, $sql_clear);

    if($result_clear){
        $_SESSION['booking_cleared'] = "Booking Cleared Successfully";
        header("location:dashboard.php");
    }
  }


?>