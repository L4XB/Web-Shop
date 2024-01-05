<?php
session_start()
    ?>
<!DOCTYPE html>
<html lang="en" data-darkreader-mode="dynamic" data-darkreader-scheme="dark" style="--vh: 9.450000000000001px;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>

    <!-- Favicons -->
    <link rel="icon" type="image/x-icon" href="../assets/icons/favicon-192x192.ico">

    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- custom css -->
    <link rel="stylesheet" href="../style/products.css">

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <style>
        .product-card {
            cursor: pointer;
        }
    </style>
    <script>
        document.getElementById('dashboard-Button').addEventListener('click', function () {
            this.classList.toggle('big');
        });
    </script>
</head>

<body>

    <!-- header -->
    <?php include 'header.php'; ?>

    <div class="container-fluid">
        <div class="container pt-4" style="margin-left: 12%;">
            <div class="col-lg-6 order-2 order-lg-1">
                <h1>Artikelübersicht</h1>
            </div>
            <ul class="breadcrumb undefined">
                <li class="breadcrumb-item"><a href="homepage.php" class="text-dark">Home</a></li>
                <li class="breadcrumb-item active"><span class="text-dark">Artikelübersicht</span></li>
            </ul>
        </div>

        <br>
        
        <?php
        include("../services/productProvider/loadAllProducts.php");
        ?>
    </div>

    <!-- footer -->
    <?php include 'footer.php'; ?>

</body>
</html>