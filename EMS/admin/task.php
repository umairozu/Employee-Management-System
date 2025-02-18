<?php include "../authenticate/authenticate.php"; ?>
<?php include "auth_admin.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Task Page</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.0.0/mdb.min.css" rel="stylesheet" />
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/task.css">
</head>
<body>

<div style="background-color: whitesmoke;">
	<?php include 'admin_navbar.php'; ?>

	<form method="post" action="insert_task.php">
		<div class="content">
			<div class="container mt-4">
				<div class="row">
					<!-- Task Form Column -->
					<div class="col-lg-12 mb-4">
						<div class="card">
							<div class="card-body">
								<div class="media mt-0 mb-3">
									<img class="d-flex mr-3 rounded-circle" alt="64x64" src="https://bootdey.com/img/Content/avatar/avatar2.png" style="width: 48px; height: 48px;">
									
									<!-- Task submission output -->
									<?php
									if (isset($_SESSION['success'])) {
										echo '<div class="alert alert-success">'.$_SESSION['success'].'</div>';
										unset($_SESSION['success']);
									}
									?>
									<div class="media-body">
										<span class="badge badge-primary mb-1">Admin</span>
									</div>
								</div>
								
								<h4 class="mb-4">Task Details</h4>
								<textarea class="form-control text-muted" rows="5" style="width:500px;" name="task" placeholder="Assign task..."></textarea>

								<div class="assign-team mt-4">
									<h5 class="mb-3">Assign to</h5>
									<?php
									$query = "SELECT * FROM `users` WHERE `rank` != 'admin' ORDER BY 'user_id' DESC";
									$result = mysqli_query($conn, $query);
									while ($row = mysqli_fetch_array($result)) { ?>

			<input type="hidden" name="assigned_by" value="<?php echo $_SESSION['user_id']; ?>">

										<div class="form-check form-check-inline">
											<label class="form-check-label" for="inlineCheckbox1">

								<input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="emp[]" value="<?php echo $row['user_id']; ?>">
								<?php echo $row['first_name'] . ' ' . $row['last_name']; ?>

											</label>
										</div>
									<?php } ?>
								</div>

								<div class="attached-files mt-4">
									<h5>Attached Files</h5>
									<div class="files-list d-flex">
										<div class="file-box">
											<a href=""><img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-responsive img-thumbnail" alt="attached-img" width="64x64"></a>
											<!-- <p class="font-13 mb-1 text-muted"><small>File one</small></p> -->
										</div>
										<div class="file-box ml-3 ps-1 mt-3">
											<a href="#"><span class="add-new-plus"><i class="fa fa-plus"></i></span></a>
										</div>
									</div>

									<div class="text-right mt-4">
										<button type="submit" class="btn btn-success waves-effect waves-light">Send</button>
										<button type="button" class="btn btn-light waves-effect">Cancel</button>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- All Tasks Column -->
					<div class="col-lg-12 mb-4">
						<div class="card">
							
							<div class="card-header bg-white">
								<h3 class="mb-0" style="color: black;">All Tasks</h3>
							</div>

							<div class="card-body table-responsive">
								<table class="table table-hover">
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
										$i = 1;
										$query = "SELECT * FROM `tasks`;";
										$result = mysqli_query($conn, $query);
										if (mysqli_num_rows($result) > 0) {
											while ($row = mysqli_fetch_array($result)) { ?>
												<tr>
													<td><?php echo $i++; ?></td>
													<td><a href="task_preview.php?id=<?php echo $row['task_id']; ?>"><?php echo substr($row['task'], 0, 50); ?></a></td>
													<td><?php echo $row['assign_time']; ?></td>
													<td><a href="task_preview.php?id=<?php echo $row['task_id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-search"></i></a></td>
												</tr>
											<?php }
										} else {
											echo "<tr><td colspan='4'>No record found!</td></tr>";
										} ?>
									</tbody>
								</table>
							</div>

							<div class="card-footer text-right">
								Showing <b><?php echo $i - 1; ?></b> entries
							</div>
						</div>
					</div>
					<!-- end All Tasks column -->
				</div>
			</div>
		</div>
	</form>
</div>

</body>
</html>
