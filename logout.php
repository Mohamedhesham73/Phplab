<?php
session_start();
session_destroy();

// Clear cookies
setcookie("bg_color", "", time() - 3600, "/");
setcookie("font_color", "", time() - 3600, "/");

header("Location: login.php");
exit();
?>
