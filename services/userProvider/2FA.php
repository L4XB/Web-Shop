<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require realpath('/Applications/XAMPP/xamppfiles/projekte/loginTesting/vendor/autoload.php');

function createSecret()
{
    $ga = new PHPGangsta_GoogleAuthenticator();
    $secret = $ga->createSecret();
    echo "Secret is: " . $secret . "\n\n";

    return $secret;
}

function getQRCode($secret)
{
    $ga = new PHPGangsta_GoogleAuthenticator();
    $qrCodeUrl = $ga->getQRCodeGoogleUrl('INF-Webshop', $secret);

    return $qrCodeUrl;
}

function isCodeValid($secret, $oneCode)
{
    $ga = new PHPGangsta_GoogleAuthenticator();
    $checkResult = $ga->verifyCode($secret, $oneCode, 2);    // 2 = 2*30sec clock tolerance
    if ($checkResult) {
        return true;
    } else {
        return false;
    }
}

function get2FASecret()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webshop";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Verbindung fehlgeschlagen: " . $conn->connect_error);
    }
    session_start();

    $email = $_SESSION['email'];
    // Vorbereiten der SQL-Anweisung
    $stmt = $conn->prepare("SELECT 2FASecret FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);

    // Ausführen der Anweisung
    $stmt->execute();

    // Ergebnisse abrufen
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $stmt->close(); // Close the statement
        $conn->close(); // Close the connection
        return $user['2FASecret'];
    } else {
        $stmt->close(); // Close the statement
        $conn->close(); // Close the connection
        return null;
    }
}

function enable2FA()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webshop";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Verbindung fehlgeschlagen: " . $conn->connect_error);
    }
    session_start();

    $email = $_SESSION['email'];
    $sql = "UPDATE users SET use2FA = true WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $email);
    $stmt->execute();
}

function is2FAEnabled()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webshop";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Verbindung fehlgeschlagen: " . $conn->connect_error);
    }
    session_start();

    $email = $_SESSION['email'];
    $sql = "SELECT use2FA FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    return $user['use2FA'];
}


?>