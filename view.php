<?php
 include "connection.php";
 session_start();
 $id = $_SESSION['LoginId'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>View</title>
	<style>
		audio {
			width: 640px;
			height: 360px;
		}
	</style>
</head>
<body>
	<a href="artist_album.php">UPLOAD</a>

	<div class="alb">
		<?php 
		 $sql = "SELECT * FROM audios ORDER BY id DESC";
		 $res = mysqli_query($conn, $sql);

		 if (mysqli_num_rows($res) > 0) {
		 	while ($audio = mysqli_fetch_assoc($res)) { 
		 ?>
		 		
	        <audio src="uploads/<?=$audio['audio_url']?>" controls></audio>

	    <?php 
	     }
		 }else {
		 	echo "<h1>Empty</h1>";
		 }
		 ?>
	</div>
</body>
</html>