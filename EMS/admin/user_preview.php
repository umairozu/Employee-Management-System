<?php include "../authenticate/authenticate.php"; ?>
<?php include "auth_admin.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Preview</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.0.0/mdb.min.css" rel="stylesheet" />


</head>
<body>

	<?php
	include 'admin_navbar.php';
	?>


      <?php 
      $user_id=$_GET['id'];
      $query = "Select * from users where `user_id` = '$user_id'";
      $result = mysqli_query($conn,$query);
      $data = mysqli_fetch_array($result);
      ?>



<section style="background-color: #eee;">
  <div class="container py-4">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="admin_dashboard.php">Home</a></li>
            
            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="https://www.iconpacks.net/icons/2/free-user-icon-3296-thumb.png"
              class="rounded-circle img-fluid" style="width: 150px;">
        <h5 class="my-3"><?php echo $data['first_name']; ?> <?php echo $data['last_name']; ?> </h5>
        <p class="text-muted mb-1"><?php echo $data['rank']; ?></p>
        <p class="text-muted mb-4"><?php echo $data['address']; ?></p>
        
            <div class="d-flex justify-content-center mb-2">

  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Message
  </button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="employee_dashboard.php?id=$user_id" method="POST">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <textarea class="form-control text-muted" rows="5" name="message" placeholder="Message User"></textarea>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Send Message</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
          </div>
        </div>
      </div>

      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">First Name</p>
          
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data['first_name']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0" >Last Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data['last_name']; ?></p>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data['email']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data['phone']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Date of Birth</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data['dob']; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data['address']; ?></p>
              </div>
            </div>
             <hr>
                        <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Gender</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data['gender']; ?></p>
              </div>
            </div>
             <hr>
                        <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Rank</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data['rank']; ?></p>
              </div>
            </div>
             <hr>
                        <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">City</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $data['city']; ?></p>
              </div>
            </div>
          </div>
        </div>
       
      </div>
    </div>
  </div>
</section>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>


</body>
</html>