<?php include "../authenticate/authenticate.php"; ?>
<?php include "auth_admin.php"; ?>
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
		include 'admin_navbar.php';
		?>
		<div class="container-fluid ">

			<div class="row ">
				<div class="col-md-offset-1 col-md-10 mx-auto p-3">
					<div class="panel">
						<div class="panel-heading">
							<div class="row">
								<div class="col-sm-12 col-xs-12">
									<a href="signup.php" class="btn btn-sm float-end">
										<i class="fa fa-plus-circle"></i> Add New</a>
										<h4 class="float-start" style="color:white;font-family: Roboto, sans-serif; ">Employee Records</h4>
									</div>
								</div>
							</div>

							<div class="panel-body table-responsive">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>Action</th>
											<th>#</th>
											<th>First Name</th>
											<th>Last Name</th>
											<th>Email</th>
											<th>Phone</th>
											<th>Rank</th>
											<th>Preview</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$i=1;
										$query = "Select * From `users`";

										$result = mysqli_query($conn,$query);
										$count = mysqli_num_rows($result);

										if ($count > 0) {
											while ($row = mysqli_fetch_array($result)) {	
												?>
												<tr>
												<td>
												<ul class="action-list">
													<li><a href="edit_user.php?id=<?php echo $row['user_id'];?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a></li>
														<li><a href="delete_user.php?id=<?php echo $row['user_id'];?>" class="btn btn-danger"><i class="fa fa-times"></i></a></li>
												</ul>
												</td>
													<td><?php echo $i;?></td>
													<td><?php echo $row['first_name']; ?></td>
													<td><?php echo $row['last_name']; ?></td>
													<td><?php echo $row['email']; ?></td>
													<td><?php echo $row['phone']; ?></td>
													<td><?php echo $row['rank']; ?></td>
													<td><a href="user_preview.php?id=<?php echo $row['user_id'];?>" class="btn btn-sm btn-success"><i class="fa fa-search"></i></a></td>
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