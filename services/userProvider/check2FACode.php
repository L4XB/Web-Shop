<?php
include '2fa.php'; // Stellen Sie sicher, dass die Datei 2fa.php im selben Verzeichnis liegt oder passen Sie den Pfad entsprechend an

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extrahieren der Daten aus den Textfeldern
    $numberOne = $_POST['numberOne'];
    $numberTwo = $_POST['numberTwo'];
    $numberThree = $_POST['numberThree'];
    $numberFour = $_POST['numberFour'];
    $numberFive = $_POST['numberFive'];
    $numberSix = $_POST['numberSix'];

    // Zusammenfügen der Daten zu einem Code
    $code = $numberOne . $numberTwo . $numberThree . $numberFour . $numberFive . $numberSix;
    $secret = get2FASecret();
    // Überprüfen des Codes mit der Methode isCodeValid
    if (isCodeValid($secret, $code)) {
        // Wenn der Code gültig ist, leiten Sie auf die Homepage um


        $_SESSION['2FAAktiv'] = true;
        enable2FA();
        header('Location: ../../views/homepage.php');
        exit;
    } else {
        // Wenn der Code ungültig ist, geben Sie eine Fehlermeldung aus
        echo "Der eingegebene Code ist ungültig.";
    }
}
?>