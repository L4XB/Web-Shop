<?php
session_start();
if ($_SESSION['loggedIn'] === true) {
    $_SESSION['loggedIn'] = false;
    header('Location: ../../views/homepage.php');
    exit;
}
?>