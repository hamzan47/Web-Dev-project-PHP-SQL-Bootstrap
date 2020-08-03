<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medicalcenter";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['nus_p'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($conn,$_POST['name']);
  $nid = mysqli_real_escape_string($conn,$_POST['nid']);
  $aid = mysqli_real_escape_string($conn,$_POST['aid']);
  $timing = mysqli_real_escape_string($conn,$_POST['timing']);
  // Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO nurses (nurse_id,name,admin_id)
VALUES ('$nid', '$name', '$aid')";

$sql1 = "INSERT INTO nurse_timings (nurse_id,timings)
VALUES ('$nid', '$timing')";

if ($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE){
    echo "<h1>New recordss SUCCESSFUL</h1>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();
?>