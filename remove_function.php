<?php

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'clinic_management_v2.0') or die(mysqli_error($mysqli));

//Remove Patient
if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM patient_details WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Removed Successfully";
	$_SESSION['msg_type'] = "warning";

	header("Location: patients.php");
}

//Remove Appointment 
if (isset($_GET['deleteApmt'])) {
	$id = $_GET['deleteApmt'];
	$mysqli->query("DELETE FROM appointment WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Removed Successfully";
	$_SESSION['msg_type'] = "warning";

	header("Location: appointment.php");
}



?>