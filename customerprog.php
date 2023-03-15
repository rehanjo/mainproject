<?php
include "connection.php";
session_start();
$id = $_SESSION['LoginId'];
 include "custSidebar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Programs</title>
    <style>
        .rate {
            float: left;
            height: 30px;
            padding: 0 10px;
        }
        .rate:not(:checked) > input {
            position:absolute;
            top:-9999px;
        }
        .rate:not(:checked) > label {
            float:right;
            width:1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:20px;
            color:#ccc;
        }
        .rate:not(:checked) > label:before {
            content: '★ ';
        }
        .rate > input:checked ~ label {
            color: #ffc700;    
        }
        .rate:not(:checked) > label:hover,
        .rate:not(:checked) > label:hover ~ label {
            color: #deb217;  
        }
        .rate > input:checked + label:hover,
        .rate > input:checked + label:hover ~ label,
        .rate > input:checked ~ label:hover,
        .rate > input:checked ~ label:hover ~ label,
        .rate > label:hover ~ input:checked ~ label {
            color: #c59b08;
        }
        .checked {
          color: #ffc700;
        }
    </style>
</head>
<body>
<main class="mt-5 pt-3" style="margin-left:315px;">
      <div class="container-fluid" style="margin-bottom:20px;">
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
                $sql = "SELECT * from tbl_bookshows where customerid= $id and status=1";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  $sqlx = "SELECT * from tbl_schedule where id= $row[schid] and status =2 and date >= '$date' order by date";
                  $resultx = $conn->query($sqlx);
                  if ($resultx->num_rows > 0) {
                    while($rowx = $resultx->fetch_assoc()) {
                      $aid= $rowx['aid'];
                      $sql2 = "SELECT * from tbl_registration where reg_id= $rowx[aid]";
                  $result2 = $conn->query($sql2);
                  if ($result2->num_rows > 0) {
                    while($row2 = $result2->fetch_assoc()) {
                      $bookid= $row['id'];
                      $sql3 = "SELECT * from tbl_profile where reg_no= $rowx[aid]";
                        $result3 = $conn->query($sql3);
                        if ($result3->num_rows > 0) {
                            while($row3 = $result3->fetch_assoc()) {

            ?>
      <div class="row gy-3" style="margin-left:50px;">
        <div class="col-md-3">
        <div class="card" style="width: 15rem;">
            <img class="card-img-top" src="images/profile/<?php echo $row3['pro_pic'];?> " alt="Card image cap" height=200px; >
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row2['reg_fullname']?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $row['address'];?> </h6>
                    <p class="card-text"><?php echo $rowx['date']?></p>
                    <p class="card-text"><?php echo $rowx['time_from']." - ".$rowx['time_to']?></span></p>
                    <a href="reject.php?id=<?php echo $bookid;?>&stat=3" class="card-link" style="color:red"><b>Cancel Program</b></a>
                </div>
        </div>
        </div>
        <?php 

              }
            }
          }
        }
    }}}}
    else{?>
      <div class="alert alert-info" role="alert">No booked shows</div>
<?php }
      ?>
    </div>
    <br><br>
    <div class="container-fluid" style="margin-bottom:20px;">
        <div class="row">
          <div class="col-md-12" style="margin-top:30px;;" >
            <h3 style="margin-left:0px;">RATE PROGRAMMES</h3>
          </div>
        </div>
      </div>
      <hr>
      <?php
      $date= date("Y-m-d");
      $time = date("h:i:s");
                $sql = "SELECT * from tbl_bookshows where customerid= $id ";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  
                  $sqlx = "SELECT * from tbl_schedule where id= $row[schid] and status =3 and date< '$date' order by date DESC";
                  $resultx = $conn->query($sqlx);
                  if ($resultx->num_rows > 0) {
                    while($rowx = $resultx->fetch_assoc()) {
                       $arid= $rowx['aid'];
                      //  echo $date;
                  $sql2 = "SELECT * from tbl_registration where reg_id= $rowx[aid]";
                  $result2 = $conn->query($sql2);
                  if ($result2->num_rows > 0) {
                    while($row2 = $result2->fetch_assoc()) {
                      $bookid= $row['id'];
                      $sql3 = "SELECT * from tbl_profile where reg_no= $rowx[aid]";
                        $result3 = $conn->query($sql3);
                        if ($result3->num_rows > 0) {
                            while($row3 = $result3->fetch_assoc()) {

            ?>
      <div class="row gy-3" style="margin-left:50px;">
        <div class="col-md-3">
        <div class="card" style="width: 15rem;">
            <img class="card-img-top" src="images/profile/<?php echo $row3['pro_pic'];?> " alt="Card image cap" height=200px; >
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row2['reg_fullname']?></h5>
                    <h6 class="card-subtitle mb-2 text-muted">place</h6>
                    <p class="card-text"><?php echo $rowx['date']?></p>
                    <p class="card-text"><?php echo $rowx['time_from']." - ".$rowx['time_to']?></span></p>
                    <?php 
                      if($row['rating']== 0){
                    ?>
                    <form action="" method="POST">
                    <div class="rate">
                      <input type="radio" id="star5" name="r" value="5" />
                      <label for="star5" title="text">5 stars</label>
                      <input type="radio" id="star4" name="r" value="4" />
                      <label for="star4" title="text">4 stars</label>
                      <input type="radio" id="star3" name="r" value="3" />
                      <label for="star3" title="text">3 stars</label>
                      <input type="radio" id="star2" name="r" value="2" />
                      <label for="star2" title="text">2 stars</label>
                      <input type="radio" id="star1" name="r" value="1" />
                      <label for="star1" title="text">1 star</label>
                    </div>
                    <button type=submit name="submit" class="btn btn-info">Rate</button>
                    </form>
                    <?php
                      }
                      else{
                        $rate = $row['rating'];
                        for($i=0;$i<$rate;$i++){?>
                          <span class="fa fa-star checked" style="font-size:20px;"></span>
                        <?php }
                        $rate= 5-$rate;
                        for($i=0;$i<$rate;$i++){?>
                          <span class="fa fa-star" style="font-size:20px;"></span>
                        <?php
                        }
                      }
                    ?>
                </div>
        </div>
        </div>
        <?php 

              }
            }
          }
        }
    }}}}
    else{?>
      <div class="alert alert-info" role="alert">No Previous Show</div>
<?php }
      ?>
    </div>
    </div>
</main>
</body>
</html>
<?php 
if(isset($_POST['submit'])){
  $rating = $_POST['r']; 
  $sql ="UPDATE tbl_bookshows SET rating=$rating WHERE id=$bookid";
  if($conn->query($sql) === TRUE)
  {
    $sql1 = "SELECT avg(rating) as rating from tbl_bookshows where customerid= $id and status=2";
    $result1 = $conn->query($sql1);
      if ($result1->num_rows > 0) {
        while($row1 = $result1->fetch_assoc()) {
          $rating =  $row1['rating'];
          $sql2 = "UPDATE tbl_profile SET rating=$rating WHERE reg_no=$arid";
          if($conn->query($sql2) === TRUE)
          {
            unset($_POST['submit']);
          }
        }
      
      }}
}
?>