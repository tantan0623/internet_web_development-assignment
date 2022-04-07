<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>MC</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.dropotron.min.js"></script>
	<script src="js/skel.min.js"></script>
	<script src="js/skel-layers.min.js"></script>
	<script src="js/init.js"></script>

	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" href="css/form.css"/>
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

	<div class="contact1">
		<div class="container-contact1">
			<div class="contact1-pic js-tilt" data-tilt>
				<img src="img-asset/mc-icon.png" alt="IMG">
			</div>

			<form class="contact1-form validate-form" action="printmc.php" method="post">
				<span class="contact1-form-title">
					Medical Certificate
				</span>

				<div class="wrap-input1">
					<input class="input1" type="namespace" name="name" placeholder="Full Name" required="true">
				</div>

				<div class="wrap-input1">
					<input class="input1" type="number" name="ic" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="IC Number" maxlength="12" required="true">
				</div>

				<div class="wrap-input1">
					<input class="input1" type="number" name="days" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="Number Of Days" maxlength="2" required="true">
				</div>

				<div class="wrap-input1">
					<span class="form-label">From</span>
					<input class="input1" type="date" name="from" placeholder="From" required="true">
				</div>

				<div class="wrap-input1">
					<span class="form-label">To</span>
					<input class="input1" type="date" name="to" placeholder="To" required="true">
				</div>

				<div class="container-contact1-form-btn">
					<button class="contact1-form-btn" type="submit">
						<span>
							Generate
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>


<script src="vendor/tilt/tilt.jquery.min.js"></script>
<script >
	$('.js-tilt').tilt({
		scale: 1.1
	})
</script>
<script src="js/mc.js"></script>
</body>
</html>

