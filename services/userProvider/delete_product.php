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

// SQL-Abfrage, um das Produkt zu löschen
$stmt = $conn->prepare("DELETE FROM shoppingCart WHERE productID = ? AND userID = ?");
$stmt->bind_param("ii", $productId, $userId);

if ($stmt->execute()) {
    echo "Produkt erfolgreich aus dem Warenkorb entfernt";
} else {
    echo "Fehler beim Entfernen des Produkts aus dem Warenkorb: " . $stmt->error;
}

$stmt->close();
$conn->close();
header("Location: ../../views/warenkorb.php"); // Leitet den Benutzer zur shoppingcart.php Seite um
exit;
?>