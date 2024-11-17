<?php
session_start(); // Start the session

// Check if the user is logged in by verifying the session variable
if (!isset($_SESSION['staff_username'])) {
    // If no session, redirect to login page
    header("Location: stafflogin.php");
    exit();
}
// Include the database connection
include('db.php');

// Retrieve the username from the session
$staff_username = $_SESSION['staff_username'];
// Fetch registered customers from the database
$sql = "SELECT FirstName, LastName,Birthday,Gender,ClassesSelected FROM customer"; // Adjust table name and columns as necessary
$result = $conn->query($sql);
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
            <div class="header">
                <h1>Admin Dashboard</h1>
                <button><i class="fas fa-plus"></i> Add Member</button>
            </div>
            <div class="profile-header">
                <img alt="Profile picture of Admin" height="80" src="https://storage.googleapis.com/a1aa/image/fYNs6HPWzuU4XSweysfl2ByznZx3guaJZeoSSoz9XcgGy76OB.jpg" width="80"/>
                <div>
                    <h1>Admin Name</h1>
                    <p>Welcome back, <?php echo htmlspecialchars($staff_username); ?></p>
                </div>
            </div>
            <h2>Member List</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Membership Plan</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
 if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
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
                        echo "<tr><td colspan='6'>No registered members found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            <h2>Class Schedule</h2>
            <table>
                <thead>
                    <tr>
                        <th>Class</th>
                        <th>Instructor</th>
                        <th>Days</th>
                        <th>Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Cardio</td>
                        <td>John Doe</td>
                        <td>Monday, Wednesday, Friday</td>
                        <td>6:00 AM - 7:00 AM</td>
                        <td>
                            <button>
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button class="logout">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Strength Training</td>
                        <td>Jane Smith</td>
                        <td>Tuesday, Thursday</td>
                        <td>7:00 AM - 8:00 AM</td>
                        <td>
                            <button>
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button class="logout">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </td>
                    </tr>
                    <!-- Add more classes as needed -->
                </tbody>
            </table>
            <div class="buttons">
                <button>
                    <i class="fas fa-user-edit"></i> Edit Profile
                </button>
                <button>
                    <i class="fas fa-key"></i> Change Password
                </button>
                <button class="logout">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
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
