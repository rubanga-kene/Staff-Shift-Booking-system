<?php
    error_reporting(0);
    require 'connection.php';

    session_start();
     // SHIFT CREATED SUCCESSFULLY
    if($_SESSION['shift_reg_message']){
        $shift_reg_message = $_SESSION['shift_reg_message'];
        echo "<script type='text/javascript'>
            alert('$shift_reg_message');
        </script>";
    }
    unset($_SESSION['shift_reg_message']);

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
            <a href="shift.php"><li ><i class="fa fa-circle-o fa-fw"></i>Shift</li></a>
            <a href=""><li style="color: white"><i class="fa fa-circle-o fa-fw"></i>Create Shift</li></a>
           <a href="staff.php"><li><i class="fa fa-circle-o fa-fw"></i> Staff</li></a>
            <a href="add_staff.php"><li ><i class="fa fa-circle-o fa-fw"></i>Add Staff</li></a>
          </ul>
        </div>
      </div>

      <!-- OTHER MENU -->
      <div style="background:#1E282C;color: white;padding: 13px 17px;border-left: 3px solid #3C8DBC;"><span><i class="fa fa-globe fa-fw"></i> Other Menu</span></div>
      <div class="item">
          <ul class="nostyle zero" style="line-height: 2;">
           <a href="contact.php"><li ><i class="fa fa-circle-o fa-fw"></i> Contact</li></a>
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
          <div class="create-shift">
            <h3>Create Shift</h3>
            <form action="create_shift_form.php" method="POST">
              <div class="form-particular">
                <label for="shift-date">Date</label>
                <input type="date" id="dateField" onchange="validateDate()" name="shift_date" required/>
                <span id="errorMessage" style="color: red; display:none; ">Please Select a date on or After Today</span>
                
              </div>
              <div class="form-particular">
                <label for="begin-time">Beginning Time</label>
                <input type="time" name="begin_time" id="start-time" required>
              </div>
              <div class="form-particular">
                <label for="end-time">Ending Time</label>
                <input type="time" name="end_time" id="end-time" required>
              </div>
              <input class="btn" type="submit" name="create_shift" id="" value="Add Shift">
            </form>
          </div>
      </div>
    </div>
    
    <script>
                    function validateDate(){
                      var inputDate = new Date(document.getElementById("dateField").value);
                      var currentDate = new Date();
                      if(inputDate < currentDate){
                        document.getElementById("errorMessage").style.display = "block";
                        document.getElementById("dateField").value = "";
                      }
                      else{
                        document.getElementById("errorMessage").style.display = "none";
                      }
                    }

          const startTimeInput = document.getElementById('start-time');
          const endTimeInput = document.getElementById('end-time');

          endTimeInput.addEventListener('change', function(){
            const startTime = new Date('1970-01-01T' + startTimeInput.value + 'Z');
            const endTime = new Date('1970-01-01T' + endTimeInput.value + 'Z');
            if(endTime <= startTime){
              alert('The Ending Time must be greater than Beginning Time');
              startTimeInput.value = "";
              endTimeInput.value = "";
            }
          })

      </script>
    
    </body>
    
</html>