<?php
 session_start();
 include "connection.php";
 $msg = "";
 $role="";
 if(isset($_POST["submit"]))
 {
	 $email = $_POST["email"];
	 $password = md5($_POST["password"]);
     
	 
	$query = "SELECT * FROM tbl_login WHERE lg_email='$email' AND lg_password='$password'";
	$result = mysqli_query($conn,$query);
	if(mysqli_num_rows($result)>0)
	{
		while($row = mysqli_fetch_assoc($result))
		{
			$id = $row["reg_no"];
			$q2 = "SELECT reg_fullname FROM tbl_registration WHERE reg_id = $id";
			if($result2 = $conn->query($q2)){ 
				if($result2->num_rows > 0){ 
					while($row2 = $result2->fetch_array()){
						$name =  $row2["reg_fullname"];         
					}
				}
			 }
			if($row["lg_role"] == "admin")
			{
				$_SESSION['LoginUser'] = $name;
				$_SESSION['LoginId'] = $id;
				header('Location: admin/admin_dashboard.php');
			}
			else if($row["lg_role"] == "customer")
			{
				$_SESSION['LoginUser'] = $name;
				$_SESSION['LoginId'] = $id;
				header('Location: customer_dashboard.php');
			}
			else
			{
				$_SESSION['LoginUser'] = $name;
				$_SESSION['LoginId'] = $id;
				header('Location: artistprofile.php');
			}
			
		}
	}
	else
	{
		header('Location: lp.php');
		$_SESSION['error'] = "invalid Details";
	}
	 
 }
 
 echo $role;
 //echo $msg = "Invalid E-mail and Password";

?>