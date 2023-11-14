<?php
//Server Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webshop";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
} else {

}

/////////////////
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// Überprüfen, ob Ergebnisse vorhanden sind
if ($result->num_rows > 0) {
    // Produkte in Produktkarten anzeigen
    echo '<div class="product-container">';
    while ($row = $result->fetch_assoc()) {
        echo '<div class="product-card-text">';
        echo '<div class="product-card">';

        echo '<img id="product_images" src="' . $row['product_image'] . '" alt="">';
        echo "<div id='add-to-cart-button'></div>";
        echo "<div id='add-to-cart-wishlist'></div>";
        echo '</div>';

        echo '<h2 style="color:black;">' . $row['product_name'] . '</h2>';
        echo '<h1>' . $row['price'] . ' €</h1>';
        echo '<p>zzgl. Versandkosten</p>';
        echo '</div>';
    }
    echo '</div>';
} else {
    echo "Keine Produkte gefunden.";
}

// Verbindung schließen
$conn->close();
?>