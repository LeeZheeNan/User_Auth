

<?php 
session_start();
include('config.php');


#usage of sanitize input function for input validation purpose
function sanitize_input($data) {
    $data = trim($data); // Remove whitespace from the beginning and end of the string
    $data = stripslashes($data); // Remove backslashes (\)
    $data = htmlspecialchars($data); // Convert special characters to HTML entities
    return $data;
}

if (isset($_POST['recover'])) {
    $email = sanitize_input($_POST['email']);
    
    $sql = "SELECT * FROM usertable WHERE email=?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $token = bin2hex(random_bytes(50));
        
        $_SESSION['token'] = $token;
        $_SESSION['email'] = $email;

        require "Mail/phpmailer/PHPMailerAutoload.php";
        $mail = new PHPMailer;

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';

        $mail->Username = 'lokeesh.dinesh@gmail.com';
        $mail->Password = 'hatz sqsf wpxk ejuy';

        $mail->setFrom('lokeesh.dinesh@gmail.com', 'Password Reset');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = "Recover your password";
        $mail->Body = "<b>Dear User</b>
            <h3>We received a request to reset your password.</h3>
            <p>Kindly click the below link to reset your password</p>
            <a href='https://localhostapp.my/reset_psw.html'>Reset Password</a>
            <br><br>
            <p>With regards,</p>
            <b>Programming with Lam</b>";

        if ($mail->send()) {
            echo "<script>window.location.replace('notification.html');</script>";
        } else {
            echo "<script>alert('Invalid Email');</script>";
        }
    } else {
        echo "<script>alert('Sorry, no emails exist');</script>";
        echo "<script>location.href='recover_psw.html'</script>";
    }
}
?>