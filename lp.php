<?php
include "code_log.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="description" content="HTML Registration form">
    <meta name="keywords" content="HTML Registration">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- <link rel="stylesheet" type="text/css" href="normalize.css"> -->
    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>

    <div id="logcontainer" style="width:325px;height:400px;">
        <header>SignIn</header>
        <?php
            
        ?> 
         <?php echo $msg; ?>
        <form action="code_log.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <br/>
                <input type="email" name="email" id="email" placeholder="E-mail" required>
                <br/><br/>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <br/><br/>
                <div class="g-recaptcha" data-sitekey="6LdWGMAkAAAAAPvTaQDxY4PO4tYQhxrWB13w7E3M"></div><br>
                <label for="submit"></label>
                <input type="submit" name="submit" id="submit" value="LOGIN">
                
                <br> Dont have an account?&nbsp;<a href="regp.php" style="color:red;">SignUp</a>
                <a href="forgotpassword.php" style="color:red;">Forgotpassword</a>
                <br> <?php  if(isset($_POST['error'])){echo $_POST['error'];}?><br>
                
            </fieldset>
        </form>
    </div>
    
</body>

</html>
