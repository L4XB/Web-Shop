<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webShopFSI";

// Verbindung zur Datenbank herstellen
$conn = new mysqli($servername, $username, $password, $dbname);

// Überprüfen Sie, ob die Verbindung erfolgreich war
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

$currentUserId = $_SESSION['userId'];
// Löschen Sie die Daten aus der shoppingCart Tabelle für den aktuellen Benutzer
$sql = "DELETE FROM shoppingCart WHERE userID = $currentUserId";

if ($conn->query($sql) === TRUE) {
    echo "Einträge erfolgreich aus der ShoppingCart-Tabelle gelöscht.";
} else {
    echo "Fehler beim Löschen der Einträge: " . $conn->error;
}
header('Location: ../../views/homepage.php');
?>