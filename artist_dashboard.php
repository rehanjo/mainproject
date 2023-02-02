<?php
session_start();
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
    
    <!-- offcanvas -->
    <div class="offcanvas offcanvas-start sidebar-nav bg-dark" id="sidebar" style="margin-top:-55px;height:760px;float:left">
      <div class="offcanvas-body p-0">
        <nav class="navbar-dark" style="margin-top:32px;">
          <ul class="navbar-nav">
            <li>
              <a href="#" class="nav-link px-3 active">
                <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                <span>ARTIST DASHBOARD</span>
              </a>
            </li>
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <a href="artistprofile.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-person"></i></span>
                <span>Profile</span>
              </a>
            </li>
            <li>
              <a href="appoint.php" class="nav-link px-3">
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
          <div class="col-md-12" style="margin-top:-25px;">
            <h3>Welcome <?php echo $_SESSION['LoginUser']?></h3>
          </div>
        </div>
        <div class="row" style="margin-top:20px;">
          
         
         
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
