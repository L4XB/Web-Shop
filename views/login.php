<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!--Style-->
    <link rel="stylesheet" href="../style/login.css">
    <link rel="icon" type="image/x-icon" href="../assets/icons/favicon-192x192.ico">

    <!--Scripts-->
    <script src="../scripts/login.js"></script>
</head>

<body>
    <!--Box where left and right box take place-->
    <div class="container-body">
        <!--left Side-->
        <div id="container-left-side">
            <form id="loginForm" action="../services/userProvider/login.php" method="POST">
                <h2>Login</h2>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Login</button>
            </form>
            <p id="signUp"><a href="signUp.php">SignUp</a></p>
        </div>
        <!--right Side-->
        <div id="container-right-side">

        </div>

    </div>
</body>

</html>