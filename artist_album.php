<?php
 include "connection.php";
 session_start();
 $id = $_SESSION['LoginId'];
 include "artistSidebar.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SONGS</title>
    <style>
		audio {
			width: 640px;
			height: 40px;
		}
	</style>
  </head>
  <body>
  <main class="mt-5 pt-3" style="margin-left:265px;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12" style="margin-top:-30px;;" >
            <h3 style="margin-left:20px;">YOUR SONGS</h3>
          </div>
        </div>
      </div>
      <hr>
      <!-- <a href="view.php">album</a> -->
	    <?php if (isset($_GET['error'])) {  ?>
		    <p><?=$_GET['error']?></p>
	    <?php } ?>
        <h6>ADD NEW SONGS TO LIST</h6>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="text" name="title" class="form-control"  style="height:40px;width:400px;float:left;margin-right:5px;" placeholder="Song Title">
            <input type="file" name="my_audio" class="form-control" style="width:400px;float:left;margin-right:5px;">
            <input type="submit" name="submit" value="Upload" class="btn btn-primary" style="height:38px;">
        </form>
        <br>
        <h6>CURRENT SONGS ON LIST</h6><br>
        
          <table>
		<?php 
		 $sql = "SELECT * FROM audios where aid=$id ORDER BY id DESC";
		 $res = mysqli_query($conn, $sql);

		 if (mysqli_num_rows($res) > 0) {
		 	while ($audio = mysqli_fetch_assoc($res)) { 
		 ?>
     <tr>
      <td> <p style="float:left;margin-right:10px;margin-top:10px;"><?php echo $audio['title']?> </p></td>
      <td><audio src="uploads/<?=$audio['audio_url']?>" controls></audio></td>
     </tr>
		 	
	    <?php 
	     }
		 }
     else{?>
      <div class="alert alert-info" role="alert">No Songs added</div>
<?php }
		 ?>
     </table>
</main>
</body>
</html>