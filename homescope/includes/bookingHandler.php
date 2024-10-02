<?php
    session_start();
    include('config/dbconn.php');
    if(isset($_POST['book']))
    {

        $uid=$_SESSION['uid'];
        $propertyid=intval($_GET['propertyid']);
        
        $bookingDate=$_POST['bookingDate'];
        $time=$_POST['time'];
        $message=$_POST['message'];
        $status='Pending Approval';

      //echo "<script>alert($email);</script>";
      //echo "<script>alert($password);</script>";

      $sql = "INSERT INTO booking(pid,uid,date,time,message,status) VALUES
      ('$propertyid', '$uid', '$bookingDate', '$time', '$message', '$status')";
      $query = $dbh->prepare($sql);
      $query->execute();

      $lastInsertId = $dbh->lastInsertId();

      if($lastInsertId)
      {
        $_SESSION['success']=" Booking sent for approval successfully !";
        header("Location: ../my-bookings.php");
      }  
      
      else{

        $_SESSION['error']="Unable to submit. Please try again."; 
        header("Location: ../property-list.php");
        
      }

    }
    else{
        header("Location: ../property-list.php");
    }

?>