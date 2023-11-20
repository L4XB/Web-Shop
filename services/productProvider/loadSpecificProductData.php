<?php
function getProductName()
{
    //Server Connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webshop";

    // Überprüfen Sie, ob der Query-Parameter 'id' gesetzt ist.
    if (isset($_GET['id'])) {
        $productId = $_GET['id'];

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Überprüfen Sie die Verbindung.
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Erstellen Sie die SQL-Abfrage.
        $sql = "SELECT product_name FROM products WHERE product_id = ?";

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
    $dbname = "webshop";

    // Überprüfen Sie, ob der Query-Parameter 'id' gesetzt ist.
    if (isset($_GET['id'])) {
        $productId = $_GET['id'];

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Überprüfen Sie die Verbindung.
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Erstellen Sie die SQL-Abfrage.
        $sql = "SELECT product_image FROM products WHERE product_id = ?";

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

        return $productImage;
    }
}
?>