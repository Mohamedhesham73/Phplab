<?php
session_start();

// If the user session is not active, check for cookies
if (!isset($_SESSION['username']) && isset($_COOKIE['bg_color'])) {
    echo "<body style='background-color: " . $_COOKIE['bg_color'] . "; color: " . $_COOKIE['font_color'] . ";'>";
    echo "Welcome back! Your settings have been applied.";
} else {
    echo "<body>";
    echo "Please log in.";
}
?>
