<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\OAuth;
use League\OAuth2\Client\Provider\Google;
use League\OAuth2\Client\Grant\RefreshToken;

// Include PHPMailer autoload.php and other required libraries
require 'vendor/autoload.php';

// Konfiguration für OAuth2
$clientId = '851169708159-jbgg5qsegn64hkh0qh8flb0kskt3muii.apps.googleusercontent.com';
$clientSecret = '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';
$refreshToken = '1//09GrOaCu_rtKsCgYIARAAGAkSNwF-L9Iru4Y9uwphWk9YEYL_oi7KEjocFwBeLlyQkPsMoA9YyqcJmcrrsu2M4yEg7Gt-eW50VLQ';

$provider = new Google([
    'clientId' => $clientId,
    'clientSecret' => $clientSecret,
]);

$grant = new RefreshToken();
$token = $provider->getAccessToken($grant, ['refresh_token' => $refreshToken]);

// Konfiguration für PHPMailer
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587; // Port should be 587 for TLS
$mail->AuthType = 'XOAUTH2';
$mail->isHTML(true);

$mail->setOAuth(new OAuth([
    'provider' => $provider,
    'clientId' => $clientId,
    'clientSecret' => $clientSecret,
    'refreshToken' => $refreshToken,
    'userName' => 'inf.fachschaft@gmail.com',
]));
$code = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
$mail->addAddress('moenchstalweg@gmail.com', 'Jochum');
$mail->setFrom('inf.fachschaft@gmail.com', 'Fach');
$mail->Subject = 'Subject of the Email';
$mail->Body = "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Your Business Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #007bff;
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }
        section {
            padding: 20px;
        }
        footer {
            background-color: #f8f9fa;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <h1>Your Business Name</h1>
        <p>Welcome to our business!</p>
    </header>

    <section>
        <h2>Dear [Recipient],</h2>
        <p>
            We hope this email finds you well. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Nullam sed lorem ac est posuere facilisis vel eu lorem. Integer in ex et libero commodo
            fringilla a nec velit.
        </p>

        <p>
            Sed tincidunt nisi et facilisis ullamcorper. Mauris nec augue nec orci tincidunt vestibulum.
            Fusce sed fermentum mauris. In hac habitasse platea dictumst. Ut auctor tristique elit,
            nec condimentum orci tempor ac.
        </p>

        <p>
            Proin sit amet justo vel purus facilisis rhoncus. Integer auctor massa at ante tincidunt,
            vel blandit sapien efficitur. Suspendisse potenti. Vestibulum euismod ex vel dapibus lacinia.
        </p>

        <p>Thank you for choosing us!</p>
    </section>

    <footer>
        <p>Contact us: contact@example.com | Phone: (123) 456-7890</p>
    </footer>
</body>
</html>";

try {

    $mail->send();
    echo 'Email sent successfully';
} catch (Exception $e) {
    echo 'Email could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

?>