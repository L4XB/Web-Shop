<?php
function createUser($email, $name, $firstName, $password)
{
    $servername = "localhost";
    $username = "root";
    $dbpassword = ""; // Ändern Sie den Variablennamen, um Konflikte zu vermeiden
    $dbname = "webshop";

    // Erstellen der Verbindung
    $conn = new mysqli($servername, $username, $dbpassword, $dbname);

    // Überprüfen der Verbindung
    if ($conn->connect_error) {
        die("Verbindung fehlgeschlagen: " . $conn->connect_error);
    }
    // Vorbereiten und Binden
    $stmt = $conn->prepare("INSERT INTO users (email, nachname, vorname, passwort, isVerified) VALUES (?, ?, ?, ?, 'false')");
    $stmt->bind_param("ssss", $email, $name, $firstName, $password);

    // Ausführen der Anweisung
    if ($stmt->execute()) {
        echo "New user created successfully.";
    } else {
        echo "Error creating user: " . $stmt->error;
    }

    // Schließen der Anweisung und der Verbindung
    $stmt->close();
    $conn->close();
}
?>