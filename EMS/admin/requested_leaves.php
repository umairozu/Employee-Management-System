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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />


</head>
<body>
<?php
	if (isset($_POST['approve'])) {
		$status =  "Approved";
		$comment = $_POST['comment'];
		$id = $_POST['id'];

		$query = "UPDATE `apply_leave` SET `status` = '$status' , `comment` = '$comment' where `id` = '$id'";
		$res = mysqli_query($conn,$query);

		if ($res) {
			$_SESSION['success'] = "Row updated successfully!";
		}
		else{
			echo "Row not updated, Please try again!";
		}

	}
	
	if (isset($_POST['reject'])) {
		$status =  "Rejected";
		$comment = $_POST['comment'];
		$id = $_POST['id'];


		$query = "UPDATE `apply_leave` SET `status` = '$status' , `comment` = '$comment' where `id` = '$id'";
		$res = mysqli_query($conn,$query);

		if ($res) {
			$_SESSION['success'] = "Row updated successfully!";
		}
		else{
			echo "Row not updated, Please try again!";
		}
	
	}
?>


<div style="background-color: whitesmoke;">
	<?php include 'admin_navbar.php'; ?>

		<div class="content" style="padding: 50px 15px 50px 15px !important;">
				<div class="row">
					<!-- Task Form Column -->
					<div class="col-lg-12 mb-4">
						<div class="card">
							<div class="card-body">
								<div class="media mt-0 mb-0 ms-4">
									<img class="d-flex mr-3 rounded-circle" alt="64x64" src="https://bootdey.com/img/Content/avatar/avatar2.png" style="width: 48px; height: 48px;">
									
									<div class="media-body">
										<span class="badge badge-primary mb-1">Admin</span>
									</div>
									<!-- Task submission output -->
									<?php
									if (isset($_SESSION['success'])) {
										echo '<div class="alert alert-success">'.$_SESSION['success'].'</div>';
										unset($_SESSION['success']);
									}
									?>
								</div>

					<!-- All Requested Leave Column -->
					<div class="col-lg-12 mb-0">
						
							<div class="card-body table-responsive">
								<table class="table table-hover table-info">
									<thead>
										<tr>
											<th><b>#</b></th>
											<th><b>Employee Name</b></th>
											<th><b>Leave From</b></th>
											<th><b>Leave to</b></th>
											<th><b>Casual Leaves</b></th>
											<th><b>Earning Leaves</b></th>
											<th><b>Medical Leaves</b></th>
											<!-- <th><b>Applied date</b></th> -->
											<th><b>Status</b></th>
											<th><b>Comment</b></th>
											<th><b>&nbsp;</b></th>
										</tr>
									</thead>
									<tbody>
										<?php
										$i = 1;
										$query = "SELECT * FROM `apply_leave` t1 join `users` t2 on t1.applied_by = t2.user_id ;";
										$result = mysqli_query($conn, $query);
										if (mysqli_num_rows($result) > 0) {
											while ($row = mysqli_fetch_array($result)) { ?>
												<tr>
													<td><?php echo $i++; ?></td>
													<td><?php echo $row['first_name'] .' '. $row['last_name']; ?></td>
													<td><?php echo $row['l_from']?></td>
													<td><?php echo $row['l_to']?></td>
													<td><?php echo $row['c_leave'];  ?></td>
													<td><?php echo $row['e_leave']; ?></td>
													<td><?php echo $row['m_leave']; ?></td>
													<!-- <td><?php echo $row['applied_date']; ?></td> -->
													<td style="color:green;"><?php echo $row['status']; ?></td>
													<td><form method="post">
<!---------- taking hidden input to get the particular leave request so we can target whose status is to be changed from pending to whatever ------->
														<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
														<textarea style="border: none; border-radius: 5px;" name="comment"> </textarea></td>
													<td>

														<button type="submit" name="approve" class="btn btn-success mb-2" title="Approve"><i class="fa fa-check"></i></button>

														<button type="submit" name="reject" class="btn btn-danger" title="Reject"><i class="fa fa-times"></i></button>

													</form>
													</td>
												</tr>
											<?php }
										} else {
											echo "<tr><td colspan='4'>No record found!</td></tr>";
										} ?>
									</tbody>
								</table>
							</div>
							<div class="card-footer text-right pt-3 pb-0">
								Showing <b><?php echo $i - 1; ?></b> entries
							</div>
						
					</div>
					<!-- end All Requested leave column -->

					</div>
				</div>
			</div>

				</div>
		</div>

</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.0.0/mdb.umd.min.js"></script>
</body>
</html>
