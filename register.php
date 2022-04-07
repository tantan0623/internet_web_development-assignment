<?php

require_once 'core/init.php';

if(Input::exists())
{
	if(Token::check(Input::get('token')))
	{

		$validate = new Validate();
		$validation = $validate->check($_POST, array(
				'username' => array(
				'required' => true,
				'min' => 3,
				'max' => 20,
				'unique' => 'users'
			),
			'password' => array(
				'required' => true,
				'min' => 6
			),
			'password_again' => array(
				'required' => true,
				'matches' => 'password'
			),
			'name' => array(
				'required' => true,
				'min' => 3,
				'max' => 50
			)
		));

		if($validation->passed())
		{
			$user = new User();

			$salt = Hash::salt(32);

			try
			{
				$user->create(array(
					'username' => Input::get('username'),
					'password' => Hash::make(Input::get('password'), $salt),
					'salt'     => $salt,
					'name'     => Input::get('name'),
					'joined'   => date('Y-m-d H:i:s'),
					'groups'    => 1
				));

				Session::flash('home', 'Register Success');
				Redirect::to('index.php');
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		}
		else
		{
			foreach($validation->errors() as $error)
			{
				echo $error, '<br>';
			}
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register Account</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Internal Stylesheets -->
	<link rel="icon" type="image/png" href="img-asset/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form"  method="post">
					<span class="login100-form-title p-b-26">
						Welcome To 
					</span>
					<span class="img-zoom">
						<img id="logo" src="img-asset/logo.png" style="width:130px;height:130px;">
					</span>

					<div class="wrap-input100 validate-input" data-validate = "This field is required">
						<input class="input100" type="text" name="name" value="<?php echo escape(Input::get('name')); ?>" id="name">
						<span class="focus-input100" data-placeholder="Full Name"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "This field is required">
						<input class="input100" type="text" name="username" id="username" value="<?php echo escape(Input::get('username')); ?>" autocomplete="off">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="This field is required">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password" id="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="This field is required">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password_again" id="password_again">
						<span class="focus-input100" data-placeholder="Re-Enter Password"></span>
					</div>

					<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
								<button class="login100-form-btn">
									<a class="login100-form-btn" type="submit">Register</a>
								</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!-- Animation Script -->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="vendor/animsition/js/animsition.min.js"></script>
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/select2/select2.min.js"></script>
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<script src="vendor/countdowntime/countdowntime.js"></script>
<script src="js/main.js"></script>

</body>
</html>