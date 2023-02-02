<?php
  include('session.php');
  include "connection.php"; 
  $id = $_GET['id'];
$sql = "UPDATE `appointment` SET `status`= -1 WHERE id='$id'";
  
if ($conn->query($sql) === TRUE) {
    header('Location:appoint.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>