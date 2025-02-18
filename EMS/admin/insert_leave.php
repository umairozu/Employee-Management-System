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

if (isset($_REQUEST['valid_from'])) {
	$valid_from = $_POST['valid_from'];
	$valid_to = $_POST['valid_to'];
	$m_leave= $_POST['m_leave'];
	$c_leave= $_POST['c_leave'];
	$e_leave= $_POST['e_leave'];
	$emplist = $_POST['emp'];
	$assigned_by = $_POST['assigned_by'];
	
	// print_r($emplist);

	foreach ($emplist as $emp) {

	$query = "INSERT INTO `assign_leave` (`id`,`v_from`,`v_to`,`c_leave`,`e_leave`,`m_leave`,`assigned_by`,`assign_to`)
	VALUES ('','$valid_from','$valid_to','$m_leave','$c_leave','$e_leave','$assigned_by','$emp')";

$result = mysqli_query($conn,$query);
}
if ($result) {
	$_SESSION['success'] = "Leave assigned successfully!";
	header('Location:leave.php');
}
else{
	echo "unable to assign leave, Please try again!";
}

}

?>