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

error_reporting(E_ALL);
ini_set('display_errors', 1);
function sendConfirmationMail($bestellnummer, $firstName, $versandArt, $transactionId)
{
    $mail = new PHPMailer(true);
    $mail->isSMTP();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webShopFSI";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Verbindung fehlgeschlagen: " . $conn->connect_error);
    }
    $sql = "SELECT history.amount, products.pathName, products.productName 
    FROM history 
    JOIN products ON history.productID = products.productID 
    WHERE history.transactionID = ?";

    // Bereiten Sie die SQL-Abfrage vor.
    $stmt = $conn->prepare($sql);

    // Binden Sie den Wert an den Platzhalter.
    $stmt->bind_param("i", $transactionId);

    // Führen Sie die Abfrage aus.
    $stmt->execute();

    // Binden Sie das Ergebnis an Variablen.
    $stmt->bind_result($amount, $productPath, $productName);

    // Initialisieren Sie die Produktliste.
    $productList = '';

    // Holen Sie die Ergebnisse.
    while ($stmt->fetch()) {
        // Erstellen Sie das Produkt-Element.
        $productElement = "<div class='media text-muted pt-3 product'>
    <img style='height: 60px;' class='img' src='cid:$productName' alt='$productName'>
    <p class='media-body pb-3 mb-0 small'><strong class='d-block text-gray-dark'>$productName</strong> Menge: $amount</p>
</div>";

        // Fügen Sie das Produkt-Element zur Produktliste hinzu.
        $productList .= $productElement;

        // Fügen Sie das Bild als eingebettetes Bild zur E-Mail hinzu
        $mail->AddEmbeddedImage("../../assets/images/produkts/$productPath.png", $productName);
    }


    // Schließen Sie die Anweisung und die Verbindung.
    $stmt->close();
    $conn->close();






    $email = "buck.lukas@icloud.com";
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
        <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' rel='stylesheet'>
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
                padding-top: 40px;
                padding-bottom: 60px;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }
    
            footer {
                background-color: #f8f9fa;
                padding: 10px;
                text-align: center;
            }
            img{
                padding-right: 30px;
                padding-left: 20px;

            }
        </style>
    </head>
    
    <body>
        <header>
            <h1>Vielen Dank fuer deine Bestellung!</h1>
            <h2>Deine Bestellnummer : <u>$bestellnummer</u></h2>
        </header>
    
        <section style='margin-left: auto;margin-right: auto;'>
            <div style='max-width: 600px; width: 100%; text-align: left;'>
                <h2>Hi $firstName,</h2>
                <p>
                    anbei findest du alle wichtigen Informationen zu deiner Bestellung!
                </p>
                <p>
                    der Versand findet ueber $versandArt statt!
                </p>
                <h4 style='padding-top: 60px;'>
                    Deine Produkte:
                </h4>
                
                $productList
                    
   
                <p style='padding-top: 60px; font-size: larger;'>Gesamtsumme: 200 Euro</p>
            </div>
    
    
        </section>
    
        <footer>
            <p>kontaktiere uns: inf.fachschaft@gmail.com | Phone: (123) 456-7890</p>
        </footer>
    </body>
    
    </html>";
    $mail->send();
    echo 'Email sent successfully';
}


sendConfirmationMail("12345", "Lukas", "DHL", 18);




?>