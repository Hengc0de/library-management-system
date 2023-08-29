<?php



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'assets/phpmailer/src/PHPmailer.php';
require 'assets/phpmailer/src/Exception.php';
require 'assets/phpmailer/src/SMTP.php';

if (isset($_POST['send'])){
    $body = $_POST['body'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = 'webclasshomework1@gmail.com';
    $mail->Password = 'nqmviikribiwyshi';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('webclasshomework1@gmail.com');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = "Username: " . $username. "<br><br> Said: " . $body;
    $mail->send();
    $_SESSION['success']="email sent successfully";
    header('location: index.php');
}