<?php
include "connection.php";
session_start();
$id = $_POST['id'];
$address = $_POST['address'];
$hrs = $_POST['hrs'];
$show_cost = $_POST['rate'];
  $sql = "UPDATE `tbl_schedule` SET `status`=2 WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
    // header('Location:cust_artist_profile.php');
            $schid = $id;
            $customerid = $_SESSION['LoginId'];
            $sql = "INSERT INTO `tbl_bookshows`(`schid`, `customerid`,`address`,`hours`,`show_cost`) VALUES ('$schid','$customerid','$address','$hrs','$show_cost')";
            if ($conn->query($sql) === TRUE) {
                $_SESSION['message']=" Booking Request Sent";
                $bookid = mysqli_insert_id($conn);
                header("location:payment.php?id=".$bookid);
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

?>