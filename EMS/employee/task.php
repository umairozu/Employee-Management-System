<?php include "../authenticate/authenticate.php"; ?>
<?php include "auth_employee.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Dashboard</title>
	<!-- <link rel="stylesheet" href="../css/bootstrap.min.css"> -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.0.0/mdb.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="../css/admin_dash_table.css">

</head>
<body>

	<div style="background-color: grey;">

		<?php
		include 'employee_navbar.php';
		?>

		<div class="container-fluid ">
			<h3 style="color:white; padding: 20px 0px 0px 110px; font-family: Roboto, sans-serif; ">My Tasks</h3>
			<div class="row ">
				<div class="col-md-offset-1 col-md-10 mx-auto p-3">
					<div class="panel">

							<div class="panel-body table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th>#</th>
											<th>Task</th>
											<th>Date</th>
											<th>View</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$i=1;
										$query = "Select * From `tasks` where `user_id`='".$_SESSION['user_id']."';";

										$result = mysqli_query($conn,$query);
										$count = mysqli_num_rows($result);

										if ($count > 0) {
											while ($row = mysqli_fetch_array($result)) {	

												?>
												<tr>
													<td><?php echo $i;?></td>
													<td><a href="task_preview.php?id=<?php echo $row['task_id'];?>"><?php echo substr($row['task'],0,50);?></a>
													</td>
													<td><?php echo $row['assign_time'];?></td>
													<td><a href="task_preview.php?id=<?php echo $row['task_id'];?>" class="btn btn-sm btn-success"><i class="fa fa-search"></i></a></td>
												</tr>
												<?php $i++;}} else{
													echo "No record found!";
												} ?>
											</tbody>
										</table>
									</div>
									<div class="panel-footer">
										<div class="row">
											<div class="col text-end">
												Showing <b><?php echo $i - 1; ?></b> entries
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>

			</body>
			</html>