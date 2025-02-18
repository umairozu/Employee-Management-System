<?php

session_start();

$host = "localhost";
$username = "root";
$pass = "";
$db = "ems";

$conn = mysqli_connect($host,$username,$pass,$db);
if (!$conn) {
	die("Database connection error");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$email = $_POST['email'];
	$pass1 = md5($_POST['password']);
	$pass2 = $_POST['password'];



	$query = "SELECT * FROM `users` WHERE email = '$email' AND (password = '$pass1' OR password = '$pass2')";
	$result = mysqli_query($conn,$query);
	$count = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);	


	if ($count == 1) {

		$session_id = session_id();
		$_SESSION['authenticate'] = $session_id;
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['rank'] = $row['rank'];


		$rank = $row['rank']; 
		if ($rank == 'Admin') {
			header('Location:admin/admin_dashboard.php');
		} elseif (in_array($rank, ['Web Developer', 'Ui/Ux Developer', 'AI Specialist'])) {
			header('Location:employee/employee_dashboard.php');
		}
	} else {
		$_SESSION['error'] = "Access Denied!";
		header('Location:login.php');
	}


}

