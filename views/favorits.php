<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    // Wenn der Benutzer nicht eingeloggt ist, leiten Sie ihn zur Login-Seite um
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favoriten</title>

    <!-- Favicons -->
    <link rel="icon" type="image/x-icon" href="../assets/icons/favicon-192x192.ico">

    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- custom css -->
    <link rel="stylesheet" href="../style/products.css">

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <style>
        .push {
            flex-grow: 9999;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
    </style>
</head>

<body>

    <!-- header -->
    <?php include 'header.php'; ?>

    <div class="container pt-4" style="margin-left: 12%;">
        <div class="col-lg-6 order-2 order-lg-1">
            <h1>Favoriten</h1>
        </div>
        <ul class="breadcrumb undefined">
            <li class="breadcrumb-item"><a href="homepage.php" class="text-dark">Home</a></li>
            <li class="breadcrumb-item"><a href="products.php" class="text-dark">Artikelübersicht</a></li>
            <li class="breadcrumb-item active"><span class="text-dark">Favoriten</span></li>
        </ul>
    </div>

    <main class="container">
        <?php include '../services/userProvider/loadAllFavorites.php'; ?>
    </main>
    <div class="push"></div>
    <!-- footer -->
    <?php include 'footer.php'; ?>

</body>

</html>