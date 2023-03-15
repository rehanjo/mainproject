<?php
 include "connection.php";
 session_start();
 $id = $_SESSION['LoginId'];
?>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"/>
  
    <link rel="stylesheet" href="style3.css" />
    <title>Admin Dashboard</title>
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
            <h3>ADMIN PORTAL</h3>
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-3">
            <div class="card">
             
          </div>
        </div>
      </div>
      <table class="table" id="bookings" style="width:1000px;margin-left:100px;">
        <thead>
          <tr>
            <th scope="col">NAME</th>
            <th scope="col">PHONE</th>
            <th scope="col">EMAIL</th>
            <th scope="col">BOOKED PROGRAMS</th>
            <th scope="col">CANCLED PROGRAMS</th>
            <!-- <th scope="col">RATING</th> -->
          </tr>
        </thead>
        <?php
                $sql = "SELECT * from tbl_login where lg_role='customer'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $sql2 = "SELECT * from tbl_registration where reg_id= $row[reg_no]";
                    $result2 = $conn->query($sql2);
                    if ($result2->num_rows > 0) {
                while($row2 = $result2->fetch_assoc()) {
                  $query = "SELECT count(customerid) AS booked FROM tbl_bookshows WHERE status != 0 and customerid=$row[reg_no]";
                  $result3 = $conn->query($query);
                    if ($result3->num_rows > 0) {
                      while($row3 = $result3->fetch_assoc()) {
                        $query = "SELECT count(customerid) AS cancelled FROM tbl_bookshows WHERE status = 3 and customerid=$row[reg_no]";
                          $result4 = $conn->query($query);
                              while($row4 = $result4->fetch_assoc()) {
            ?>
        <tbody>
          <tr>
            <td><?php echo $row2['reg_fullname']?></td>
            <td><?php echo $row2['reg_phoneno']?></td>
            <td><?php echo $row['lg_email']?></td>
            <td><?php echo $row3['booked']?></td>
            <td><?php echo $row4['cancelled']?></td> 
            <!-- <td><?php echo $row3['rating']?></td> -->
          </tr>
        </tbody>
        <?php 


                          }
                        }
                      }
                    }
                  }
                }
              }
        ?>
      </table>
            </div>
    </main>
       
    
</body>
