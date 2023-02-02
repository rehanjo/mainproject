<?php
  include('session.php');
  include "connection.php"; 
  $id = $_GET['id'];
  if (isset($_POST['submit']))
  {
 $quali = $_REQUEST['quali'];
 $year = $_REQUEST['year'];

$sql = "INSERT INTO `qualifications`(`ID`, `artst_id`, `qualification`, `year`) VALUES (DEFAULT,'$id','$quali','$year')";
  
if ($conn->query($sql) === TRUE) {
    header('Location:qualification.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
  }
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"/>
  
    <link rel="stylesheet" href="style3.css" />
    <title>Artist portal</title>
    <style>input{
        width:20%;
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
                <span>Notifications</span>
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
            <h4>Welcome Artist</h4>
          </div>
        </div>
        <div class="row">
          
         <form action="#" method="POST">  
  
<label> Qualification </label>         
<input type="text" id="qual" name="quali" size="15"/> <br> <br>  
<label> Year:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;  </label>    
<input type="number" id="year" name="year" size="15"/> <br> <br>  
<input type="submit" id="add" name ="submit" value="ADD"/>  
</form>  
         
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
