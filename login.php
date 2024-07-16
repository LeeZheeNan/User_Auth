<?php
// Start up your PHP Session
session_start();
require_once 'session.php';
include('config.php');


# Usage of sanitize input function for input validation purpose
function sanitize_input($data) {
    $data = trim($data); // Remove whitespace from the beginning and end of the string
    $data = stripslashes($data); // Remove backslashes (\)
    $data = htmlspecialchars($data); // Convert special characters to HTML entities
    return $data;
}

$username = sanitize_input($_POST['username']);
$password = sanitize_input($_POST['password']);
$UserType = sanitize_input($_POST['Utype']);

$sql = "SELECT * FROM usertable WHERE username= ? AND UserType= ?";

# Using mysqli parameterized statement
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "ss", $username, $UserType);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);

if ($row) {
    # Password hash verification
    if (password_verify($password, $row['password'])) {
        $_SESSION["Login"] = "YES";
        $_SESSION['username'] = $username;

        if ($UserType == "Admin") {
            header("Location: admin.php");
        } else if ($UserType == "Customer") {
            header("Location: order.html");
        } else {
            echo "<script>alert('Invalid User Type')</script>";
            echo "<script>location.href='login.html'</script>";
        }
    } else {
        $_SESSION["Login"] = "NO";
        echo "<script>alert('Incorrect username or password')</script>";
        echo "<script>location.href='login.html'</script>";
    }
} else {
    $_SESSION["Login"] = "NO";
    echo "<script>alert('You are not correctly logged in')</script>";
    echo "<script>location.href='login.html'</script>";
}

mysqli_stmt_close($stmt);
?>


















<?php
// Start up your PHP Session
session_start();
/*
include('config.php');
?>


<?php

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM Student WHERE username='$username' and password='$password'";

$result = mysqli_query($con, $sql);
$rows = mysqli_fetch_array($result);
#$user_name = $rows['username'];
#$user_pass = $rows['password'];



$count = mysqli_num_rows($result);


if ($count == 1) {

    $_SESSION["Login"] = "YES";

    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
  

    header("Location: hello.php");

} else {

    $_SESSION["Login"] = "NO";

    echo "<script>alert('You are not correctly log in')</script>";
    echo "<script>location.href='login.html'</script>";
}
*/
?>
