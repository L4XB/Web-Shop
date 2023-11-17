<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'vendor/phpgangsta/googleauthenticator/PHPGangsta/GoogleAuthenticator.php';
require 'vendor/autoload.php';



$ga = new PHPGangsta_GoogleAuthenticator();
$secret = $ga->createSecret();
echo "Secret is: " . $secret . "\n\n";

$qrCodeUrl = $ga->getQRCodeGoogleUrl('INF-Webshop', $secret);
echo "Google Charts URL for the QR-Code: " . $qrCodeUrl . "\n\n";

$oneCode = $ga->getCode($secret);
echo "Checking Code '$oneCode' and Secret '$secret':\n";

$checkResult = $ga->verifyCode($secret, $oneCode, 2);    // 2 = 2*30sec clock tolerance
if ($checkResult) {
    echo 'OK';
} else {
    echo 'FAILED';
}