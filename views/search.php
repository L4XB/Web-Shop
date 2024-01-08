<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="../style/search.css">
    <link rel="icon" type="image/x-icon" href="../assets/icons/favicon-192x192.ico">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .product-card {
            cursor: pointer;
        }

        .push {
            flex-grow: 9999;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
    </style>
    <script>
        document.getElementById('dashboard-Button').addEventListener('click', function () {
            this.classList.toggle('big');
        });
    </script>
</head>

<body>
    <?php include 'header.php'; ?>


    <div class="container pt-4" style="margin-left: 12%;">
        <div class="col-lg-6 order-2 order-lg-1">
            <h1>Artikelsuche</h1>
        </div>
        <ul class="breadcrumb undefined">
            <li class="breadcrumb-item"><a href="homepage.php" class="text-dark">Home</a></li>
            <li class="breadcrumb-item active">Artikelsuche</li>
        </ul>
    </div>

    <?php
    include '../services/productProvider/searchbar.php';
    ?>
    </div>

    <div class="push"></div>
    <!-- footer -->
    <?php include 'footer.php'; ?>
</body>

</html>