<?php
// db.php - Database connection
$servername = "localhost";
$username = "root";
$password = ""; // Set your database password
$dbname = "fit"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
