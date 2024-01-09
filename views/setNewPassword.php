<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="setNewPassword" content="width=device-width, initial-scale=1.0">
    <title>New Password</title>

    <!--Style-->
    <link rel="stylesheet" href="../style/signUp.css">
    <link rel="stylesheet" href="../style/login.css">
    <link rel="icon" type="image/x-icon" href="../assets/icons/favicon-192x192.ico">
    <script>
        function validateForm() {
            // Holen Sie die Passwörter aus den Eingabefeldern
            var password = document.getElementById('newPassword').value;
            var confirmPassword = document.getElementById('confirmPassword').value;

            // Überprüfen Sie, ob die Passwörter übereinstimmen
            if (password !== confirmPassword) {
                // Wenn die Passwörter nicht übereinstimmen, zeigen Sie eine Fehlermeldung an und verhindern Sie das Absenden des Formulars
                document.getElementById('passwordError').textContent = 'Passwörter stimmen nicht überein';
                return false;
            }

            // Überprüfen Sie, ob die Passwörter mindestens 9 Zeichen lang sind
            if (password.length < 9) {
                // Wenn die Passwörter zu kurz sind, zeigen Sie eine Fehlermeldung an und verhindern Sie das Absenden des Formulars
                document.getElementById('passwordError').textContent = 'Passwort muss mindestens 9 Zeichen lang sein';
                return false;
            }

            if (!/[a-z]/.test(password)) {
                document.getElementById('passwordError').textContent = 'Passwort muss mindestens einen Kleinbuchstaben enthalten';
                return false;
            }

            if (!/[A-Z]/.test(password)) {
                document.getElementById('passwordError').textContent = 'Passwort muss mindestens einen Großbuchstaben enthalten';
                return false;
            }

            if (!/\d/.test(password)) {
                document.getElementById('passwordError').textContent = 'Passwort muss mindestens eine Zahl enthalten';
                return false;
            }

            // Wenn die Validierung erfolgreich war, lassen Sie das Formular absenden
            return true;
        }
    </script>
</head>

<body>
    <div class="container-body">
        <div id="container-left-side">
            <div id="container-left-side-items">
                <form id="signUpForm" method="post" action="../services/userProvider/updatePassword.php"
                    onsubmit="return validateForm()">
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
                    <div id="passwordError" style="color: red;text-align:center;"></div>
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