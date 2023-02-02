<?php
 include "connection.php";
 session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <script src="jquery-3.6.0.min.js"></script>
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style3.css" />
    <title>customer portal</title>
    <style>
      main{
        width:77%;
      }
      .checked {
        color: orange;
      }
    </style>
  </head>
  <body>
    
    <!-- offcanvas -->
    <div
      class="offcanvas offcanvas-start sidebar-nav bg-dark" id="sidebar" style="margin-top:-55px;height:760px;float:left">
      <div class="offcanvas-body p-0">
        <nav class="navbar-dark" style="margin-top:32px;">
          <ul class="navbar-nav">
            <li>
              <a href="customer_dashboard.php" class="nav-link px-3 active">
                <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                <span>CUSTOMER DASHBOARD</span>
              </a>
            </li>
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <a href="artst_customer_view.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-graph-up"></i></span>
                <span>Artists</span>
              </a>
            </li>
            <li>
              <a href="status.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-table"></i></span>
                <span>Status</span>
              </a>
              <a href="logout.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-table"></i></span>
                <span>logout</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <!-- offcanvas -->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12" style="margin-top:-30px;">
            <h3>ARTIST PORTAL</h3>
          </div>
        </div>
      </div>
      <div class="row" style="margin-top:25px;"><div class="col-md-12 mb-3"><div class="card"></div></div></div>
      <div class="row row-cols-3 g-3">
      <?php
                $sql = "SELECT * from tbl_login where lg_role='artist'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $sql2 = "SELECT * from tbl_registration where reg_id= $row[reg_no]";
                    $result2 = $conn->query($sql2);
                    if ($result2->num_rows > 0) {
                while($row2 = $result2->fetch_assoc()) {
                    $name = $row2['reg_fullname'];
                    $sql3 = "SELECT * from tbl_profile where reg_no=$row[reg_no]";
                    $result3 = $conn->query($sql3);
                    if ($result3->num_rows > 0) {
                    while($row3 = $result3->fetch_assoc()) {
            ?>
      <div id="main" style="margin-left:100px;">
      <div class="col">
        <div class="card" ">
          <div class="card-body text-center">
            <img src="images/profile/<?php echo $row3['pro_pic']?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;height:150px;">
            <h5 class="my-3"><?php echo $row2['reg_fullname']?></h5>
            <p class="text-muted mb-1">
              Position : <?php echo $row3['position']?><br>
              Genre : <?php echo $row3['genre']?><br>
              Email : <?php echo $row['lg_email']?><br>
              Contact no: <?php echo $row2['reg_phoneno']?><br>
              Rating : <?php echo $row3['rating']?>/5 <span class="fa fa-star checked"></span></p>
            </p>
            <div class="d-flex justify-content-center mb-2">
              <button type="button" class="btn btn-primary">Book</button>
            </div>
          </div>
        </div>
      </div>
      </div>
      <?php
                    }}}}}}
    ?>
    </div>
    </main>