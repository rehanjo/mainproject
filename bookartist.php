<?php
 session_start();
 include "connection.php";
 if(isset($_POST["submit"]))
 {
    $artistid = $_POST["artid"];
    $customerid = $_SESSION['LoginId'];
    $date= $_REQUEST['date'];
    $time = $_REQUEST['time'];
    $sql = "INSERT INTO `tbl_bookshows`(`artistid`, `customerid`, `date`,`time`, `status`) VALUES ('$artistid','$customerid','$date','$time',1)";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['message']=" Booking Request Sent";
        header("location:artst_customer_view.php");
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    
 }

 
?>