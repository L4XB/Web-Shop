<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="0; URL=views/homepage.php">
    <title>Start</title>
</head>

<body>
    <?php
    session_start();
    $_SESSION['loggedIn'] = false;
    session_destroy();
    ?>
</body>

</html>