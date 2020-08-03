<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medicalcenter";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['fac_p'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($conn,$_POST['name']);
  $fid = mysqli_real_escape_string($conn,$_POST['fid']);
  $fac = mysqli_real_escape_string($conn,$_POST['fac']);
  $pid = mysqli_real_escape_string($conn,$_POST['pid']);
  $did = mysqli_real_escape_string($conn,$_POST['did']);
  $nid = mysqli_real_escape_string($conn,$_POST['nid']);
  $bid = mysqli_real_escape_string($conn,$_POST['bid']);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO faculty_member (fac_id,name,faculty,patient_id)
VALUES ('$fid', '$name', '$fac','$pid')";

$sql1="";
$dates=date('Y/m/d H:i:s');
if($bid)
{
	$sql1="INSERT INTO res_patient (patient_id,dod,doc_id,nurse_id)
	VALUES ('$pid','$dates','$did','$nid')";
}
else
{
	$sql1="INSERT INTO out_patient (patient_id,dod,doc_id,nurse_id)
	VALUES ('$pid','$dates','$did','$nid')";
}

if ($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE) {
    echo "<h1>New recordss SUCCESSFUL</h1>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();
?>