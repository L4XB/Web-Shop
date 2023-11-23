<?php
$searchTerm = $_GET['search'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webshop";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT * FROM products WHERE product_name LIKE ?");
$stmt->bind_param("s", $param_searchTerm);

$param_searchTerm = "%" . $searchTerm . "%";
$stmt->execute();

$result = $stmt->get_result();
$products = $result->fetch_all(MYSQLI_ASSOC);

//Producte anzeigen

?>