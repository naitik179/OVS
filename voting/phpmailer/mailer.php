<?php
session_start();


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
if (isset($_SESSION['userid'])) {
    try {
    //Server settings
     $mail->SMTPDebug = 1 ;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'onlinevotingsystem91@gmail.com';                     // SMTP username
    $mail->Password   = 'Ovs12345@';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    //Recipients
    $mail->setFrom('onlinevotingsystem91@gmail.com','Online Voting System');
    $mail->addAddress($_SESSION['email_id']);     
    $mail->isHTML(true);        
    $x = rand(1000,9999);
    $mail->Subject = 'OTP for Online Voting';
    $mail->Body    = 'Your OTP is '.$x;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    $_SESSION['OTP']=$x;
    header('Location: http://localhost:8000/OVS/OTP.php');
} catch (Exception $e) {
    header('Location: http://localhost:8000/OVS/Login.php');
}
}
else
{
    header('Location: http://localhost:8000/OVS/Login.php');
}

?>