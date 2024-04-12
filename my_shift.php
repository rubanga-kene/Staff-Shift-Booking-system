

<?php 
  session_start();
  error_reporting(0);

  require 'connection.php';

  // CAPTURING THE USER INFO OF LOGGED STAFF
  if(isset($_SESSION['username'])){
    $name = $_SESSION['username'];
    $sql = "SELECT * FROM staff WHERE username = '$name' ";
    $result = mysqli_query($conn, $sql);
    if($result-> num_rows > 0){
      $staff = $result->fetch_assoc();
    } 
  }

  // CAPTURING THE BOOKED SHIFT OF THE LOGGED-IN PERSON
  $booked_shift_sql = "SELECT * FROM bookings WHERE booked_by = '{$staff['full_name']}'";
  $result_booked_shift = mysqli_query($conn, $booked_shift_sql);

  if($result_booked_shift->num_rows > 0){
    $booked_shift = $result_booked_shift->fetch_assoc();
    // Now you can use $booked_shift['shift_id'], $booked_shift['shift_date'], etc.
  } else {
    $no = "No booked shift found for {$staff['full_name']}.";
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
      <div style="background: #1A2226;font-size: 10pt;padding: 11px;color: #79978F">MAIN NAVIGATION</div>
      <div>
        <div class="item">
          <ul class="nostyle zero " style="line-height: 2;">
            
          </ul>
        </div>
      </div>

      <!-- OTHER MENU -->
      <div style="background:#1E282C;color: white;padding: 13px 17px;border-left: 3px solid #3C8DBC;"><span><i class="fa fa-globe fa-fw"></i>Menu</span></div>
      <div class="item">
          <ul class="nostyle zero" style="line-height: 2;">
            <a href="book_shift.php"><li ><i class="fa fa-circle-o fa-fw"></i>Book Shift</li></a>
            <a href=""><li style="color: white"><i class="fa fa-circle-o fa-fw"></i>My Shift</li></a>
           <a href=""><li><i class="fa fa-circle-o fa-fw"></i> Contact</li></a>
           <a href=""><li><i class="fa fa-circle-o fa-fw"></i>  Help</li></a>
            <a href="logout.php"><li><i class="fa fa-circle-o fa-fw"></i> Sign Out</li></a>
          </ul>
        </div>
    </div>

    <div class="marginLeft" >
      <div class="header-title" >
        <div class="pull-right flex rightAccount" style="padding-right: 11px;padding: 7px;">
          <h3>KADAMA HEALTH CENTRE III STAFF SHIFT BOOKING SYSTEM </h3>
          <p style="margin: 1rem  3rem 1rem 5rem;">Welcome: <?php echo $name ?></p> 

        </div>
      </div>
  
    <!-- ARTICLE -->
      <div class="content2"> 
        <div>
          <span  class="page-header" style="display:block; width:87%;background-color: lightseagreen; color:black; margin:0 auto; text-align:center;">My Shift Schedule <?php echo $booked_shift['shift_date']; ?></span>
          <div class="shift-display">
            <p style="background-color: lightseagreen; text-align:center;"><?php echo $no; ?></p>
            <div style="width: 80%; margin:2rem auto;">
                <div style="margin: 2rem 0;">
                    <p>NAME: <?php echo $booked_shift['booked_by']; ?></p>
                </div>
                <div style="margin: 2rem 0;">
                    <p>STAFF ID: <?php echo $staff['staff_id']; ?></p>
                </div>
                <div style="margin: 2rem 0;">
                    <p>SHIFT DATE: <?php echo $booked_shift['shift_date']; ?></p>
                </div>
                <div style="margin: 2rem 0;">
                    <p>START TIME: <?php echo $booked_shift['begin_time']; ?></p>
                </div>
                <div style="margin: 2rem 0;">
                    <p>END TIME: <?php echo $booked_shift['end_time']; ?></p>
                </div>
              
            </div>

  
            
          </div>
      
    
      </div>
    </div>
    

    
    </body>
</html>