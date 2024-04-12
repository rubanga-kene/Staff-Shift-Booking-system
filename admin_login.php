<!-- THIS CODE IS FOR VERIFYING ADMIN LOGIN DETAILS -->
<?php
error_reporting(0);
error_reporting(0);
session_start();

require 'connection.php';


if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = $_POST['username'];
    $pass = $_POST['password'];
    
   //  FOR ADMIN
    $sql = "select * from admin where username = '".$name."' AND password = '".$pass."' ";
    
     $result = mysqli_query($conn, $sql);
     $row = mysqli_fetch_array($result);

     if($row){
        $_SESSION['username'] = $name;
        $_SESSION['password'] = $pass;
        header("location:dashboard.php");
     }

     else{
         
        $_SESSION['adminloginMessage'] = "Username or Password donot match";;
        header("location:index.php");
        
     }
}

?>