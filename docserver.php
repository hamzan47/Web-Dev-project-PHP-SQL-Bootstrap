<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medicalcenter";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['doc_p'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($conn,$_POST['name']);
  $did = mysqli_real_escape_string($conn,$_POST['did']);
  $aid = mysqli_real_escape_string($conn,$_POST['aid']);
  $spec = mysqli_real_escape_string($conn,$_POST['spec']);
  $timing = mysqli_real_escape_string($conn,$_POST['timing']);
  // Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO doctors (doc_id,name,admin_id)
VALUES ('$did', '$name', '$aid')";

$sql1 = "INSERT INTO doc_specialization (doc_id,specialization)
VALUES ('$did', '$spec')";

$sql2 = "INSERT INTO doc_timings (doc_id,timings)
VALUES ('$did', '$timing')";

if ($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
    echo "<h1>New recordss SUCCESSFUL</h1>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();
?>