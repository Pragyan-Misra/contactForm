<!-- baqy mtfb kdzg hctv -->
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {

    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'pragyanmisra08@gmail.com';
    $mail->Password   = 'blzzbeefgqeqqzgg';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;




    $mail->setFrom('pragyanmisra08@gmail.com', 'Contact Form');
    $mail->addAddress('pragyanmisra08@gmail.com');

    $mail->Subject = "New Contact Form Message";
    $mail->Body = "Name: " . $_POST['name'] .
                  "\nEmail: " . $_POST['email'] .
                  "\nPhone: " . $_POST['phone'] .
                  "\nMessage: " . $_POST['message'];

    $mail->send();
    echo "<h2 style='color:green;text-align:center;'>Message Sent Successfully!</h2>";

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
