<?php
require_once __DIR__ . "/../config.php";  // Ensure the database connection is set up

// Start session to store user data
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    // Get user input and sanitize
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Validate inputs
    if (empty($email) || empty($password)) {
        echo "Both fields are required!";
        exit;
    }

    // Query the database to find the user by email
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    // If user exists and the password is correct
    if ($user && password_verify($password, $user['password'])) {
        // Set session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];  // Store the role in the session

        // "Remember Me" functionality
        if (isset($_POST['rememberMe'])) {
            // Generate a secure session token
            $session_token = bin2hex(random_bytes(32));  // Secure random token
            $expires_at = date("Y-m-d H:i:s", strtotime("+30 days"));  // Token expires after 30 days

            // Insert session token into the sessions table
            $sql = "INSERT INTO sessions (user_id, session_token, expires_at) 
                    VALUES ('" . $user['id'] . "', '$session_token', '$expires_at')";
            mysqli_query($conn, $sql);

            // Set a cookie with the session token
            setcookie("session_token", $session_token, time() + (86400 * 30), "/");  // Cookie for 30 days
        }

        // Redirect to the appropriate dashboard based on the user's role
        if ($user['role'] == 'student') {
            header("Location: student_dashboard.php");
        } elseif ($user['role'] == 'teacher') {
            header("Location: teacher_dashboard.php");
        } elseif ($user['role'] == 'admin') {
            header("Location: admin_dashboard.php");
        } elseif ($user['role'] == 'superadmin') {
            header("Location: superadmin_dashboard.php");
        }
        exit;
    } else {
        echo "Invalid email or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css"> <!-- Add your CSS link here -->
</head>
<body>
    <h2>Login to Your Account</h2>
    <form action="login.php" method="POST">
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>

        <label><input type="checkbox" name="rememberMe"> Remember me</label><br>

        <button type="submit" name="login">Login</button>
    </form>

    <!-- Forgot Password Link -->
    <div class="forgot-password-link">
        <a href="forgot-password.php">Forgot Password?</a>
    </div>
</body>
</html>
