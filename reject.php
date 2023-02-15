<?php
 include "connection.php";
 session_start();
  $id = $_GET['id'];
  echo $id;
  $sql = "UPDATE `tbl_bookshows` SET `status`=0 WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
  header('Location:artist_bookings.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>