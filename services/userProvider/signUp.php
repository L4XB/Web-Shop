<?php
require '2FA.php';

function generatePassword()
{
    $length = 10;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
    $charactersLength = strlen($characters);
    $randomPassword = '';
    for ($i = 0; $i < $length; $i++) {
        $randomPassword .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomPassword;
}

function getOSFromUser()
{
    $user_agent = $_SERVER['HTTP_USER_AGENT'];

    if (strpos($user_agent, 'Windows NT 10.0') !== false) {
        return 'Windows 10';
    } elseif (strpos($user_agent, 'Windows NT 6.3') !== false) {
        return 'Windows 8.1';
    } elseif (strpos($user_agent, 'Windows NT 6.2') !== false) {
        return 'Windows 8';
    } elseif (strpos($user_agent, 'Windows NT 6.1') !== false) {
        return 'Windows 7';
    } elseif (strpos($user_agent, 'Windows NT 6.0') !== false) {
        return 'Windows Vista';
    } elseif (strpos($user_agent, 'Windows NT 5.1') !== false) {
        return 'Windows XP';
    } elseif (strpos($user_agent, 'Windows NT 5.0') !== false) {
        return 'Windows 2000';
    } elseif (strpos($user_agent, 'Mac') !== false) {
        return 'Mac';
    } elseif (strpos($user_agent, 'Linux') !== false) {
        return 'Linux';
    } elseif (strpos($user_agent, 'Unix') !== false) {
        return 'Unix';
    } else {
        return 'Unknown';
    }
}

function getScreenResolution()
{

}


function createUser($email, $name, $firstName, $password)
{
    $servername = "localhost";
    $username = "root";
    $dbpassword = ""; // Ändern Sie den Variablennamen, um Konflikte zu vermeiden
    $dbname = "webshop";

    // Erstellen der Verbindung
    $conn = new mysqli($servername, $username, $dbpassword, $dbname);

    // Überprüfen der Verbindung
    if ($conn->connect_error) {
        die("Verbindung fehlgeschlagen: " . $conn->connect_error);
    }

    $passwordGeneratetd = generatePassword();
    session_start();
    $_SESSION['clearPassword'] = $passwordGeneratetd;
    $twoFASecret = createSecret();
    $_SESSION['secretKey'] = $twoFASecret;
    $_SESSION['loggedIn'] = true;
    $_SESSION['clearPassword'] = $passwordGeneratetd;
    $_SESSION['email'] = $email;
    $hashedPassword = hash('sha256', $passwordGeneratetd);
    $currentTimestamp = date('Y-m-d H:i:s');
    // Vorbereiten und Binden
    $stmt = $conn->prepare("INSERT INTO users (email, nachname, vorname, passwort,2FASecret,isVerified,lastLogIn, use2FA, isFirstLogin) VALUES (?, ?, ?, ?, ?, false,?,false,true)");
    $stmt->bind_param("ssssss", $email, $name, $firstName, $hashedPassword, $twoFASecret, $currentTimestamp);

    // Ausführen der Anweisung
    if ($stmt->execute()) {
        echo "New user created successfully.";

        // Abfrage der Benutzerdaten
        $userStmt = $conn->prepare("SELECT vorname, lastLogIn FROM users WHERE email = ?");
        $userStmt->bind_param("s", $email);
        $userStmt->execute();
        $userResult = $userStmt->get_result();
        if ($userResult->num_rows > 0) {
            $user = $userResult->fetch_assoc();
            $_SESSION['name'] = $user['vorname'];
            $_SESSION['lastLogIn'] = $user['lastLogIn'];
        }
        $userStmt->close();
    } else {
        echo "Error creating user: " . $stmt->error;
    }

    // Schließen der Anweisung und der Verbindung
    $stmt->close();
    $conn->close();
}
?>