<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\OAuth;
use League\OAuth2\Client\Provider\Google;
use League\OAuth2\Client\Grant\RefreshToken;

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include PHPMailer autoload.php and other required libraries
require 'vendor/autoload.php';
require 'services/userProvider/codeVerification.php';
require 'services/userProvider/signUp.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        session_start();
        $config = new AppConfig();

        $email = $_POST['email'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];


        // Speichern der Variable in der Session
        $_SESSION['emailUser'] = $email;


        // Konfiguration für OAuth2

        $clientId = $config->clientId;
        $clientSecret = $config->clientSecret;
        $refreshToken = $config->refreshToken;

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
            'userName' => $config->emailToSendMail,
        ]));
        $code = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $mail->addAddress("$email", 'Kunde');
        $mail->setFrom($config->emailToSendMail, $config->emailSender);
        $mail->Subject = 'Regestrierung';



        try {
            createUser($email, "", $lastName, $firstName);
            $passwordClear = $_SESSION['clearPassword'];
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
                    <h1>Wilkommen im Online-Shop der Team!</h1>
                    <h2>Dein Passwort : <u>$passwordClear</u></h2>
                </header>
            
                <section>
                    <h2>Hi $firstName,</h2>
                    <p>
                        Wir freuen uns ueber deine Anmeldung!
                    </p>
            
                    <p>
                        Jetzt musst du nur noch deinen Code auf unserer <a href='../../index.html'>Webseite</a> eingeben und schon kann es los gehen.
                    </p>
            
                    <p>Bis bald dein Team!</p>
                </section>
            
                <footer>
                    <p>kontaktiere uns:$config->emailToSendMail | Phone: </p>
                </footer>
            </body>
            </html>";
            $mail->send();
            echo 'Email sent successfully';
            print "Successfully";
        } catch (Exception $e) {
            echo 'Email could not be sent. Mailer Error: ', $mail->ErrorInfo;
            print "Error";
        }
        print "Successfully";

        header('Location: views/homepage.php');
    }
}

?>