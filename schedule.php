<?php
include "connection.php";
session_start();
$id = $_SESSION['LoginId'];

    if(isset($_POST['submit'])){
        $sql ="INSERT INTO tbl_schedule(aid,date,time_from,time_to) VALUES ('$id','$_POST[date]','$_POST[from]','$_POST[to]')";
         if($conn->query($sql) === TRUE)
		 {
            header("Location: artist_slot.php");
         }
    }
?>