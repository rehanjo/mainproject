<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "musicos";
 
 // Create connection
$conn = new mysqli($servername,$username,$password,$dbname);
  
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " 
        . $conn->connect_error);
}
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
.button-32:not(:disabled):focus {
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
  
  </style>
<main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h4>Welcome</h4>
          </div>
        </div>
        
       
        
        <div class="row">
          <div class="col-md-12 mb-3">
            <div class="card">
               </div>
          </div>
<table class="paleBlueRows">
<thead>
<tr>
    <th>ALBUM NAME</th>
    <th>ARTIST</th>
  <th>GENRE</th>
  <th>Actions</th>
</tr>
</thead>
<tbody>
 <?php

 $sql = "SELECT * from tbl_album";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
   // output data of each row
  while($row = $result->fetch_assoc()) {
    ?>
  <tr>
    <td><?php echo $row['songname']?></td>
  <td><?php echo $row['artist'] ?></td>
  <td><?php echo $row['genre'] ?></td>
  <td><button class="button-32">play</button></td>   
  </tr>
 <?php
 }
 }
    ?> 
 

  
   </tbody>
</table> 

<?php mysqli_close($conn);  // close connection ?>
        </div>
        </html>