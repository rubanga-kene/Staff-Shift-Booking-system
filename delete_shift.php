<?php 
  session_start();
  error_reporting(0);

  require 'connection.php';

  if($_GET['shift_id']){
    $shift_id = $_GET['shift_id'];
    $sql_del_shift = "DELETE FROM shift WHERE shift_id = '$shift_id' ";

    $result_del_shift = mysqli_query($conn, $sql_del_shift);

    if($result_del_shift){
        $_SESSION['shift_deleted'] = "Shift Deleted Successfully";
        header("location:shift.php");
    }
  }


?>