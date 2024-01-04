<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\OAuth;
use League\OAuth2\Client\Provider\Google;
use League\OAuth2\Client\Grant\RefreshToken;

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include PHPMailer autoload.php and other required libraries
require '../../vendor/autoload.php';
session_start();

// Abrufen der Variable aus der Sessio
$userMail = $_POST['username'];
$_SESSION['emailUser'] = $userMail;
$_SESSION['email'] = $userMail;
$userMail = $_SESSION['email'];

$mail = new PHPMailer(true);
$mail->isSMTP();
$clientId = '851169708159-jbgg5qsegn64hkh0qh8flb0kskt3muii.apps.googleusercontent.com';
$clientSecret = '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';
$refreshToken = '1//09JfiyNKe6i5DCgYIARAAGAkSNwF-L9Ir0v835pgjloCraX7LXwIjfyY3grjCe0oDc83Q9fFCucNQK96ozBrDvFb953arCpg-vnI';

$provider = new Google([
    'clientId' => $clientId,
    'clientSecret' => $clientSecret,
]);

$grant = new RefreshToken();
$token = $provider->getAccessToken($grant, ['refresh_token' => $refreshToken]);

// Konfiguration für PHPMailer

$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587; // Port should be 587 for TLS
$mail->AuthType = 'XOAUTH2';
$mail->isHTML(true);
$mail->CharSet = 'UTF-8';

$mail->setOAuth(new OAuth([
    'provider' => $provider,
    'clientId' => $clientId,
    'clientSecret' => $clientSecret,
    'refreshToken' => $refreshToken,
    'userName' => 'inf.fachschaft@gmail.com',
]));
$mail->addAddress($userMail, "Kunde");
/*$mail->addAddress('moenchstalweg@gmail.com', 'Jochum');*/

$mail->setFrom('inf.fachschaft@gmail.com', 'Fachschaft INF');
$mail->Subject = 'Passwort zurücksetzen';
session_start();


$code = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);


updateResetCode($userMail, $code);
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
                        background-color: rgb(247, 188, 26);
                        color: #000000;
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
                    <img height='90px' src='../../assets/images/inf-logo.png' alt=''>
                    <h1>Hey, unten findest du dein Code um dein Passwort zurückzusetzen!</h1>
                    <h2>Dein Code : <u>$code</u></h2>
                </header>
            
            
                <footer>
                    <p>kontaktiere uns: inf.fachschaft@gmail.com | Phone: (123) 456-7890</p>
                </footer>
            </body>
            </html>";
$mail->send();
header('Location: ../../views/reset_password/enter_code.php');



function updateResetCode($mail, $code)
{

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webShopFSI";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Verbindung fehlgeschlagen: " . $conn->connect_error);
    }

    // Bereiten Sie die SQL-Anweisung vor
    $stmt = $conn->prepare("UPDATE users SET resetCode = ? WHERE email = ?");
    $stmt->bind_param('ss', $code, $mail);

    // Führen Sie die SQL-Anweisung aus
    if ($stmt->execute()) {
        echo "Reset-Code erfolgreich aktualisiert.";
    } else {
        echo "Fehler beim Aktualisieren des Reset-Codes: " . $stmt->error;
    }

    // Schließen Sie die Verbindung
    $stmt->close();
    $conn->close();
}
?>