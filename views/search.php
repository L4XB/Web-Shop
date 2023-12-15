<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="../style/search.css">
    <link rel="icon" type="image/x-icon" href="../assets/icons/favicon-192x192.ico">

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
        <h1 id="headLineTextStyle" style="text-align: left; padding-left: 16%;">Artikelsuche</h1>
    <br>

    <?php 
    include '../services/productProvider/searchbar.php'; 
    ?>
    </div>
</body>
</html>