<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        session_start();

        // Abrufen der Variable aus der Session
        $emailUser = $_SESSION['emailUser'];
        $numberOne = $_POST['numberOne'];
        $numberTwo = $_POST['numberTwo'];
        $numberThree = $_POST['numberThree'];
        $numberFour = $_POST['numberFour'];
        $numberFive = $_POST['numberFive'];
        $numberSix = $_POST['numberSix'];

        $codeFromInput = $numberOne . $numberTwo . $numberThree . $numberFour . $numberFive . $numberSix;
        $codeFromInput = strval($codeFromInput);

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "webshop";
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Vorbereiten und Binden
        $stmt = $conn->prepare("SELECT verificationCode FROM users WHERE email = ?");
        $stmt->bind_param("s", $emailUser);

        // Ausführen der Anweisung
        $stmt->execute();

        // Binden des Ergebnisses
        $stmt->bind_result($codeFromDb);

        // Abrufen des Ergebnisses
        $stmt->fetch();

        if ($codeFromDb == $codeFromInput) {
            echo "Der eingegebene Code ist korrekt.";
            header('Location: ../../views/products.php');
        } else {
            echo "Der eingegebene Code ist nicht korrekt.";
            echo $codeFromInput;
            echo $codeFromDb;
            echo $emailUser;
        }

        // Schließen der Anweisung und der Verbindung
        $stmt->close();
        $conn->close();

    }
}
?>