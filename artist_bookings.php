<?php
 include "connection.php";
 session_start();
 $id = $_SESSION['LoginId'];
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
    <title>Bookings</title>

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
              <a href="artist_bookings.php" class="nav-link px-3">
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
    <main class="mt-5 pt-3" style="width:100%;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12" style="margin-top:-30px;;" >
            <h3>ARTIST PORTAL</h3>
          </div>
        </div>
      </div>
      
      <div class="row" style="margin-top:25px;"><div class="col-md-12 mb-3"><div class="card"></div></div></div>
      <div id="main">
      <table class="table" id="bookings" style="margin-left:250px;width:1000px;">
  <thead>
    <tr>
      <th scope="col">CUSTOMER NAME</th>
      <th scope="col">DATE</th>
      <th scope="col">TIME</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <?php
                $sql = "SELECT * from tbl_bookshows where artistid= $id";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  $sql2 = "SELECT * from tbl_registration where reg_id= $row[customerid]";
                  $result2 = $conn->query($sql2);
                  if ($result2->num_rows > 0) {
                    while($row2 = $result2->fetch_assoc()) {
                      $bookid= $row['id'];
            ?>
  <tbody>
    <tr>
      <td><?php echo $row2['reg_fullname']?></td>
      <td><?php echo $row['date']?></td>
      <td><?php echo $row['time']?></td>
      <?php if($row['status']==1){?>
      <td>
        <a href="approve.php?id=<?php echo $bookid;?>" style="color:green;"><i class="fa fa-check-square" aria-hidden="true"></i></a>
        <a href="reject.php?id=<?php echo $bookid;?>" style="color:red;"><i class="fa fa-window-close" aria-hidden="true" style="margin-left:20px;"></i></a>
      </td>
        <?php }
        else if($row['status']==2){ ?>
        <td style="color:green">Confirmed</td>
        <?php }
        else {?>
        <td style="color:red">Rejected</td>
        <?php } ?>
    </tr>
  </tbody>
  <?php 


                    }
                  }
                }
              }
  ?>
</table>
            </div>
    </main>
  </body>
</html>

