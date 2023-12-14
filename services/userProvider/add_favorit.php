<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
function addNewFavorite($productId, $userId)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webShopFSI";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Verbindung fehlgeschlagen: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO favorites (userID, productID) VALUES (?, ?)");
    $stmt->bind_param("ii", $userId, $productId);

    if ($stmt->execute()) {
    } else {
        echo "Fehler beim Hinzufügen des Favoriten: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}


addNewFavorite($_POST['productId'], $_SESSION['userId']);

?>