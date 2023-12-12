<?php
session_start();
if ($_SESSION['loggedIn'] === true) {
    $_SESSION['loggedIn'] = false;
    header('Location: ../../views/homepage.php');
    // session_destroy();
    exit;
}
?>