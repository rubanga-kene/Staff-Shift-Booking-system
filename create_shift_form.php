<?php
session_start();
error_reporting(0);

require 'connection.php';
if(isset($_POST['create_shift'])){

    $shift_date = $_POST['shift_date'];
    $begin_time = $_POST['begin_time'];
    $end_time = $_POST['end_time'];

    $sql = "INSERT INTO shift(date, begin_time, end_time) VALUES('$shift_date', '$begin_time', '$end_time' )";
    $result = mysqli_query($conn, $sql);

    if($result){

        $_SESSION['shift_reg_message'] = "Shift Created Successfully";
        header('location:create_shift.php');
    
    }
    else{
        echo "Shift Creation Failed";

    }

}

?>