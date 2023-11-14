<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../style/dashboard.css">

    <script>

        document.getElementById('dashboard-Button').addEventListener('click', function () {
            this.classList.toggle('big');
        });
    </script>
</head>

<body>

    <div id="main_content">
        <div id="headNavBar">
            <!--Left Logo Nav Bar-->
            <img id="img-head" style="height: 8vh;"
                src="https://cdn.discordapp.com/attachments/1098331063064993906/1173660218626953216/image.png?ex=6564c341&is=65524e41&hm=f13bfb44e34dc17d597c19816e52024ace0ca3ba37bc85d6bcc0f922efd3255b&"
                alt="">
            <div id="dashboard-Button"></div>
        </div>
    </div>
    <h1 id="headLineTextStyle">Artikelübersicht</h1>
    <?php
    include("../services/productProvider/loadAllProducts.php");

    ?>
    <div id="footer">


    </div>

</body>

</html>