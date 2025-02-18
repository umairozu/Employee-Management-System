<?php include "auth_employee.php"; ?>
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

if (isset($_REQUEST['leave_from'])) {
	$leave_from = $_POST['leave_from'];
	$leave_to = $_POST['leave_to'];
	$m_leave= $_POST['m_leave'];
	$c_leave= $_POST['c_leave'];
	$e_leave= $_POST['e_leave'];
	$applied_by = $_POST['user_id'];
	$status = "pending";


	$query = "INSERT INTO `apply_leave` (`id`,`l_from`,`l_to`,`c_leave`,`e_leave`,`m_leave`,`applied_by`,`status`)
	VALUES ('','$leave_from','$leave_to','$m_leave','$c_leave','$e_leave','$applied_by','$status')";

$result = mysqli_query($conn,$query);
if ($result) {
	// $_SESSION['success'] = "Leave applied successfully!";
	header('Location:leave.php');
}
else{
	echo "unable to apply leave, Please try again!";
}
}


?>