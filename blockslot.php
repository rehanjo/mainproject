<?php
include "connection.php";
session_start();
$id = $_GET['id'];
$st = $_GET['status'];
  $sql = "UPDATE `tbl_schedule` SET `status`='$st' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
    header('Location:artist_slot.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

?>