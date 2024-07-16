<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management System</title>
    <style>
        .User {
        background-color:rgba(203, 222, 203, 0.5);
        width: 300px;
        border: 5px solid black;
        padding: 15px;
        margin-left: 0px;
        margin-top: 10px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
        }
        th {
            
            background-color: #04AA6D;
            color: white;
        }
        td {
            
            background-color:rgb(173, 229, 175, 0.5);
            color: black;
        }
        input[type=text], select {
            width: 100%;
            padding: 8px;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            }
            button[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            }
            body {
            background-image: url('images/wallpaper2.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
            }
    </style>
</head>
<body><h1 style="color: white; display: inline;">Update User Details</h1></body>
<?php
include('config.php');

if(isset($_GET['username'])) {
    $username = $_GET['username'];

    // Fetch user details
    $sql = "SELECT * FROM usertable WHERE username='$username'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        // Assuming there's a form to edit user details
        echo "<div class='User'>";
        echo "<form action='edit_user.php' method='post'>";
        echo "<input type='hidden' name='original_username' value='" . $row['username'] . "'>";
        echo "Username: <input type='text' name='username' value='" . $row['username'] . "'><br>";
        echo "Password: <input type='text' name='password' value='" . $row['password'] . "'><br>";
        echo "Email: <input type='text' name='email' value='" . $row['email'] . "'><br>";
        echo "Address: <input type='text' name='address' value='" . $row['address'] . "'><br>";
        echo "User Type: <input type='text' name='UserType' value='" . $row['UserType'] . "'><br>";
        echo "<button type='submit' name='submit' value='Update'>Update</button>";
        echo "</form>";
        echo "</div>";
    } else {
        echo "User not found.";
    }
} elseif(isset($_POST['submit'])) {
    $original_username = $_POST['original_username'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $UserType = $_POST['UserType'];

    // Update user details
    $sql = "UPDATE usertable SET username='$username', password='$password', email='$email', address='$address', 
    UserType='$UserType' WHERE username='$original_username'";

    if (mysqli_query($con, $sql)) {
        echo "<script>alert('User updated successfully.')</script>";
        echo "<script>location.href='admin.php'</script>";
    } else {
        echo "<script>alert('Error updating user.')</script>";
        echo "Error updating user: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>
