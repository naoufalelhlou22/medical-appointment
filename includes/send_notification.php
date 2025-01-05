<?php
require_once __DIR__ . '/../vendor/autoload.php';

// Load environment variables from the root of your project
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..'); // Going one directory up to the root
$dotenv->load();


// Access the Gmail credentials from the environment
$gmailUsername = $_ENV['GMAIL_USERNAME'];
$gmailAppPassword = $_ENV['GMAIL_APP_PASSWORD'];

// PHPMailer code to send email using Gmail SMTP
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = $gmailUsername;
    $mail->Password   = $gmailAppPassword;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    //Recipients
    $mail->setFrom($gmailUsername, 'Naoufal El Hlou');
    $mail->addAddress('naoufalelhlou@gmail.com');  // Recipient's email

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Test Email';
    $mail->Body    = 'This is a test email sent using PHPMailer with environment variables.';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
