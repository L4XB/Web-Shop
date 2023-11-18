<?php
include '2fa.php';
disable2FA();
header('Location: ../../views/profil.php');
exit;
?>