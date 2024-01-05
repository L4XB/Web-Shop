<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>

    <!-- Favicons -->
    <link rel="icon" type="image/x-icon" href="../assets/icons/favicon-192x192.ico">

    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" href="../style/footer.css">

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</head>

<body>
    <footer>
        <nav class="navbar sticky-bottom py-3 bg-dark text-light">
            <div class="container-fluid d-flex flex-column align-items-center justify-content-center">
                <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-light">Home</a></li>
                    <li class="nav-item"><a href="doku.php" class="nav-link px-2 text-light">Doku</a></li>
                    <li class="nav-item"><a href="devteam.php" class="nav-link px-2 text-light">DevTeam</a></li>
                    <li class="nav-item"><a href="kontakt.php" class="nav-link px-2 text-light">Kontakt & Retouren</a></li>
                    <li class="nav-item"><a href="agb.php" class="nav-link px-2 text-light">AGB</a></li>
                    <li class="nav-item"><a href="impressum.php" class="nav-link px-2 text-light">Impressum</a></li>
                    <li class="nav-item"><a href="datenschutz.php" class="nav-link px-2 text-light">Datenschutz</a></li>
                </ul>
                <p class="text-center text-light">&copy;
                    <?php echo date('Y'); ?> Fachschaft Informatik Reutlingen
                </p>
            </div>
        </nav>
    </footer>

</body>

</html>