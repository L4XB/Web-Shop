<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="2FA" content="width=device-width, initial-scale=1.0">
    <title>2FA</title>
    <!--Style-->
    <link rel="stylesheet" href="../style/signUp.css">
    <link rel="stylesheet" href="../style/login.css">
    <link rel="icon" type="image/x-icon" href="../assets/icons/favicon-192x192.ico">
</head>

<body>
    <?php
    include "../services/userProvider/2FA.php";
    $twoFASecret = get2FASecret();
    $qrCode = getQRCode($twoFASecret)
        ?>
    <div class="container-body">

        <!--left Side-->
        <div id="container-left-side">
            <div id="fa-items">

                <h1>Scannen Sie den QR-Code</h1>
                <p>Scannen Sie den QR-Code mit einer 2FA App:</p>
                <div id="fa-items">
                    <img src="<?php echo $qrCode; ?>" alt="">
                </div>
                <div id="error-message" style="color: red;"></div>
                <br>
                <br>
                <form action="check_2fa.php" method="post" style="width: 100%;">
                    <button style="width:100%;" type="submit">Weiter</button>
                </form>
                <br>


            </div>
        </div>
        <!--right Side-->
        <div id="container-right-side">
            <img height="550px" src="../assets/images/inf-logo.png" alt="">
        </div>
    </div>
</body>

</html>