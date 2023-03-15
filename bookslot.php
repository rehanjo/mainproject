<?php
include "connection.php";
session_start();
$id = $_POST['id'];
$address = $_POST['address'];
  $sql = "UPDATE `tbl_schedule` SET `status`=2 WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
    // header('Location:cust_artist_profile.php');
            $schid = $id;
            $customerid = $_SESSION['LoginId'];
            $sql = "INSERT INTO `tbl_bookshows`(`schid`, `customerid`,`address`) VALUES ('$schid','$customerid','$address')";
            if ($conn->query($sql) === TRUE) {
                $_SESSION['message']=" Booking Request Sent";
                header("location:artst_customer_view.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

?>