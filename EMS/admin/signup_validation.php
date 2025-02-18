<?php include "auth_admin.php"; ?>
<?php

$fnameErr = $lnameErr = $emailErr = $phoneErr= $addressErr = $passErr = $dobErr = $rankErr = $cityErr = $genderErr = "";
$fname = $lname = $email = $address = $phone = $password = $dob = $rank = $city = $gender = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {  
  if (empty($_POST["fname"])) {
    $fnameErr = "First Name is required";
  } else {
    $fname = test_input($_POST["fname"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
       echo "<script>alert('First name must only have letters!!');</script>";
      $fnameErr = "Letters Only";
      $fname="";
    }
  }
  
  if (empty($_POST["lname"])) {
    $lnameErr = "Last name is required";
  } else {
    $lname = test_input($_POST["lname"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
      echo "<script>alert('Last name must only have letters!!');</script>";
      // $lnameErr = "Letters Only";
      $lname= "";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "<script>alert('Invalid email format!!');</script>";
      // $emailErr = "Invalid email format";
      $email="";
    }
  }

  if (empty($_POST["password"])) {
    $passErr = "Password is required";
   } else {
    $password = $_POST["password"];
  }
  
  if (empty($_POST["phone"])) {
    $phoneErr = "Phone Number is required";
  } else {
    $phone = test_input($_POST["phone"]);
    if (!preg_match("/^\d{6}$/",$phone)) {
      echo "<script>alert('Invalid Phone Format!!');</script>";
      // $phoneErr = "Invalid Format";
      $phone="";
    }
  }
  
  if (empty($_POST["address"])) {
    $addressErr="address is required";}
    else {
    $address = test_input($_POST["address"]);
  }

  if (empty($_POST["dob"])) {
    $dobErr = "DOB is required";
} else {
    $dob = test_input($_POST["dob"]);
    // Matches dates in the format YYYY-MM-DD
    if (!preg_match("/^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01])$/", $dob)) {
      echo "<script>alert('Invalid DOB format. Please use YYYY-MM-DD.');</script>";
        // $dobErr = "Invalid DOB format. Please use YYYY-MM-DD.";
        $dob = "";
    }
}

  if ($_POST["rank"] == "rank") {
    $rankErr="Rank is required";}
    else {
    $rank = test_input($_POST["rank"]);
  }

    if ($_POST["city"] == "city") {
    $cityErr="city is required";}
    else {
    $city = test_input($_POST["city"]);
  }

    if (empty($_POST["gender"])) {
    $genderErr="gender is required";}
    else {
    $gender = test_input($_POST["gender"]);
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function prints($fname,$lname,$email,$phone,$address,$password,$dob,$rank,$city,$gender) {
  if ( $fname != "" && $lname != "" && $email != "" && $phone != "" && $password != "" && $dob != "" && $rank != "" && $city != "" && $gender != "") {

    echo "$fname <br>";  echo  "$lname <br>"; echo "$email <br>"; echo "****** <br>"; echo "$phone <br>"; echo "$address <br>"; echo "$dob <br>"; echo "$rank <br>"; echo "$city <br>"; echo "$gender <br>";
  }
}