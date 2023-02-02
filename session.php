<?php
session_start();
if (!isset($_SESSION['id'])){

header('location:lp.php');
}
$id_session=$_SESSION['id'];
?>