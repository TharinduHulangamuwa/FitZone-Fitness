<?php
// Include the database connection
include('db.php');  // Make sure db.php is in the same directory or provide the correct path

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $firstName = $conn->real_escape_string($_POST['firstName']);
    $lastName = $conn->real_escape_string($_POST['lastName']);
    $birthday = $conn->real_escape_string($_POST['birthday']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $classes = isset($_POST['class']) ? implode(",", $_POST['class']) : ""; // Combine selected classes into a string
    $password = $conn->real_escape_string($_POST['password']);
    $confirmPassword = $conn->real_escape_string($_POST['confirmPassword']);

    // Form validation
    if ($password !== $confirmPassword) {
        echo "Error: Passwords do not match.";
        exit();
    }

    // Check that at least one class is selected
    if (empty($classes)) {
        echo "Error: You must select at least one class.";
        exit();
    }

    // Insert data into the Customer table
    $sql = "INSERT INTO Customer (FirstName, LastName, Birthday, Gender, ClassesSelected, Password) 
            VALUES ('$firstName', '$lastName', '$birthday', '$gender', '$classes', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
        header("Location: C_login.php"); // Change 'welcome.php' to your desired page
    exit(); // Stop further execution
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection (optional, as it's already closed after each request automatically in mysqli)
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Your Account</title>
  <link href="styles.css" rel="stylesheet">
</head>
<body>
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
<div class="login-container">
  <div class="registerc">
    <h1>Create Your Account</h1>
    <p>To give you a better experience we need to know about yourself</p>
    <form id="registrationForm" onsubmit="return validateForm()" method="post" action="">
    <div class="form-group">
        <input type="text" id="firstName" name="firstName" placeholder="First Name" required>
        <input type="text" id="lastName" name="lastName" placeholder="Last Name" required>
    </div>
    <div class="form-group full-width">
        <input type="date" id="birthday" name="birthday" placeholder="Birthday" required>
    </div>
    <div class="form-group full-width">
        <select id="gender" name="gender" required>
            <option value="" disabled selected>Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
    </div>
    <div class="form-group full-width">
        <h2>Select Your Classes</h2>
        <div class="checkbox-group">
            <label><input type="checkbox" name="class[]" value="yoga"> Yoga</label>
            <label><input type="checkbox" name="class[]" value="strength"> Strength</label>
            <label><input type="checkbox" name="class[]" value="cardio"> Cardio</label>
            <label><input type="checkbox" name="class[]" value="personal"> Personal</label>
        </div>
    </div>
    <div class="form-group full-width">
        <input type="password" id="password" name="password" placeholder="Password" required>
    </div>
    <div class="form-group full-width">
        <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
    </div>
    <button type="submit" class="next-button">Next</button>
</form>

  </div>
</div>
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
<script>
  function validateForm() {
    const checkboxes = document.querySelectorAll('input[name="class[]"]:checked');
    if (checkboxes.length === 0) {
      alert("Please select at least one class.");
      return false;
    }
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;
    if (password !== confirmPassword) {
      alert("Passwords do not match.");
      return false;
    }
    return true;
  }
</script>
</body>
</html>
