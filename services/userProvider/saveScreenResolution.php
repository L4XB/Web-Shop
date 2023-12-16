<?php
session_start();

if (isset($_POST['resolution'])) {
    $_SESSION['resolution'] = $_POST['resolution'];
}
?>