<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../private/controllers/PHPMailer/src/Exception.php';
require '../private/controllers/PHPMailer/src/PHPMailer.php';
require '../private/controllers/PHPMailer/src/SMTP.php';

function send_mail($recipient, $subject, $message)
{
  $mail = new PHPMailer(true);

  try {
    $mail->isSMTP(); //send using smtp

    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = TRUE;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAutoTLS = false;

    $mail->Port = 587;

    $mail->Host = "smtp.gmail.com";
    $mail->Username = "recycohub@gmail.com";
    $mail->Password = "aczckubuyhhptoha";

    $mail->isHTML();
    $mail->addAddress($recipient, $subject);
    $mail->setFrom("recycohub@gmail.com", "Recycohub");
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->send();
    return true;

  } catch (Exception $e) { //unsuccessful
    // echo $e;
    // die;
    return false;
  }
}

?>