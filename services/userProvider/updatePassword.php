<?php
include '2fa.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

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
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($newPassword === $confirmPassword) {
        $hashedPassword = hash('sha256', $newPassword);
        session_start();
        $_SESSION['loggedIn'] = true;
        $sql = "UPDATE users SET passwort = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $hashedPassword, $_SESSION['email']);
        $stmt->execute();

        $sql = "UPDATE users SET isFirstLogin = false WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $_SESSION['email']);
        $stmt->execute();

        session_destroy();

        echo "Passwort erfolgreich aktualisiert.";
        if (is2FAEnabled()) {
            header('Location: ../../views/check_2fa.php');
        } else {
            header('Location: ../../views/homepage.php');
        }
    } else {
        echo "Die Passwörter stimmen nicht überein.";
    }
}
?>