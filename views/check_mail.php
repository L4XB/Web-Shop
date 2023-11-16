<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify</title>

    <!--Style-->
    <link rel="stylesheet" href="../style/login.css">
    <link rel="stylesheet" href="../style/signUp.css">
    <link rel="icon" type="image/x-icon" href="../assets/icons/favicon-192x192.ico">

    <!--Scripts-->
    <script src="../scripts/login.js"></script>
    <script src="../scripts/navigation.js"></script>

</head>

<body>
    <div class="container-body">
        <!--Left Side-->
        <div id="container-left-side">
            <div id="container-left-side-items">
                <form id="signUpForm" method="post" action="../services/userProvider/checkVerificationCode.php">
                    <h1>Code Eingeben</h1>
                    <p>Schauen Sie in Ihre Mail und geben dann den Code ein:</p>
                    <div class="form-row">

                        <input type="text" maxlength="1" class="input-numbers"
                            onkeyup="jumpToNextInput(this, 'numberTwo')" id="numberOne" name="numberOne"
                            style="width: 10%;" required>
                        <input type="text" maxlength="1" class="input-numbers"
                            onkeyup="jumpToNextInput(this, 'numberThree')" id="numberTwo" name="numberTwo"
                            style="width: 10%;" required>
                        <input type="text" maxlength="1" class="input-numbers"
                            onkeyup="jumpToNextInput(this, 'numberFour')" id="numberThree" name="numberThree"
                            style="width: 10%;" required>
                        <input type="text" maxlength="1" class="input-numbers"
                            onkeyup="jumpToNextInput(this, 'numberFive')" id="numberFour" name="numberFour"
                            style="width: 10%;" required>
                        <input type="text" maxlength="1" class="input-numbers"
                            onkeyup="jumpToNextInput(this, 'numberSix')" id="numberFive" name="numberFive"
                            style="width: 10%;" required>
                        <input type="text" maxlength="1" class="input-numbers" id="numberSix" name="numberSix"
                            style="width: 10%;" required>

                        <script>
                            function jumpToNextInput(element, nextInputId) {
                                if (element.value.length == element.maxLength) {
                                    var nextInput = document.getElementById(nextInputId);
                                    if (nextInput != null) {
                                        nextInput.focus();
                                    }
                                }
                            }
                        </script>
                    </div>

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
        <!--Right Side-->
        <div id="container-right-side">
            <img height="550px" src="../assets/images/inf-logo.png" alt="">
        </div>
    </div>
</body>

</html>