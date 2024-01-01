<?php
$email = $_POST['email'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webShopFSI";
$conn = new mysqli($servername, $username, $password, $dbname);
$stmt = $conn->prepare('SELECT * FROM users WHERE email = ?');
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode(['exists' => true]);
} else {
    echo json_encode(['exists' => false]);
}
?>