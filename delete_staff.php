<?php 
  session_start();
  error_reporting(0);

  require 'connection.php';

  if($_GET['staff_id']){
    $staff_id = $_GET['staff_id'];
    $sql_del_staff = "DELETE  FROM staff WHERE staff_id = '$staff_id' ";

    $result_del_staff = mysqli_query($conn, $sql_del_staff);

    if($result_del_staff){
        $_SESSION['staff_deleted'] = "Staff Member Deleted Successfully";
        header("location:staff.php");
    }
  }


?>