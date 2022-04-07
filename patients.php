<?php
require_once 'core/init.php';

$conn = mysqli_connect("localhost", "root", "", "clinic_management_v2.0");

if($conn->connect_error)
{
	die("Connection failed". $conn->connect_error);
}

$sql = "SELECT id, name, gender, ic, dob, phone, address, email FROM patient_details";
$result = $conn->query($sql);

?>

<!DOCTYPE HTML>

<html>
<head>
	<title>Patients</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.dropotron.min.js"></script>
	<script src="js/skel.min.js"></script>
	<script src="js/skel-layers.min.js"></script>
	<script src="js/init.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="jquery.tabledit.min.js"></script>

	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
	<link rel="stylesheet" type="text/css" href="css/table.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<noscript>
		<link rel="stylesheet" href="css/skel.css" />
		<link rel="stylesheet" href="css/style.css" />
	</noscript>
</head>

<body class="right-sidebar">
	<div id="header">
		<div class="container">

			<div class="img-zoom">
				<a href="#" id="logo"><img src="img-asset/logo.png" style="width: 130px; height: 130px;"></a>
			</div>

			<nav id="nav">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="patients.php">Patients</a></li>
					<li><a href="appointment.php">Appointment</a></li>
					<li><a href="mc-page.php">MC</a></li>
					<li><a href="login.php">Log Out</a></li>
				</ul>
			</nav>

		</div>
	</div>

	<header class="major">
		<h2>Patient Details</h2>
	</header>

<form action="update_function.php" method="post">
	<div id="table" class="table-editable">
		<table id="editable_table" class="table table-bordered table-responsive-md table-striped text-center abledit-toolbar-column">
			<thead class="table100-head" id="table-header">
				<tr>
					<th style="display:none;" class="text-center">ID</th>
					<th class="text-center">Name</th>
					<th class="text-center">Gender</th>
					<th class="text-center">IC</th>
					<th class="text-center">Date of Birth</th>
					<th class="text-center">Phone Number</th>
					<th class="text-center">Address</th>
					<th class="text-center">Email</th>
					<th class="text-center"></th>
				</tr>
			</thead>

			<?php

			while($rows = mysqli_fetch_assoc($result))
			{
				?>
				<tr>
					<td style="display:none;"><input type="hidden" name="id" value="<?php echo $rows['id']; ?>"></td>
					<td><input class="input1" type="namespace" name="name" placeholder="Full Name" value="<?php echo $rows['name']; ?>" required="true"></td>
					<td><?php echo $rows['gender']; ?></td>
					<td><?php echo $rows['ic']; ?></td>
					<td><?php echo $rows['dob']; ?></td>
					<td><input class="input1" type="namespace" name="phone" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="Phone Number" maxlength="11" value="<?php echo $rows['phone']; ?>" required="true"></td>
					<td><input class="input1" type="namespace" name="address" placeholder="Address" value="<?php echo $rows['address']; ?>" required="true"></td>
					<td><input class="input1" type="email" name="email" placeholder="Email Address" value="<?php echo $rows['email']; ?>" required="true"></td>
					<td>
						<button type="submit" class="btn btn-primary btn-rounded btn-sm my-0" name="update">Update</button>
						<button type="button" class="btn btn-danger btn-rounded btn-sm my-0"><a href="remove_function.php?delete=<?php echo $rows['id']; ?>" style="color: #ffffff">Remove</a></button>
					</td>
					</tr>

					<?php

				}

				?>

			</table>
		</div>
</form>

		<div>
			<a href="addpatient.php" class="text-success">
				<i class="fa fa-plus fa-2x my-float"></i>
			</a>
		</div>

		<?php
		if(isset($_SESSION['message'])): ?>

		<div style="width: 20%" class="alert alert-<?=$_SESSION['msg_type']?>">
		<?php	
			echo $_SESSION['message'];
			unset($_SESSION['message']);
		?>
		</div>
		<?php endif ?>

		<script src="js/table.js"></script>
	</body>
	</html>

