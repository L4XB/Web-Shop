<?php
// Serververbindung
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webShopFSI";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

// Daten aus dem POST-Request holen
$productId = $_POST['productId'];
$userId = $_POST['userId'];
$amount = $_POST['amount'];

// SQL-Abfrage, um die Anzahl des Produkts zu aktualisieren
$stmt = $conn->prepare("UPDATE shoppingCart SET amount = ? WHERE productID = ? AND userID = ?");
$stmt->bind_param("iii", $amount, $productId, $userId);

if ($stmt->execute()) {
    echo "Anzahl erfolgreich aktualisiert";
} else {
    echo "Fehler beim Aktualisieren der Anzahl: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>