<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Retrieve user based on username and role
    $query = "SELECT * FROM users WHERE email='$username' AND role='staff'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            header("Location: staff_dashboard.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No staff user found.";
    }
}
?>
