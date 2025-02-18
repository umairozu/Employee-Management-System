<?php include "../authenticate/authenticate.php"; ?>
<?php include "auth_admin.php"; ?>
<!DOCTYPE html>
<html>
<head>

<title>Add User</title>

  <meta charset="UTF-8">
  <meta name="description" content="Free Web tutorials">
  <meta name="keywords" content="HTML, CSS, JavaScript">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.0.0/mdb.min.css" rel="stylesheet" />


 <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>

<?php
include'admin_navbar.php';
include 'signup_validation.php';
?>

<div>
<form method="post" action="insert.php" id="myForm" >
<section class="h-100 " style="background-color: grey;" >
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card card-registration my-4">
          <div class="row g-0">
            <div class="col-xl-6 d-none d-xl-block" style="background-image: url('https://img.freepik.com/free-vector/product-quality-concept-illustration_114360-7301.jpg?w=1060&t=st=1723021311~exp=1723021911~hmac=c710bac0b05912d56a7a4b1e84916ba7725ddf8a3b12242b1863f31a459a4b3c');background-size:620px 620px; background-position: left; background-repeat: no-repeat; border-top-left-radius: .25rem; border-bottom-left-radius: .25rem; ">

            </div>
            <div class="col-xl-6">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-3 ">User Registration Form</h3>

                <div class="container-fluid" style="color:dark blue; align-content: start; padding-left:2px; padding-bottom: 5px;">
                  <?php if (isset($_SESSION['success'])) {
                    echo $_SESSION['success'];
                  } ?>
                </div>


                <div class="row">
                  <div class="col-md-6 mb-4">                                    
                     <div data-mdb-input-init class="form-outline">
                      <input type="text" id="form3Example1m" class="form-control form-control-lg " name="fname"/ required>
                      <label class="form-label" for="form3Example1m" >First name</label> 
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div data-mdb-input-init class="form-outline">
                      <input type="text" id="form3Example1n" class="form-control form-control-lg" name="lname" / required>
                      <label class="form-label" for="form3Example1n" >Last name</label>
                    </div>
                  </div>
                     <div class="col-md-6 mb-4">
                    <div data-mdb-input-init class="form-outline">
                      <input type="text" id="form3Example1m" class="form-control form-control-lg " name="email"  / required>
                      <label class="form-label" for="form3Example1m" >Email ID</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div data-mdb-input-init class="form-outline">
                      <input type="date" id="form3Example1n" class="form-control form-control-lg" name="dob" / required>
                      <label class="form-label" for="form3Example1n">DOB</label>
                    </div>
                  </div>

            <div class="col-md-6 mb-4 " >
                <div data-mdb-input-init class="form-outline">
                  <input type="password" id="form3Example9" class="form-control form-control-lg" name="password" / required>
                  <label class="form-label" for="form3Example1m">Password</label>
                </div>
            </div>


            <div class="col-md-6 mb-4 " >
                <div data-mdb-input-init class="form-outline ">
                  <input type="text" id="form3Example9" class="form-control form-control-lg" name="phone" / required>
                  <label class="form-label" for="form3Example1n">Phone</label>
                </div>
            </div>

            </div>


                <div data-mdb-input-init class="form-outline mb-3 ">
                  <input type="text" id="form3Example8" class="form-control form-control-lg" name="address" style="height: 100px;" / required>
                  <label class="form-label" for="form3Example8">Address</label>
                </div>

 <div class="d-md-flex justify-content-start align-items-center mb-3 py-2">
  <h6 class="mb-0 me-4">Gender: </h6>

  <div class="form-check form-check-inline mb-0 me-4">
    <input class="form-check-input" type="radio" name="gender" id="femaleGender" value="female" />
    <label class="form-check-label" for="femaleGender">Female</label>
  </div>

  <div class="form-check form-check-inline mb-0 me-4">
    <input class="form-check-input" type="radio" name="gender" id="maleGender" value="male" />
    <label class="form-check-label" for="maleGender">Male</label>
  </div>
</div>


                <div class="row-md-4">
                  <div class="col-md-4 mb-3 ">

                    <select data-mdb-select-init style=" border: 1px solid lightgrey; border-radius: 3px; padding: 5px;" name="rank">
                      <option value="rank">Rank</option>
                      <option value="Admin">Admin</option>
                      <option value="Web Developer">Web Developer</option>
                      <option value="Ui/Ux Developer">Ui/Ux Developer</option>
                      <option value="AI Specialist">AI Specialist</option>
                    </select>

                  </div>

                  <div class="col-md-4 mb-8">
                    <select data-mdb-select-init style="border: 1px solid lightgrey; border-radius: 3px; padding: 5px 13px 5px 5px;" name="city" >
                      <option value="city">City</option>
                      <option value="Lahore">Lahore</option>
                      <option value="Multan">Multan</option>
                      <option value="Okara">Okara</option>
                    </select>
                  </div>
                </div>


                <div class="d-flex justify-content-center pt-3">
                  <input type="Reset" value="Reset all" class="btn btn-dark btn-lg me-4">
                  <input type="Submit" name="submit" value="Add User" class="btn btn-primary btn-lg ms-2">
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</form>

<!-- <div class="prints">
  <?php
  echo "<h2>Your Input:</h2>";
  prints($fname,$lname,$email,$phone,$address,$password,$dob,$rank,$city,$gender);
  ?>
</div> -->
</div>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.0.0/mdb.umd.min.js"></script>


</body>
</html>