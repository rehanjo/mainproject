<?php
 include "connection.php";
 session_start();
 $id = $_SESSION['LoginId'];
 include "artistSidebar.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <title>Bookings</title>

  </head>
  <body>

    <main class="mt-5 pt-3" style="margin-left:265px;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12" style="margin-top:-30px;;" >
            <h3>APPOINTMENTS</h3>
          </div>
        </div>
      </div>
      <hr>
      <br>
      <div id="main">
      <table class="table" id="bookings" style="margin-left:50px;width:900px;">
                  <thead>
                  <tr>
                      <th scope="col">SL.NO</th>
                      <th scope="col">DATE</th>
                      <th scope="col">FROM</th>
                      <th scope="col">TO</th>
                      <th scope="col">VENUE</th>
                  </tr>
                  </thead>
                  <?php
                  $i=1;
                              $sql = "SELECT * from tbl_schedule where aid= $id";
                              $result2 = $conn->query($sql);
                              if ($result2->num_rows > 0) {
                                while($row = $result2->fetch_assoc()) {
                                  $schid =  $row['id'];
                                  $sql1 = "SELECT * from tbl_bookshows where schid= $schid";
                                  $result1 = $conn->query($sql1);
                                  if ($result1->num_rows > 0) {
                                    while($row1 = $result1->fetch_assoc()) {
                          ?>
                  <tbody>
                  <tr>
                      <td><?php echo $i?></td>
                      <td><?php echo $row['date']?></td>
                      <td><?php echo $row['time_from']?></td>
                      <td><?php echo $row['time_to']?></td>
                      <td><?php echo $row1['address']?></td>
                      </form>
                  </tr>
                  </tbody>
                  <?php 
                  $i=$i+1;
                                    }}
                                      }
                              }
                  ?>
              </table>
      </div>
    </main>
    <br><br>
    <hr>

  </body>
</html>

