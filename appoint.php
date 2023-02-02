<?php
session_start();
$servername = "localhost";
 $username = "root";
$password = "";
$dbname = "musicos";
$conn = new mysqli($servername,$username,$password,$dbname);
	

if ($conn->connect_error) {
die("Connection failed: " 
. $conn->connect_error);
}
$id = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"/>
  
    <link rel="stylesheet" href="style3.css" />
    <title>Artist portal</title>
    <style> table.paleBlueRows {
  font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
  border: 2px solid #FFFFFF;
  width: 100%;
  height:150%;
  text-align: center;
  border-collapse: collapse;
}
table.paleBlueRows td, table.paleBlueRows th {
  border: 1px solid #FFFFFF;
  padding: 3px 2px;
}
table.paleBlueRows tbody td {
  font-size: 13px;
}
table.paleBlueRows tr:nth-child(even) {
  background: lightcyan;
}
table.paleBlueRows thead {
  background: darkblue;
  border-bottom: 5px solid #FFFFFF;
}
table.paleBlueRows thead th {
  font-size: 17px;
  font-weight: bold;
  color: #FFFFFF;
  text-align: center;
  border-left: 2px solid #FFFFFF;
}</style>
  </head>
  <body>
    <!-- top navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#sidebar"
          aria-controls="offcanvasExample"
        >
          <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
        </button>
       
        <div class="collapse navbar-collapse" id="topNavBar">
          <form class="d-flex ms-auto my-3 my-lg-0">
            <div class="input-group">
              <input
                class="form-control"
                type="search"
                placeholder="Search"
                aria-label="Search"
              />
              <button class="btn btn-primary" type="submit">
                <i class="bi bi-search"></i>
              </button>
            </div>
          </form>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle ms-2"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="bi bi-person-fill"></i>
              </a>
              <!-- <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="index.html">Log Out</a></li>
          
              </ul> -->
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- top navigation bar -->
    <!-- offcanvas -->
    <div
      class="offcanvas offcanvas-start sidebar-nav bg-dark"
      tabindex="-1"
      id="sidebar"
    >
      <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
          <ul class="navbar-nav">
            <li>
              <a href="#" class="nav-link px-3 active">
                <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                <span>ARTIST DASHBOARD</span>
              </a>
            </li>
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                Results
              </div>
            </li>
            </li>
            <li>
              <a href="#" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-graph-up"></i></span>
                <span>Appointments</span>
              </a>
            </li>
            <li>
              <a href="qualification.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-table"></i></span>
                <span>Qualifications</span>
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
          <div class="col-md-12">
            <h4>Your Appointments</h4>
         
          </div>
        </div>
        <div class="row">
          
        <table class="paleBlueRows">
<thead>
<tr>
    <th>Customer Id</th>
    <th>Customer Name</th>
    <th>Date</th>
  <th>Time</th>
  <th>action</th>
</tr>
</thead>
<tbody>
 <?php

 $sql = "SELECT * from appointment where artist_id='$id'";
 $result = $conn->query($sql);
 if ($result -> num_rows > 0) {
   // output data of each row
  while($row = $result->fetch_assoc()) {
    ?>
  <tr><?php
  $id2 = $row['customer_id'];
  $fet=mysqli_query($conn,"SELECT * FROM `tbl_registration` WHERE log_id='$id2'");
  $rw=mysqli_fetch_array($fet);
  ?>
  <td><?php echo $row['customer_id'] ?></td>
  <td><?php echo $rw['reg_fullname'] ?></td>
  <td><?php echo $row['date'] ?></td>
  <td><?php echo $row['time'] ?></td>
 
  
  <td>
  <?php
  if ($row['status']==1){ ?>
    <a href="approve.php?id=<?php echo $row['id'];?>">approve</a> <a href="reject.php?id=<?php echo $row['id'];?>">reject</a>
    <?php 
    } 
    else if ($row['status']==-1){ ?>
    <a>Rejected</a><?php } 
    else{
    ?>
    <a>Approved</a><?php 
    }
    ?>
    </td>
  </tr>
 <?php
 }
 }
 function view(){
  
 }
    ?> 
 

  
   </tbody>
</table> 
         
                </span>
              </div>
            </div>
          </div>
        </div>
       
        </div>
        <div class="row">
          <div class="col-md-12 mb-3">
            <div class="card">
             
          </div>
        </div>
      </div>
    </main>
   
    
    <script src="./js/bootstrap.bundle.min.js"></script>
  </body>
</html>