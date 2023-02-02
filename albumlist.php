<?php
 
 include "connection.php";

 if(isset($_POST["submit"]))
 {
	 $sname = $_POST["songname"];
	 $artist = $_POST["artist"];
     $genre = $_POST["genre"];
	//  $pno = $_POST["phoneno"];
	//  $password= $_POST["password"];
	//  $role = "User";
	  

	 
         $sql ="INSERT INTO tbl_album(songname, genre) VALUES ('$sname','$artist','$genre')";
         if($conn->query($sql) === TRUE)
		 {
			 $sql1 = "INSERT INTO tbl_login(lg_email, lg_password, lg_role) VALUES ('$email','$password','$role')";
			 if($conn->query($sql1) === TRUE)
			 {
				 echo "Successful inserted login";
			 }
			 else
		    {
				 echo "Insertion failed in login";
		    }
			header('Location:lp.php'); 
			echo "Successful inserted";
		 }
		 else
		 {
			 echo "Insertion failed";
		 }
         
      
   }
  
	 

?>
