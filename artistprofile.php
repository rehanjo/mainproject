<?php
include "connection.php";
session_start();
$sucessmsg ='';
$id =$_SESSION['LoginId'];
include "artistSidebar.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style3.css" />
    <title>Your profile</title>
  </head>
  <style>

            .form-control:focus {
                box-shadow: none;
                border-color: #BA68C8
            }

            .profile-button {
                background: rgb(99, 39, 120);
                box-shadow: none;
                border: none
            }

            .profile-button:hover {
                background: #682773
            }

            .profile-button:focus {
                background: #682773;
                box-shadow: none
            }

            .profile-button:active {
                background: #682773;
                box-shadow: none
            }

            .back:hover {
                color: #682773;
                cursor: pointer
            }

            .labels {
                font-size: 11px
            }

            .add-experience:hover {
                background: #BA68C8;
                color: #fff;
                cursor: pointer;
                border: solid 1px #BA68C8
            }
            .checked {
            color: orange;
            }
  </style>
  <body>


     <main class="mt-5 pt-3"  style="margin-left:265px;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12" style="margin-top:-30px;;" >
            <h3>ARTIST PORTAL</h3>
          </div>
        </div>
      </div>
      <hr>
            <?php
                $sql = "SELECT * from tbl_login where reg_no=$id";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $sql2 = "SELECT * from tbl_registration where reg_id= $row[reg_no]";
                    $result2 = $conn->query($sql2);
                    if ($result2->num_rows > 0) {
                while($row2 = $result2->fetch_assoc()) {
                    $name = $row2['reg_fullname'];
                    $sql3 = "SELECT * from tbl_profile where reg_no=$id";
                    $result3 = $conn->query($sql3);
                    if ($result3->num_rows > 0) {
                    while($row3 = $result3->fetch_assoc()) {
            ?>
    <div class="row">
        <div class="col-md-3 ">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <?php if($row3['pro_pic']==NULL){ ?>
                    <img width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                    <span class="font-weight-bold">Your rating : <?php echo $row3['rating']?>/5 <span class="fa fa-star checked"></span></span>
                <?php }else{ ?>
                    <img width="150px" src="images/profile/<?php echo $row3['pro_pic']?> " alt="<?php echo $row3['pro_pic']?> ">
                    <span class="font-weight-bold">Your rating : <?php echo $row3['rating']?>/5 <span class="fa fa-star checked"></span></span>
                    <?php
                }
                ?>
                </div>
        </div>
        <div class="col-md-5">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
			        <form action="" method="POST" enctype="multipart/form-data">
                    <?php if($sucessmsg !=''){?>
                    <div class="alert alert-success" role="alert">
                            <?php echo $sucessmsg ?>
                    </div>
                    <?php } ?>
                <div class="row mt-3">
				<div class="col-md-12"><label class="labels">Name</label><input type="text" class="form-control" value="<?php echo $row2['reg_fullname']?>" readonly></div>
                        <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" name="email" placeholder="enter email id" value="<?php echo $row['lg_email'] ?>" readonly></div>
                        
                        <span class="error_form" id="pno_error_message" style="color:red;font-size:small;"></span>
                        <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" id="form-pno" class="form-control" name="pno" placeholder="enter phone number" value="<?php echo $row2['reg_phoneno'] ?>" onkeyup="check_pp()"></div>
                        <span class="error_form" id="pos_error_message" style="color:red;font-size:small;"></span>
                        <?php if($row3['position']==NULL){?>
                        <div class="col-md-12"><label class="labels">Position</label><input type="text" id="form-pos" class="form-control" name="pos" placeholder="position" value="" onkeyup="check_pos();"></div>
                        <?php }
                        else {?>
                            <div class="col-md-12"><label class="labels">Position</label><input type="text" id="form-pos" class="form-control" name="pos" value="<?php echo $row3['position'] ?>" onkeyup="check_pos();"></div>
                        <?php 
                            } ?>
                        <span class="error_form" id="gen_error_message" style="color:red;font-size:small;"></span>
                        <?php if($row3['genre']==NULL){?>
                            <div class="col-md-12"><label class="labels">Genre</label><input type="text" id="form-gen" class="form-control" name="gen" placeholder="genre" value="" onkeyup="check_gen();"></div>
                        <?php }
                        else {?>
                            <div class="col-md-12"><label class="labels">Genre</label><input type="text" id="form-gen" class="form-control" name="gen" placeholder="genre" value="<?php echo $row3['genre'] ?>" onkeyup="check_gen();"></div>
                        <?php 
                            } ?>
                        <?php if($row3['price']==NULL){?>
                            <div class="col-md-12"><label class="labels">Rate per 30 Minute</label><input type="text" id="form-gen" class="form-control" name="gen" placeholder="Rate per 30 Minute" value="" onkeyup="check_gen();"></div>
                        <?php }
                        else {?>
                            <div class="col-md-12"><label class="labels">Rate per 30 Minute</label><input type="text" id="form-gen" class="form-control" name="gen" placeholder="Rate per 30 Minute" value="<?php echo $row3['price'] ?>" onkeyup="check_gen();"></div>
                        <?php 
                            } ?>
                        <span class="error_form" id="pp_error_message" style="color:red;font-size:small;"></span>
                        <div class="col-md-12"><label class="labels">Change Profile Picture</label><input type="file" name="pp" id="form-pp" class="form-control" onchange="check_pp();">
                </div>
                <br><br><br>
			<div style="width:50%;margin-left:80px;"><button class="btn btn-primary" id="save-btn" name="save" type="submit">Save Profile</button></div>
                    </form>
				<script>
                            function check_pp(){
                                var _validFileExtensions = [".jpg", ".jpeg", ".png"];  
                                var fileInput = document.getElementById('pp');
                                var filePath = fileInput.value;
                                // var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
                                if (filePath.length > 0) {
                                    var flValid = false;
                                    for (var j = 0; j < _validFileExtensions.length; j++) {
                                        var sCurExtension = _validFileExtensions[j];
                                        if (filePath.substr(filePath.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                                            flValid = true;
                                            $("#pp_error_message").hide();
                                            document.getElementById("save-btn").disabled = false;
                                            break;
                                        }
                                    
                                    }
                                    if(!flValid){
                                        $("#pp_error_message").html('Please upload file having extensions .jpeg/.jpg/.png only.');
                                        $("#pp_error_message").show();
                                        $("#form_pp").css("border-bottom", "2px solid #F90A0A");
                                        fileInput.value = NULL;
                                        document.getElementById("save-btn").disabled = true;
                                    }
                                }
                            }
                            function check_pos() {
                                inputText = document.getElementById("form-pos").value;
                                var pattern = /^[^-\s][a-zA-Z ]{2,30}$/;
                                if(inputText.match(pattern))
                                {
                                    document.getElementById("pos_error_message").innerHTML="";
                                    document.getElementById("save-btn").disabled = false;
                                }
                                else
                                {
                                    document.getElementById("pos_error_message").innerHTML="Invalid text";
                                    document.getElementById("save-btn").disabled = true;
                                }
                            }

                            function check_gen() {
                                inputText = document.getElementById("form-gen").value;
                                var pattern = /^[^-\s][a-zA-Z ]{2,30}$/;
                                if(inputText.match(pattern))
                                {
                                    document.getElementById("gen_error_message").innerHTML="";
                                    document.getElementById("save-btn").disabled = false;
                                }
                                else
                                {
                                    document.getElementById("gen_error_message").innerHTML="Invalid text";
                                    document.getElementById("save-btn").disabled = true;
                                }
                            }

                            function check_pno() {
                                inputText = document.getElementById("form-pno").value;
                                var pattern = /[0-9 -()+]+$/;
                                if(inputText.match(pattern))
                                {
                                    document.getElementById("pno_error_message").innerHTML="";
                                    document.getElementById("save-btn").disabled = false;
                                }
                                else
                                {
                                    document.getElementById("pno_error_message").innerHTML="Invalid phone number";
                                    document.getElementById("save-btn").disabled = true;
                                }
                            }
                    </script>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php
                    }
                }
            }
            }
        }}
            ?>
    </div>
</body>
</html>
<?php
    if(isset($_POST['save']))
    {
        $pno = $_POST['pno'];
        $pos = $_POST['pos'];
        $gen = $_POST['gen'];
        $pn = $_FILES["pp"]["name"];
        $ptn = $_FILES["pp"]["tmp_name"];
        $folder = "images/profile/".$pn;
        $sql ="UPDATE tbl_registration SET reg_phoneno=$pno where reg_id=$id";   
        if($conn->query($sql) === TRUE)
		{ 
            $sql2 = "UPDATE tbl_profile SET position='$pos', genre='$gen', pro_pic='$pn' where reg_no=$id" ; 
            {
                if($conn->query($sql2) === TRUE)
                {
                    move_uploaded_file($ptn,$folder);
                    $sucessmsg = "PROFILE UPDATED SUCCESSFULLY";
                }
                else{
                    echo $conn->error;
                }
            }
        } 
        else{
            echo $conn->error;
        }              
    }
    unset($_POST['save'])
?>