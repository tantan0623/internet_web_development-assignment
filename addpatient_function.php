<?php

require_once 'core/init.php';

$name = $_POST['name'];
$gender = $_POST['gender'];
$ic = $_POST['ic'];
$dob = $_POST['dob'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$email = $_POST['email'];

if(!empty($name) || !empty($gender) || !empty($ic) || !empty($dob) || !empty($phone) || !empty($address) || !empty($email))
{
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "clinic_management_v2.0";

	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

	if(mysqli_connect_error())
	{
		die('Connection Error('.mysqli_connect_error().')'.mysqli_connect_error());
	}
	else
	{
		$SELECT = "SELECT ic FROM patient_details WHERE ic = ? Limit 1";
		$INSERT = "INSERT Into patient_details(name, gender, ic, dob, phone, address, email) values (?,?,?,?,?,?,?)";

		$pst = $conn->prepare($SELECT);
		$pst->bind_param("s", $ic);
		$pst->execute();
		$pst->bind_result($ic);
		$pst->store_result();
		$rnum = $pst->num_rows;

		if($rnum == 0)
		{
			$pst->close();
			$pst = $conn->prepare($INSERT);
			$pst->bind_param("sssssss", $name, $gender, $ic, $dob, $phone, $address, $email);
			$pst->execute();

			Redirect::to('patients.php');
		}
		else
		{
			echo "This IC Number already existed.";
		}

		$pst->close();
		$conn->close();

	}
}
else
{
	echo "All fields are required.";
	die();
}

?>