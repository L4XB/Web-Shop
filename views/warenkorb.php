<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warenkorb</title>
    <link rel="icon" type="image/x-icon" href="../assets/icons/favicon-192x192.ico">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="../style/warenkorb.css">
</head>
<body>
<?php include 'klettergerüst.php'; ?>
<div class="container">
    <div class="row">
        <div class="col">
            <br>
            <h1>Warenkorb</h1>
            <br>
            <br>
        </div>
    </div>
    <div class="row">
        <!--Rand-->
        <div class="col-2"></div>
            
            <div class="col-1" style="justify-content: center; align-items: center; display: flex; border-bottom: solid; border-width:thin; border-color: lightgrey;"><img src="../database/images/pin.png" style="height: 50%;"></div>
            
            <div class="col-3" style="border-bottom: solid; border-width:thin; border-color: lightgrey;">
                <p class="light-text">Lieferadresse</p>
                <p class="text">$var:Adresse</p>
            </div>
            
            <div class="col-1" style="border-bottom: solid; border-width:thin; border-color: lightgrey;"></div>

            <div class="col-2" style="justify-content: center; align-items: center; display: flex; border-bottom: solid; border-width:thin; border-color: lightgrey;">
            <button type="button" class="btn btn-secondary"><img src="../database/images/pen.png" style="height: 2.5vh;" >Lieferadresse ändern</button>
            </div>

        <!--Rand-->    
        <div class="col-2"></div>
    </div>
    <div class="row">
        <!--Rand-->
        <div class="col-2"></div>
            
            <div class="col-1" style="justify-content: center; align-items: center; display: flex; border-bottom: solid; border-width:thin; border-color: lightgrey;"><img src="../database/images/pin.png" style="height: 50%;"></div>
            
            <div class="col-3" style="border-bottom: solid; border-width:thin; border-color: lightgrey;">
                <p class="light-text">Liefertermin</p>
                <p class="text">$var:Termin</p>
            </div>
            
            <div class="col-1" style="border-bottom: solid; border-width:thin; border-color: lightgrey;"></div>

            <div class="col-2" style="justify-content: center; align-items: center; display: flex; border-bottom: solid; border-width:thin; border-color: lightgrey;">
            <button type="button" class="btn btn-secondary"><img src="../database/images/pen.png" style="height: 2.5vh;" >Liefertermin ändern</button>
            </div>

        <!--Rand-->    
        <div class="col-2"></div>
    </div>


    <!--<?php
    include("../services/productProvider/loadAllProducts.php");
    ?>-->

    <!--warenkorb insert-->
    <div class="row">
        <!--Rand-->
        <div class="col-3"></div>
            
            <div class="col-1" style="justify-content: center; align-items: center; display: flex; border-bottom: solid; border-width:thin; border-color: lightgrey;background-color:green;">
            <button class="delete"><img src="../database/images/trash.png" style="height: 30%;"></button>
            </div>
            
            <div class="col-1" style="justify-content: center; align-items: center; display: flex; border-bottom: solid; border-width:thin; border-color: lightgrey;background-color:blue;">
            <button class="delete"><img src="../database/images/trash.png" style="height: 30%;"></button>
            </div>

            <div class="col-2" style="background-color: brown;">
                
            </div>
        
        <!--Rand-->    
        <div class="col-3"></div>
    </div>

</div>

</body>
</html>