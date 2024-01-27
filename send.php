<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// require 'PHPMailer/src/Exception.php';
// require 'PHPMailer/src/PHPMailer.php';
// require 'PHPMailer/src/SMTP.php';

require 'vendor/autoload.php';

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF; // Enable verbose debug output (set to DEBUG_OFF for production)
    $mail->isSMTP();                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify SMTP server
    $mail->SMTPAuth = true;               // Enable SMTP authentication
    $mail->Username = 'tusharsharmabtc6@gmail.com';    // SMTP username
    $mail->Password = 'ultwvcmtnxwxgiil';    // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port = 465;                 // TCP port to connect to


    //Recipients
    $mail->setFrom($_POST["email"], $_POST["name"]);
    $mail->addAddress('tusharsharmabtc6@gmail.com');     // Add a recipient


    // Content
    $mail->isHTML(true);  // Set email format to HTML
    $mail->Subject = $_POST["subject"];
    $mail->Body = $_POST["message"];
    $mail->send();


    //Recipients
    $mail->setFrom('tusharsharmabtc6@gmail.com');
    $mail->addAddress($_POST["email"], $_POST["name"]);     // Add a recipient


    // Content
    $mail->isHTML(true);  // Set email format to HTML
    $mail->Subject = 'Confirmation Mail';
    $mail->Body = '
<div style="background-color: darkgoldenrod;border-radius: 100px">
<div style="background-color:black;color:white;margin: 1cm; height: 8cm;margin-top: 2cm;padding-top: 2cm;border-radius: 100px;">
    <h1 style="font-weight:400 ;text-align: center;">Thank You</h1><h2 style="font-weight:400 ;text-align: center;">for contacting us!</h2><br>
    <p style="font-weight:400 ;text-align: center;">We have received your message <br> We will reach you out immediately! </p>
    </div>
</div>

';
    $mail->send();
    echo
        "
    <script> 
    
    alert('Mail Sent Successfully'); 
    document.location.href = 'index.html';
    </script> ";

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

