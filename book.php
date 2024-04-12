
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

  // CHECK IF THE USER HAS ALREADY BOOKED ANY SHIFT
  $booking_check_sql = "SELECT * FROM bookings WHERE booked_by = '{$staff['full_name']}'";
  $result_booking_check = mysqli_query($conn, $booking_check_sql);

  if($result_booking_check->num_rows > 0){
    $_SESSION['shift_booked_message'] = "You have already booked a shift.";
    header('location:book_shift.php');
    exit; // Stop further execution
  }

  // CAPTURING THE INFORMATION OF CLICKED SHIFT
  if(isset($_GET['shift_id'])){
    $shift_id = $_GET['shift_id'];
    $sql_get_shift = "SELECT * FROM shift WHERE shift_id = '$shift_id' ";
    $result_shift = mysqli_query($conn, $sql_get_shift);
    if($result_shift-> num_rows > 0){
      $shift = $result_shift->fetch_assoc();
    }
  }

  // BOOKING ATTRIBUTES
  $begin_time = $shift['begin_time'];
  $end_time = $shift['end_time'];
  $date = $shift['date'];
  $booked_by = $staff['full_name'];

  // INSERT THE BOOKING
  $booking_sql = "INSERT INTO bookings(shift_id, shift_date, begin_time, end_time, booked_by)
                  VALUES('$shift_id', '$date', '$begin_time', '$end_time', '$booked_by')";
  $result_booking = mysqli_query($conn, $booking_sql);

  if($result_booking){
    // Delete the booked shift from the shift table
    $delete_shift_sql = "DELETE FROM shift WHERE shift_id = '$shift_id'";
    $result_delete_shift = mysqli_query($conn, $delete_shift_sql);

    if($result_delete_shift){
      $_SESSION['shift_booked_message'] = "Shift Booked Successfully";
      header('location:book_shift.php');
    } else {
      echo "Failed to delete booked shift.";
    }
  } else {
    echo "Something Went wrong";
  }
?>

