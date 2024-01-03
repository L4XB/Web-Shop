<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webShopFSI";

$conn = new mysqli($servername, $username, $password, $dbname);

// Überprüfen Sie die Verbindung
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

// Lesen Sie den Wert aus dem POST-Parameter
$discountCode = $_POST['discountCode'];

// Bereiten Sie die SQL-Anweisung vor
$stmt = $conn->prepare("SELECT discountInPercent FROM discount WHERE discountCode = ?");
$stmt->bind_param('s', $discountCode);

// Führen Sie die SQL-Anweisung aus
$stmt->execute();
$result = $stmt->get_result();

// Überprüfen Sie das Ergebnis
if ($result->num_rows > 0) {
    // Wenn der Code existiert, geben Sie den Wert von discountInPercent zurück
    $row = $result->fetch_assoc();
    echo $row['discountInPercent'];
} else {
    // Wenn der Code nicht existiert, geben Sie 0 zurück
    echo 0;
}

// Schließen Sie die Verbindung
$stmt->close();
$conn->close();
?>