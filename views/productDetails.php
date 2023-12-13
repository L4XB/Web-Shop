<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="icon" type="image/x-icon" href="../assets/icons/favicon-192x192.ico">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/productDetails.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php
    // Serververbindung
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webShopFSI";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Verbindung fehlgeschlagen: " . $conn->connect_error);
    }

    // Stellen Sie sicher, dass die Benutzer-ID in der Session gespeichert ist
    if (!isset($_SESSION['userId'])) {
        die("Benutzer-ID nicht gefunden");
    }

    $userId = $_SESSION['userId'];
    $productId = $_GET['id'];

    // SQL-Abfrage, um zu überprüfen, ob das Produkt bereits favorisiert ist
    $stmt = $conn->prepare("SELECT * FROM favorites WHERE productId = ? AND userId = ?");
    $stmt->bind_param("ii", $productId, $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    $isFavorited = $result->num_rows > 0;

    $stmt->close();
    $conn->close();
    ?>
    <script>
        $(document).ready(function () {
            var favorited = <?php echo $isFavorited ? 'true' : 'false'; ?>;
            if (favorited) {
                // Wenn das Produkt bereits favorisiert ist, machen Sie das Icon rot
                $("#button1").find('i').css({
                    'color': 'rgb(254, 77, 77)',
                    'font-size': '33px'
                });
            } else {
                // Wenn das Produkt nicht favorisiert ist, machen Sie das Icon weiß
                $("#button1").find('i').css({
                    'color': 'white',
                    'font-size': '24px'
                });
            }

            // Fügen Sie einen Hover-Effekt hinzu
            $("#button1").hover(function () {
                // Beim Hovern: Machen Sie das Icon größer und rot
                $(this).find('i').css({
                    'color': 'rgb(254, 77, 77)',
                    'font-size': '33px'
                });
            }, function () {
                // Beim Verlassen des Hovers: Setzen Sie das Icon zurück
                if (!favorited) {
                    $(this).find('i').css({
                        'color': 'white',
                        'font-size': '24px'
                    });
                } else {
                    $(this).find('i').css({
                        'color': 'rgb(254, 77, 77)',
                        'font-size': '33px'
                    });
                }
            });
            // ...
        });
    </script>
    <script>
        $(document).ready(function () {
            var favorited = <?php echo $isFavorited ? 'true' : 'false'; ?>;
            $("#button1").click(function () {
                if (!favorited) {
                    // Führen Sie die Funktion zum Hinzufügen des Favoriten aus
                    $.ajax({
                        url: "../services/userProvider/add_favorit.php",
                        type: "post",
                        data: {
                            productId: <?php echo $_GET['id']; ?>,
                            userId: <?php echo 1; ?>
                        },
                        success: function (response) {

                            // Ändern Sie das Icon zu rot
                            $("#button1").find('i').css({
                                'color': 'rgb(254, 77, 77)',
                                'font-size': '33px'
                            });
                        }
                    });
                } else {
                    // Führen Sie die Funktion zum Entfernen des Favoriten aus
                    $.ajax({
                        url: "../services/userProvider/remove_favorit.php",
                        type: "post",
                        data: {
                            productId: <?php echo $_GET['id']; ?>,
                            userId: <?php echo 1; ?>
                        },
                        success: function (response) {

                            // Ändern Sie das Icon zurück zu weiß
                            $("#button1").find('i').css({
                                'color': 'white',
                                'font-size': '24px'
                            });
                        }
                    });
                }
                // Wechseln Sie den Zustand
                favorited = !favorited;
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            document.getElementById('minus').addEventListener('click', function () {
                var number = document.getElementById('number');
                var currentValue = parseInt(number.innerText);
                if (currentValue > 1) {
                    number.innerText = currentValue - 1;
                }
            });

            document.getElementById('plus').addEventListener('click', function () {
                var number = document.getElementById('number');
                var currentValue = parseInt(number.innerText);
                number.innerText = currentValue + 1;
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            var dropdown = document.getElementById("dropdown-content");
            var btn = document.getElementById("dropbtn");
            var arrow = btn.getElementsByTagName("i")[0];

            btn.onclick = function () {
                if (dropdown.style.display === "block") {
                    dropdown.style.display = "none";
                    btn.classList.remove('open');
                    dropdown.classList.remove('open');
                    arrow.className = "arrow down";
                } else {
                    dropdown.style.display = "block";
                    btn.classList.add('open');
                    dropdown.classList.add('open');
                    arrow.className = "arrow up";
                }
            }

            window.selectSize = function (size) {
                btn.firstChild.nodeValue = "Größe: " + size;
                dropdown.style.display = "none";
                arrow.className = "arrow down";
                btn.classList.remove('open');
                dropdown.classList.remove('open');
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            var button2 = document.getElementById("button2");
            var badge = document.querySelector(".badge");

            button2.onclick = function () {
                var badgeValue = parseInt(badge.textContent, 10);
                badge.textContent = badgeValue + 1;
            }
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#button2").click(function () {
                var amount = $("#number").text();
                $.ajax({
                    url: "../services/userProvider/add_to_cart.php",
                    type: "post",
                    data: {
                        productId: <?php echo $_GET['id']; ?>,
                        userId: <?php echo $_SESSION['userId']; ?>,
                        amount: amount
                    },
                    success: function (response) {
                        // Führen Sie hier Code aus, der ausgeführt werden soll, wenn die Anfrage erfolgreich war
                        alert("Produkt wurde zum Warenkorb hinzugefügt");
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            });
        });
    </script>
</head>

<body>

    <?php
    include 'klettergerüst.php';
    require '../services/productProvider/loadSpecificProductData.php';
    require '../services/userProvider/favorites.php';
    session_start();

    ?>
    <div id="content-divs">
        <div id="black-top-box">
            <div id="black-top-box-items">
                <div id="product-card">
                    <img style="width: 110%; max-height: 55vh; position: relative;"
                        src="<?php echo htmlspecialchars(getProductImage()); ?>" alt="">
                </div>
                <div id="details-products">
                    <p id="product-name">
                        <?php echo htmlspecialchars(getProductName()); ?>
                    </p>
                    <div id="details-products-data">
                        <div id="details-products-data-content">

                        </div>
                        <div id="details-products-data-functions">
                            <div class="dropdown">
                                <button class="dropbtn" id="dropbtn">Größe wählen <i class="arrow down"></i></button>
                                <div class="dropdown-content" id="dropdown-content">
                                    <a href="#" onclick="selectSize('S')">S</a>
                                    <a href="#" onclick="selectSize('M')">M</a>
                                    <a href="#" onclick="selectSize('L')">L</a>
                                    <a href="#" onclick="selectSize('XL')">XL</a>
                                </div>
                            </div>
                            <p id="product-price">
                                <?php echo htmlspecialchars(getProductPrice()) . " €"; ?>
                            </p>
                        </div>
                    </div>
                    <div id="actions">

                        <div id="counter">
                            <div id="minus">-</div>
                            <div id="number">1</div>
                            <div id="plus">+</div>
                        </div>
                        <div class="button" id="button1">
                            <i class="icon fas fa-heart"></i>
                        </div>
                        <div class="button" id="button2">
                            <i class="icon fas fa-shopping-cart"></i>
                        </div>
                    </div>

                </div>

            </div>
            <!-- <div id="product-description-container">

            </div>
            <div id="placeholder">

            </div> -->
        </div>
        <!-- <div id="white-bottom-box">

        </div> -->
    </div>

</body>

</html>