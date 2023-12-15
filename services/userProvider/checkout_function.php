<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webShopFSI";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}
session_start();

// Holen Sie die aktuelle Benutzer-ID
$currentUserId = $_SESSION['userId'];

// Generieren Sie eine zufällige Bestellnummer
$orderNumber = rand(1000000000, 9999999999);

$sql = "INSERT INTO transactions (timestamp, userID, orderNumber) VALUES (CURRENT_TIMESTAMP, $currentUserId, $orderNumber)";

// Führen Sie die SQL-Abfrage aus
if ($conn->query($sql) === TRUE) {
    // Holen Sie die ID des zuletzt eingefügten Datensatzes
    $last_id = $conn->insert_id;
    echo "Neuer Eintrag erfolgreich erstellt. Die Transaction ID ist: " . $last_id;
} else {
    echo "Fehler: " . $sql . "<br>" . $conn->error;
}

// Holen Sie die aktuelle Benutzer-ID
$currentUserId = $_SESSION['userId'];

// Fügen Sie alle Einträge der aktuellen Benutzer-ID aus der `shoppingCart` Tabelle in die `history` Tabelle ein
$sql = "INSERT INTO history (timestamp, amount, userID, productID, transactionID)
        SELECT CURRENT_TIMESTAMP, amount, userID, productID, $last_id
        FROM shoppingCart
        WHERE userID = $currentUserId";

if ($conn->query($sql) === TRUE) {
    echo "Einträge erfolgreich in die History-Tabelle verschoben.";
} else {
    echo "Fehler beim Verschieben der Einträge: " . $conn->error;
}

// Löschen Sie die Daten aus der `shoppingCart` Tabelle für den aktuellen Benutzer
$sql = "DELETE FROM shoppingCart WHERE userID = $currentUserId";

if ($conn->query($sql) === TRUE) {
    echo "Einträge erfolgreich aus der ShoppingCart-Tabelle gelöscht.";
} else {
    echo "Fehler beim Löschen der Einträge: " . $conn->error;
}

header('Location: ../../views/thankyou.php');

?>