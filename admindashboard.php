<?php
session_start(); // Start the session

// Check if the user is logged in by verifying the session variable
if (!isset($_SESSION['admin_username'])) {
    // If no session, redirect to login page
    header("Location: adminlogin.php");
    exit();
}
// Include the database connection
include('db.php');

// Retrieve the username from the session
$admin_username = $_SESSION['admin_username'];

// Fetch registered customers from the database
$sql_customers = "SELECT FirstName, LastName, Birthday, Gender, ClassesSelected FROM customer"; 
$result_customers = $conn->query($sql_customers);

// Fetch staff details from the database
$sql_staff = "SELECT staff_id, username, speciality FROM staff"; // Adjust table name and columns as necessary
$result_staff = $conn->query($sql_staff);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
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
<section>
<main>
        <div class="container">
            <div class="header">
                <h1>Admin Dashboard</h1>
                <button><i class="fas fa-plus"></i> Add Member</button>
            </div>
            <div class="profile-header">
                <img alt="Profile picture of Admin" height="80" src="https://storage.googleapis.com/a1aa/image/fYNs6HPWzuU4XSweysfl2ByznZx3guaJZeoSSoz9XcgGy76OB.jpg" width="80"/>
                <div>
                    <p>Welcome back, <?php echo htmlspecialchars($admin_username); ?></p>
                </div>
            </div>
            <h2>Staff Information</h2>
            <table>
                <thead>
                    <tr>
                        <th>Staff ID</th>
                        <th>Username</th>
                        <th>Specialty</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result_staff->num_rows > 0) {
                        while ($row = $result_staff->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['staff_id']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['speciality']) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No staff members found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

            <h2>Member List</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Birthday</th>
                        <th>Gender</th <th>Membership Plan</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result_customers->num_rows > 0) {
                        while ($row = $result_customers->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['FirstName']) . " " . htmlspecialchars($row['LastName']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Birthday']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Gender']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['ClassesSelected']) . "</td>";
                            echo "<td>
                                    <button>
                                        <i class='fas fa-edit'></i> Edit
                                    </button>
                                    <button class='logout'>
                                        <i class='fas fa-trash-alt'></i> Delete
                                    </button>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No registered members found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
           
            <div class="buttons">
                <button>
                    <i class="fas fa-user-edit"></i> Edit Profile
                </button>
                <button>
                    <i class="fas fa-key"></i> Change Password
                </button>
                <a href="logout.php" class="logout-button">
        <button class="logout">
            <i class="fas fa-sign-out-alt"></i> Logout
        </button>
    </a>
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
            <a href="facebook.com">Facebook</a> | <a href="instagram.com"> Instagram</a> | <a href="x.com">Twitter</a> | <a href="linkedin.com">LinkedIn</a>
        </div>
        <p>&copy; 2024 Fitzone. All rights reserved.</p>
    </footer>
</body>
</html>