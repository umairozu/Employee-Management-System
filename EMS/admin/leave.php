<?php include "../authenticate/authenticate.php"; ?>
<?php include "auth_admin.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Leave Page</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.0.0/mdb.min.css" rel="stylesheet" />
<link rel="stylesheet" href="../css/bootstrap.min.css">

</head>
<body>

<div style="background-color: whitesmoke;">
	<?php include 'admin_navbar.php'; ?>

	<form method="post" action="insert_leave.php">
		<div class="content">
			<div class="container mt-5">
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
								

								<h4 class="mb-4">Assign Leave</h4>

								<div class="row">
								<div class="col-md-3 mb-4"> 
									<div data-mdb-input-init class="form-outline">
										
										<input type="date" id="form3Example1m" class="form-control form-control-lg " name="valid_from"/ required>
										<label class="form-label" for="form3Example1m" >Valid From:</label> 
										
									</div>
								</div>


								<div class="col-md-3 mb-4"> 
									<div data-mdb-input-init class="form-outline">
										
										<input type="date" id="form3Example1m" class="form-control form-control-lg " name="valid_to"/ required>
										<label class="form-label" for="form3Example1m" >Valid To:</label> 
										
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-3 mb-4"> 
									<div data-mdb-input-init class="form-outline">
										
										<input type="number" id="form3Example1m" class="form-control form-control-lg " name="m_leave"/ required>
										<label class="form-label" for="form3Example1m" >No. of Medical leave:</label> 
										
									</div>
								</div>


								<div class="col-md-3 mb-4"> 
									<div data-mdb-input-init class="form-outline">
										
										<input type="number" id="form3Example1m" class="form-control form-control-lg " name="c_leave"/ required>
										<label class="form-label" for="form3Example1m" >No. of Casual leave:
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-3 mb-4"> 
										<div data-mdb-input-init class="form-outline">

											<input type="number" id="form3Example1m" class="form-control form-control-lg " name="e_leave"/ required>
											<label class="form-label" for="form3Example1m" >No. of Earning leave:</label> 

										</div>
									</div>
								</div>

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

									<div class="text-right mt-4">
										<button type="submit" class="btn btn-success waves-effect waves-light">Send</button>
										<button type="Reset" class="btn btn-light waves-effect">Cancel</button>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- All Leave Column -->
					<div class="col-lg-12 mb-4">
						<div class="card">
							<div class="card-header bg-white d-flex justify-content-between align-items-center">
								<h3 class="mb-0" style="color: black;">All Employee Leave List</h3>
								<a class="btn btn-primary btn-md ml-auto" href="requested_leaves.php" >Requested Leaves</a>
							</div>

							<div class="card-body table-responsive">
								<table class="table table-hover table-info">
									<thead>
										<tr>
											<th><b>#</b></th>
											<th><b>Employee Name</b></th>
											<th><b>No. Casual Leave</b></th>
											<th><b>No. Earning Leave</b></th>
											<th><b>No. Medical Leave</b></th>
											<th><b>Valid From</b></th>
											<th><b>Valid to</b></th>
										</tr>
									</thead>
									<tbody>
										<?php
										$i = 1;
										$query = "SELECT * FROM `assign_leave` t1 join `users` t2 on t1.assign_to = t2.user_id ;";
										$result = mysqli_query($conn, $query);
										if (mysqli_num_rows($result) > 0) {
											while ($row = mysqli_fetch_array($result)) { ?>
												<tr>
													<td><?php echo $i++; ?></td>
													<td><?php echo $row['first_name'] .' '. $row['last_name']; ?></td>
													<td><?php echo $row['c_leave'];  ?></td>
													<td><?php echo $row['e_leave']; ?></td>
													<td><?php echo $row['m_leave']; ?></td>
													<td><?php echo $row['v_from']; ?></td>
													<td><?php echo $row['v_to']; ?></td>
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
					<!-- end All leave column -->

					
				</div>
			</div>
		</div>
	</form>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.0.0/mdb.umd.min.js"></script>
</body>
</html>
