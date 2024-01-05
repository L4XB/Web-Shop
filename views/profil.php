<?php
session_start()
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>

    <!-- Favicons -->
    <link rel="icon" type="image/x-icon" href="../assets/icons/favicon-192x192.ico">

    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- custom css -->
    <link rel="stylesheet" href="../style/#.css">
    
   <!-- bootstrap js -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
   
</head>

<body>

    <!-- header -->
    <?php include 'header.php'; ?>

    <div class="container pt-4" style="margin-left: 12%;">
        <div class="col-lg-6 order-2 order-lg-1">
            <h1>Mein Konto:</h1>
        </div>
        <ul class="breadcrumb undefined">
            <li class="breadcrumb-item"><a href="homepage.php" class="text-dark">Home</a></li>
            <li class="breadcrumb-item active"><span class="text-dark">Konto</span></li>
        </ul>
    </div>

    <div class="container">
        <?php
        if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {
            $name = $_SESSION['name'];
            echo "<h2 style='text-align:left;'>Willkommen zurück $name!</h2>";
        }
        ?>
        <br>
        <main role="main">
            <div class="container">
                <div class="card-deck mb-3 text-center">
                    <div class="card mb-4 box-shadow">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">2FA</h4>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                                    class="bi bi-qr-code-scan" viewBox="0 0 16 16">
                                    <path
                                        d="M0 .5A.5.5 0 0 1 .5 0h3a.5.5 0 0 1 0 1H1v2.5a.5.5 0 0 1-1 0zm12 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0V1h-2.5a.5.5 0 0 1-.5-.5M.5 12a.5.5 0 0 1 .5.5V15h2.5a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H15v-2.5a.5.5 0 0 1 .5-.5M4 4h1v1H4z" />
                                    <path d="M7 2H2v5h5zM3 3h3v3H3zm2 8H4v1h1z" />
                                    <path d="M7 9H2v5h5zm-4 1h3v3H3zm8-6h1v1h-1z" />
                                    <path
                                        d="M9 2h5v5H9zm1 1v3h3V3zM8 8v2h1v1H8v1h2v-2h1v2h1v-1h2v-1h-3V8zm2 2H9V9h1zm4 2h-1v1h-2v1h3zm-4 2v-1H8v1z" />
                                    <path d="M12 9h2V8h-2z" />
                                </svg>
                            </div>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>Aktivieren Sie die Zwei-Faktor-Authentifizierung (2FA), um die Sicherheit Ihres
                                    Kontos zu erhöhen und Ihre persönlichen Daten vor unbefugtem Zugriff zu schützen.
                                </li>
                            </ul>

                            <div style="d-flex flex-column align-items-center">
                                <?php
                                include '../services/userProvider/2FA.php';
                                // Aufruf der Methode is2FAEnabled
                                if (is2FAEnabled()) {
                                    echo '<form action="../services/userProvider/disable2FA.php" method="post" style="margin: 0;">
                                            <button type="submit" class="btn btn-lg btn-block btn-outline-warning">Deaktivieren</button>
                                        </form>';
                                } else {
                                    echo '<form action="2FA.php" method="post" style="margin: 0;">
                                            <button type="submit" class="btn btn-lg btn-block btn-warning">Aktivieren</button>
                                        </form>';
                                }
                                ?>
                            </div>

                        </div>
                    </div>

                    <div class="card mb-4 box-shadow">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">Passwort</h4>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                                    class="bi bi-key" viewBox="0 0 16 16">
                                    <path
                                        d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8m4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5" />
                                    <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                                </svg>
                            </div>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>Hier haben Sie die Möglichkeit Ihr Passwort zu Ändern. Beachten Sie, dass das neue
                                    Passwort min. 9 Zeichen lang ist, sowie Großbuchstaben, Kleinbuchstaben und Zahlen
                                    beinhalten muss.</li>
                            </ul>

                            <div style="d-flex flex-column align-items-center">
                                <form action="reset_password/reset_password.php" method="post" style="margin: 0;">
                                    <button type="submit" class="btn btn-lg btn-block btn-outline-warning">Passwort
                                        ändern</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4 box-shadow">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">Bestellhistorie</h4>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                                    class="bi bi-cart-check" viewBox="0 0 16 16">
                                    <path
                                        d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                                    <path
                                        d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                                </svg>
                            </div>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>Sehen Sie sich Ihre Bestellhistorie an, um einem umfassenden Überblick über Ihre
                                    vergangenen Bestellungen bekommen. Hier haben Sie zudem die Möglichkeit diese erneut
                                    zu bestellen.</li>
                            </ul>

                            <div style="d-flex flex-column align-items-center">
                                <form action="orderHistory.php" method="post" style="margin: 0;">
                                    <button type="submit"
                                        class="btn btn-lg btn-block btn-outline-warning">Bestellhistorie
                                        ansehen</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
                    crossorigin="anonymous"></script>
                <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
                <script src="../../assets/js/vendor/popper.min.js"></script>
                <script src="../../dist/js/bootstrap.min.js"></script>
            </div>
            <br>
            <br>
        </main>

        <!-- Bootstrap core JavaScript
                ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </div>

    <!-- footer -->
    <?php include 'footer.php'; ?>

</body>

</html>