<?php
include '2FA.php';
disable2FA();
header('Location: ../../views/profil.php');
exit;
?>