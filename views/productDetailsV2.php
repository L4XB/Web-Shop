<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" data-darkreader-mode="dynamic" data-darkreader-scheme="dark" style="--vh: 9.450000000000001px;">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Products V2</title>
        <!-- favicon -->
        <link rel="icon" type="image/x-icon" href="../assets/icons/favicon-192x192.ico">

        <!-- bootstrap css -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="../style/productDetailsV2.css">

        <!-- ajax -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- JS sweetalert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
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

        if (!isset($_SESSION['userId'])) {
            header('Location: login.php');
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

        <!-- page functionality -->
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
                                location.reload();
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
                                location.reload();

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
                    location.reload();
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

                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: "Artiekl zum Warenkorb hinzugefügt",
                                showConfirmButton: false,
                                timer: 1500
                            });

                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                        }
                    });
                });
            });
        </script>
        <script>
            $(document).ready(function () {
                if ($('#dropdown .selected').length > 0) {
                    $('#dropbtn').prop('disabled', true);
                    $('#dropdown').css('opacity', '0.5');
                }
            });
        </script>
        <script>
            var selectedSize = null;

            function selectSize(size) {
                selectedSize = size;

                // Aktualisieren Sie das Dropdown-Menü, um die ausgewählte Größe anzuzeigen
                $('#dropbtn').text('Größe: ' + size);

                // Entfernen Sie die 'selected'-Klasse von allen Elementen im Dropdown-Menü
                $('#dropdown-content a').removeClass('selected');

                // Fügen Sie die 'selected'-Klasse zum ausgewählten Element hinzu
                $('#dropdown-content a').each(function () {
                    if ($(this).text() == size) {
                        $(this).addClass('selected');
                    }
                });
            }
        </script>
        
    </head>
    <body>
        <?php
        include 'klettergerüst.php';
        require '../services/productProvider/loadSpecificProductData.php';
        require '../services/userProvider/favorites.php';
        ?>
        
        <?php
        function getSizes()
            {
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "webShopFSI";

                $db = new mysqli($servername, $username, $password, $dbname);

                if ($db->connect_error) {
                    die("Verbindung fehlgeschlagen: " . $db->connect_error);
                }
                // Verbindung zur Datenbank herstellen
            
                $productId = $_GET['id'];
                // SQL-Abfrage ausführen
                $result = $db->query("SELECT size FROM products WHERE productID = $productId");

                if ($result->num_rows > 0) {
                    // Größen aus dem ersten Datensatz abrufen
                    $sizes = explode(';', $result->fetch_assoc()['size']);

                    // Verbindung schließen
                    $db->close();

                    return $sizes;
                } else {
                    // Verbindung schließen
                    $db->close();

                    return null;
                }
            }
            $sizes = getSizes();
        ?>


        <!-- content -->
        <div class= "container pt-4" style="margin-left: 12%;">
            <div class="col-lg-6 order-2 order-lg-1">
                <h1 id="headLineTextStyle">Produktansicht</h1>
            </div>
            <ul class="breadcrumb undefined">
                <li class="breadcrumb-item"><a href="homepage.php" class="text-dark">Home</a></li>
                <li class="breadcrumb-item"><a href="products.php"class="text-dark">Artikelübersicht</a></li>
                <li class="breadcrumb-item active"><span class="text-dark"><?php echo htmlspecialchars(getProductName()); ?></span></li>
            </ul>
        </div>
        <br>
        <br>

        <div class="row d-flex justify-content-center align-items-center" style="padding-bottom: 60px;">
            <!-- product image (left side) -->
            <div class="col-lg-6">
                <img style="width: 100%; max-height: 55vh; position: relative; object-fit: contain;"
                    src="<?php echo htmlspecialchars(getProductImage()); ?>" alt="<?php echo htmlspecialchars(getProductName()); ?>">
            </div>

            <!-- product details (right side) -->
            <div class="col-lg-5 ps-lg-4">
                <h1 class="mb-4"><?php echo htmlspecialchars(getProductName()); ?></h1>
                <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-sm-between mb-4">
                    <ul class="list-inline mb-2 mb-sm-0">
                        <li class="list-inline-item h4 fw-light mb-0"><?php echo htmlspecialchars(getProductPrice()) . " €"; ?></li>
                        <li class="list-inline-item text-muted fw-light"> 
                        </li>
                    </ul>
                </div>
                <p class="mb-4 text-muted"><?php echo htmlspecialchars(getDetailedDescription()); ?></p>
                <form id="buyForm" action="#">

                <!-- actions -->
                <div id="details-products-data-functions">
                    <!-- Product size selection-->
                    <div class="dropdown" id="dropdown">
                        <button class="dropbtn" id="dropbtn">Größe wählen <i
                                class="arrow down"></i></button>
                        <div class="dropdown-content" id="dropdown-content">
                            <?php
                            if ($sizes === null || $sizes[0] == 'default') {
                                echo '<a href="#" class="selected" onclick="selectSize(\'one size\')">one size</a>';
                                echo '<script>selectSize(\'one size\');</script>';
                            } else {
                                foreach ($sizes as $size) {
                                    echo '<a href="#" onclick="selectSize(\'' . $size . '\')">' . $size . '</a>';

                                }
                            }
                            ?>
                        </div>
                    </div>
                
                    <!-- Action Buttons-->
                    <div id="actions">

                    <div id="counter">
                        <div id="minus"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                fill="currentColor" class="bi bi-dash-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8" />
                            </svg></div>
                        <div id="number">1</div>
                        <div id="plus"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                            </svg></div>
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
    </body>
</html>