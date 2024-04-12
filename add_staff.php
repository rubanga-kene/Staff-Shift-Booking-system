<?php
    error_reporting(0);
    require 'connection.php';

    session_start();
     // STAFF REGISTERED SUCCESSFULLY
    if($_SESSION['staff_reg_message']){
        $staff_reg_message = $_SESSION['staff_reg_message'];
        echo "<script type='text/javascript'>
            alert('$staff_reg_message');
        </script>";
    }
    unset($_SESSION['staff_reg_message']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shift Booking</title>
    <link rel="stylesheet" href="css/customStyle.css"/>
</head>
<body>
    <div class="dashboard" style="position: fixed;width: 18%;height: 100%;background:#222D32">
      <div style="background:#357CA5;padding: 1px 3px;color:white;font-size: 15pt;text-align: center;text-shadow: 1px 1px 11px black">
        <div><img src="img/kd.png" style='width: 150px;height: 66px'></div>
      </div>
      <!-- <div class="flex" style="padding: 3px 7px;margin:5px 2px;">
        <div><img src="img/ieee-bus.png" style='width: 150px;height: 66px'></div>
      </div> -->
      <div style="background: #1A2226;font-size: 10pt;padding: 11px;color: #79978F">MAIN NAVIGATION</div>
      <div>
        <div style="background:#1E282C;color: white;padding: 13px 17px;border-left: 3px solid #3C8DBC;"><span><i class="fa fa-dashboard fa-fw"></i> Dashboard</span></div>
        <div class="item">
          <ul class="nostyle zero " style="line-height: 2;">
            <a href="dashboard.php"><li ><i class="fa fa-circle-o fa-fw"></i>Bookings</li></a>
            <a href="#"><li ><i class="fa fa-circle-o fa-fw"></i>Shift</li></a>
            <a href="create_shift.php"><li><i class="fa fa-circle-o fa-fw"></i>Create Shift</li></a>
           <a href="staff.php"><li><i class="fa fa-circle-o fa-fw"></i> Staff</li></a>
            <a href=""><li style="color: white"><i class="fa fa-circle-o fa-fw"></i>Add Staff</li></a>
          </ul>
        </div>
      </div>

      <!-- OTHER MENU -->
      <div style="background:#1E282C;color: white;padding: 13px 17px;border-left: 3px solid #3C8DBC;"><span><i class="fa fa-globe fa-fw"></i> Other Menu</span></div>
      <div class="item">
          <ul class="nostyle zero" style="line-height: 2;">
           <a href="contact.php"><li><i class="fa fa-circle-o fa-fw"></i> Contact</li></a>
           <!-- <a href="swap_request.html"><li><i class="fa fa-circle-o fa-fw"></i>  Swap Request</li></a> -->
            <a href="logout.php"><li><i class="fa fa-circle-o fa-fw"></i> Sign Out</li></a>
          </ul>
        </div>
    </div>

    <div class="marginLeft" >
      <div class="header-title" >
        <div class="pull-right flex rightAccount" style="padding-right: 11px;padding: 7px;">
          <!-- <div><img src="img/ieee-bus.png" style='width: 150px;height: 60px;'></div> -->
          <h3>KADAMA HEALTH CENTRE III STAFF SHIFT BOOKING SYSTEM </h3>
        </div>
      </div>
  
    <!-- ARTICLE -->
      <div class="content2"> 
        <div>
          <!-- <span style="font-size: 16pt;color: #333333">Add Staff </span> -->
          <!-- <p>New Staff</p> -->
          <div class="add-staff">
            <h3>Add Staff</h3>
            <form action="add_staff_form.php" method="POST" enctype="multipart/form-data">
              <div class="form-particular">
                <label for="staff-name">Full Name</label>
                <input type="text" name="fullname" required>
              </div>
              <div class="form-particular">
                <label for="staff-name">Username</label>
                <input type="text" name="username" required>
              </div>
              <div class="form-particular">
                <label for="position">Contact</label>
                <input type="text" name="contact" required>
              </div>
              <div class="form-particular">
                <label for="end-time">Photo</label>
                <input type="file" name="photo" >
              </div>
              <div class="form-particular">
                <label for="">Password</label>
                <input type="text" name="password" required>
              </div>
              <div class="form-particular">
                <label for="">Position</label>
                <input type="text" name="position" required>
              </div>
              <input class="btn" type="submit" name="add_staff" id="" value="Add Staff">
              
            </form>
          </div>
      </div>
    </div>
    

    
    </body>
</html>