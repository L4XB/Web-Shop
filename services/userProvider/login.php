<?php
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
        $response = ['success' => true];
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
    } else {
        $response = ['success' => false];
    }

    header('Content-Type: application/json');
    echo json_encode($response);

    // Schließen der Anweisung und der Verbindung
    $stmt->close();
}
$conn->close();
?>