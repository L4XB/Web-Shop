<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <?php include 'klettergerüst.php'; ?>
    <br>
    <div style="display: flex; justify-content: center; align-items: center;">
        <?php
        include '../services/userProvider/2FA.php';
        // Aufruf der Methode is2FAEnabled
        if (is2FAEnabled()) {
            echo '<form action="../services/userProvider/disable2FA.php" method="post" style="margin: 0;">
                    <button type="submit" class="btn btn-warning">2FA Deaktivieren</button>
                  </form>';
        } else {
            echo '<form action="2FA.php" method="post" style="margin: 0;">
                    <button type="submit" class="btn btn-warning">2FA Aktivieren</button>
                  </form>';
        }
        ?>
    </div>


</body>

</html>