
<?php 
  session_start();
  error_reporting(0);
  
  require 'connection.php';

  

  $shift = "SELECT * FROM shift";
  $result_shift = mysqli_query($conn, $shift);

  $shift_date = "SELECT * FROM shift ORDER BY shift_id DESC LIMIT 1";
  $result_date = mysqli_query($conn, $shift_date);

  if($result_date-> num_rows > 0){
    $row = $result_date->fetch_assoc();
  }

  // SHIFT BOOKED SUCCESSFULLY
  if($_SESSION['shift_booked_message']){
    $shift_booked_message = $_SESSION['shift_booked_message'];
    echo "<script type='text/javascript'>
        alert('$shift_booked_message');
    </script>";
}
unset($_SESSION['shift_booked_message']);

  
 // CAPTURING THE USER INFO OF LOGGED STAFF
 if(isset($_SESSION['username'])){
  $name = $_SESSION['username'];
  $sql = "SELECT * FROM staff WHERE username = '$name' ";
  $result = mysqli_query($conn, $sql);
  if($result-> num_rows > 0){
    $staff = $result->fetch_assoc();
  } 
}

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
        <!-- <div style="background:#1E282C;color: white;padding: 13px 17px;border-left: 3px solid #3C8DBC;"><span><i class="fa fa-dashboard fa-fw"></i> Dashboard</span></div> -->
        <div class="item">
          <ul class="nostyle zero " style="line-height: 2;">
            
            <!-- <a href="swap_shift.html"><li><i class="fa fa-circle-o fa-fw"></i>Request Swap</li></a> -->
           <!-- <a href="staff.html"><li><i class="fa fa-circle-o fa-fw"></i> Staff</li></a> -->
            <!-- <a href="add_staff.html"><li><i class="fa fa-circle-o fa-fw"></i>Add Staff</li></a> -->
          </ul>
        </div>
      </div>

      <!-- OTHER MENU -->
      <div style="background:#1E282C;color: white;padding: 13px 17px;border-left: 3px solid #3C8DBC;"><span><i class="fa fa-globe fa-fw"></i>Menu</span></div>
      <div class="item">
          <ul class="nostyle zero" style="line-height: 2;">
            <a href=""><li style="color: white"><i class="fa fa-circle-o fa-fw"></i>Book Shift</li></a>
            <a href="my_shift.php"><li><i class="fa fa-circle-o fa-fw"></i>My Shift</li></a>
           <a href=""><li><i class="fa fa-circle-o fa-fw"></i> Contact</li></a>
           <a href=""><li><i class="fa fa-circle-o fa-fw"></i>  Help</li></a>
            <a href="logout.php"><li><i class="fa fa-circle-o fa-fw"></i> Sign Out</li></a>
            <!-- <a href="#"><li><i class="fa fa-circle-o fa-fw"></i> Welcome: <?php //echo $name ?></li></a> -->
          </ul>
        </div>
    </div>

    <div class="marginLeft" >
      <div class="header-title" >
        <div class="pull-right flex rightAccount" style="padding-right: 11px;padding: 7px;">
          <!-- <div><img src="img/ieee-bus.png" style='width: 150px;height: 60px;'></div> -->
          <h3>KADAMA HEALTH CENTRE III STAFF SHIFT BOOKING SYSTEM </h3>
          <p style="margin: 1rem  3rem 1rem 5rem;">Welcome: <?php echo $name ?></p> 

        </div>
      </div>
  
    <!-- ARTICLE -->
      <div class="content2"> 
        <div>
        <span  class="page-header" style="display:block; width:87%;background-color: lightseagreen; color:black; margin:0 auto; text-align:center;">Shift Schedules  <?php echo $row["date"] ?></span>
          <div class="shift-display">
            <div class="forms">
            <?php
            if(mysqli_num_rows($result_shift) > 0) {
                    while($shift = $result_shift ->fetch_assoc())
            {

                ?>
              <form style="padding: 10px 20; " class="form" action="book.php" method="POST">
              <div class="shift-particular" style="margin: 0.2rem 2rem">
                  <label for="">Date</label>
                  <input style="width: 10rem;" type="date" value="<?php echo "{$shift['date']}" ?>" readonly>
                </div>
                <div class="shift-particular" style="margin: 0.2rem 2rem">
                  <label for="">Start time</label>
                  <input style="width: 5rem;" type="time" value="<?php echo "{$shift['begin_time']}" ?>" readonly>
                </div>
                <div class="shift-particular" style="margin: 0.2rem 2rem">
                  <label for="">Stop time</label>
                  <input style="width: 5rem;" type="time" value="<?php echo "{$shift['end_time']}" ?>" readonly>
                </div>
                <div class="shift-particular" style="margin: 0.2rem 2rem">
                <?php echo "<a onClick=\" javascript:return confirm('Do you want to book this Shift?');\" class='update-info' style='padding: 5px 20px;' href='book.php?shift_id={$shift['shift_id']}'>Book</a>"; ?>
                 
                </div>
              </form>
            <?php 
            }
            
          } else{
            echo "<p style='text-align:center; font-size:2rem;'>All Shifts have been booked </p>";
          }
            
            ?>
    

              
            </div>

  
            
          </div>
      
    
      </div>
    </div>
    

    
    </body>
</html>