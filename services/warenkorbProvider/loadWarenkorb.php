<?php
//Server Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webshop";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
} else {

}
session_start();
$UserID=$_SESSION['UserID'];
$sql = "SELECT * FROM ShoppingCart
        WHERE userID=$UserID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
        //Warenkorb insert
        echo '<div class="row">';

        echo '<div class="col-2"></div>';    
            
        echo '<div class="col-1" style="justify-content: center; align-items: center; display: flex; border-bottom: solid; border-width:thin; border-color: lightgrey;"><button class="delete"><img src="../database/images/trash.png" style="height: 30%;"></button></div>';

        echo '<div class="col-1" style="justify-content: right; align-items: center; display: flex; border-bottom: solid; border-width:thin; border-color: lightgrey;"><img src="' . $row['product_image'] . '" alt=""></div>';
            
        echo '<div class="col-2" style="border-bottom: solid; border-width:thin; border-color: lightgrey;"><p class="light-text">' . $row['product_name'] . '</p><p class="text">' . $row['product_shortdescription'] . '</p></div>';    
            
        echo '<div class="col-2" style="justify-content: center; align-items: center; display: flex; border-bottom: solid; border-width:thin; border-color: lightgrey;"><div id="counter"><div id="minus">-</div><div id="number">1</div><div id="plus">+</div></div></div>';
            
        echo '<div class="col-1" style="justify-content: right; align-items: center; display: flex; border-bottom: solid; border-width:thin; border-color: lightgrey;"><p>' . $row['product_price'] . '</p></div>';
            
        echo '<div class="col-2"></div>';

        echo '</div>';
}}
else {
    echo "Keine Artikel im Warenkorb.";
}

// Verbindung schließen
$conn->close();?>
    