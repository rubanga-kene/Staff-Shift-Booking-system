<?php 
  session_start();
  error_reporting(0);

  require 'connection.php';

  $staff = "SELECT * FROM staff";
  $result_staff = mysqli_query($conn, $staff);

     // STAFF DELETED SUCCESSFULLY
     if($_SESSION['staff_deleted']){
      $staff_deleted = $_SESSION['staff_deleted'];
      echo "<script type='text/javascript'>
          alert('$staff_deleted');
      </script>";
  }
  unset($_SESSION['staff_deleted']);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shift Booking</title>
    <link rel="stylesheet" href="css/customStyle.css"/>
    <style>
      th, td{
        padding: 0 10px 0 10px;
      }

      tr{
        display: block;
        margin: 1rem auto;
      }
    </style>
</head>
<body>
    <div class="dashboard" style="position: fixed;width: 18%;height: 100%;background:#222D32">
      <div style="background:#357CA5;padding: 1px 3px;color:white;font-size: 15pt;text-align: center;text-shadow: 1px 1px 11px black">
        <div><img src="img/kd.png" style='width: 150px;height: 66px'></div>
      </div>
      <div style="background: #1A2226;font-size: 10pt;padding: 11px;color: #79978F">MAIN NAVIGATION</div>
      <div>
        <div style="background:#1E282C;color: white;padding: 13px 17px;border-left: 3px solid #3C8DBC;"><span><i class="fa fa-dashboard fa-fw"></i> Dashboard</span></div>
        <div class="item">
          <ul class="nostyle zero " style="line-height: 2;">
            <a href="dashboard.php"><li ><i class="fa fa-circle-o fa-fw"></i>Bookings</li></a>
            <a href="shift.php"><li ><i class="fa fa-circle-o fa-fw"></i>Shift</li></a>
            <a href="create_shift.php"><li ><i class="fa fa-circle-o fa-fw"></i>Create Shift</li></a>
           <a href=""><li style="color: white"><i class="fa fa-circle-o fa-fw"></i> Staff</li></a>
            <a href="add_staff.php"><li ><i class="fa fa-circle-o fa-fw"></i>Add Staff</li></a>
          </ul>
        </div>
      </div>

      <!-- OTHER MENU -->
      <div style="background:#1E282C;color: white;padding: 13px 17px;border-left: 3px solid #3C8DBC;"><span><i class="fa fa-globe fa-fw"></i> Other Menu</span></div>
      <div class="item">
          <ul class="nostyle zero" style="line-height: 2;">
           <a href="contact.php"><li ><i class="fa fa-circle-o fa-fw"></i> Contact</li></a>
            <a href="logout.php"><li><i class="fa fa-circle-o fa-fw"></i> Sign Out</li></a>
          </ul>
        </div>
    </div>

    <div class="marginLeft" >
      <div class="header-title" >
        <div class="pull-right flex rightAccount" style="padding-right: 11px;padding: 7px;">
          <h3>KADAMA HEALTH CENTRE III STAFF SHIFT BOOKING SYSTEM </h3>
        </div>
      </div>
  
    <!-- ARTICLE -->
      <div class="content2"> 
        <div>
          <span style="font-size: 16pt;color: #333333; margin-left:20rem;"> Our Staff </span>
          
          <div class="staff-display">
            <table>
            <tr>
                    <th>Photo</th>
                    <th>Full Name</th>
                    <th>Position</th>
                    <th>Contact</th>
                    <th>Username</th>
                    <th>Staff ID </th>
                    <th>Edit Info</th>
                    <th>Delete</th>
        
                </tr>
                <?php
                    while($staff = $result_staff ->fetch_assoc())
            {

                ?>
                <tr>
                  <td><img src="<?php echo "{$staff['image']}" ?>" alt="staff photo" width="70" height="70"></td>
                  <td><p class="name"><?php echo "{$staff['full_name']}" ?></p></td>
                  <td><p class="position"><?php echo "{$staff['position']}" ?></p></td>
                  <td><p><a class="phone" href="tel:<?php echo "{$staff['contact']}" ?>"><?php echo "{$staff['contact']}" ?></a></p></td>
                  <td><p class="position"><?php echo "{$staff['username']}" ?></p></td>
                  <td><p class="position">STF-0<?php echo "{$staff['staff_id']}" ?></p></td>
                  <td><a class="update-info" href="">Update Info</a></td>
                  <td><?php echo "<a onClick=\" javascript:return confirm('You are about to delete a staff member!');\" class='delete-satff' href='delete_staff.php?staff_id={$staff['staff_id']}'>Delete</a>" ?> </td>
                </tr>
                <?php } ?>
            </table>
        

          </div>
    
      </div>
    </div>
    

    
    </body>
</html>