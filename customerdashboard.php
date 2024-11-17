<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['firstName'])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}

// Retrieve session data
$firstName = $_SESSION['firstName'];
$lastName = $_SESSION['lastName'];
$classes = $_SESSION['classes'];
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
        <div class="container">
            <div class="profile-header">
             <img alt="Profile picture of <?php echo $firstName . ' ' . $lastName; ?>" height="80" src="https://storage.googleapis.com/a1aa/image/NE5oJU4C0xLeL6tylXHhyHdyfklhhnmMhRqTe5LCZrSArddnA.jpg" width="80"/>
             <div>
              <h1>
               <?php echo $firstName . ' ' . $lastName; ?>
              </h1>
              <p>
               Member since: January 2023
              </p>
             </div>
            </div>
            <h2>
             Personal Information
            </h2>
            <p>
             <strong>
              Email:
             </strong>
             john.doe@example.com
            </p>
            <p>
             <strong>
              Phone:
             </strong>
             (123) 456-7890
            </p>
            <p>
             <strong>
              Address:
             </strong>
             123 Main St, Anytown, USA
            </p>
            <h2>
             Membership Details
            </h2>
            <p>
             <strong>
              Plan:
             </strong>
             Annual Membership
            </p>
            <p>
             <strong>
              Start Date:
             </strong>
             January 1, 2023
            </p>
            <p>
             <strong>
              End Date:
             </strong>
             December 31, 2023
            </p>
            <p>
             <strong>
              Status:
             </strong>
             Active
            </p>
            <h2>
             Classes Enrolled
            </h2>
            <p>
             <?php echo $classes; ?>
            </p>
            <h2>
             Account Settings
            </h2>
            <div class="buttons">
             <button>
              <i class="fas fa-user-edit">
              </i>
              Edit Profile
             </button>
             <button>
              <i class="fas fa-key">
              </i>
              Change Password
             </button>
             <button class="logout">
              <i class="fas fa-sign-out-alt">
              </i>
              Logout
             </button>
            </div>
           </div>
  
        </main>
    <footer>
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
    </footer>
</body>
</html>
