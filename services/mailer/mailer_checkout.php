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
function sendConfirmationMail($bestellnummer, $versandArt, $transactionId, $gesamtbetrag, $name, $email)
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
    $sql = "SELECT SUM(history.amount) AS totalAmount, products.pathName, products.productName 
            FROM history 
            JOIN products ON history.productID = products.productID 
            WHERE history.transactionID = ?
            GROUP BY products.productID";

    // Bereiten Sie die SQL-Abfrage vor.
    $stmt = $conn->prepare($sql);

    // Binden Sie den Wert an den Platzhalter.
    $stmt->bind_param("i", $transactionId);

    // Führen Sie die Abfrage aus.
    $stmt->execute();

    // Binden Sie das Ergebnis an Variablen.
    $stmt->bind_result($totalAmount, $productPath, $productName);

    // Initialisieren Sie die Produktliste.
    $productList = '';

    // Holen Sie die Ergebnisse.
    while ($stmt->fetch()) {
        // Erstellen Sie das Produkt-Element.
        $productElement = "<div class='media text-muted pt-3 product'>
<img style='height: 60px;' class='img' src='cid:$productPath' alt='$productName'>
<p class='media-body pb-3 mb-0 small'><strong class='d-block text-gray-dark'>$productName</strong> Menge: $totalAmount</p>
</div>";

        // Fügen Sie das Produkt-Element zur Produktliste hinzu.
        $productList .= $productElement;

        // Fügen Sie das Bild als eingebettetes Bild zur E-Mail hinzu
        $mail->AddEmbeddedImage("../../assets/images/produkts/$productPath.png", $productPath);
    }


    // Schließen Sie die Anweisung und die Verbindung.
    $stmt->close();
    $conn->close();







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

    $mail->setOAuth(new OAuth([
        'provider' => $provider,
        'clientId' => $clientId,
        'clientSecret' => $clientSecret,
        'refreshToken' => $refreshToken,
        'userName' => 'inf.fachschaft@gmail.com',
    ]));
    $mail->addAddress("$email", "$name");
    /*$mail->addAddress('moenchstalweg@gmail.com', 'Jochum');*/

    $mail->setFrom('inf.fachschaft@gmail.com', 'Fachschaft INF');
    $mail->Subject = 'Bestellung';
    session_start();


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
            <h1>Vielen Dank f&uuml;r deine Bestellung!</h1>
            <h2>Deine Bestellnummer : <u>$bestellnummer</u></h2>
        </header>
    
        <section style='margin-left: auto;margin-right: auto;'>
            <div style='max-width: 600px; width: 100%; text-align: left;'>
                <h2>Hi $name,</h2>
                <p>
                    anbei findest du alle wichtigen Informationen zu deiner Bestellung!
                </p>
                <p>
                    der Versand findet &uuml;ber $versandArt statt!
                </p>
                <h4 style='padding-top: 60px;'>
                    Deine Produkte:
                </h4>
                
                $productList
                    
   
                <p style='padding-top: 60px; font-size: larger;'>Gesamtsumme: $gesamtbetrag Euro</p>
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




?>