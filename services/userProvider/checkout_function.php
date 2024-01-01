<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webShopFSI";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}
session_start();

// Holen Sie die aktuelle Benutzer-ID
$currentUserId = $_SESSION['userId'];
// Holen Sie alle Elemente aus der `shoppingCart`-Tabelle für den aktuellen Benutzer
$sql = "SELECT productID, amount FROM shoppingCart WHERE userID = $currentUserId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Durchlaufen Sie alle zurückgegebenen Zeilen
    while ($row = $result->fetch_assoc()) {
        $productID = $row['productID'];
        $amount = $row['amount'];

        // Überprüfen Sie den Lagerbestand für jedes Produkt
        $sql = "SELECT stock FROM products WHERE productID = $productID";
        $stockResult = $conn->query($sql);
        $stockRow = $stockResult->fetch_assoc();
        $stock = $stockRow['stock'];

        // Wenn nicht genügend Produkte auf Lager sind, leiten Sie den Benutzer auf eine Fehlerseite um
        if ($stock < $amount) {
            header('Location: ../../views/error.php');
            exit();
        }
    }
} else {
    echo "Keine Einträge in der ShoppingCart-Tabelle für den aktuellen Benutzer.";
}



// Generieren Sie eine zufällige Bestellnummer
$orderNumber = rand(1000000000, 9999999999);

// Extrahieren Sie die vollständige Adresse und die Zahlungsmethode aus dem POST-Array
$fullAddress = $conn->real_escape_string($_POST['fullAddress']);
$paymentMethod = $conn->real_escape_string($_POST['paymentMethod']);
$versandart = $conn->real_escape_string($_POST['shippingMethod']);
$gesamtBetrag = $conn->real_escape_string($_POST['totalAmount']);
$betrag = str_replace(['€', ' '], '', $gesamtBetrag);
$name = $conn->real_escape_string($_POST['firstName']);
$email = $conn->real_escape_string($_POST['email']);


$sql = "INSERT INTO transactions (timestamp, userID, orderNumber, adress, paymentMethod) VALUES (CURRENT_TIMESTAMP, $currentUserId, $orderNumber, '$fullAddress', '$paymentMethod')";

// Führen Sie die SQL-Abfrage aus
if ($conn->query($sql) === TRUE) {
    // Holen Sie die ID des zuletzt eingefügten Datensatzes
    $last_id = $conn->insert_id;
    echo "Neuer Eintrag erfolgreich erstellt. Die Transaction ID ist: " . $last_id;
} else {
    echo "Fehler: " . $sql . "<br>" . $conn->error;
}

// Holen Sie die aktuelle Benutzer-ID
$currentUserId = $_SESSION['userId'];

// Fügen Sie alle Einträge der aktuellen Benutzer-ID aus der `shoppingCart` Tabelle in die `history` Tabelle ein
$sql = "INSERT INTO history (timestamp, amount, userID, productID, transactionID)
        SELECT CURRENT_TIMESTAMP, amount, userID, productID, $last_id
        FROM shoppingCart
        WHERE userID = $currentUserId";

if ($conn->query($sql) === TRUE) {
    echo "Einträge erfolgreich in die History-Tabelle verschoben.";
} else {
    echo "Fehler beim Verschieben der Einträge: " . $conn->error;
}

$sql = "SELECT productID, amount FROM shoppingCart WHERE userID = $currentUserId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Durchlaufen Sie alle zurückgegebenen Zeilen
    while ($row = $result->fetch_assoc()) {
        $productID = $row['productID'];
        $amount = $row['amount'];

        // Aktualisieren Sie den Lagerbestand in der `products`-Tabelle
        $sql = "UPDATE products SET stock = stock - $amount WHERE productID = $productID";
        if ($conn->query($sql) === TRUE) {
            echo "Lagerbestand erfolgreich aktualisiert.";
        } else {
            echo "Fehler beim Aktualisieren des Lagerbestands: " . $conn->error;
        }
    }
} else {
    echo "Keine Einträge in der ShoppingCart-Tabelle für den aktuellen Benutzer.";
}


// Löschen Sie die Daten aus der `shoppingCart` Tabelle für den aktuellen Benutzer
$sql = "DELETE FROM shoppingCart WHERE userID = $currentUserId";

if ($conn->query($sql) === TRUE) {
    echo "Einträge erfolgreich aus der ShoppingCart-Tabelle gelöscht.";
} else {
    echo "Fehler beim Löschen der Einträge: " . $conn->error;
}

require '../mailer/mailer_checkout.php';
sendConfirmationMail($orderNumber, $versandart, $last_id, $betrag, $name, $email);

header('Location: ../../views/thankyou.php');





?>