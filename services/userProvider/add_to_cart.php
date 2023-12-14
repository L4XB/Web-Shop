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

// SQL-Abfrage, um die Daten in die Tabelle einzufügen
$stmt = $conn->prepare("INSERT INTO shoppingCart (productID, userID, amount) VALUES (?, ?, ?)");
$stmt->bind_param("iii", $productId, $userId, $amount);

if ($stmt->execute()) {
    echo "Produkt erfolgreich zum Warenkorb hinzugefügt";
} else {
    echo "Fehler beim Hinzufügen des Produkts zum Warenkorb: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>