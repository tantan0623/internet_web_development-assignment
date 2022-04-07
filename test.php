<?php

$conn = mysqli_connect("localhost", "root", "", "clinic_management");

if($conn->connect_error)
{
	die("Connection failed". $conn->connect_error);
}

$sql = "SELECT name, gender, ic, dob, phone, age, address, email FROM patient_details";
$result = $conn->query($sql);

if($result->num_rows > 0)
{
	while($row = $result->fetch_assoc())
	{
		echo "<tr><td>" . $row["name"] . "</td><td>" . $row["gender"] . "</td><td>" . $row["ic"] . "</td><td>" . $row["dob"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["age"] . "</td><td>" . $row["address"] . "</td><td>" . $row["email"] . "</td></tr>";
	}
}

$conn->close();

?>