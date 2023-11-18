<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="icon" type="image/x-icon" href="../assets/icons/favicon-192x192.ico">

    <!-- CSS -->
    <link rel="stylesheet" href="../style/homepage.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../scripts/homepage.js"></script>

</head>

<body>
    <?php include 'klettergerüst.php'; ?>
    <br>
    <div class="container-fluid" id="fa-items">
        <div class="d-flex align-items-center">
            <span>
                <h1>FSI Merchstore</h1>

                <?php
                session_start();
                if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {
                    $name = $_SESSION['name'];
                    $lastLogIn = $_SESSION['lastLogIn'];

                    // Aufteilen des Datums und der Uhrzeit
                    $lastLogInDateTime = new DateTime($lastLogIn);
                    $date = $lastLogInDateTime->format('d-m-Y');
                    $time = $lastLogInDateTime->format('H:i');
                    echo "<p>Herzlich Willkommen, $name! Ihr letzter Besuch war am: $date um $time</p>";
                }
                ?>

            </span>
        </div>
        <!-- Carousel -->
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <!-- Weitere Indikatoren für zusätzliche Bilder hier hinzufügen -->
            </ol>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../assets/images/carousel/fsi_logo.png" class="d-block w-100" alt="Slide 1">
                </div>
                <div class="carousel-item">
                    <img src="../assets/images/carousel/FSI_Hoody_Hinten.png" class=" d-block w-100" alt="Slide 2">
                </div>
                <div class="carousel-item">
                    <img src="../assets/images/carousel/FSI_INFormatiger_Tasche.png" class=" d-block w-100"
                        alt="Slide 3">
                </div>
                <!-- Weitere Slides hier hinzufügen -->
            </div>

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
</body>

</html>