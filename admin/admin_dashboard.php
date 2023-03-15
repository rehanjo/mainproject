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
    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"/>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="style3.css" />
    <title>Admin Dashboard</title>
    <script type="text/javascript">
       
       google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
            var data = google.visualization.arrayToDataTable([

            ['Role','Number'],
            <?php 
                $query = "SELECT count(lg_role) AS number, lg_role FROM tbl_login WHERE lg_role != 'admin' GROUP BY lg_role";

                $exec = mysqli_query($conn,$query);
                while($row = mysqli_fetch_array($exec)){

                echo "['".$row['lg_role']."',".$row['number']."],";
                }
            ?> 
            ]);

            var options = {
            title: 'Ratio of Registered artist and customers',          
            pieHole: 0,
                pieSliceTextStyle: {
                    color: 'black',
                },
                legend: 'none'
            };
            var chart = new google.visualization.PieChart(document.getElementById("piechart"));
            chart.draw(data,options);
            }
            
    </script>
  </head>
  <body>

                <!-- offcanvas -->
    <div class="offcanvas offcanvas-start sidebar-nav bg-dark" id="sidebar" style="margin-top:-55px;height:760px;float:left">
      <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
          <ul class="navbar-nav">
            <li>
              <a href="#" class="nav-link px-3 active">
                <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                <span>ADMIN DASHBOARD</span>
              </a>
            </li>
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>

            </li>
            <li>
              <a href="artist_view.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-table"></i></span>
                <span>Artist List</span>
              </a>
            </li>
            <li>
              <a href="user_view.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-table"></i></span>
                <span>Customer List</span>
              </a>
            </li>
            <li>
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
          <div class="col-md-12" style="margin-top:-26px;;">
            <h3>Welcome <?php echo $_SESSION['LoginUser']?></h3>
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-3">
            <div class="card">
             
          </div>
        </div>
      </div>
      <div class="container-fluid">
            <center><div id="piechart" style="width: 400px; height: 400px;"></div></center>
      </div><br>
      <div class="row" style="margin-left:150px;">
          <div class="col-md-3 mb-3">
            <div class="card bg-primary text-white h-100">
              <div class="card-body py-5">Total Artist List</div>
              <div class="card-footer d-flex">
              <a href="artist_view.php">View Details</a>
                <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
              </div>
            </div>
          </div>

          <div class="col-md-3 mb-3">
            <div class="card bg-primary text-white h-100">
              <div class="card-body py-5">Visitors List</div>
              <div class="card-footer d-flex">
              <a href="user_view.php">View Details</a>
                <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
              </div>
            </div>
          </div>
<!-- 
          <div class="col-md-3 mb-3">
            <div class="card bg-success text-white h-100">
              <div class="card-body py-5">Albums</div>
              <div class="card-footer d-flex">
                View Details
                <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
              </div>
            </div>
          </div> -->
		   <div class="col-md-3 mb-3">
            <div class="card bg-success text-white h-100">
              <div class="card-body py-5">Feedback</div>
              <div class="card-footer d-flex">
                <a href="feed.php">View Details</a>
                <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
              </div>
            </div>
          </div>
         
                </span>
              </div>
            </div>
          </div>
        </div>
       
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
