<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Your Account</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    // Database connection
</head>
<body>
    <div class="login-container">
        <div class="registerc">
            <h1>Create Your Account</h1>
            <p>To give you a better experience we need to know about yourself</p>
            <form action="register.php" method="POST">
                <div class="form-group">
                    <input type="text" name="first_name" placeholder="First Name" required>
                    <input type="text" name="last_name" placeholder="Last Name" required>
                </div>
                <div class="form-group full-width">
                    <input type="date" name="birthday" placeholder="Birthday" required>
                </div>
                <div class="form-group full-width">
                    <select name="gender" required>
                        <option value="" disabled selected>Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group full-width">
                    <h1>Select Your Classes</h1>
                    <div class="checkbox-group">
                        <label>
                            <input type="checkbox" name="class[]" value="yoga"> Yoga
                        </label>
                        <label>
                            <input type="checkbox" name="class[]" value="strength"> Strength
                        </label>
                        <label>
                            <input type="checkbox" name="class[]" value="cardio"> Cardio
                        </label>
                        <label>
                            <input type="checkbox" name="class[]" value="personal"> Personal
                        </label>
                    </div>
                </div>
                <div class="form-group full-width">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group full-width">
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                </div>
                <button class="next-button" type="submit">Next</button>
            </form>
        </div>
    </div>
</body>
</html>