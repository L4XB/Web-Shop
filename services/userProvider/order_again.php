<?php
// Starten Sie die Session
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
$currentUserId = $_SESSION['userId'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webShopFSI";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}
// Stellen Sie sicher, dass eine Transaktions-ID übergeben wurde

$sql = "DELETE FROM shoppingCart WHERE userID = $currentUserId";

// Führen Sie die SQL-Abfrage aus
if ($conn->query($sql) === TRUE) {
    echo "Einträge erfolgreich gelöscht.";
} else {
    echo "Fehler beim Löschen der Einträge: " . $conn->error;
}
// Holen Sie die übergebene Transaktions-ID
$transactionId = $_POST['transactionId'];

echo '<script type="text/javascript">';
echo 'alert("Transaktions-ID: ' . $transactionId . '");';
echo '</script>';



// Erstellen Sie eine SQL-Abfrage, um alle Produkte für die gegebene Transaktions-ID zu holen
$sql = "SELECT * FROM history WHERE transactionID = $transactionId";

// Führen Sie die SQL-Abfrage aus
$result = $conn->query($sql);

// Überprüfen Sie, ob die Abfrage erfolgreich war
if ($result->num_rows > 0) {
    // Durchlaufen Sie jede Zeile im Ergebnis
    while ($row = $result->fetch_assoc()) {
        // Extrahieren Sie die Produkt-ID und die Menge aus der Zeile
        $productId = $row['productID'];
        $amount = $row['amount'];

        // Erstellen Sie eine SQL-Abfrage, um das Produkt und die Menge zur shoppingCart Tabelle hinzuzufügen
        $sql = "INSERT INTO shoppingCart (userID, productID, amount) VALUES ($currentUserId, $productId, $amount)";

        // Führen Sie die SQL-Abfrage aus
        if ($conn->query($sql) === TRUE) {
            echo "Produkt erfolgreich zum Warenkorb hinzugefügt.";
        } else {
            echo "Fehler beim Hinzufügen des Produkts zum Warenkorb: " . $conn->error;
        }
    }
    header('Location: ../../views/checkout.php');
} else {
    echo "Keine Produkte für diese Transaktions-ID gefunden.";
}
?>