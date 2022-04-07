<?php

require_once 'core/init.php';

if(Session::exists('home'))
{
	echo '<p>' . Session::flash('home') . '</p>';
}

$user = new User();
if($user->isLoggedIn())
{
?>

	<!DOCTYPE HTML>
	<html>
	<head>
		<title>Clinic Portal System</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
		</noscript>
	</head>
	<body class="homepage">

		<!-- Header -->
		<div id="header">
			<div class="container">

				<!-- Logo -->
				<div class="img-zoom">
					<a href="#" id="logo"><img src="img-asset/logo.png" style="width: 130px; height: 130px;"></a>
				</div>
				<!-- Nav Bar-->
				<nav id="nav">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="patients.php">Patients</a></li>
						<li><a href="appointment.php">Appointment</a></li>
						<li><a href="mc-page.php">MC</a></li>
						<li><a href="login.php">Log Out</a></li>
					</ul>
				</nav>


				<!-- Banner -->
				<div id="banner">
					<div class="container">
						<section id="section1">
							<header class="major">
								<h2>Hello <?php ($user->data()->username); ?><?php echo escape($user->data()->username); ?></h2>
								<span class="byline">Welcome To Clinia</span>
							</header>
							<a href="#section2" class="button alt"></a>
						</section>			
					</div>
				</div>

			</div>
		</div>

		<!-- Featured -->
		<div class="wrapper style2">
			<section class="container" id="section2">
				<header class="major">
					<h2>COVID-19 SOP</h2>
					<span class="byline">Remember To</span>
				</header>
				<div class="row no-collapse-1">
					<section class="4u">
						<img class="sop" src="img-asset/wash-hands.png" alt="">
						<h3>Wash Your Hands</h3>
					</section>
					<section class="4u">
						<img class="sop" src="img-asset/hand-sanitizer.png" alt="">
						<h3>Sanitize Your Hands</h3>
					</section>
					<section class="4u">
						<img class="sop" src="img-asset/mask.png" alt=""></a>
						<h3>Wear Masks</h3>
					</section>
					<section class="4u">
						<img class="sop" src="img-asset/social-distance.png" alt=""></a>
						<h3>Social Distance</h3>
					</section>
					<section class="4u">
						<img class="sop" src="img-asset/temperature.png" alt=""></a>
						<h3>Scan Temperature</h3>
					</section>
					<section class="4u">
						<img class="sop" src="img-asset/qr.png" alt=""></a>
						<h3>Check In</h3>
					</section>

				</div>
			</section>
		</div>


		<!-- Footer -->
		<div id="footer">
			<div class="container">

				<!-- Lists -->
				<div class="row">

					<div class="4u">
						<section>
							<header class="major">
								<h2>Clinia</h2>
								<span class="byline">Clinic Management Portal</span>
							</header>
							<ul class="contact">
								<li>
									<span class="address">Leader</span>
									<span>Lai Kok Hsien</span>
								</li>
								<li>
									<span class="address">Programmer</span>
									<span>Teoh Ee Leng</span>
								</li>
								<li>
									<span class="address">Tester</span>
									<span>Ong Weng Khai</span>
								</li>
								<li>
									<span class="address">Author</span>
									<span>Kwan Hao Feng</span>
								</li>
							</ul>	
						</section>
					</div>
				</div>



			</div>
		</div>

	</body>
	</html>

<?php

	if ($user->hasPermission('staff')) {
		// if user is admin
		echo ' ';
	}

}
else {
	echo '<p>You need to <a href="login.php">log in</a> / <a href="register.php">register</a></p>';
}

?>