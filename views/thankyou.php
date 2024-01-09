<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="thankyou" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <title>Thank You!</title>

    <!-- Favicons -->
    <link rel="icon" type="image/x-icon" href="../assets/icons/favicon-192x192.ico">

    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- custom css -->
    <link rel="stylesheet" href="../style/#.css">

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>


    <!-- background -->
    <style>
        body {
            background-color: #212529 !important;
        }
    </style>
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

<body class="text-center">

    <!-- header -->
    <?php include 'header.php'; ?>

    <div class="cover-container d-flex flex-column align-items-center justify-content-center">
        <main role="main" class="inner cover">
            <br>
            <br>
            <br>
            <br>
            <h1 class="cover-heading" style="color: white;">Vielen Dank für deine Bestellung
                <?php echo $_SESSION['name']; ?> &#127881
            </h1>
            <p class="lead" style="color: white;">Sie erhalten von uns, in den nächsten Minuten, eine Bestellbestätigung
                per Mail!</p>
            <p class="lead">
                <a href="orderHistory.php" class="btn btn-warning">Meine Bestellungen</a>
            </p>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </main>
    </div>
    <div class="push"></div>
    <!-- footer -->
    <?php include 'footer.php'; ?>


</body>

</html>