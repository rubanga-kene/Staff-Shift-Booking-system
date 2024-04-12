<?php 
  session_start();
  error_reporting(0);

  require 'connection.php';

  $booking = "SELECT * FROM bookings";
  $result_booking = mysqli_query($conn, $booking);

  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shift Booking</title>
    <link rel="stylesheet" href="css/customStyle.css"/>
    <style>
        table, tr, th, td{
            border: 1px solid #000;
            border-collapse: collapse;
            padding: 10px;
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
        <!-- <div style="background:#1E282C;color: white;padding: 13px 17px;border-left: 3px solid #3C8DBC;"><span><i class="fa fa-dashboard fa-fw"></i> Dashboard</span></div> -->
        <div class="item">
          <ul class="nostyle zero " style="line-height: 2;">
            <a href="dashboard.php"><li style="color: white"><i class="fa fa-circle-o fa-fw"></i>Back</li></a>
            <!-- <a href="shift.php"><li><i class="fa fa-circle-o fa-fw"></i>Shift</li></a>
            <a href="create_shift.php"><li><i class="fa fa-circle-o fa-fw"></i>Create Shift</li></a>
           <a href="staff.php"><li><i class="fa fa-circle-o fa-fw"></i> Staff</li></a>
            <a href="add_staff.php"><li><i class="fa fa-circle-o fa-fw"></i>Add Staff</li></a> -->
          </ul>
        </div>
      </div>

      <!-- OTHER MENU -->
      <!-- <div style="background:#1E282C;color: white;padding: 13px 17px;border-left: 3px solid #3C8DBC;"><span><i class="fa fa-globe fa-fw"></i> Other Menu</span></div> -->
      <div class="item">
          <!-- <ul class="nostyle zero" style="line-height: 2;"> -->
           <!-- <a href="contact_admin.php"><li><i class="fa fa-circle-o fa-fw"></i> Contact</li></a> -->
           <!-- <a href="swap_request.html"><li><i class="fa fa-circle-o fa-fw"></i>  Swap Request</li></a> -->
            <!-- <a href="logout.php"><li><i class="fa fa-circle-o fa-fw"></i> Sign Out</li></a> -->
          <!-- </ul> -->
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
        <span  class="page-header" style="display:block; width:87%;background-color: lightseagreen; color:black; margin:0 auto; text-align:center;"> Shift Bookings Report </span>
          
          <div class="shift-display">
            <div class="forms" style="width: 70%; margin:1rem auto;">
            
           

              <table>
                <tr>
                    <th>Staff</th>
                    <th>Start Time</th>
                    <th>Shift Stop</th>
                    <th>Shift Date</th>
                </tr>
                <?php
            if(mysqli_num_rows($result_booking) > 0){

                    while($booking = $result_booking->fetch_assoc())
            {

                ?>
                <tr>
                    <td><?php echo "{$booking['booked_by']}" ?></td>
                    <td><?php echo "{$booking['begin_time']}" ?></td>
                    <td><?php echo "{$booking['end_time']}" ?></td>
                    <td><?php echo "{$booking['shift_date']}" ?></td>
                </tr>
                <?php
            
                }
                
            }else{
                echo "<p style='text-align:center; font-size:2rem;'>There Are No Current Shift Bookings </p>";

            }
            ?>
               
              </table>

           

              
            </div>

  
            
          </div>
      
    
      </div>
    </div>
    

    
    </body>
</html>