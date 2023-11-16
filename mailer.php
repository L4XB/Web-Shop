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
$mail->Body = $code;

try {
    $mail->send();
    echo 'Email sent successfully';
} catch (Exception $e) {
    echo 'Email could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

?>