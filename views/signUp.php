<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>

    <!--Style-->
    <link rel="stylesheet" href="../style/signUp.css">
    <link rel="stylesheet" href="../style/login.css">
    <link rel="icon" type="image/x-icon" href="../assets/icons/favicon-192x192.ico">
</head>

<body>
    <div class="container-body">
        <!--left Side-->
        <div id="container-left-side">
            <form id="signUpForm" method="post" action="signUp.php">
                <div class="form-row">
                    <label for="email">E-Mail:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-row">
                    <div class="form-field">
                        <label for="firstName">Vorname:</label>
                        <input type="text" id="firstName" name="firstName" style="width: 90%;" required>
                    </div>
                    <div class="form-field">

                        <label for="lastName">Nachname:</label>
                        <input type="text" id="lastName" name="lastName" style="width: 90%;" required>
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-field">
                        <label for="password">Passwort:</label>
                        <input style="width: 100%;" type="password" id="password" name="password" required>
                    </div>
                </div>
                <div class="form-row">
                    <label for="phonePrefix">Telefonnummer:</label>
                    <select id="phonePrefix" name="phonePrefix" style="width: 20%;">
                        <!-- Fügen Sie hier die Optionen für die Vorwahlen hinzu -->
                    </select>
                    <input type="tel" id="phoneNumber" name="phoneNumber" style="width: 80%;" required>
                </div>
                <div class="form-row">
                    <button type="submit">Weiter</button>
                </div>
            </form>
        </div>
        <!--right Side-->
        <div id="container-right-side">
            <img height="550px" src="../assets/images/inf-logo.png" alt="">
        </div>
    </div>
</body>

</html>