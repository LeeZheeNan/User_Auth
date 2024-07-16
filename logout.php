<?php
session_start();

// Unset all of the session variables
$_SESSION = array();
unset($_SESSION['username']);

// Destroy the session
session_unset();
session_destroy();

// Redirect to the login page or any other page you desire
header("Location: login.html");
exit();
?>
