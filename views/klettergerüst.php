<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klettergerüst</title>
    <link rel="icon" type="image/x-icon" href="../assets/icons/favicon-192x192.ico">
    <link rel="stylesheet" href="../style/klettergerüst.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="row">
                <!-- Logo -->
                <div class="col-md-2">
                  <div>
                    <a href="homepage.php"><img style="width:169px; hight:87px" src="../assets/images/fsi_logo_header.png" alt="logo" class="logo"></a>
                  </div>
                </div>
                <!-- Searchbar -->
                <div class="col-md-8 d-flex align-items-center">
                  <form class="w-100">
                    <input type="search" class="form-control form-control-dark" placeholder="Produktsuche..." aria-label="Search">
                  </form>
                </div>
                <!-- Buttons -->
                <div class="col-md-2">
                  <ul class="d-flex list-unstyled">
                    <li class="me-2"><a href="products.php" class="nav-link px-2 text-white">Artikelübersicht</a></li>
                    <li class="me-2"><a href="favorits.php" class="nav-link px-2 text-white">Favoriten</a></li>
                    <li class="me-2"><a href="shoppingCart.php" class="nav-link px-2 text-white">Warenkorb</a></li>
                    <li class="me-2"><a href="profil.php" class="nav-link px-2 text-white">Profil</a></li>
                  </ul>
                <!-- Login/Signout -->
                  <a href="login.php"><button type="button" class="btn btn-outline-light me-2">Login</button></a>
                  <a href="signUp.php"><button type="button" class="btn btn-warning">Sign-up</button></a>
                </div>

            </div>
        </div>
    </header>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col">
                  </div>
                  <div class="col-2" style="text-align: right;">
                  <a class="footerlink" href="doku.php"><img height="20px" src="../database/images/doku.png"> Doku</a>
                  </div>
                  <div class="col-2">
                  <a class="footerlink" href="devteam.php"><img height="30px" src="../database/images/git.png"> DevTeam</a>
                  </div>
                  <div class="col-2" style="text-align: left;">
                  <a class="footerlink" href="kontakt.php"><img height="20px" src="../database/images/kontakt.png">  Kontakt</a>
                  </div>
                  <div class="col">
                  </div>
            </div>
    </footer>
</body>

</html>