<?php
$searchTerm = $_GET['search'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webShopFSI";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT * FROM products WHERE productName LIKE ?");
$stmt->bind_param("s", $param_searchTerm);

$param_searchTerm = "%" . $searchTerm . "%";
$stmt->execute();

$result = $stmt->get_result();
$products = $result->fetch_all(MYSQLI_ASSOC);

//Producte anzeigen
if ($result->num_rows > 0) {

    // Produkte in Produktkarten anzeigen
    echo '<div class="product-container" >';
    foreach ($products as $row) {
        echo '<div class="product-card-text" >';
        echo '<div class="product-card" data-product-id="' . $row['productID'] . '" onclick="redirectToPage(event)">';

        echo '<img id="product-img" src="../assets/images/produkts/' . $row['pathName'] . '.png" alt="">';
        echo "<div id='add-to-cart-button'></div>";
        echo "<div id='add-to-cart-wishlist'></div>";
        echo '</div>';

        echo '<h4 style="color:black;">' . $row['productName'] . '</h4>';
        echo '<h3>' . $row['price'] . ' €</h3>';
        echo '<p>zzgl. Versandkosten</p>';
        echo '</div>';
    }
    echo '</div>';
    echo '<script>
        function redirectToPage(event) {
            var productId = event.currentTarget.getAttribute("data-product-id");
            window.location.href = "../views/productDetailsV2.php?id=" + productId;
        }
        </script>';
} else {
    echo "Keine Produkte gefunden.";
}


$conn->close();
?>