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

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$user_id = $_POST['user_id'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$dob = $_POST['dob'];
	$phone = $_POST['phone'];
	$password = md5($_POST['password']);
	$address = $_POST['address'];
	$rank = $_POST['rank'];
	$gender = $_POST['gender'];
	$city = $_POST['city'];


	if ($_POST['password'] == '') {
		
		$query = "UPDATE `users` SET `first_name`= '$fname',`last_name` = '$lname',`email` = '$email',`dob` = '$dob',`address` = '$address',`phone` = '$phone',`gender` = '$gender',`rank` = '$rank',`city` ='$city' where `user_id` = '$user_id'";
		   
	} else{

		$query = "UPDATE `users` SET `first_name`= '$fname',`last_name` = '$lname',`email` = '$email',`dob` = '$dob',`password` = '$password',`address` = '$address',`phone` = '$phone',`gender` = '$gender',`rank` = '$rank',`city` ='$city' where `user_id` = '$user_id'";
	}


	$result = mysqli_query($conn,$query);

	if ($result) {
		$_SESSION['success'] = "Data Updated successfully!";
		header('Location:admin_dashboard.php');
		
	}
	else{
		echo "Data not Updated, Please try again!";
	}

}

?>