<?php
session_start();
error_reporting(0);

require 'connection.php';


if(isset($_POST['add_staff'])){

    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $contact = $_POST['contact'];
    $photo = $_FILES['photo']['name'];
    $dst = "./images/".$photo;
    $dst_db = "images/".$photo;

    move_uploaded_file($_FILES['photo']['tmp_name'], $dst);

    $password = $_POST['password'];
    $position = $_POST['position'];

    $sql = "INSERT INTO staff(full_name, username, contact, image, password, position) VALUES('$fullname', '$username', '$contact', '$dst_db', '$password', '$position' )";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo "Registration Successful";

        $_SESSION['staff_reg_message'] = "Staff Registered Successfully";
        header('location:add_staff.php');
    
    }
    else{
        echo "Registration Failed";

    }



}

?>