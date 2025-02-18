<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Free Web tutorials">
  <meta name="keywords" content="HTML, CSS, JavaScript">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Login Page</title>

  <link rel="stylesheet" type="text/css" href="css/login_style.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.0.0/mdb.min.css" rel="stylesheet" />
</head>
<body>



<section class="h-100 gradient-form " style="background-color: #eee;">
  <div class="container py-5 h-100 ">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="images/psca1.png" style="width: 185px; padding-bottom: 10px;" alt="psca">
                  <h4 class="mt-1 mb-3 pb-1">Punjab Safe City Authority EMS</h4>
                </div>

                <div class="container-fluid" style="color:dark blue; align-content: start; padding-left:2px; padding-bottom: 5px;">
                  <?php 
                  if (isset($_SESSION['success'])) {
                    echo $_SESSION['success'];
                    unset( $_SESSION['success']);
                  } 

                  if (isset($_SESSION['error'])) {
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                  } 
                  ?>
                </div>

                <form method="post" action="login_validation.php">
                  <p>Please login to your account</p>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="email" id="form2Example11" class="form-control"
                      placeholder="Email address" name="email" required />
                    <label class="form-label" for="form2Example11">Email</label>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="password" id="form2Example22" class="form-control" name="password" required />
                    <label class="form-label" for="form2Example22">Password</label>
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <input class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit" value="Log in" style="background:#271c70;">

                    <p class="text-muted" href="#!">Forgot password? <u>Contact Help Desk</u></p>
                  </div>


                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2" style="background: linear-gradient(to right, #271c70,  #000000);">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">We are more than just surveillance</h4>
                <p class="small mb-0">
                  At Punjab Safe Cities Authority, we are committed to transforming urban safety through innovative technology and vigilant monitoring. 
                  Our mission is to ensure a secure and peaceful environment for the citizens of Punjab by leveraging real-time data, advanced surveillance, 
                  and strategic partnerships with law enforcement agencies. Join us in making our cities safer, one camera at a time.
                </p>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.0.0/mdb.umd.min.js"></script>


</body>
</html>


