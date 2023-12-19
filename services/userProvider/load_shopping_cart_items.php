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
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Hier können Sie den HTML-Code für jedes Produkt ausgeben
        echo '<div class="row">';
        echo '<div class="col-2"></div>';
        echo '<div class="col-1" style="justify-content: center; align-items: center; display: flex; border-bottom: solid; border-width:thin; border-color: lightgrey;">';
        echo '<button class="delete" data-productid="' . $row['productID'] . '"><img src="../database/images/trash.png" style="height: 30%;"></button>';
        echo '</div>';
        echo '<div class="col-1" style="justify-content: right; align-items: center; display: flex; border-bottom: solid; border-width:thin; border-color: lightgrey;">';
        echo '<img style="height:45px;" src="../assets/images/produkts/' . $row['pathName'] . '.png">';
        echo '</div>';
        echo '<div class="col-2" style="border-bottom: solid; border-width:thin; border-color: lightgrey;">';
        echo '<p class="light-text">' . $row['productName'] . '</p>';
        echo '<p class="text">' . $row['description'] . '</p>';
        echo '</div>';
        echo '<div class="col-2" style="justify-content: center; align-items: center; display: flex; border-bottom: solid; border-width:thin; border-color: lightgrey;">';
        echo '<div id="counter" data-productid="' . $row['productID'] . '">';
        echo '<div class="minus">-</div>';
        echo '<div class="number">' . $row['amount'] . '</div>';
        echo '<div class="plus">+</div>';
        echo '</div>';
        echo '</div>';
        echo '<div class="col-1" style="justify-content: right; align-items: center; display: flex; border-bottom: solid; border-width:thin; border-color: lightgrey;">';
        echo '<p>' . $row['price'] . ' €</p>';
        echo '</div>';
        echo '<div class="col-2"></div>';
        echo '</div>';


    }
    echo '<div class="row container-fluid justify-content-end" style="margin-top:40px;padding-right:190px;">
    <div class="col-3">
        <button type="button" class="btn btn-warning" onclick="window.location.href = \'checkout.php\';">weiter
            zur Kasse</button>
    </div>
</div>';

} else {
    echo '<p style="text-align:center;">Keine Produkte im Warenkorb. </p>
    <p style="text-align:center;"><small class="d-block text-right mt-3">
      <a href="products.php" class="btn btn-outline-dark">Artikel hinzufügen</a>
    </small></div></p>';
}

$stmt->close();
$conn->close();

?>

<script>
    $(document).ready(function () {
        $(".minus").click(function () {
            var counter = $(this).parent();
            var productId = counter.data('productid');
            var numberDiv = counter.find(".number");
            var number = parseInt(numberDiv.text());
            if (number > 0) {
                number--;
                numberDiv.text(number);
                updateAmount(productId, number);
            }
        });

        $(".plus").click(function () {
            var counter = $(this).parent();
            var productId = counter.data('productid');
            var numberDiv = counter.find(".number");
            var number = parseInt(numberDiv.text());
            number++;
            numberDiv.text(number);
            updateAmount(productId, number);
        });

        function updateAmount(productId, amount) {
            var url = amount > 0 ? "../services/userProvider/update_amount.php" : "../services/userProvider/delete_product.php";
            $.ajax({
                url: url,
                type: "post",
                data: {
                    userId: <?php echo $_SESSION['userId']; ?>,
                    productId: productId,
                    amount: amount
                },
                success: function (response) {

                    if (amount == 0) {
                        location.reload(); // Aktualisieren Sie die Seite, um die Änderungen anzuzeigen
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {

                }
            });
        }
    });
</script>