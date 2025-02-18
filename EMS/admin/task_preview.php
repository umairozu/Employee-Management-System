<?php include "../authenticate/authenticate.php"; ?>
<?php include "auth_admin.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Task Preview</title>
	<!-- <link rel="stylesheet" href="../css/bootstrap.min.css"> -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.0.0/mdb.min.css" rel="stylesheet" />

</head>
<body>

	<div >
		<?php include 'admin_navbar.php'; ?>

		<div class="container-fluid" style="background-color: whitesmoke;">
			<section>
				<div class="container py-5">

					<div class="row">
						<?php
						$task_id = $_GET['id'];
						$query = "Select * From `tasks` where `task_id`= '$task_id'";

						$result = mysqli_query($conn,$query);
						$row = mysqli_fetch_array($result);
						?>

						<!-- Left side: Admin Task section -->
						<div class="col-md-8" >
							<ul class="list-unstyled">
								<li class="d-flex justify-content-between mb-4">
									<img src="https://www.iconpacks.net/icons/2/free-user-icon-3296-thumb.png" alt="avatar"
										class="rounded-circle d-flex align-self-start me-3 shadow-1-strong" width="60">
									<div class="card"style="width:745px;">
										<div class="card-header d-flex justify-content-between p-3">
											<p class="fw-bold mb-0">Admin</p>
											<p class="text-muted small mb-0"><i class="far fa-clock"></i> <?php echo $row['assign_time']; ?></p>
										</div>
										<div class="card-body">
											<p class="mb-0"><?php echo $row['task']; ?></p>
										</div>
									</div>
								</li>
							</ul>

							<!-- Reply Box and Button -->
							<?php 
							if (isset($_POST['task_reply'])) {
								$message_id = $_POST['message_id'];
								$user_id = $_POST['user_id'];
								$reply = mysqli_real_escape_string($conn,$_POST['task_reply']);

				$query = "INSERT into `task_reply` (`reply_id`,`reply`,`message_id`,`replied_by`) VALUES ('','$reply','$message_id','$user_id')";

								$result = mysqli_query($conn,$query);
							}
							?>

				<form method="post" action="#">
					<input type="hidden" name="message_id" value="<?php echo $task_id; ?>">
					<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">

					<div class="form-outline mb-3"style="padding-left: 80px;">

					<textarea class="form-control bg-body-tertiary" id="textAreaExample2" rows="7" name="task_reply">
					</textarea>

					<label class="form-label" style="padding-left: 80px;"for="textAreaExample2">Message
					</label>

					</div>

				<button type="submit" class="btn btn-secondary btn-rounded float-end">Reply</button>
				</form>
						</div>


						<!-- Right side: "Your Replies" section -->
						<div class="col-md-4">
							<div class="card">
								<div class="card-body">
									<h4 class="header-title mb-3">Replies</h4>

									<!-- Display User Replies (Example static replies for demo) -->
<?php

$query_replies = "SELECT * FROM `task_reply` 
                  JOIN `users` ON `users`.`user_id` = `task_reply`.`replied_by` 
                  WHERE `message_id` = '$task_id' 
                  ";
									$result_replies = mysqli_query($conn, $query_replies);
									while ($reply_row = mysqli_fetch_array($result_replies)) {
									?>
										<div class="media mb-3">
											<div class="media-body">
												<div class="bg-light p-3 rounded">
													
				<p class="mb-0"><?php echo $reply_row['first_name'] .' '. $reply_row['last_name'].':<br>'. $reply_row['reply']; ?></p>
				<p class="text-muted small"><?php echo $reply_row['reply_time']; ?></p>

												</div>
											</div>
									
										</div>
<?php } ?>
								</div>
							</div>
						</div>

					</div>
				</div>
			</section>
		</div>
	</div>

</body>
</html>
