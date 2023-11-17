<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '../../vendor/phpgangsta/googleauthenticator/PHPGangsta/GoogleAuthenticator.php';
require '../../vendor/autoload.php';


function createSecret()
{
    $ga = new PHPGangsta_GoogleAuthenticator();
    $secret = $ga->createSecret();
    echo "Secret is: " . $secret . "\n\n";

    return $secret;

}
function getQRCode($secret)
{
    $ga = new PHPGangsta_GoogleAuthenticator();
    $qrCodeUrl = $ga->getQRCodeGoogleUrl('INF-Webshop', $secret);
    echo "Google Charts URL for the QR-Code: " . $qrCodeUrl . "\n\n";

    return $qrCodeUrl;

}

function isCodeValid($secret, $oneCode)
{
    $ga = new PHPGangsta_GoogleAuthenticator();
    $checkResult = $ga->verifyCode($secret, $oneCode, 2);    // 2 = 2*30sec clock tolerance
    if ($checkResult) {
        return true;
    } else {
        return false;
    }
}
?>