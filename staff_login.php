<!-- THIS CODE IS FOR VERIFYING STAFF LOGIN DETAILS -->
<?php
error_reporting(0);

session_start();

require 'connection.php';


if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = $_POST['username'];
    $pass = $_POST['password'];
    
   //  FOR ADMIN
    $sql = "select * from staff where username = '".$name."' AND password = '".$pass."' ";
    
     $result = mysqli_query($conn, $sql);
     $row = mysqli_fetch_array($result);

     if($row){
      // $staffId = get_staff_id($_POST['username']);
        $_SESSION['username'] = $name;
        $_SESSION['password'] = $pass;
      //   $_SESSION['staff_id'] = $staffId;

        header("location:book_shift.php");
     }

     else{
         
        $_SESSION['adminloginMessage'] = "Username or Password donot match";;
        header("location:index.php");
        
     }
}

?>