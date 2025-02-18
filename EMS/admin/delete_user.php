<?php include "auth_admin.php"; ?>
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


$user_id = $_GET['id'];

$query = "DELETE from `users` where `user_id` = '$user_id'";

$result = mysqli_query($conn,$query);

if ($result) {
	$_SESSION['success'] = "User Deleted successfully!";
	header('Location:admin_dashboard.php');	
}
else{
	echo "User not Deleted, Please try again!";
}


?>