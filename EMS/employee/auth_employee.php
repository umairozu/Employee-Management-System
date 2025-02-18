<?php

$rank = $_SESSION['rank'];

if ($rank == 'Admin') {
    header('Location: ../admin/admin_dashboard.php');
    exit;  // It's a good practice to include exit after redirection.
}

?>
