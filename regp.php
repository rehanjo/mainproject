<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Page</title>
    <link rel="stylesheet" type="text/css" href="body.css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
</head>

<body>
    <div class="container" >
        <h1>REGISTER</h1>
        <form id="registration_form" action="code_reg.php" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
        <div>
            <label style="color:rgb(66, 133, 244)">Select your role</label>
            <select name="role" id="role" style="margin-left:130px;margin-top:5px;" >
                <option value="artist">Artist</option>
                <option value="customer">Customer</option>
            </select>     
        </div>    
        <br><br>
        <div>
                <input type="text" id="form_fname" name="fullname" required="">
                <span class="error_form" id="fname_error_message"></span>
                <label>
                    Full Name
                </label>
            </div>

            <div>
                <input type="text" id="form_email" name="email" required="">
                <span class="error_form" id="email_error_message"></span>
                <label>Email id</label>
            </div>
            <div>
                <input type="tel" id="form_pno" name="phoneno" required="">
                <span class="error_form" id="pno_error_message"></span>
                <label>Phone No</label>
            </div>

            <div>
                <input type="password" id="form_password" name="password" required="">
                <span class="error_form" id="password_error_message"></span>
                <label>Password</label>
            </div>
            <div>
                <input type="password" id="form_retype_password" name="confirm-password" required="">
                <span class="error_form" id="retype_password_error_message"></span>
                <label>Re-Enter Password</label>
            </div>
            <input id="regbtn" type="submit" value="Register" name="submit">
            <br><br><span style="color:rgb(66, 133, 244);"> Have an account?&nbsp;</span><a href="lp.php" style="color:red;">Login Here</a>
        </form>
    </div>
    <script type="text/javascript">

        function validateForm(){
            const btn = document.querySelector("#regbtn");
            check_fname();
            if(btn.hasAttribute('disabled')){
                return false;
            }
            check_email();
            if(btn.hasAttribute('disabled')){
                return false;
            }
            check_pno();
            if(btn.hasAttribute('disabled')){
                return false;
            }
            check_password();
            if(btn.hasAttribute('disabled')){
                return false;
            }
            check_retype_password();
            if(btn.hasAttribute('disabled')){
                return false;
            }
            
            
        }

        $(function() {

            $("#fname_error_message").hide();

            $("#email_error_message").hide();
            $("#pno_error_message").hide();
            $("#password_error_message").hide();
            $("#retype_password_error_message").hide();

            var error_fname = false;

            var error_email = false;
            var error_pno = false;
            var error_password = false;
            var error_retype_password = false;

            $("#form_fname").focusout(function() {
                check_fname();
            });

            $("#form_email").focusout(function() {
                check_email();
            });
            $("#form_pno").focusout(function() {
                check_pno();
            });
            $("#form_password").focusout(function() {
                check_password();
            });
            $("#form_retype_password").focusout(function() {
                check_retype_password();
            });

            function check_fname() {
                document.getElementById("regbtn").disabled = true;
                var pattern = /^[ a-zA-Z\s]*$/;
                var fname = $("#form_fname").val();
                if (pattern.test(fname) && fname !== '') {
                    document.getElementById("regbtn").disabled = false;
                    $("#fname_error_message").hide();
                    $("#form_fname").css("border-bottom", "2px solid #34F458");
                } else {
                    document.getElementById("regbtn").disabled = true;
                    $("#fname_error_message").html("Should contain only Characters");
                    $("#fname_error_message").show();
                    $("#form_fname").css("border-bottom", "2px solid #F90A0A");
                    error_fname = true;
                }
            }

            function check_pno() {
                document.getElementById("regbtn").disabled = true;
                var pattern = /[0-9 -()+]+$/;
                var pno = $("#form_pno").val()
                if (pattern.test(pno) && pno.length == 10) {
                    document.getElementById("regbtn").disabled = false;
                    $("#pno_error_message").hide();
                    $("#form_pno").css("border-bottom", "2px solid #34F458");
                } else {
                    document.getElementById("regbtn").disabled = true;
                    $("#pno_error_message").html("Should contain only 10 digits");
                    $("#pno_error_message").show();
                    $("#form_pno").css("border-bottom", "2px solid #F90A0A");
                    error_pno = true;
                }
            }



            function check_password() {
                document.getElementById("regbtn").disabled = true;
                var pattern = /^[A-Za-z0-9\d=!\-@._*]*$/;
                var password = $("#form_password").val();
                if (pattern.test(password) && password !== '') {
                    document.getElementById("regbtn").disabled = false;
                    $("#password_error_message").hide();
                    $("#form_password").css("border-bottom", "2px solid #34F458");
                } else {
                    document.getElementById("regbtn").disabled = true;
                    $("#password_error_message").html("Password format is:User@1234");
                    $("#password_error_message").show();
                    $("#form_password").css("border-bottom", "2px solid #F90A0A");
                    error_password = true;
                }
            }


            function check_retype_password() {
                document.getElementById("regbtn").disabled = true;
                var password = $("#form_password").val();
                var retype_password = $("#form_retype_password").val();
                if (password !== retype_password) {
                    document.getElementById("regbtn").disabled = true;
                    $("#retype_password_error_message").html("Passwords Did not Matched");
                    $("#retype_password_error_message").show();
                    $("#form_retype_password").css("border-bottom", "2px solid #F90A0A");
                    error_retype_password = true;
                } else {
                    document.getElementById("regbtn").disabled = false;
                    $("#retype_password_error_message").hide();
                    $("#form_retype_password").css("border-bottom", "2px solid #34F458");
                }
            }

            function check_email() {
                document.getElementById("regbtn").disabled = true;
                var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                var email = $("#form_email").val();
                if (pattern.test(email) && email !== '') {
                    document.getElementById("regbtn").disabled = false;
                    $("#email_error_message").hide();
                    $("#form_email").css("border-bottom", "2px solid #34F458");
                } else {
                    document.getElementById("regbtn").disabled = true;
                    $("#email_error_message").html("Invalid Email");
                    $("#email_error_message").show();
                    $("#form_email").css("border-bottom", "2px solid #F90A0A");
                    error_email = true;
                }
            }


        });
    </script>
</body>

</html>
