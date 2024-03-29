<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$shwoAlert = false;

if (isset($_SESSION['previous_page'])) {
    if ($_SESSION['previous_page'] == "login" && $_SESSION['loggedIn'] === true) {
        $shwoAlert = true;
        $_SESSION['previous_page'] = "notlogin";

    } else {
        $shwoAlert = false;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="homepage" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">

    <!-- Favicons -->
    <link rel="icon" type="image/x-icon" href="../assets/icons/favicon-192x192.ico">

    <title>Homepage</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/carousel/">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="../style/homepage.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" href="../style/header.css">

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        window.onload = function () {
            // Ermitteln Sie die Bildschirmauflösung
            var screenResolution = window.screen.width + 'x' + window.screen.height;

            // Senden Sie die Bildschirmauflösung an eine PHP-Seite
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../services/userProvider/saveScreenResolution.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('resolution=' + screenResolution);
        };
    </script>

</head>

<body>

    <script>
        $.noConflict();
        jQuery(document).ready(function ($) {
            setInterval(function () {
                $.get('../services/userProvider/getLoggedInUserAmount.php', function (data) {
                    $('#loggedInUsers').text(data);
                });
            }, 1000);
        });

    </script>

    <!-- header -->

    <?php include 'header.php'; ?>

    <div class="container-fluid" id="fa-items">
        <div class="d-flex align-items-center">
            <span style="margin-left:auto;margin-right:auto;">
                <h1 style='text-align:center;'>Fachschaft Informatik Merchstore</h1>
                <br>
                <?php
                if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {
                    $name = $_SESSION['name'];
                    $lastLogIn = $_SESSION['lastLogIn'];

                    // Aufteilen des Datums und der Uhrzeit
                    $lastLogInDateTime = new DateTime($lastLogIn);
                    $date = $lastLogInDateTime->format('d-m-Y');
                    $time = $lastLogInDateTime->format('H:i');
                    echo "<p style='text-align:center;'>Herzlich Willkommen, $name! Ihr letzter Besuch war am: $date um $time</p>";
                }
                ?>

                <?php
                if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {
                    echo "<p style='text-align:center;'>
                        <span class=\"blink-dot\"></span> Eingeloggte Benutzer: <span id=\"loggedInUsers\">0</span>
                    </div></p>";
                }
                ?>
            </span>
        </div>
    </div>



    <!-- Carousel -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1" class=""></li>
            <li data-target="#myCarousel" data-slide-to="2" class=""></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="first-slide" img src="..//assets/images/homepage/banner2.png" alt="First slide"
                    style="width: 100%; height: 40vh">
                <div class="carousel-caption text-left text-color">
                    <h1>DevTeam</h1>
                    <p>Lerne die Entwickler des FSI Shops kennen!</p>
                    <p><a class="btn btn-dark" href="devteam.php" role="button">Kennenlernen</a></p>
                </div>
            </div>
            <div class="carousel-item ">
                <img class="second-slide" img src="..//assets/images/homepage/banner2.png" alt="Second slide"
                    style="width: 100%; height: 40vh">
                <div class="carousel-caption text-color">
                    <h1>Herzlich Willkommen</h1>
                    <p>Hier findest du den besten Merch der Hochschule Reutlingen!</p>
                    <p><a class="btn btn-dark" href="products.php" role="button">Artikelübersicht</a></p>
                </div>
            </div>
            <div class="carousel-item ">
                <img class="third-slide" img src="..//assets/images/homepage/banner2.png" alt="Third slide"
                    style="width: 100%; height: 40vh">
                <div class="carousel-caption text-right text-color">
                    <h1>Dokumentation</h1>
                    <p>Du interresierst dich für die Entstehung des Webshops?</p>
                    <p><a class="btn btn-dark" href="doku.php" role="button">Mehr erfahren</a></p>
                </div>
            </div>
        </div>

        <!-- Carousel Control buttons -->
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    </div>
    <br>

    <!-- Marketing messaging and featurettes -->
    <div class="container marketing">

        <!-- Start of the features -->

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">INFormatiger Hoodie für Männer <br>
                    <span class="text-muted">Mehr als nur einfacher Merch</span>
                </h2>
                <p class="lead">Der Premium Men's Brushed Kangaroo Pocket Hoodie vereint erstklassige Qualität mit
                    stilvollem Design, und hebt sich damit deutlich von herkömmlicher Merchandise-Kleidung ab.
                    Dieser Hoodie verkörpert mehr als nur Merchandise – er ist ein Statement für anspruchsvollen
                    Stil und Komfort.</p>
                <div>
                    <p class="lead">
                        <a href="productDetailsV2.php?id=8" class="btn btn-warning">zum Artikel</a>
                    </p>
                </div>
            </div>
            <div class="col-md-5">
                <img class="featurette-image img-fluid mx-auto" img
                    src="..//assets/images/produkts/hoody_front_men_fsi-tiger.png" alt="500x500"
                    style="width: auto; height: 500px;" data-holder-rendered="true">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">Frauen INFormatiger Hoodie <br>
                    <span class="text-muted">Für die wahren coders</span>
                </h2>
                <p class="lead">Der Women's Kangaroo Pocket Hoodie bietet nicht nur bequeme Alltagskleidung, sondern
                    seinen Schnitt auch einen besonderen Ausdruck von Weiblichkeit und Individualität. Dieser Hoodie
                    ist mehr als nur Bekleidung - er ist eine persönliche Aussage für selbstbewusste Frauen mit
                    einem Sinn für Stil.</p>
                <div>
                    <p class="lead">
                        <a href="productDetailsV2.php?id=7" class="btn btn-warning">zum Artikel</a>
                    </p>
                </div>
            </div>
            <div class="col-md-5 order-md-1">
                <img class="featurette-image img-fluid mx-auto" img
                    src="..//assets/images/produkts/hoody_front_women_fsi-tiger.png" alt="500x500"
                    style="width: auto; height: 500px;" data-holder-rendered="true">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">Black FSI Mug <br>
                    <span class="text-muted">Der Kaffee für die Extrasession...</span>
                </h2>
                <p class="lead">Die schwarze FSI-Tasse ist ein echter alrounder, da sie für weit mehr als nur für
                    Kaffee geeignet ist. Diese Tasse aus bestem Porzelan steht für vielseitigen Genuss und lädt dazu
                    ein, mehr als nur das übliche Getränk daraus zu erleben.</p>
                <div>
                    <p class="lead">
                        <a href="productDetailsV2.php?id=5" class="btn btn-warning">zum Artikel</a>
                    </p>
                </div>
            </div>
            <div class="col-md-5">
                <img class="featurette-image img-fluid mx-auto" img src="..//assets/images/produkts/tasse_fsi.png"
                    alt="500x500" style="width: 500px; height: auto;" data-holder-rendered="true">
            </div>
            <br>
            <br>
        </div>

        <hr class="featurette-divider">
    </div>

    <!-- FOOTER -->
    <?php include 'footer.php'; ?>



    <?php
    if ($shwoAlert) {
        echo "
        <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: 'success',
                title: 'Signed in successfully'
            });
        });
    </script>
        ";


    }



    ?>




</body>

</html>