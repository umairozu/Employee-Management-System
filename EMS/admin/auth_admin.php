<?php

$rank = $_SESSION['rank'];

if (in_array($rank, ['Web Developer', 'Ui/Ux Developer', 'AI Specialist'])) {
    header('Location: ../employee/employee_dashboard.php');
    exit;  // It's a good practice to include exit after redirection.
}

?>
