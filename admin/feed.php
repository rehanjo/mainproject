<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <style>



/* CSS */
.button-32 {
  background-color: #ff726f;
  border-radius: 12px;
  color: #000;
  cursor: pointer;
  font-weight: bold;
  padding: 5px 10px;
  text-align: center;
  transition: 200ms;
  width: 60%;
  box-sizing: border-box;
  border: 0;
  font-size: 10px;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-32:not(:disabled):hover,
.button-32:not(:disabled):focus 

{
  outline: 0;
  background: #f4e603;
  box-shadow: 0 0 0 2px rgba(0,0,0,.2), 0 3px 8px 0 rgba(0,0,0,.15);
}

.button-32:disabled {
  filter: saturate(0.2) opacity(0.5);
  -webkit-filter: saturate(0.2) opacity(0.5);
  cursor: not-allowed;
}
  
  table{
    
    margin-left:10px;  
     }
  table.paleBlueRows {
  font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
  border: 2px solid #FFFFFF;
  width: 100%;
  height:150%;
  text-align: center;
  border-collapse: collapse;
}
table.paleBlueRows td, table.paleBlueRows th {
  border: 1px solid #FFFFFF;
  padding: 3px 2px;
}
table.paleBlueRows tbody td {
  font-size: 13px;
}
table.paleBlueRows tr:nth-child(even) {
  background: lightcyan;
}
table.paleBlueRows thead {
  background: darkblue;
  border-bottom: 5px solid #FFFFFF;
}
table.paleBlueRows thead th {
  font-size: 17px;
  font-weight: bold;
  color: #FFFFFF;
  text-align: center;
  border-left: 2px solid #FFFFFF;
}
  
  .progress {
  height: 20px;
  border-radius: 10px;
  width:98%;
  margin-left:8px;
  background-color: lightgray;
  overflow: hidden;
}

.progress-bar {
  height: 100%;
  transition: width 0.5s ease;
}
  </style>
<main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h4>Welcome</h4>
          </div>
        </div>
        
       <?php
			  $sql = "SELECT text FROM tbl_feedback";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Output data of each row
    $texts = array();
    while($row = $result->fetch_assoc()) {
        $texts[] = $row["text"];
    }
    $url = 'http://127.0.0.1:5000/sentiment';
    $data = json_encode(array('texts' => $texts));
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/json\r\n",
            'method'  => 'POST',
            'content' => $data,
        ),
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $overall_sentiment = json_decode($result, true)['sentiment'];
	$neg=100 - ($overall_sentiment * 100);
} else {
    echo "No feedback data found in the database.";
}
?>


&nbsp;<div class="progress">
  <div class="progress-bar" role="progressbar" style="width: <?php echo abs($overall_sentiment) * 100; ?>%; background-color:green;">
  </div>
</div>
<span>&nbsp;Positive &nbsp;<?php  echo abs($overall_sentiment) * 100;?> %</span>
&nbsp;<div class="progress">
  <div class="progress-bar" role="progressbar" style="width: <?php echo $neg; ?>%; background-color:red;">
  </div>
  </div>
  <span>&nbsp;Negative&nbsp;<?php  echo $neg;?> %</span>
        
        <div class="row">
          <div class="col-md-12 mb-3">
            <div class="card">
               </div>
          </div>
<table class="paleBlueRows">
<thead>
<tr>
   <th>Name</th>
     <th>Text</th>
</tr>
</thead>
<?php
 $sql2 = "SELECT * from tbl_feedback";
 $result2 = $conn->query($sql2);
 if ($result2->num_rows > 0) {
  // output data of each row
  while($row2 = $result2->fetch_assoc()) {
	  ?>
  <tr>
     <td><?php echo $row2['Name'];?></td>
  <td><?php echo $row2['text'];?></td>
  </tr>
 <?php } }?>
	 </tbody>
</table> 

<?php mysqli_close($conn);  // close connection ?>
        </div>
        </html>