<?php
// Database connection parameters
$servername = "localhost"; // Database server
$username = "root"; // Database username (default for WAMP)
$password = ""; // Database password (default is empty for WAMP)
$dbname = "fit"; // Name of the database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables for form submission
$name = $email = $subject = $message = "";
$successMessage = $errorMessage = "";

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate input
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $errorMessage = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage = "Invalid email format.";
    } else {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO inquiries (name, email, subject, message) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $subject, $message);

        // Execute the statement
        if ($stmt->execute()) {
            $successMessage = "Your inquiry has been submitted successfully.";
            // Clear the form fields after successful submission
            $name = $email = $subject = $message = "";
        } else {
            $errorMessage = "There was an error submitting your inquiry. Please try again later.";
        }
        $stmt->close();
    }
}
$conn->close(); // Close the database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inquiry Form</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #333;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #fff;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #218838;
        }
        .message {
            text-align: center;
            margin: 10px 0;
            color: #d9534f; /* Red for errors */
        }
        .success {
            color: #5cb85c; /* Green for success */
        }
    </style>
</head>
<header>
  <div class="header-container">
    <div class="logo">FitZone</div>
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
            <a href="Inquiry.php">Inquieries</a>
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
<body>

<h2>Submit Your Inquiry</h2>

<?php if (!empty($errorMessage)): ?>
    <div class="message"><?php echo $errorMessage; ?></div>
<?php endif; ?>

<?php if (!empty($successMessage)): ?>
    <div class="message success"><?php echo $successMessage; ?></div>
<?php endif; ?>

<form action="" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php echo $name; ?>" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>

    <label for="subject">Subject:</label>
    <input type="text" id="subject" name="subject" value="<?php echo $subject; ?>" required>

    <label for="message">Message:</label>
    <textarea id="message" name="message" rows="4" required><?php echo $message; ?></textarea>

    <button type="submit">Submit Inquiry</