<?php

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'clinic_management_v2.0') or die(mysqli_error($mysqli));

if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$gender = $_POST['gender'];
	$ic = $_POST['ic'];
	$dob = $_POST['dob'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$email = $_POST['email'];

	$mysqli->query("UPDATE patient_details SET name='$name', phone='$phone', address='$address', email='$email' WHERE id='$id'") or die($mysqli->error());

	$_SESSION['message'] = "Updated Successfully";
	$_SESSION['msg_type'] = "success";

	header("Location: patients.php");
} 

if (isset($_POST['updateApmt'])) {
	$id = $_POST['id'];
	$ic = $_POST['ic'];
	$name = $_POST['name'];
	$scheduleDate = $_POST['scheduleDate'];
	$startTime = $_POST['startTime'];
	$endTime = $_POST['endTime'];
	$remark = $_POST['remark'];

	$mysqli->query("UPDATE appointment SET scheduleDate='$scheduleDate', startTime='$startTime', endTime='$endTime', remark='$remark' WHERE id='$id'") or die($mysqli->error());

	$_SESSION['message'] = "Updated Successfully";
	$_SESSION['msg_type'] = "success";

	header("Location: appointment.php");
}


?>

