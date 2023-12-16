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

    <!--Scripts-->
    <script src="../scripts/navigation.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#signUpForm').on('submit', function (e) {
                e.preventDefault();
                var email = $('#email').val();
                $.ajax({
                    type: 'POST',
                    url: '../services/userProvider/checkMail.php',
                    data: { email: email },
                    success: function (data) {
                        if (data == 'exists') {
                            $('#emailError').text('E-Mail schon vorhanden');
                        } else {
                            $('#signUpForm').unbind('submit').submit();
                        }
                    }
                });
            });
        });
    </script>
</head>

<body>
    <div class="container-body">
        <!--left Side-->
        <!--left Side-->
        <div id="container-left-side">
            <div id="container-left-side-items">
                <form id="signUpForm" method="post" action="../mailer.php">
                    <h1>Account erstellen</h1>
                    <div class="form-field">
                        <label for="email">E-Mail:</label>
                        <input placeholder="Geben Sie Ihre E-mail ein" style="width: 200%;" type="email" id="email"
                            name="email" required>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-field">
                            <label for="firstName">Vorname:</label>
                            <input placeholder="Geben Sie Ihren Vornamen ein" type="text" id="firstName"
                                name="firstName" style="width: 90%;" required>
                        </div>
                        <div class="form-field">

                            <label for="lastName">Nachname:</label>
                            <input placeholder="Geben Sie Ihren Nachnamen ein" type="text" id="lastName" name="lastName"
                                style="width: 90%;" required>
                        </div>

                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-field">
                            <label for="password">Telefonnummer:</label>
                            <input placeholder="Geben Sie Ihren Telefonnummer ein" type="tel" id="phoneNumber"
                                name="phoneNumber" style="width: 200%;" required>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div id="emailError" style="color: red;text-align:center;"></div>
                    <br>
                    <div class="form-row">
                        <a id="rejectText" href="login.php">
                            <p>abbrechen</p>
                        </a>

                        <button style="width: 50%;" name="submit" type="submit">Weiter</button>
                    </div>

                    <hr class="thin-black-line">
                    <div id="bottom-options">
                        <p>Sie haben schon einen Account?</p>
                        <a style="text-decoration: none;" href="login.php">
                            <p id="back-to-login">Login</p>
                        </a>
                    </div>
                </form>

            </div>
        </div>
        <!--right Side-->
        <div id="container-right-side">
            <img height="550px" src="../assets/images/inf-logo.png" alt="">
        </div>
    </div>
</body>

</html>