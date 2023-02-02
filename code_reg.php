<?php
 
 include "connection.php";

 if(isset($_POST["submit"]))
 {
	 $name = $_POST["fullname"];
	 $email = $_POST["email"];
	 $pno = $_POST["phoneno"];
	 $password= md5($_POST["password"]);
	 $role = $_POST["role"];
	  

	 
         $sql ="INSERT INTO tbl_registration(reg_fullname,reg_phoneno) VALUES ('$name','$pno')";
         if($conn->query($sql) === TRUE)
		 {
			 $regno = "SELECT reg_id FROM tbl_registration where reg_phoneno = $pno";
			 if($result = $conn->query($regno)){ 
				if($result->num_rows > 0){ 
					while($row = $result->fetch_array()){
						$reg = (int)$row["reg_id"];                 
					}
				}
			 }
			 $sql1 = "INSERT INTO tbl_login(reg_no, lg_email, lg_password, lg_role) VALUES ('$reg','$email','$password','$role')";
			 if($conn->query($sql1) === TRUE)
			 {
				$sql2 = "INSERT INTO tbl_profile(reg_no) VALUES ('$reg')";
				if($conn->query($sql2) === TRUE)
				{
				   header('Location:lp.php'); 
				   echo "Successful inserted";
				}
				else
			   {
					echo "Insertion failed in profile" . $conn->error;
			   }
			 }
			 else
		    {
				 echo "Insertion failed in login" . $conn->error;
		    }
			// header('Location:lp.php'); 
			// echo "Successful inserted";
		 }
		 else
		 {
			 echo "Insertion failed";
		 }
         
      
   }
  
	 

?>