<?php

include('config.php')

?>

<?php

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$address = $_POST['address'];
$UserType = $_POST['Utype'];

#password hashing
$pass = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO usertable (username, password, email, address, UserType) VALUES 
('$username','$pass', '$email', '$address', '$UserType')";

$result = mysqli_query($con, $sql);

if($result){
    echo "<script>alert('Your data saved successfully')</script>";
    echo "<script>location.href='login.html'</script>";
    exit;
}


