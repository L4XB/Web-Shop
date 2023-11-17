<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="../style/homepage.css">
    <script src="../scripts/homepage.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <?php include 'klettergerüst.php'; ?>
    <br>
    <div class="container-fluid" id="fa-items">
        <div class="d-flex align-items-center">
            <span><h1>FSI Merchstore</h1><p>Herzlich Wilkommen {Anrede!}{Name!}, Ihr letzter Besuch war am: {Datum!}{Uhrzeit!}</p></span>
        </div>
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

        </div>
    </div>
    

</body>
</html>