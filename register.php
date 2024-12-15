<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "users_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$bg_color = $_POST['bg_color'];
$font_color = $_POST['font_color'];

// Save user data to the database
$sql = "INSERT INTO users (username, password, bg_color, font_color) 
        VALUES ('$username', '$password', '$bg_color', '$font_color')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
