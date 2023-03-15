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
  <main class="mt-5 pt-3" style="width:100%;margin-left:265px;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12" style="margin-top:-30px;;" >
            <h3 style="margin-left:20px;">UPCOMING PROGRAMMES</h3>
          </div>
        </div>
      </div>
      <hr>
      <?php
      $date= date("Y-m-d");
      $time = date("h:i:s");
                $sql = "SELECT * from tbl_schedule where aid= $id and status =2 and date>= '$date' order by date";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  $sqlx = "SELECT * from tbl_bookshows where schid= $row[id] and status=1";
                  $resultx = $conn->query($sqlx);
                  
                  if ($resultx->num_rows > 0) {
                  // output data of each row
                  while($rowx = $resultx->fetch_assoc()) {
                  $sql2 = "SELECT * from tbl_registration where reg_id= $rowx[customerid]";
                  $result2 = $conn->query($sql2);
                  if ($result2->num_rows > 0) {
                    while($row2 = $result2->fetch_assoc()) {
                      $bookid= $row['id'];
            ?>
      <div class="row gy-3">
        <div class="col-md-3">
          <div class="card" style="width: 18rem;" >
            <div class="card-body">
            <h5 class="card-title"><?php echo $row2['reg_fullname']?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?php echo $rowx['address']?></h6>
            <p class="card-text"><?php echo $row['date']?></p>
            <p class="card-text"><?php echo $row['time_from']." - ".$row['time_to']?></span></p>
            <?php
                $canceldate = Date('y-m-d', strtotime('+7 days'));
                if($row['date']> '$canceldate'){
            ?>
            <a href="reject.php?id=<?php echo $bookid;?>&stat=0" class="card-link" style="color:red">Cancel Program</a><?php } 
            $sql3 = "SELECT * from tbl_login where reg_no= $rowx[customerid]";
                  $result3 = $conn->query($sql3);
                  if ($result3->num_rows > 0) {
                    while($row3 = $result3->fetch_assoc()) {?>
            <a href="mailto:<?php $row3['lg_email']?>" class="card-link" >Send a mail</a>
            </div>
          </div>
        </div>
        <?php 

              }
            }
          }
        }
    }}}
}else{?>
  <div class="alert alert-info" role="alert">No Previous Show</div>
<?php }
  ?>
      </div>
      </div>
    </main>
  </body>
</html>