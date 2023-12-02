<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
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


    <script>
        window.onload = function () {
            var width = window.screen.width;
            var height = window.screen.height;
            var resolution = width + 'x' + height;

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'saveResolution.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('resolution=' + resolution);
        }
    </script>

</head>
<body>
    <?php include 'klettergerüst.php'; ?>
    <br>
    <div class="container-fluid" id="fa-items">
        <div class="d-flex align-items-center">
            <span>
                <h1>Fachschaft Informatik Merchstore</h1>

                <?php
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
    </div>
    <main role="main">
    <!-- Carousel -->
        <div class="container-fluid">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class=""></li>
                <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item">
                        <img class="first-slide" img src="..//assets/images/homepage/banner.png" alt="First slide">
                        <div class="container">
                            <div class="carousel-caption text-left text-color">
                                <h1>DevTeam</h1>
                                <p>Lerne die Entwickler des FSI Shops kennen!</p>
                                <p><a class="btn btn-dark" href="devteam.php" role="button">Visit</a></p>
                            </div>
                        </div>
                    </div>
                <div class="carousel-item active">
                    <img class="second-slide" img src="..//assets/images/homepage/banner.png" alt="Second slide">
                    <div class="container">
                        <div class="carousel-caption text-color">
                            <h1>Herzlich Willkommen</h1>
                            <p>Hier findest du den besten Merch der Hochschule Reutlingen!</p>
                            <p><a class="btn btn-dark" href="products.php" role="button">Artikelübersicht</a></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="third-slide" img src="..//assets/images/homepage/banner.png" alt="Third slide">
                    <div class="container">
                        <div class="carousel-caption text-right text-color">
                            <h1>Dokumentation</h1>
                            <p>Du interresierst dich für die Entstehung des Webshops?</p>
                            <p><a class="btn btn-dark" href="doku.php" role="button">check out</a></p>
                        </div>
                    </div>
                </div>
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
        <br>
        <br>


            <!-- Marketing messaging and featurettes
            ================================================== -->
            <!-- Wrap the rest of the page in another container to center all the content. -->

        <div class="container marketing">

            <!-- Three columns of text below the carousel -->
            <div class="row">
            <div class="col-lg-4">
                <img class="rounded-circle" img src="..//assets/images/homepage/fsi_logo.png" alt="Generic placeholder image" width="140" height="140">
                <h2>Überschrift</h2>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
                <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <img class="rounded-circle" img src="..//assets/images/homepage/fsi_logo.png" alt="Generic placeholder image" width="140" height="140">
                <h2>Überschrift</h2>
                <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
                <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <img class="rounded-circle" img src="..//assets/images/homepage/fsi_logo.png" alt="Generic placeholder image" width="140" height="140">
                <h2>Überschrift</h2>
                <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>
            </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->


            <!-- START THE FEATURETTES -->

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">Premium Men´s Brushed Kangaroo Pocket Hoodie <span class="text-muted">More then just merch.</span></h2>
                    <p class="lead">Der Premium Men's Brushed Kangaroo Pocket Hoodie vereint erstklassige Qualität mit stilvollem Design, und hebt sich damit deutlich von herkömmlicher Merchandise-Kleidung ab. Dieser Hoodie verkörpert mehr als nur Merchandise – er ist ein Statement für anspruchsvollen Stil und Komfort.</p>
                </div>
                <div class="col-md-5">
                    <img class="featurette-image img-fluid mx-auto" img src="..//assets/images/produkts/hoody/hoody_front_men_fsi-tiger.png" alt="500x500" style="width: auto; height: 500px;"  data-holder-rendered="true">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading">Women´s non brushed Kangaroo Pocket Hoodie <span class="text-muted">For the Girls</span></h2>
                    <p class="lead">Der Women's Kangaroo Pocket Hoodie bietet nicht nur bequeme Alltagskleidung, sondern seinen Schnitt auch einen besonderen Ausdruck von Weiblichkeit und Individualität. Dieser Hoodie ist mehr als nur Bekleidung - er ist eine persönliche Aussage für selbstbewusste Frauen mit einem Sinn für Stil.</p>
                </div>
                <div class="col-md-5 order-md-1">
                    <img class="featurette-image img-fluid mx-auto" img src="..//assets/images/produkts/hoody/hoody_front_women_fsi-tiger.png" alt="500x500" style="width: auto; height: 500px;" data-holder-rendered="true">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">Black FSI Mug <span class="text-muted">Coffee is only the beginning...</span></h2>
                    <p class="lead">Die schwarze FSI-Tasse ist ein echter alrounder, da sie für weit mehr als nur für Kaffee geeignet ist. Diese Tasse aus bestem Porzelan steht für vielseitigen Genuss und lädt dazu ein, mehr als nur das übliche Getränk daraus zu erleben.</p>
                </div>
                <div class="col-md-5">
                    <img class="featurette-image img-fluid mx-auto" img src="..//assets/images/produkts/tasse/tasse_fsi.png" alt="500x500" style="width: 500px; height: auto;" data-holder-rendered="true">
                </div>
                <br>
                <br>
            </div>

            <hr class="featurette-divider">

            <!-- /END THE FEATURETTES -->
        </div><!-- /.container -->
    </main>
    

            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
            <script src="../../assets/js/vendor/popper.min.js"></script>
            <script src="../../dist/js/bootstrap.min.js"></script>

            <!-- Bootstrap core JavaScript
            ================================================== -->
            <!-- Placed at the end of the document so the pages load faster -->
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        </body>
</html>