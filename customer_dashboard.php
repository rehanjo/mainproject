<?php
include "connection.php";
session_start();
$id = $_SESSION['LoginId'];
 include "custSidebar.php";
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
    <link rel="stylesheet" href="style3.css" />
    <title>Admin Dashboard</title>
  </head>
  <body>
    <main class="mt-5 pt-3" style="margin-left:315px;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12" style="margin-top:-30px;">
            <h3>Welcome <?php echo $_SESSION['LoginUser']?></h3>
          </div>
        </div>
      </div>  
        <div class="row" style="margin-top:25px;"><div class="col-md-12 mb-3"><div class="card"></div></div></div>
    </main>
    <script src="./js/bootstrap.bundle.min.js"></script>
  </body>
</html>
