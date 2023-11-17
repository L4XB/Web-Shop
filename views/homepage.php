<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

<<<<<<< HEAD
    <link rel="stylesheet" href="../style/homepage.css">
    <script src="../scripts/homepage.js"></script>
=======
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Benutzerdefinierte CSS-Stile */
        .carousel {
            max-width: 800px;
            /* Maximale Breite des Sliders */
            margin: auto;
            max-height: 300px;
            /* Zentrierung des Sliders */
        }
>>>>>>> 8b860f4da8d09c4b8475cae160c60244d7275c65

        .carousel img {
            width: auto;
            /* Maximale Breite für Bilder im Slider */
            height: 300px;
            /* Automatische Anpassung der Höhe */
        }

        .carousel-indicators li {
            /* Hintergrundfarbe der Indikatoren */
            color: black;
            /* Randfarbe der Indikatoren */
        }

        /* Farbanpassungen für die Pfeile */
        .carousel-control-prev,
        .carousel-control-next {
            color: grey;
            /* Farbe der Pfeile */
        }
    </style>

</head>

<body>
    <?php include 'klettergerüst.php'; ?>
    <br>
    <div class="container-fluid" id="fa-items">
        <div class="d-flex align-items-center">
            <span>
                <h1>FSI Merchstore</h1>
                <p>Herzlich Wilkommen {Anrede!}{Name!}, Ihr letzter Besuch war am: {Datum!}{Uhrzeit!}</p>
            </span>
        </div>
<<<<<<< HEAD
        <div class="d-flex align-items-center">
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="../assets/images/carousel/fsi_logo.png" class="d-block w-100" alt="fsi_logo">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Wilkommen im Merchstore der Reutlinger Fachschaft Informatik</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                <img src="../assets/images/carousel/FSI_Hoody_Hinten.png" class="d-block w-100" alt="FSI_Hoody_Hinten">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                <img src="../assets/images/carousel/FSI_INFormatiger_Tasche.png" class="d-block w-100" alt="FSI_INFormatiger_Tasche">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
        </div>
        <div class="d-flex align-items-center">
=======
>>>>>>> 8b860f4da8d09c4b8475cae160c60244d7275c65

        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <!-- Weitere Indikatoren für zusätzliche Bilder hier hinzufügen -->
            </ol>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../assets/images/carousel/fsi_logo.png" class="d-block w-100" alt="Slide 1">
                </div>
                <div class="carousel-item">
                    <img src="../assets/images/carousel/FSI_Hoody_Hinten.png" class=" d-block w-100" alt="Slide 2">
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

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#myCarousel').carousel({
                    interval: 2000, // Wechsel alle 2 Sekunden
                    pause: false // Automatisches Pausieren deaktivieren
                });
            });
        </script>
    </div>


</body>

</html>