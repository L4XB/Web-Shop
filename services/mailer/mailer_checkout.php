<?php
$email = "Lukas.Buck@e-mail.de";
$clientId = '851169708159-jbgg5qsegn64hkh0qh8flb0kskt3muii.apps.googleusercontent.com';
$clientSecret = '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';
$refreshToken = '1//090tMqvvfmX7oCgYIARAAGAkSNwF-L9IrZAs5Q_Z7y7TcozSIVO6b15aFwUas2SkmdeQTkuvKEK0BfxVRbX55tt6bcyNZb_izpbQ';

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
$mail->addAddress("$email", 'Lukas');
$mail->addAddress('moenchstalweg@gmail.com', 'Jochum');
$mail->setFrom('inf.fachschaft@gmail.com', 'Fachschaft INF');
$mail->Subject = 'Regestrierung';
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
        <h1>Wilkommen im Online-Shop der Fachschaft Informatik!</h1>
        <h2>Dein Passwort : <u>123</u></h2>
    </header>

    <section>
        <h2>Hi 123,</h2>
        <p>
            Wir freuen uns ueber deine Anmeldung!
        </p>

        <p>
            Jetzt musst du nur noch deinen Code auf unserer <a href='../../index.html'>Webseite</a> eingeben und schon kann es los gehen.
        </p>

        <p>Bis bald dein Fachschaftsteam!</p>
    </section>

    <footer>
        <p>kontaktiere uns: inf.fachschaft@gmail.com | Phone: (123) 456-7890</p>
    </footer>
</body>
</html>";
$mail->send();
echo 'Email sent successfully';
?>