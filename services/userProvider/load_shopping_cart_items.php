<?php

session_start();

// Stellen Sie sicher, dass die Benutzer-ID in der Session gespeichert ist
if (!isset($_SESSION['userId'])) {
    die("Benutzer-ID nicht gefunden");
}

$userId = $_SESSION['userId'];

// Serververbindung
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webShopFSI";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

// SQL-Abfrage, um die Produkte zu laden und doppelte Einträge zusammenzufassen
$sql = "SELECT p.productName, p.description, p.price, s.productID, p.pathName, SUM(s.amount) as amount 
        FROM shoppingCart s 
        JOIN products p ON s.productID = p.productID
        WHERE s.userID = ? 
        GROUP BY s.productID";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    // Hier können Sie den HTML-Code für jedes Produkt ausgeben
    echo '<div class="row">';
    echo '<div class="col-2"></div>';
    echo '<div class="col-1" style="justify-content: center; align-items: center; display: flex; border-bottom: solid; border-width:thin; border-color: lightgrey;">';
    echo '<button class="delete"><img src="../database/images/trash.png" style="height: 30%;"></button>';
    echo '</div>';
    echo '<div class="col-1" style="justify-content: right; align-items: center; display: flex; border-bottom: solid; border-width:thin; border-color: lightgrey;">';
    echo '<img style="height:45px;" src="../assets/images/produkts/' . $row['pathName'] . '.png">';
    echo '</div>';
    echo '<div class="col-2" style="border-bottom: solid; border-width:thin; border-color: lightgrey;">';
    echo '<p class="light-text">' . $row['productName'] . '</p>';
    echo '<p class="text">' . $row['description'] . '</p>';
    echo '</div>';
    echo '<div class="col-2" style="justify-content: center; align-items: center; display: flex; border-bottom: solid; border-width:thin; border-color: lightgrey;">';
    echo '<div id="counter">';
    echo '<div id="minus">-</div>';
    echo '<div id="number">' . $row['amount'] . '</div>';
    echo '<div id="plus">+</div>';
    echo '</div>';
    echo '</div>';
    echo '<div class="col-1" style="justify-content: right; align-items: center; display: flex; border-bottom: solid; border-width:thin; border-color: lightgrey;">';
    echo '<p>' . $row['price'] . ' €</p>';
    echo '</div>';
    echo '<div class="col-2"></div>';
    echo '</div>';
}

$stmt->close();
$conn->close();
?>