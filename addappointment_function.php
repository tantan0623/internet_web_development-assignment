<?php

require_once 'core/init.php';

$ic = $_POST['ic'];
$name = $_POST['name'];
$scheduleDate = $_POST['scheduleDate'];
$startTime = $_POST['startTime'];
$endTime = $_POST['endTime'];
$remark = $_POST['remark'];

if(!empty($ic) || !empty($name) || !empty($scheduleDate) || !empty($startTime) || !empty($endTime))
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
		$SELECT = "SELECT ic FROM appointment WHERE ic = ? Limit 1";
		$INSERT = "INSERT Into appointment(ic, name, scheduleDate , startTime, endTime, remark) values (?,?,?,?,?,?)";

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
			$pst->bind_param("ssssss", $ic, $name, $scheduleDate, $startTime, $endTime, $remark);
			$pst->execute();

			Redirect::to('appointment.php');
		}
		else
		{
			echo "This patient already made an appointment.";
		}

		$pst->close();
		$conn->close();

	}
}
else
{
	echo "Please fill up all the required fields.";
	die();
}

?>