<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Password</title>

    <!--Style-->
    <link rel="stylesheet" href="../style/signUp.css">
    <link rel="stylesheet" href="../style/login.css">
    <link rel="icon" type="image/x-icon" href="../assets/icons/favicon-192x192.ico">
</head>

<body>
    <div class="container-body">
        <div id="container-left-side">
            <div id="container-left-side-items">
                <form id="signUpForm" method="post" action="../services/userProvider/updatePassword.php">
                    <h1>Erstellen Sie ein Passwort</h1>
                    <p>Mit diesem Passwort können Sie sich in Zukunft in Ihr Benutzerprofil bei uns einloggen. </p>
                    <br>
                    <div class="form-field">
                        <label for="email">Passwort:</label>
                        <input placeholder="Geben Sie ein Passwort ein" style="width: 200%;" type="password"
                            id="newPassword" name="password" required>
                    </div>

                    <br>
                    <div class="form-row">
                        <div class="form-field">
                            <label for="password">Passwort wiederholen:</label>
                            <input placeholder="Bestätigen Sie ihrt Passwort" type="password" id="confirmPassword"
                                name="passwordSe" style="width: 200%;" required>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="form-row">
                        <a id="rejectText" href="login.php">
                            <p>abbrechen</p>
                        </a>

                        <button style="width: 50%;" name="submit" type="submit">Weiter</button>
                    </div>
                </form>

            </div>
        </div>
        <div id="container-right-side">
            <img height="550px" src="../assets/images/inf-logo.png" alt="">
        </div>
    </div>
</body>

</html>