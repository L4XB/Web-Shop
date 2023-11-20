<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
function isFirstLogin()
{
    //Server Connection
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
    $sql = "SELECT isFirstLogin FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    session_destroy();
    return $user['isFirstLogin'] == 1;
}


include '2fa.php';
//Server Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webshop";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashedPassword = hash('sha256', $password);
    // Vorbereiten und Binden
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND passwort = ?");
    $stmt->bind_param("ss", $username, $hashedPassword);

    // Ausführen der Anweisung
    $stmt->execute();

    // Ergebnis abrufen
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        session_start();
        $_SESSION['loggedIn'] = true;

        // Aktualisieren des lastLogIn Timestamps
        $currentTimestamp = date('Y-m-d H:i:s');
        $updateStmt = $conn->prepare("UPDATE users SET lastLogIn = ? WHERE email = ?");
        $updateStmt->bind_param("ss", $currentTimestamp, $username);
        $updateStmt->execute();
        $updateStmt->close();

        $user = $result->fetch_assoc();
        $_SESSION['name'] = $user['vorname'];
        $_SESSION['lastLogIn'] = $user['lastLogIn'];
        $_SESSION['email'] = $username;

        if (isFirstLogin()) {
            header('Location: ../../views/setNewPassword.php');
        } else {
            if (is2FAEnabled()) {
                header('Location: ../../views/check_2fa.php');
            } else {
                header('Location: ../../views/homepage.php');
            }
        }

    } else {
    }



    // Schließen der Anweisung und der Verbindung
    $stmt->close();
}
$conn->close();
?>