<?php
require_once __DIR__ . "/../config.php"; // Load config constants (ROOT_URL, ASSET_URL, etc.)

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    // Check if email exists
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // Generate reset token and expiration time
        $reset_token = bin2hex(random_bytes(32));  // Secure random token
        $expires_at = date("Y-m-d H:i:s", strtotime("+1 hour"));  // Token expires in 1 hour
        
        // Insert token into password_resets table
        $sql = "INSERT INTO password_resets (email, reset_token, expires_at) 
                VALUES ('$email', '$reset_token', '$expires_at')";
        mysqli_query($conn, $sql);
        
        // Send reset email
        $reset_link = ROOT_URL . "reset-password.php?token=$reset_token";
        $subject = "Password Reset Request";
        $message = "Click here to reset your password: $reset_link";
        mail($email, $subject, $message);
        
        echo "Check your email for a password reset link.";
    } else {
        echo "No account found with that email address.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>
<body>
    <h2>Forgot Password</h2>
    <form action="forgot-password.php" method="POST">
        <input type="email" name="email" placeholder="Enter your email" required><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
