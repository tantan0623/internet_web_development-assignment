<!DOCTYPE HTML>

<html>
<head>
	<title>New Appointment</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.dropotron.min.js"></script>
	<script src="js/skel.min.js"></script>
	<script src="js/skel-layers.min.js"></script>
	<script src="js/init.js"></script>

	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
	<link rel="stylesheet" type="text/css" href="css/table.css">
	<link rel="stylesheet" href="css/form.css"/>
	<noscript>
		<link rel="stylesheet" href="css/skel.css" />
		<link rel="stylesheet" href="css/style.css" />
	</noscript>
</head>

<body class="left-sidebar">
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
		<h2>New Appointment</h2>
	</header>

	<div class="patient-form">
			<form class="contact1-form validate-form" action="addappointment_function.php" method="post">

					<div class="wrap-input1">
						<input class="input1" type="number" name="ic" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="IC Number" maxlength="12" minlength="" required="true">
					</div>

					<div class="wrap-input1">
						<input class="input1" type="namespace" name="name" placeholder="Name" required="true">
					</div>

					<div class="wrap-input1">
						<input class="input1" type="date" name="scheduleDate" placeholder="Schedule Date" required="true">
					</div>

					<div class="wrap-input1">
						<input class="input1" type="time" name="startTime" placeholder="Start Time" required="true">
					</div>

					<div class="wrap-input1">
						<input class="input1" type="time" name="endTime" placeholder="End Time" required="true">
					</div>

					<div class="wrap-input1">
						<input class="input1" type="namespace" name="remark" placeholder="Remarks" required="true">
					</div>

					<div class="container-contact1-form-btn">
						<span>&nbsp;</span>
						<button class="contact1-form-btn" type="submit" value="submit">
						<span>
							Create
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
						</button>

					</div>

			</form>
	</div>


		<script src="js/table.js"></script>
	</body>
	</html>