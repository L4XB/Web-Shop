<?php
//Server Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webShopFSI";

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
    echo '<div class="product-container" >';
    while ($row = $result->fetch_assoc()) {
        echo '<div class="product-card-text" >';
        echo '<div class="product-card" data-product-id="' . $row['productID'] . '" onclick="redirectToPage(event)">';

        echo '<img id="product_images" src="../assets/images/produkts/' . $row['pathName'] . '.png" alt="">';
        echo "<div id='add-to-cart-button'></div>";
        echo "<div id='add-to-cart-wishlist'></div>";
        echo '</div>';
        echo '<h4 style="color:black;">' . $row['productName'] . '</h2>';
        echo '<h3>' . $row['price'] . ' €</h1>';
        echo '<p>zzgl. Versandkosten</p>';
        echo '</div>';
    }
    echo '</div>';
    echo '<script>
        function redirectToPage() {
            var productId = event.currentTarget.getAttribute("data-product-id");
            window.location.href = "../views/productDetailsV2.php?id=" + productId;
        }
        </script>';
} else {
    echo "Keine Produkte gefunden.";
}

// Verbindung schließen
$conn->close();
?>