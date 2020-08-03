<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medicalcenter";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['dev_p'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($conn,$_POST['name']);
  $itn = mysqli_real_escape_string($conn,$_POST['itn']);
  $sid = mysqli_real_escape_string($conn,$_POST['sid']);
  $sname = mysqli_real_escape_string($conn,$_POST['sname']);
  $qty = mysqli_real_escape_string($conn,$_POST['qty']);
  // Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$dates=date('Y/m/d');
$sql = "Select name from inventory where item_no='$itn'";
$sql1="";


if (mysqli_query($conn, $sql)) {
echo "";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	$sql1="UPDATE inventory set quantity = quantity + '$qty' where item_no = '$itn'";
}
else
{
	$sql1 = "INSERT INTO inventory (item_no,name,quantity) VALUES ('$itn','$name','$qty')";
}

$sql2 = "INSERT INTO supplies (supplier_id,dod,name,item_no) VALUES ('$sid','$dates','$sname','$itn')";
$sql3 = "INSERT INTO delivery (item_no,dod,name,quantity) VALUES ('$itn','$dates','$name','$qty')";


if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE){
    echo "<h1>New recordss SUCCESSFUL</h1>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}
$conn->close();
?>