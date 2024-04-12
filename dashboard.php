<?php 
  session_start();
  error_reporting(0);

  require 'connection.php';

  $booking = "SELECT * FROM bookings";
  $result_booking = mysqli_query($conn, $booking);
  
  // BOOKING CLEARED SUCCESSFULLY
  if($_SESSION['booking_cleared']){
    $booking_cleared = $_SESSION['booking_cleared'];
    echo "<script type='text/javascript'>
        alert('$booking_cleared');
    </script>";
}
unset($_SESSION['booking_cleared']);

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
      <div style="background: #1A2226;font-size: 10pt;padding: 11px;color: #79978F">MAIN NAVIGATION</div>
      <div>
        <div style="background:#1E282C;color: white;padding: 13px 17px;border-left: 3px solid #3C8DBC;"><span><i class="fa fa-dashboard fa-fw"></i> Dashboard</span></div>
        <div class="item">
          <ul class="nostyle zero " style="line-height: 2;">
            <a href=""><li style="color: white"><i class="fa fa-circle-o fa-fw"></i>Bookings</li></a>
            <a href="shift.php"><li><i class="fa fa-circle-o fa-fw"></i>Shift</li></a>
            <a href="create_shift.php"><li><i class="fa fa-circle-o fa-fw"></i>Create Shift</li></a>
           <a href="staff.php"><li><i class="fa fa-circle-o fa-fw"></i> Staff</li></a>
            <a href="add_staff.php"><li><i class="fa fa-circle-o fa-fw"></i>Add Staff</li></a>
          </ul>
        </div>
      </div>

      <!-- OTHER MENU -->
      <div style="background:#1E282C;color: white;padding: 13px 17px;border-left: 3px solid #3C8DBC;"><span><i class="fa fa-globe fa-fw"></i> Other Menu</span></div>
      <div class="item">
          <ul class="nostyle zero" style="line-height: 2;">
           <a href="contact_admin.php"><li><i class="fa fa-circle-o fa-fw"></i> Contact</li></a>
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
        <span  class="page-header" style="display:block; width:87%;background-color: lightseagreen; color:black; margin:0 auto; text-align:center;"> Shift Bookings</span>
          
          <div class="shift-display">
            <div class="forms">
            
            <?php
            if(mysqli_num_rows($result_booking) > 0){

                    while($booking = $result_booking->fetch_assoc())
            {

                ?>
              <form class="form" action="">
                <div class="shift-particular" style="margin-right:1rem;">
                  <label for="">Shift ID</label>
                  <input style="width: 2rem;" type="text" value="<?php echo "{$booking['shift_id']}" ?>" readonly>
                </div>
                <div class="shift-particular" style="margin-right:1rem;">
                  <label for="">Shift Date</label>
                  <input style="width: 5rem;" type="text" value="<?php echo "{$booking['shift_date']}" ?>" readonly>
                </div>
                <div class="shift-particular" style="margin-right:1rem;">
                  <label for="">Start time</label>
                  <input style="width: 5rem;" type="time" value="<?php echo "{$booking['begin_time']}" ?>" readonly>
                </div>
                <div class="shift-particular" style="margin-right:1rem;">
                  <label for="">Stop time</label>
                  <input style="width: 5rem;" type="time" value="<?php echo "{$booking['end_time']}" ?>" readonly>
                </div>
                <div class="shift-particular" style="margin-right:1rem;">
                  <label for="">Booked by</label>
                  <input type="text" value="<?php echo "{$booking['booked_by']}" ?>" readonly>
                </div>
                <?php echo "<a onClick=\" javascript:return confirm('Do you want to Clear this Booking?');\" class='delete-satff'  style='width:6.5rem; height:1.5rem; text-align:center;' href='clear_booking.php?shift_id={$booking['shift_id']}'>Clear Booking</a>"; ?>


              </form>

              <?php
            
            }
            
          }else{
            echo "<p style='text-align:center; font-size:2rem;'>There Are No Current Shift Bookings </p>";

          }
          ?>
                  <td><a style="width: 250px; margin:0 auto; padding:5px 10px;" class="update-info" href="booking_report.php">Bookings Report</a></td>
              <!-- <input  class="btn" type="submit" name="add_staff" id="" value="Bookings Report"> -->
              
            </div>

  
            
          </div>
      
    
      </div>
    </div>
    

    
    </body>
</html>