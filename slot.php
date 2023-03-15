<?php
include "connection.php";
session_start();
if(!empty($_POST["date_id"]))
{
$id=$_POST["date_id"];
$sql = "SELECT * FROM tbl_timeslot WHERE schid=$id";
$result = mysqli_query($conn, $sql);
echo "<script>alert($sql)</script>";
	echo "<option disabled selected>Select time</option>";
if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)){
	// echo "<option value='" . $row['cabtype_id'] . "'>" . $row['cab_name'] ."</option>";
	$_SESSION['from'] = $row['time_from'];
    $_SESSION['to'] = $row['time_to'];
}
}
else{
    echo "<option disabled selected>$sql</option>";
}
}
?>