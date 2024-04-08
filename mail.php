<html>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'C:\xampp2\htdocs\prggm\src\Exception.php';
require 'C:\xampp2\htdocs\prggm\src\PHPMailer.php';
require 'C:\xampp2\htdocs\prggm\src\SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $receiverEmail = $_POST['email'];
    sendEmail($receiverEmail);
}

function sendEmail($receiverEmail) {
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username   = 'indrajeetkadam305@gmail.com';   // SMTP username
        $mail->Password   = 'ovrjyysepnswubmw';    // Update with your Gmail password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('indrajeetkadam305@gmail.com', 'HELP REACHED');
        $mail->addAddress($receiverEmail);
        $mail->isHTML(true);
        $mail->Subject = 'Thanks for contacting us!';
        $mail->Body = 'Thanks for contacting us this is a generated message and if you have any query you can reply to this and I will be there within 24 hours :) <b>in bold!</b>';
        $mail->AltBody = 'Thanks for contacting us this is a generated message and if you have any query you can reply to this and I will be there within 24 hours :) <b>in bold!';
        
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
