<?php
session_start()
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="../style/products.css">
    <link rel="icon" type="image/x-icon" href="../assets/icons/favicon-192x192.ico">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
    <?php include 'klettergerüst.php'; ?>
    <br>
    <div class="container-fluid">
        <h1 id="headLineTextStyle" style="text-align: left; padding-left: 16%;">Artikelübersicht</h1>
        <br>

        <?php
        include("../services/productProvider/loadAllProducts.php");
        ?>
    </div>
</body>

</html>