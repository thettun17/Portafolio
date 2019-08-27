<?php
$email = $_POST['email'];
$route = $_POST['route'];
use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
// Load Composer's autoloader
require 'vendor/autoload.php';
$mail = new PHPMailer;
//Enable SMTP debugging.
$mail->SMTPDebug = 4;
//Set PHPMailer to use SMTP.
$mail->isSMTP();
//Set SMTP host name
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";
//Set TCP port to connect to
$mail->Port     = 587;
$mail->Username = "kingofwildanimals@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "tzjnfmcrxcicuigx";
$mail->From     = "kingofwildanimals@gmial.com";
$mail->FromName = "Full Name";
$mail->addAddress("thettun1741997@gmail.com", "Recepient Name");
$mail->isHTML(true);
$mail->Subject = "Subject Text";
$mail->Body    = "<i>$email</i>";
if (!$mail->send()) {
	echo "Mailer Error: ".$mail->ErrorInfo;
} else {
	header("Location: $route");
}