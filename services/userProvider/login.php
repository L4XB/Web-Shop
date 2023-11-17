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

/////////////////
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashedPassword = hash('sha256', $password);

    $sql = "SELECT * FROM users WHERE email = '$username' AND passwort = '$hashedPassword'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $response = ['success' => true];
    } else {
        $response = ['success' => false];
    }

    header('Content-Type: application/json');
    echo json_encode($response);


}
$conn->close();
?>