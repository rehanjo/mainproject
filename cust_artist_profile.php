<?php
 include "connection.php";
 session_start();
 include "custSidebar.php";
 $id = $_GET['id'];
?>
<html>
    <head>
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
        <title>Artist Booking</title>
    </head>
    <body>
    <style>
      .checked {
        color: orange;
      }
		audio {
			width: 640px;
			height: 40px;
		}
    </style>
    <main class="mt-5 pt-3" style="margin-left:315px;">
    <?php 
                $sql2 = "SELECT * from tbl_registration where reg_id= $id";
                $result2 = $conn->query($sql2);
                if ($result2->num_rows > 0) {
                    while($row2 = $result2->fetch_assoc()) {
                    $name = $row2['reg_fullname'];
                    $sql3 = "SELECT * from tbl_profile where reg_no=$id";
                    $result3 = $conn->query($sql3);
                    if ($result3->num_rows > 0) {
                        while($row3 = $result3->fetch_assoc()) {
        ?>

          <img src="images/profile/<?php echo $row3['pro_pic']?>" alt="avatar" style="width:200px;height:200px;float:left;margin-right:100px;">
          <h1><?php echo $name?></h1>
          <span style="margin-right:32px;">Rating </span>:
              <?php
              $rate = $row3['rating'];
              for($i=0;$i<$rate;$i++){?>
                <span class="fa fa-star checked" style="font-size:20px;"></span>
              <?php }
              $rate= 5-$rate;
              for($i=0;$i<$rate;$i++){?>
                <span class="fa fa-star" style="font-size:20px;"></span>
              <table>
              <?php
                }?><br><br><br><br><h6><u>SONGS BY ARTIST</u></h6><?php 
                $sql = "SELECT * FROM audios WHERE aid=$id ORDER BY id DESC";
                $res = mysqli_query($conn, $sql);

                if (mysqli_num_rows($res) > 0) {
                    while ($audio = mysqli_fetch_assoc($res)) { 
                ?>
                   <tr>
                    <td> <p style="float:left;margin-right:10px;margin-top:10px;"><?php echo $audio['title']?> </p></td>
                    <td><audio src="uploads/<?=$audio['audio_url']?>" controls></audio></td>
                  </tr>

                <?php 
                }
                }
              }}}}
                ?>
                </table>
                <h6><b><u>BOOK A SHOW</u></b></h6>
                               <table class="table" id="bookings" style="margin-left:50px;width: 90%;">
                <thead>
                                <tr>
                                <th scope="col">SL.NO</th>
                                <th scope="col">DATE</th>
                                <th scope="col">FROM</th>
                                <th scope="col">TO</th>
                                <th scope="col">HOURS</th>
                                <th scope="col">RATE</th>
                                <th scope="col">VENUE</th>
                                <th scope="col">BOOK SLOT</th>
                            </tr>
                            </thead>

                  <?php
                  $i=1;
                              $sxql = "SELECT * from tbl_profile where reg_no= $id and status=1";
                              $resultx = mysqli_query($conn, $sxql);
                              $rowx = mysqli_fetch_assoc($resultx);
                              $sql = "SELECT * from tbl_schedule where aid= $id and status=1";
                              $result2 = $conn->query($sql);
                              if ($result2->num_rows > 0) {
                                while($row = $result2->fetch_assoc()) {
                                  $schid =  $row['id'];
                                  $rate = $rowx['price'];
                                  $from = $row['time_from'];
                                  $to = $row['time_to'];
                                  $time1 = new DateTime($from);
                                  $time2 = new DateTime($to);
                                  $interval = $time1->diff($time2);
                                  $max = $interval->format('%H');
                                  
                          ?>
                  <tbody>
                  <tr>
                      <td><?php echo $i?></td>
                      <td><?php echo $row['date']?></td>
                      <td><?php echo $from?></td>
                      <td><?php echo $to?></td>
                      <form action="bookslot.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $schid;?>">
                      <td><input  type="number" id="hrs" value="1" min="1" max="<?php echo $max;?>" name="hrs" onKeyDown="return false" onchange="updaterate()"></td>
                      <td><input type="text" id="rate" value="<?php echo $rate;?>" name="rate" style="width:50px;border:none;" readonly></td>
                      <td><textarea rows = "1" cols = "30" name = "address" placeholder="Enter full address"></textarea></td>
                      <td><button type="submit" class="btn btn-success">BOOK</button></td>
                      </form>
                  </tr>
                  </tbody>
                  <script>
                      function updaterate(){
                        var hrs = document.getElementById('hrs').value;
                        var rate = <?php echo json_encode($rate); ?>;
                        rate = hrs * rate ;
                        document.getElementById('rate').value = rate;
                      }
                  </script>
                  <?php 
                  $i=$i+1;
                                      }
                              }
                              else{?>
                                        <div class="alert alert-info" role="alert">No slots available</div>
                              <?php }
                  ?>
              </table>
    </main>
    </body>
</html>