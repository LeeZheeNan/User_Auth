<?php
include('config.php');

if(isset($_GET['username'])) {
    $username = $_GET['username'];

    // Delete user
    $sql = "DELETE FROM usertable WHERE username='$username'";

    if (mysqli_query($con, $sql)) {
        echo "<script>alert('User deleted successfully.')</script>";
        echo "<script>location.href='admin.php'</script>";
    } else {
        echo "<script>alert('Error deleting user.')</script>";
        echo "Error deleting user: " . mysqli_error($con);
    }
} else {
    echo "<script>alert('No user specified.')</script>";
}

mysqli_close($con);
?>
