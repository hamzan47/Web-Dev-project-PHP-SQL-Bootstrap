
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Medical Center</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="dash.php">Medical Center</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="dash.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Add a Member</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="student.php">Student</a>
            </li>
            <li>
              <a href="faculty.php">Faculty Member</a>
            </li>
            <li>
              <a href="staff.php">Staff Member</a>
            </li>
			<li>
              <a href="register.php">Admin</a>
            </li>
            <li>
              <a href="doctor.php">Doctor</a>
            </li>
            <li>
              <a href="nurse.php">Nurse</a>
            </li>
          </ul>
        </li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="delivery.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Register a Delivery</span>
          </a>
        </li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="patitem.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Allot an Item</span>
          </a>
        </li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePage" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Registry</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePage">
            <li>
              <a href="patients.php">Patients</a>
            </li>
            <li>
              <a href="Members.php">Medical Staff</a>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="dash.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Patients</li>
      </ol>
      <div class="row">
        <div class="col-12">
          <h1>Patient Data </h1>
        </div> 
       </div>
	  <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Students</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Registration Number</th>
                  <th>Name</th>
                  <th>Faculty</th>
				  <th>Patient ID</th>
				  </tr>
              </thead>
              <tfoot>

                <tr>
                  <th>Registration Number</th>
                  <th>Name</th>
                  <th>Faculty</th>
				  <th>Patient ID</th>
                </tr>
              </tfoot>
                <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medicalcenter";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = 'SELECT * FROM student';
if (mysqli_query($conn, $sql)) {
echo "";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
$count=1;
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($result)) { ?>
                        <tbody>
                           <tr>
                              <th>
                              <?php echo $row['reg_no']; ?>
                              </th>
                              <td>
                              <?php echo $row['name']; ?>
                              </td>
                              <td>
                              <?php echo $row['faculty']; ?>
                              </td>
							  <td>
                              <?php echo $row['patient_id']; ?>
                              </td>
                           </tr>
                        </tbody>

                        <?php
$count++;
}
} else {
echo '0 results';
}
?>
              
            </table>
          </div>
        </div>
      </div>
	  	  <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Faculty Members</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Faculty ID</th>
                  <th>Name</th>
                  <th>Faculty</th>
				  <th>Patient ID</th>
				  </tr>
              </thead>
              <tfoot>

                <tr>
                  <th>Faculty ID</th>
                  <th>Name</th>
                  <th>Faculty</th>
				  <th>Patient ID</th>
                </tr>
              </tfoot>
                <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medicalcenter";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = 'SELECT * from faculty_member';
if (mysqli_query($conn, $sql)) {
echo "";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
$count=1;
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($result)) { ?>
                        <tbody>
                           <tr>
                              <th>
                              <?php echo $row['fac_id']; ?>
                              </th>
                              <td>
                              <?php echo $row['name']; ?>
                              </td>
                              <td>
                              <?php echo $row['faculty']; ?>
                              </td>
							  <td>
                              <?php echo $row['patient_id']; ?>
                              </td>
                           </tr>
                        </tbody>

                        <?php
$count++;
}
} else {
echo '0 results';
}
?>
              
            </table>
          </div>
        </div>
      </div>
	  <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Staff Members</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Faculty ID</th>
                  <th>Name</th>
                  <th>Position</th>
				  <th>Patient ID</th>
				  </tr>
              </thead>
              <tfoot>

                <tr>
                  <th>Faculty ID</th>
                  <th>Name</th>
                  <th>Position</th>
				  <th>Patient ID</th>
				</tr>
              </tfoot>
                <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medicalcenter";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = 'SELECT * from staff_member';
if (mysqli_query($conn, $sql)) {
echo "";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
$count=1;
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($result)) { ?>
                        <tbody>
                           <tr>
                              <th>
                              <?php echo $row['staff_id']; ?>
                              </th>
                              <td>
                              <?php echo $row['name']; ?>
                              </td>
                              <td>
                              <?php echo $row['position']; ?>
                              </td>
							  <td>
                              <?php echo $row['patient_id']; ?>
                              </td>
                           </tr>
                        </tbody>

                        <?php
$count++;
}
} else {
echo '0 results';
}
?>
              
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2020</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="index.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
  </div>
</body>

</html>
