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

if (isset($_REQUEST['task'])) {
	$task = mysqli_real_escape_string($conn,$_POST['task']);
	$emplist = $_POST['emp'];
	$assigned_by = $_POST['assigned_by'];
	// print_r($emplist);

	foreach ($emplist as $emp) {
	$query = "INSERT INTO `tasks` (`task_id`,`user_id`,`task`,`assigned_by`)
	VALUES ('','$emp','$task','$assigned_by')";

$result = mysqli_query($conn,$query);
}
if ($result) {
	$_SESSION['success'] = "Task sent successfully!";
	header('Location:task.php');
}
else{
	echo "Task not sent, Please try again!";
}

}

?>