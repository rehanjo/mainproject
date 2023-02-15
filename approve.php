<?php
  include('session.php');
  include "connection.php"; 
  $id = $_GET['id'];
  $sql = "UPDATE `tbl_bookshows` SET `status`= 2 WHERE id='$id'";
  
    if ($conn->query($sql) === TRUE) {
        header('Location:artist_bookings.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>