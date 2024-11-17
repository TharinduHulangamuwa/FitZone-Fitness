<?php
session_start();

// Redirect users based on their role
if ($_SESSION['role'] == 'admin') {
    header("Location: admin_dashboard.php");
} elseif ($_SESSION['role'] == 'staff') {
    header("Location: staff_dashboard.php");
} else {
    echo "Access denied.";
    exit();
}
?>
