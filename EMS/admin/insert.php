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


	$query = "INSERT INTO `users` (`user_id`,`first_name`,`last_name`,`email`,`dob`,`password`,`address`,`phone`,`gender`,`rank`,`city`)
	VALUES ('', '$fname','$lname', '$email','$dob','$password','$address','$phone','$gender','$rank','$city' )";
    $result = mysqli_query($conn,$query);

if ($result) {
	$_SESSION['success'] = "Data inserted successfully!";
	header('Location:signup.php');
}
else{
	echo "Data not inserted, Please try again!";
}

}

?>