<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medicalcenter";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['pt_p'])) {
  // receive all input values from the form
  $itn = mysqli_real_escape_string($conn,$_POST['itn']);
  $pid = mysqli_real_escape_string($conn,$_POST['pid']);
  // Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO patient_inventory (item_no,patient_id) VALUES ('$itn','$pid')";
$sql1 = "UPDATE inventory set quantity = quantity - 1 where item_no = '$itn'";

if ($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE){
    echo "<h1>New recordss SUCCESSFUL</h1>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}
$conn->close();
?>