<?php
function updateVerificationCode($code, $email)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webshop";

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
        $response = ['success' => true];
    } else {
        $response = ['success' => false, 'error' => $stmt->error];
    }

    // Schließen der Anweisung und der Verbindung
    $stmt->close();
    $conn->close();

    return $response;
}
?>