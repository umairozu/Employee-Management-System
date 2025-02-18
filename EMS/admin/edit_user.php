<?php include "../authenticate/authenticate.php"; ?>
<?php include "auth_admin.php"; ?>
<!DOCTYPE html>
<html>
<head>

  <title>Edit User</title>

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
    <form method="post" action="update_user.php" id="myForm" >

      <?php 
      $user_id=$_GET['id'];
      $query = "Select * from users where `user_id` = '$user_id'";
      $result = mysqli_query($conn,$query);
      $data = mysqli_fetch_array($result);
      ?>
      
      <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">

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
                      <h3 class="mb-3 ">Edit User</h3>

                      <div class="container-fluid" style="color:dark blue; align-content: start; padding-left:2px; padding-bottom: 5px;">
                        <?php if (isset($_SESSION['success'])) {
                          echo $_SESSION['success'];
                          unset($_SESSION['success']);
                        } ?>
                      </div>

                      <div class="row">
                        <div class="col-md-6 mb-4">                                    
                         <div data-mdb-input-init class="form-outline">
                          <input type="text" id="form3Example1m" class="form-control form-control-lg " name="fname" value="<?php echo $data['first_name']; ?>" / required>
                          <label class="form-label" for="form3Example1m" >First name</label> 
                        </div>
                      </div>
                      <div class="col-md-6 mb-4">
                        <div data-mdb-input-init class="form-outline">
                          <input type="text" id="form3Example1n" class="form-control form-control-lg" name="lname" value="<?php echo $data['last_name']; ?>"/ required>
                          <label class="form-label" for="form3Example1n" >Last name</label>
                        </div>
                      </div>
                      <div class="col-md-6 mb-4">
                        <div data-mdb-input-init class="form-outline">
                          <input type="text" id="form3Example1m" class="form-control form-control-lg " name="email" value="<?php echo $data['email']; ?>"  / required>
                          <label class="form-label" for="form3Example1m" >Email ID</label>
                        </div>
                      </div>
                      <div class="col-md-6 mb-4">
                        <div data-mdb-input-init class="form-outline">
                          <input type="text" id="form3Example1n" class="form-control form-control-lg" name="dob" value="<?php echo $data['dob']; ?>" / required>
                          <label class="form-label" for="form3Example1n">DOB (yyyy-mm-dd)</label>
                        </div>
                      </div>

                      <div class="col-md-6 mb-4 " >
                        <div data-mdb-input-init class="form-outline">
                          <input type="password" id="form3Example9" class="form-control form-control-lg" name="password" />
                          <label class="form-label" for="form3Example1m">Password</label>
                        </div>
                      </div>


                      <div class="col-md-6 mb-4 " >
                        <div data-mdb-input-init class="form-outline ">
                          <input type="text" id="form3Example9" class="form-control form-control-lg" name="phone" value="<?php echo $data['phone']; ?>"/ required>
                          <label class="form-label" for="form3Example1n">Phone</label>
                        </div>
                      </div>

                    </div>


                    <div data-mdb-input-init class="form-outline mb-3 ">
                      <input type="text" id="form3Example8" class="form-control form-control-lg" name="address" value="<?php echo $data['address']; ?>" style="height: 100px;" / required>
                      <label class="form-label" for="form3Example8">Address</label>
                    </div>

                    <div class="d-md-flex justify-content-start align-items-center mb-3 py-2">
                      <h6 class="mb-0 me-4">Gender: </h6>

                      <div class="form-check form-check-inline mb-0 me-4">

                        <input class="form-check-input" type="radio" name="gender" id="femaleGender" value="female"
                        <?php if ($data['gender'] == 'female') {echo "checked";} ?>/>

                         <label class="form-check-label" for="femaleGender">Female</label>
                       </div>

                       <div class="form-check form-check-inline mb-0 me-4">
                        <input class="form-check-input" type="radio" name="gender" id="maleGender" value="male"
                        <?php if ($data['gender'] == 'male') {
                         echo "checked";} ?> />
                         <label class="form-check-label" for="maleGender">Male</label>
                       </div>
                     </div>


                     <div class="row-md-4">
                      <div class="col-md-4 mb-3 ">

                        <select data-mdb-select-init style=" border: 1px solid lightgrey; border-radius: 3px; padding: 5px;" name="rank">
                          <option value="rank">Rank</option>
                          <option value="Admin" <?php if ($data['rank'] == 'Admin') {
                           echo "selected";} ?>>Admin</option>

                           <option value="Web Developer" <?php if ($data['rank'] == 'Web Developer') {
                             echo "selected";} ?>>Web Developer</option>

                             <option value="Ui/Ux Developer" <?php if ($data['rank'] == 'Ui/Ux Developer') {
                               echo "selected";} ?>>Ui/Ux Developer</option>

                               <option value="AI Specialist" <?php if ($data['rank'] == 'AI Specialist') {
                                 echo "selected";} ?>>AI Specialist</option>
                               </select>

                             </div>

                             <div class="col-md-4 mb-8">
                              <select data-mdb-select-init style="border: 1px solid lightgrey; border-radius: 3px; padding: 5px 13px 5px 5px;" name="city" >
                                <option value="city" >City</option>
                                <option value="Lahore" <?php if ($data['city'] == 'Lahore') {
                                 echo "selected";} ?>>Lahore</option>
                                 <option value="Multan" <?php if ($data['city'] == 'Multan') {
                                   echo "selected";} ?>>Multan</option>
                                   <option value="Okara" <?php if ($data['city'] == 'Okara') {
                                     echo "selected";} ?>>Okara</option>
                                   </select>
                                 </div>
                               </div>


                               <div class="d-flex justify-content-center pt-3">
                                <input type="Reset" value="Cancel" class="btn btn-dark btn-lg me-4">
                                <input type="Submit" name="submit" value="Update" class="btn btn-primary btn-lg ms-2">
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
          </div>


          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.0.0/mdb.umd.min.js"></script>


        </body>
        </html>