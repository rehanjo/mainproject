<?php
 include "connection.php";
 session_start();
  $id = $_GET['id'];
  $stat = $_GET['stat'];
  $sql = "UPDATE `tbl_bookshows` SET `status`=$stat WHERE id='$id'"; 
if ($conn->query($sql) === TRUE) {
  if($stat == 0){
  header('Location:artistprog.php');
  }else{
    header('Location:customerprog.php');
  }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>