<?php

session_start();
unset($_SESSION['authenticate']);
header('Location:../login.php');