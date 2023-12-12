<?php
function updateVerificationCode($code, $email)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webShopFSI";

    // Erstellen der Verbindung
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Überprüfen der Verbindung
    if ($conn->connect_error) {
        die("Verbindung fehlgeschlagen: " . $conn->connect_error);
    }

    // Vorbereiten und Binden
    $stmt = $conn->prepare("UPDATE users SET verificationCode = ? WHERE email = ?");
    $stmt->bind_param("ss", $code, $email);

    // Ausführen der Anweisung
    if ($stmt->execute()) {
        echo "Verification code updated successfully.";
    } else {
        echo "Error updating verification code: " . $stmt->error;
    }

    // Schließen der Anweisung und der Verbindung
    $stmt->close();
    $conn->close();
}
?>