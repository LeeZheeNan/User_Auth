<?php

include('config.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$address = $_POST['address'];
$UserType = $_POST['Utype'];

$pass = password_hash($password, PASSWORD_DEFAULT);
   
    $sql = "INSERT INTO usertable (username, password, email, address, UserType) VALUES 
            ('$username','$pass', '$email', '$address', '$UserType')";
    
    if (mysqli_query($con, $sql)) {
        echo "<script>alert('New user added successfully')</script>";
        echo "<script>location.href='admin.php'</script>";
    } else {
        echo "<script>alert('Your data is not added successfully')</script>";
        echo "<script>location.href='admin.php'</script>";
    }
    
    mysqli_close($con);
}
?>
