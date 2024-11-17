<?php
session_start(); // Start the session

// Assuming you're connecting to a database for authentication
include("db.php"); // Include your database connection

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database for matching admin credentials (use prepared statements)
    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Check if a matching admin is found
    if ($result->num_rows > 0) {
        // Login successful, set session
        $_SESSION['admin_username'] = $username;
        header("Location: admindashboard.php"); // Redirect to the admin dashboard
        exit(); // Stop further execution
    } else {
        // If login fails, show an error message
        $error_message = "Invalid Username or Password";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Home</title>
    <link rel="stylesheet" href="styles.css">
</head>
<header>
  <div class="header-container">
    <div class="logo">Logo</div>
    <nav class="navigation-menu">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="aboutus.php">About Us</a></li>
        <li class="dropdown">
          <a href="classes.php">Services</a>
          <div class="dropdown-content">
            <a href="classes.php">Class Schedule</a>
            <a href="classes.php">Personal Training</a>
          </div>
        </li>
        <li class="dropdown">
          <a href="packages.php">Membership</a>
        </li>
        <li class="dropdown">
          <a href="#">Resources</a>
          <div class="dropdown-content">
            <a href="blog.php">Blog</a>
          </div>
        </li>
        <li><a href="contactus.php">Contact Us</a></li>
        <li class="dropdown">
          <a href="#">Login</a>
          <div class="dropdown-content">
            <a href="C_login.php">Customer Login</a>
            <a href="S_login.php">Staff Login</a>
            <a href="A_login.php">Admin Login</a>
          </div>
        </li>
      </ul>
    </nav>
  </div>
</header>
<section>
<main>
        <div class="login-container">
            <div class="login-box">
                <div style="background-color: #800000; width: 50px; height: 50px; border-radius: 50%; margin: 0 auto 20px;"></div>
                <h2>LOGIN</h2>
                <p>Sign in to your account</p>
                <?php if (isset($error_message)) { echo "<p style='color: red;'>$error_message</p>"; } ?>
                <form method="POST" action="">
                    <input name="username" placeholder="Username" type="text" required/>
                    <input name="password" placeholder="Password" type="password" required/>
                    <a href="#">Forgot Password?</a>
                    <button type="submit">Sign In</button>
                </form>
                <div class="create-account">
                    <a href="Register.php">Create an account</a>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="contact-info">
            <p>Contact (fitzonek@gmail.com)</p>
            <p>Address: Kurunegala Main Street</p>
            <p>Phone Number: [+947123456789]</p>
        </div>
        <div class="quick-links">
            <p>Quick Links</p>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="classes.php">Class Schedule</a></li>
                <li><a href="packages.php">Plans & Pricing</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="register.php">Register</a></li>
                <li><a href="C_login.php">Customer Login</a></li>
                <li><a href="S_login.php">Staff Login</a></li>
                <li><a href="A_login.php">Admin Login</a></li>
            </ul>
        </div>

        <div class="opening-hours">
            <p>Opening Hours</p>
            <p>Monday - Friday: 5:00 AM - 10:00 PM</p>
            <p>Saturday - Sunday: 7:00 AM - 8:00 PM</p>
        </div>
        <div class="social-media">
            <p>Follow Us</p>
            <a href="facebook.com">Facebook</a> | <a href="instagram.com">Instagram</a> | <a href="x.com">Twitter</a> | <a href="linkedin.com">LinkedIn</a>
        </div>
        <p>&copy; 2024 Fitzone. All rights reserved.</p>
    </footer>
</body>
</html>
