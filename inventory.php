<?php

$servername = "mypantry.db.12013704.hostedresource.com";
$username = "mypantry";
$password = "CSC3330Rox!";
$dbname = "mypantry";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

echo ('
<!DOCTYPE html>
<html lang="en-US">
<head>
  <title>My Inventory</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>
');


//Output Item in Grid

$sql = "SELECT * FROM `Yang_AdminInventoryList`";
$result=mysqli_query($conn,$sql);
$rowcount=mysqli_num_rows($result);
$row = (int)($rowcount/6)+1;

$sql = "SELECT ItemId, DateBought, ExpirationDate, Quantity, ImageURL FROM Yang_AdminInventoryList";
$result = $conn->query($sql);
echo ('<div class="row">
		<div class="col-sm-2">123</div>');
echo ('<div class="col-sm-8">');
if ($result->num_rows > 0) {
    // output data of each row
	for($i=0;$i<$row;$i++){
		echo('<div class="row">');
		for($j=0;$j<6;$j++){
			$row = $result->fetch_assoc();
			if($row == NULL){
				echo('<div class="col-sm-2"></div>');
			}
			else{
				echo ('<div class="col-sm-2">');
				echo ('<img src="'.$row["ImageURL"].'" style="width: 100px; height: 100px;">');
				echo ('<div style = "overfloat:right;width:20px;height:20px;background:black;color:white">'.$row["Quantity"].'</div>');
				echo ('</div>');
			}
		}
		echo ('</div>');
		
	}
    // while($row = $result->fetch_assoc()) {
        // echo "ItemId: " . $row["ItemId"]. " - DateBought: " . $row["DateBought"]. " ExpirationDate" . $row["ExpirationDate"]." Quantity" . $row["Quantity"] ."<br>" ;
    // }
} else {
    echo "0 results";
}
echo ('</div>');
echo ('<div class="col-sm-2">123</div>
			    </div>');

echo ('
</body>
</html>');
?>
