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
                    <a href="startseite.php"><img style="width:169px; hight:87px" src="../assets/images/fsi_logo_header.png" alt="logo" class="logo"></a>
                  </div>
                </div>
                <!-- Searchbar -->
                <div class="col-md-8">
                  <form>
                    <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
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
                  <button type="button" class="btn btn-outline-light me-2">Login</button>
                  <button type="button" class="btn btn-warning">Sign-up</button>
                </div>

            </div>
        </div>
    </header>


    <footer class="footer p-3 bg-dark text-white">
        <div class="container">
            <div class="row d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <div class="col">
                  </div>
                  <div class="col-2">
                    <img src=".../assets/images/git.png"><button class="footerbutton">Doku</button>
                  </div>
                  <div class="col-2">
                    <img src=""><button class="footerbutton">DevTeam</button>
                  </div>
                  <div class="col-2">
                    <img src=""><button class="footerbutton">Kontakt</button>
                  </div>
                  <div class="col">
                  </div>
            </div>
    </footer>
</body>

</html>