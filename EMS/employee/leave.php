<?php include "../authenticate/authenticate.php"; ?>
<?php include "auth_employee.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Leaves</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.0.0/mdb.min.css" rel="stylesheet" />
<link rel="stylesheet" href="../css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>
<body>

	<div style="background-color: whitesmoke;">

		<?php
		include 'employee_navbar.php';
		?>

		<form method="post" action="apply_leave.php" onsubmit="return available_leaves()">
			<!---- Taking hidden input to get user id ----->
			<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">


		<div class="container">
			<div class="row ">
				
					<!-- All leave Column -->
					<div class="col-lg-12 mb-4 mt-4">
						<div class="card">
							<div class="card-header bg-white">
								<h3 class="mb-0 " style="color: black;">My Total Leave List</h3>
							</div>
							<div class="card-body table-responsive">
								<table class="table table-hover table-secondary">
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

									$user_id = $_SESSION['user_id'];
									$query = "SELECT * FROM `assign_leave` t1 join `users` t2 on t1.assign_to = t2.user_id where t2.user_id = $user_id;";

										$result = mysqli_query($conn, $query);
										if (mysqli_num_rows($result) > 0) {
											while ($row = mysqli_fetch_array($result)) { 
												?>
												<tr>
													<td ><?php echo $i++; ?></td>
													<td><?php echo $row['first_name'] .' '. $row['last_name']; ?></td>
													<td class="c_leave"><?php echo $row['c_leave'];  ?></td>
													<td class="e_leave"><?php echo $row['e_leave']; ?></td>
													<td class="m_leave"><?php echo $row['m_leave']; ?></td>
													<td class="v_from"><?php echo $row['v_from']; ?></td>
													<td class="v_to"><?php echo $row['v_to']; ?></td>
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


					<!-- All Requested leave Column -->
					<div class="col-lg-12 mb-4 mt-2">
						<div class="card">
							<div class="card-header bg-white">
								<h3 class="mb-0 " style="color: black;">Requested Leave status</h3>
							</div>
							<div class="card-body table-responsive">
								<table class="table table-hover table-secondary">
									<thead>
										<tr>
											<th><b>#</b></th>
											<th><b>Leave From</b></th>
											<th><b>Leave to</b></th>
											<th><b>Casual Leaves</b></th>
											<th><b>Earning Leaves</b></th>
											<th><b>Medical Leaves</b></th>
											<th><b>Applied date</b></th>
											<th><b>Status</b></th>
											<th><b>Comment</b></th>
										</tr>
									</thead>
									<tbody>
										<?php
										$i = 1;
										$user_id = $_SESSION['user_id'];
										$query = "SELECT * FROM `apply_leave` where `applied_by` = $user_id;";
										$result = mysqli_query($conn, $query);
										if (mysqli_num_rows($result) > 0) {
											while ($row = mysqli_fetch_array($result)) { 
												?>
												<tr>
													<td style="width: 3%"><?php echo $i++; ?></td>
													<td style="width: 13%"><?php echo $row['l_from']?></td>
													<td style="width: 12%"><?php echo $row['l_to']?></td>
													<td style="width: 10%"><?php echo $row['c_leave'];  ?></td>
													<td style="width: 10%"><?php echo $row['e_leave']; ?></td>
													<td style="width: 10%"><?php echo $row['m_leave']; ?></td>
													<td style="width: 12%"><?php echo $row['applied_date']; ?></td>
													<td style="color:red; width:10%;" ><?php echo $row['status']; ?></td>
													<td style="width: 20%"><?php echo $row['comment']; ?></td>
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
					<!-- End requested leave column -->






					<div class="col-lg-12 mb-4">
						<div class="card">
							<div class="card-header bg-white">
								<h3 class="mb-0 " style="color: black;">Request Leave</h3>
							</div>
							<div class="card-body">
								<div class="row">
								<div class="col-md-3 mb-4"> 
									<div data-mdb-input-init class="form-outline">
										
										<input type="date" id="form3Example1m" class="form-control form-control-lg " name="leave_from" onblur="checkDate(this.value)" / required>
										<label class="form-label" for="form3Example1m" >Leave From:</label> 
										
									</div>
								</div>


								<div class="col-md-3 mb-4"> 
									<div data-mdb-input-init class="form-outline">
										
										<input type="date" id="form3Example1m" class="form-control form-control-lg " name="leave_to" onblur="checkDate(this.value)"  / required>
										<label class="form-label" for="form3Example1m" >Leave To:</label> 
										
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-3 mb-4"> 
									<div data-mdb-input-init class="form-outline">
										
										<input type="number" id="form3Example1m" class="form-control form-control-lg " name="c_leave" onblur="checkC_leave(this.value)" / required>
										<label class="form-label" for="form3Example1m" >No. of Casual leave:
										</div>
									</div>

									<div class="col-md-3 mb-4"> 
										<div data-mdb-input-init class="form-outline">

											<input type="number" id="form3Example1m" class="form-control form-control-lg " name="e_leave" onblur="checkE_leave(this.value)" / required>
											<label class="form-label" for="form3Example1m" >No. of Earning leave:</label> 

										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-3 mb-4"> 
										<div data-mdb-input-init class="form-outline">

											<input type="number" id="form3Example1m" class="form-control form-control-lg " name="m_leave" onblur="checkM_leave(this.value)" / required>
											<label class="form-label" for="form3Example1m" >No. of Medical leave:</label> 
										</div>
									</div>
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






						</div>
					</div>
					</form>


				</div>
				<script>
					function checkDate(str)
					{
						var v_from = $ ('.v_from').text();
						var v_to = $ ('.v_to').text();

						var leave = str;

						var date1 = new Date(v_from);
						var date2 = new Date(leave);

						var diffDays1 = parseInt((date2 - date1) / (1000*60*60*24));

						var date3 = new Date(leave);
						var date4 = new Date(v_to);

						var diffDays2 = parseInt((date4 - date3) / (1000*60*60*24));


						if (diffDays1 >= 0 && diffDays2 >= 0) {
							return true;
						}
						else{
							alert('Please enter a valid date!!');
							return false;
						}
					}


					function available_leaves() {
    // Retrieve the values from the input fields
						var l_from = $('input[name="leave_from"]').val();
						var l_to = $('input[name="leave_to"]').val();

						var casual = parseInt($('input[name="c_leave"]').val());
						var medical = parseInt($('input[name="m_leave"]').val());
						var earning = parseInt($('input[name="e_leave"]').val());
    // Parse the dates
						var date1 = new Date(l_from);
						var date2 = new Date(l_to);

    // Check if dates are valid
						if (isNaN(date1.getTime()) || isNaN(date2.getTime())) {
							alert('Invalid date format. Please check the dates.');
							return false;
						}
    // Calculate the difference in days
						var diffDates = (parseInt((date2 - date1) / (1000 * 60 * 60 * 24)) + 1);

    // Retrieve the leave balances
						var c_leave = parseInt($('.c_leave').text());
						var m_leave = parseInt($('.m_leave').text());
						var e_leave = parseInt($('.e_leave').text());

    // Calculate the total leaves
						var sum_leaves = c_leave + m_leave + e_leave;
						var sum_entered_leaves = casual + medical + earning;

    // Check if the leave request exceeds available leave balance
						if (diffDates > sum_leaves) {
							alert('Your total available leave limit exceeds');
							return false;
						} else if (diffDates < sum_entered_leaves) {
							// alert(diffDates);
							// alert(sum_entered_leaves);
							alert('No. of entered leaves is greater than the requested!');
							return false;
						}
						else{
							return true;
						}
					}



					function checkC_leave(str){
						var c_leave = $('.c_leave').text();
						var c_leave_quantity = str;

						if (c_leave >= c_leave_quantity) {
							return true;}
						else{
							alert('Casual Leave limit exceeded');}
					}


					function checkM_leave(str){
						var m_leave = $('.m_leave').text();

						var m_leave_quantity = str;

						if (m_leave >= m_leave_quantity) {
							return true;
						}
						else{
							alert('Medical Leave limit exceeded');
						}
					}

					function checkE_leave(str){
						var e_leave = $('.e_leave').text();

						var e_leave_quantity = str;

						if (e_leave >= e_leave_quantity) {
							return true;
						}
						else{
							alert('Earning Leave limit exceeded');
						}
					}

				</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.0.0/mdb.umd.min.js"></script>

			</body>
			</html>