<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use League\OAuth2\Client\Provider\Google;
use League\OAuth2\Client\Grant\RefreshToken;

// Include PHPMailer autoload.php and other required libraries

// Konfiguration für OAuth2
error_reporting(E_ALL);
ini_set('display_errors', 1);
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
$mail->Port = 465;
$mail->AuthType = 'XOAUTH2';
$mail->oauthUserEmail = 'inf.fachschaft@gmail.com';
$mail->oauthClientId = $clientId;
$mail->oauthClientSecret = $clientSecret;
$mail->oauthRefreshToken = $refreshToken;
$mail->oauthProvider = $provider;
$mail->addAddress('Lukas.Buck@e-mail.de', 'Lukas');
$mail->setFrom('inf.fachschaft@gmail.com', 'Fach');
$mail->Subject = 'Subject of the Email';
$mail->Body = 'Body of the Email';

try {
    $mail->send();
    echo 'Email sent successfully';
} catch (Exception $e) {
    echo 'Email could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

?>