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
    if (isset($_SESSION['resolution'])) {
        return $_SESSION['resolution'];
    } else {
        return 'Unknown';
    }
}


function createUser($email, $password, $firstName, $lastName)
{
    $servername = "localhost";
    $username = "root";
    $dbpassword = ""; // Change the variable name to avoid conflicts
    $dbname = "webShop";

    // Create connection
    $conn = new mysqli($servername, $username, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $passwordGenerated = generatePassword();
    session_start();
    $_SESSION['clearPassword'] = $passwordGenerated;
    $twoFASecret = createSecret();
    $_SESSION['secretKey'] = $twoFASecret;
    $_SESSION['loggedIn'] = true;
    $_SESSION['clearPassword'] = $passwordGenerated;
    $_SESSION['email'] = $email;
    $hashedPassword = hash('sha256', $passwordGenerated);
    $currentTimestamp = date('Y-m-d H:i:s');

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (email, password, firstName, lastName, lastLogin, screenResolution, os, twoFASecret, use2Fa, isFirstLogin, createdAt) VALUES (?, ?, ?, ?, ?, 'unknown', 'unknown', ?, false, true, ?)");
    $stmt->bind_param("ssssss", $email, $hashedPassword, $firstName, $lastName, $currentTimestamp, $twoFASecret);

    // Execute statement
    if ($stmt->execute()) {
        echo "New user created successfully.";

        // Query user data
        $userStmt = $conn->prepare("SELECT firstName, lastLogin FROM users WHERE email = ?");
        $userStmt->bind_param("s", $email);
        $userStmt->execute();
        $userResult = $userStmt->get_result();
        if ($userResult->num_rows > 0) {
            $user = $userResult->fetch_assoc();
            $_SESSION['name'] = $user['firstName'];
            $_SESSION['lastLogIn'] = $user['lastLogin'];
        }
        $userStmt->close();
    } else {
        echo "Error creating user: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}

?>