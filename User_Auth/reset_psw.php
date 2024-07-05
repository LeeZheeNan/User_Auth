<?php
session_start();
include('config.php');

function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST["reset"])) {
    $psw = sanitize_input($_POST["password"]);

    // Check if session variables are set
    if (isset($_SESSION['token']) && isset($_SESSION['email'])) {
        $token = $_SESSION['token'];
        $email = $_SESSION['email'];

        $sql = "SELECT * FROM usertable WHERE email=?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            $hash = password_hash($psw, PASSWORD_DEFAULT);
            $sql1 = "UPDATE usertable SET password=? WHERE email=?";
            $stmt1 = mysqli_prepare($con, $sql1);
            mysqli_stmt_bind_param($stmt1, "ss", $hash, $email);
            mysqli_stmt_execute($stmt1);
            
            echo "<script>alert('Your password has been successfully reset'); window.location.replace('login.html');</script>";
        } else {
            echo "<script>alert('Please try again');</script>";
        }
    } else {
        echo "<script>alert('Session expired. Please request a new password reset.');</script>";
    }
}
?>







<?php
/*

    if(isset($_POST["reset"])){
        include('config.php');
        
        $psw = $_POST["password"];

        $token = $_SESSION['token'];
        $Email = $_SESSION['email'];

        $hash = password_hash( $psw , PASSWORD_DEFAULT );

        $sql = mysqli_query($con, "SELECT * FROM Student WHERE email='$Email'");
        $query = mysqli_num_rows($sql);
  	    $fetch = mysqli_fetch_assoc($sql);

        if($Email){
            $new_pass = $hash;
            mysqli_query($con, "UPDATE Student SET password='$new_pass' WHERE email='$Email'");
            ?>
            <script>
                window.location.replace("login.html");
                alert("<?php echo "your password has been succesful reset"?>");
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("<?php echo "Please try again"?>");
            </script>
            <?php
        }
    }
*/
?>

