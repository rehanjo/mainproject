<?php
 include "connection.php";
 session_start();
 $id = $_SESSION['LoginId'];
 include "artistSidebar.php";
?>
<html>
    <head>
        <title>Schedule</title>
    </head>
    <body>
    <main class="mt-5 pt-3" style="margin-left:265px;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12" style="margin-top:-30px;;" >
            <h3 style="margin-left:20px;">YOUR SCHEDULE</h3>
          </div>
        </div>
      </div>
      <hr>
      <h6>ADD NEW SLOTS TO SCHEDULE</h6><br>
        <form action="schedule.php" method="post" style="margin-left:50px;">
            <?php $date= date('Y-m-d', strtotime('+7 days'));?>
            <label for="date" style="margin-top:8px;;float:left;">DATE &nbsp;&nbsp;</label><input type="date" name="date" id="date" size="15" min="<?= $date; ?>" class="form-control" style="width:500px;"><br>
            <label for="from" style="margin-top:8px;;float:left;">FROM &nbsp;</label><input type="time" name="from" id="time" size="15" class="form-control" style="width:200px;float:left;">
            <label for="to" style="margin-top:8px;margin-left:20px;float:left;">To &nbsp;&nbsp;</label><input type="time" name="to" id="time" size="15" class="form-control" style="width:200px;float:left;">
            <input type="submit" name="submit" value="SAVE" class="btn btn-primary" style="height:38px;margin-left:20px;">
        </form>
        <br>
        <h6>YOUR CURRENT SCHEDULE</h6><br>
        <table class="table" id="bookings" style="margin-left:50px;width:1000px;">
            <thead>
            <tr>
                <th scope="col">SL.NO</th>
                <th scope="col">DATE</th>
                <th scope="col">FROM</th>
                <th scope="col">TO</th>
                <th scope="col">STATUS</th>
                <th scope="col">BLOCK SLOT</th>
            </tr>
            </thead>
            <?php
            $i=1;
                        $sql = "SELECT * from tbl_schedule where aid=$id and status !=3 order by date";
                        $result2 = $conn->query($sql);
                        if ($result2->num_rows > 0) {
                          while($row = $result2->fetch_assoc()) {
                            $schid =  $row['id'];
                    ?>
            <tbody>
            <tr>
                <td><?php echo $i?></td>
                <td><?php echo $row['date']?></td>
                <td><?php echo $row['time_from']?></td>
                <td><?php echo $row['time_to']?></td>
                <?php 
                $date= date("Y-m-d");
                if($row['date']> $date){
                  if($row['status']==1)
                  {?>
                    <td style="color:green"><b>FREE</b></td>
                <td><a href="blockslot.php?id=<?php echo $schid;?>&status=0" style="color:red;"><i class="fa fa-window-close" aria-hidden="true" style="margin-left:20px;"></i></a></td>

                  <?php }
                  else if($row['status']==0){ ?>
                    <td style="color:red"><b>BLOCKED</b></td>
                <td><a href="blockslot.php?id=<?php echo $schid;?>&status=1" style="color:red;"><i class="fa fa-minus-square" aria-hidden="true" style="margin-left:20px;"></i></a></td>

                    <?php }
                  else {?>
                    <td style="color:blue"><b>BOOKED</b></td>
                <td><a href="blockslot.php?id=<?php echo $schid;?>&status=0" style="color:red;"><i class="fa fa-window-close" aria-hidden="true" style="margin-left:20px;"></i></a></td>
                  <?php } ?>
                <?php
                } 
                else{?>
                  <td style="color:black"><b>EXPIRED</b></td>
                  <td><a href="" style="color:red;"><i class="fa fa-minus-square" aria-hidden="true" style="margin-left:20px;"></i></a></td>
                <?php }?>
                
            </tr>
            </tbody>
            <?php 
            $i=$i+1;
            
                                  }
                        }
                        else{?>
                          <div class="alert alert-info" role="alert">No slot available</div>
                    <?php }
                          ?>
                        </div>
        </table>
    </main>
    </body>
</html>
