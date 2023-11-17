<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

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