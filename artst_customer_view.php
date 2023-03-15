<?php
 include "connection.php";
 session_start();
 include "custSidebar.php";
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
      .checked {
        color: orange;
      }
    </style>
   
  </head>
  <body>
    
    <main class="mt-5 pt-3" style="margin-left:315px;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12" style="margin-top:-30px;" >
            <h3>ARTIST PORTAL</h3>
          </div>
        </div>
      </div>
      <hr>
      <?php if(isset($_SESSION['message'])) {?>
                    <div class="alert alert-primary" role="alert" style="margin-left:50px;width:900px;"> <?php echo $_SESSION['message'] ?></div>
      <?php } ?>
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
                    $aid = $row2['reg_id'];
                    $name = $row2['reg_fullname'];
                    $sql3 = "SELECT * from tbl_profile where reg_no=$row[reg_no]";
                    $result3 = $conn->query($sql3);
                    if ($result3->num_rows > 0) {
                    while($row3 = $result3->fetch_assoc()) {
        ?>
      <div class="row gy-3">
        <div class="col-md-3">
          <div class="card" style="width: 19rem;">
            <div class="card-body text-center">
            <img src="images/profile/<?php echo $row3['pro_pic']?>" alt="avatar" style="width: 150px;height:150px;">
            <h5 class="my-3"><?php echo $row2['reg_fullname']?></h5>
            <p class="text-muted mb-1" style="text-align:left;">
              <span style="margin-right:22px;">Position </span>: <?php echo $row3['position']?><br>
              <span style="margin-right:35px;">Genre </span>: <?php echo $row3['genre']?><br>
              <span style="margin-right:39px;">Email </span>: <?php echo $row['lg_email']?><br>
              <span style="margin-right:1px;">Contact no </span>: <?php echo $row2['reg_phoneno']?><br>
              <span style="margin-right:32px;">Rating </span>:
              <?php
              $rate = $row3['rating'];
              for($i=0;$i<$rate;$i++){?>
                <span class="fa fa-star checked" style="font-size:20px;"></span>
              <?php }
              $rate= 5-$rate;
              for($i=0;$i<$rate;$i++){?>
                <span class="fa fa-star" style="font-size:20px;"></span>
              <?php
                }?>
              <br><center><button type="button" class="btn btn-primary" name="submit" style="width:100px;"><a href="cust_artist_profile.php?id=<?php echo $aid;?>" style="color:white;">VIEW</a></button></center>
              <!-- <h6><b><u>Select booking date and time</u></b></h6> -->
              <!-- <form action="bookartist.php" method="post">
                <?php $date= date('Y-m-d', strtotime('+7 days'));?>
                <input type="date" name="date" id="date" size="15" min="<?= $date; ?>">
                <input type="time" name="time" id="time" size="15">
            </p>
                <div class="d-flex justify-content-center mb-2">
                <input type="hidden" name="artid" value="<?php echo $row2['reg_id']?>">
                <button type="submit" class="btn btn-primary" name="submit">Book</button>
                </div>
              </form> -->
            </div>
          </div>
        </div>
        <?php
                    }}}}}}
        ?>
      </div>
      </div>
    </main>
  </body>
</html>