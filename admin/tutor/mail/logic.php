<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';

$name = "Nombre el correo";
$emailAddr = $_GET['email'];
$usuario = $_GET['usuario'];

$comment = "<a href= \"http://localhost/Guarderia/admin/tutor/agregar-usuario.php?email=$emailAddr&usuario=$usuario\">ingresa a Sunnyside </a><p>";
$subject = "Iniciate con SunnySide ";

// Send mail
$mail = new PHPMailer();
$mail->IsSMTP(); // telling the class to use SMTP

// Tus credenciales de mailtrap o gmail
$mail->SMTPAuth = true;            // enable SMTP authentication
$mail->Host = "smtp.gmail.com"; // SMTP server
$mail->Username = "ssunnyside2018@gmail.com";
$mail->Password = "sunnyside123";
$mail->Port = 587; // cambiar por el puerto de smtp de gmail

$mail->From = "ssunnyside2018@gmail.com";
$mail->FromName = "SunnySide";
$mail->Subject = $subject;
$mail->MsgHTML("<h1>".$comment."<br />");
$mail->AddAddress($emailAddr, $name);

//$mail->AddAttachment("images/phpmailer.gif");             // attachment

$response= NULL;
if(!$mail->Send()) {
    $response = "Mailer Error: " . $mail->ErrorInfo;
} else {
    $response = "Message sent!";

            header("Location: ../../index.php ");
}

$output = json_encode(array("response" => $response));
header('content-type: application/json; charset=utf-8');

echo($output);
?>
