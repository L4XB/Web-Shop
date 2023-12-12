<?php
function getProductName()
{
    //Server Connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webShopFSI";

    // Überprüfen Sie, ob der Query-Parameter 'id' gesetzt ist.
    if (isset($_GET['id'])) {
        $productId = $_GET['id'];

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Überprüfen Sie die Verbindung.
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Erstellen Sie die SQL-Abfrage.
        $sql = "SELECT productName FROM products WHERE productID = ?";

        // Bereiten Sie die SQL-Abfrage vor.
        $stmt = $conn->prepare($sql);

        // Binden Sie den Wert an den Platzhalter.
        $stmt->bind_param("i", $productId);

        // Führen Sie die Abfrage aus.
        $stmt->execute();

        // Binden Sie das Ergebnis an eine Variable.
        $stmt->bind_result($productName);

        // Holen Sie das Ergebnis.
        $stmt->fetch();

        // Schließen Sie die Anweisung und die Verbindung.
        $stmt->close();
        $conn->close();

        return $productName;
    }
}


function getProductImage()
{
    //Server Connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webShopFSI";

    // Überprüfen Sie, ob der Query-Parameter 'id' gesetzt ist.
    if (isset($_GET['id'])) {
        $productId = $_GET['id'];

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Überprüfen Sie die Verbindung.
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Erstellen Sie die SQL-Abfrage.
        $sql = "SELECT pathName FROM products WHERE productID = ?";

        // Bereiten Sie die SQL-Abfrage vor.
        $stmt = $conn->prepare($sql);

        // Binden Sie den Wert an den Platzhalter.
        $stmt->bind_param("i", $productId);

        // Führen Sie die Abfrage aus.
        $stmt->execute();

        // Binden Sie das Ergebnis an eine Variable.
        $stmt->bind_result($productImage);

        // Holen Sie das Ergebnis.
        $stmt->fetch();

        // Schließen Sie die Anweisung und die Verbindung.
        $stmt->close();
        $conn->close();

        return "../assets/images/produkts/" . $productImage . ".png";
    }
}

function getProductPrice()
{
    //Server Connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webShopFSI";

    // Überprüfen Sie, ob der Query-Parameter 'id' gesetzt ist.
    if (isset($_GET['id'])) {
        $productId = $_GET['id'];

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Überprüfen Sie die Verbindung.
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Erstellen Sie die SQL-Abfrage.
        $sql = "SELECT price FROM products WHERE productID = ?";

        // Bereiten Sie die SQL-Abfrage vor.
        $stmt = $conn->prepare($sql);

        // Binden Sie den Wert an den Platzhalter.
        $stmt->bind_param("i", $productId);

        // Führen Sie die Abfrage aus.
        $stmt->execute();

        // Binden Sie das Ergebnis an eine Variable.
        $stmt->bind_result($productPrice);

        // Holen Sie das Ergebnis.
        $stmt->fetch();

        // Schließen Sie die Anweisung und die Verbindung.
        $stmt->close();
        $conn->close();

        return $productPrice;
    }
}
?>