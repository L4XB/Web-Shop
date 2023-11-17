<?php
require '2FA.php';

function generatePassword()
{
    $length = 10;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
    $charactersLength = strlen($characters);
    $randomPassword = '';
    for ($i = 0; $i < $length; $i++) {
        $randomPassword .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomPassword;
}


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

    $passwordGeneratetd = generatePassword();
    session_start();
    $_SESSION['clearPassword'] = $passwordGeneratetd;
    $hashedPassword = hash('sha256', $passwordGeneratetd);
    $twoFASecret = createSecret();
    // Vorbereiten und Binden
    $stmt = $conn->prepare("INSERT INTO users (email, nachname, vorname, passwort,2FASecret,isVerified) VALUES (?, ?, ?, ?, ?, 'false')");
    $stmt->bind_param("sssss", $email, $name, $firstName, $hashedPassword, $twoFASecret);

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