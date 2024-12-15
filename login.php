<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "users_db");

// Get user input
$username = $_POST['username'];
$password = $_POST['password'];

// Fetch user data
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        // Set cookies for user settings
        setcookie("bg_color", $user['bg_color'], time() + (86400 * 30), "/");
        setcookie("font_color", $user['font_color'], time() + (86400 * 30), "/");

        // Start session
        session_start();
        $_SESSION['username'] = $username;
        echo "Login successful!";
    } else {
        echo "Incorrect password.";
    }
} else {
    echo "User not found.";
}

$conn->close();
?>
