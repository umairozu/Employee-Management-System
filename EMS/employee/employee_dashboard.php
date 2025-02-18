<?php include "../authenticate/authenticate.php"; ?>
<?php include "auth_employee.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <style>
        /* Custom Styles */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        .carousel-inner {
            height: 100vh;
        }
        .carousel-item img {
            object-fit: cover;
            background-position: center;
            background-repeat: no-repeat;
            width: 100%;
            height: 100vh;
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            z-index: 1;
        }
        .buttons-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
            text-align: center;
        }
        /* General button style */
        .btn {
            border: none;
            font-family: 'Lato';
            font-size: inherit;
            color: inherit;
            background: none;
            cursor: pointer;
            padding: 25px 80px;
            display: inline-block;
            margin: 15px 30px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 700;
            outline: none;
            position: relative;
            transition: all 0.3s;
        }
        .btn:after {
            content: '';
            position: absolute;
            z-index: -1;
            transition: all 0.3s;
        }
        /* Icon separator */
        .btn-sep {
            padding: 25px 60px 25px 60px;
        }
        /* Button 1 */
        .btn-1 {
          background: whitesmoke;
          color: #black;
          border: 2px solid white;
          border-radius: 2px
        }
        .btn-1:hover {
            background: #2980b9;
        }
        /* Button 2 */
        .btn-2 {
          background: whitesmoke;
          color: #black;
          border: 2px solid white;
          border-radius: 2px
        }
        .btn-2:hover {
          background: #27ae60;
        }
        /* Button 3 */
        .btn-3 {
          background: whitesmoke;
          color: #black;
          border: 2px solid white;
          border-radius: 2px;
        }
        .btn-3:hover {
            background: #c0392b;
        }
        /* Icons */
        .icon-cart:before, .icon-info:before, .icon-heart:before {
            font-family: 'FontAwesome';
            speak: none;
            font-style: normal;
            font-weight: normal;
            font-variant: normal;
            text-transform: none;
            line-height: 1;
            position: relative;
            font-size: 140%;
            width: 60px;
            height: 100%;
            top: 0;
            left: 0;
            line-height: 3;
        }
        .icon-cart:before {
            content: "\f07a";
        }
        .icon-info:before {
            content: "\f05a";
        }
        .icon-heart:before {
            content: "\f55a";
        }
    </style>
</head>
<body>
    <?php include 'employee_navbar.php'; ?>

    <div id="backgroundCarousel" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://media.licdn.com/dms/image/v2/C4D1BAQFJ63q8uDKuFA/company-background_10000/company-background_10000/0/1647696721533/punjabsafecities_cover?e=2147483647&v=beta&t=TCYh4FhKDmdxkUbNL6ELgE5SsYM70dusSTG1rEWi-1o" alt="Image 1">
            </div>

            <div class="carousel-item">
                <img src="https://propakistani.pk/wp-content/uploads/2022/03/Punjab-Safe-City-Authority-PSCA-CCTV-Camera-Surveillance-SMK.jpg" alt="Image 2">
            </div>

            <div class="carousel-item">
                <img src="../images/psca2.png" alt="Image 3">
            </div>
        </div>
    </div>

<div class="row">
<div class="buttons-container">

    <a class="btn btn-1 btn-sep" href="task.php">
        <i class="fa fa-tasks"></i> Task
    </a>
    <a class="btn btn-2 btn-sep" href="leave.php">
        <i class="fa fa-calendar"></i> Leave
    </a>

                   <?php

                    $i=1;
                    $query = "Select * From `users` where `user_id` = '".$_SESSION['user_id']."'";

                    $result = mysqli_query($conn,$query);
                    $count = mysqli_num_rows($result);

                    if ($count > 0) {
                      while ($row = mysqli_fetch_array($result)) {  

                        ?>

    <a class="btn btn-3 btn-sep" href="user_preview.php?id=<?php echo $row['user_id'];?>">
        <i class="fa fa-user"></i> Profile
    </a>

  <?php } }?>

</div>
</div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
