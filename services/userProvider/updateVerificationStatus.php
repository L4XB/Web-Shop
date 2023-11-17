<?php

function updateVerificationStatus()
{
    // Starten der Session
    session_start();

    // Abrufen der E-Mail-Adresse aus der Session
    $email = $_SESSION['emailUser'];

    $servername = "localhost";
    $username = "root";
    $dbpassword = "";
    $dbname = "webshop";

    // Erstellen der Verbindung
    $conn = new mysqli($servername, $username, $dbpassword, $dbname);

    // Überprüfen der Verbindung
    if ($conn->connect_error) {
        die("Verbindung fehlgeschlagen: " . $conn->connect_error);
    }

    // Vorbereiten und Binden
    $stmt = $conn->prepare("UPDATE users SET isVerified = 'true' WHERE email = ?");
    $stmt->bind_param("s", $email);

    // Ausführen der Anweisung
    if ($stmt->execute()) {
        echo "Verification status updated successfully.";
    } else {
        echo "Error updating verification status: " . $stmt->error;
    }

    // Schließen der Anweisung und der Verbindung
    $stmt->close();
    $conn->close();
}
?>