<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontakt</title>
    <link rel="icon" type="image/x-icon" href="../assets/icons/favicon-192x192.ico">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="../style/kontakt.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            $('#submitButton').click(function (event) {
                event.preventDefault();
                showSuccessAlert();
            });

            function showSuccessAlert() {


                document.getElementById('myForm').reset();
                Swal.fire({
                    title: "Abgesendet!",
                    text: "Wir melden uns bei dir sobald wie möglich!",
                    icon: "success"
                });
            }
        });
    </script>
    <script>
        $(document).ready(function () {
            $('[data-toggle="collapse"]').click(function () {
                var arrow = $(this).find('.fas');
                if ($(this).attr('aria-expanded') == 'false') {
                    arrow.removeClass('fa-angle-right');
                    arrow.addClass('fa-angle-down');
                } else {
                    arrow.removeClass('fa-angle-down');
                    arrow.addClass('fa-angle-right');
                }
            });
        });
    </script>
</head>

<body>
    <?php include 'klettergerüst.php'; ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col" style="text-align: left;">
                <h1>Kontakt</h1>
                <p>Wir versuchen, jede Anfrage schnellstmöglich zu beantworten!</p>
                <br>

                <p data-toggle="collapse" href="#collapse1" role="button" aria-expanded="false"
                    aria-controls="collapse1">
                    <i class="fas fa-angle-right"></i> Wo finde ich meine Bestellungen? Wo finde ich meine
                    Bestellungen?
                </p>
                <div class="collapse" id="collapse1">
                    <div class="card card-body">
                        Deine Bestellung findest du bei deinem Profil unter "Order History".
                        Durch einen Klick auf die einzelnen Bestellungen erhältst du genauere Informationen zu deiner
                        Bestellungen.
                    </div>
                </div>

                <p data-toggle="collapse" href="#collapse2" role="button" aria-expanded="false"
                    aria-controls="collapse2">
                    <i class="fas fa-angle-right"></i> Wie kann ich 2FA wieder deaktivieren?
                </p>
                <div class="collapse" id="collapse2">
                    <div class="card card-body">
                        2FA kannst du ganz einfach über deine Profilseite deaktivieren -> vorrausgesetzt ,du hast es
                        davor aktiviert. ;)
                    </div>
                </div>

                <p data-toggle="collapse" href="#collapse3" role="button" aria-expanded="false"
                    aria-controls="collapse3">
                    <i class="fas fa-angle-right"></i> Wo finde ich meine Rechnung?
                </p>
                <div class="collapse" id="collapse3">
                    <div class="card card-body">
                        Die Rechnung findest Du in ihren Mails, nach der Bestellung wurde Dir eine Mail mit allen
                        wichtig Informationen zugeschickt.
                    </div>
                </div>

                <p>Vielleicht hast Du Deine Antwort schon in unseren FAQ gefunden. Ansonsten freuen wir uns über Deine
                    Anfrage über unser Kontaktformular.</p>
                <h3>Kontaktformular</h3>

                <form id="myForm">
                    <div class="form-group">
                        <label for="InputName">Name*</label>
                        <input type="name" class="form-control" id="nameInput" placeholder="Sag uns wie du heißt."
                            required>
                    </div>
                    <div class="form-group">
                        <label for="InputEmail">E-Mail Adresse*</label>
                        <input type="email" class="form-control" id="emailInput"
                            placeholder="E-Mail Adresse hier, Bitte!" required>

                    </div>
                    <div class="form-group">
                        <label for="InputBetreff">Betreff*</label>
                        <input type="betreff" class="form-control" id="betreffInput"
                            placeholder="Was ist dein Anliegen? Kurzfassung" required>
                    </div>
                    <div class="form-group">
                        <label for="InputNachricht">Nachricht</label>
                        <textarea class="form-control" id="nachrichtInput" placeholder="Deine Nachricht an uns!"
                            rows="6" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="InputNummer">Deine Bestell- oder Rechnungsnummer</label>
                        <input type="nummer" class="form-control" id="nummerInput" required>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-primary" id="submitButton"><svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-send" viewBox="0 0 16 16">
                            <path
                                d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                        </svg> Submit </button>
                </form>
                <br>
                <br>
            </div>
        </div>
    </div>

</body>

</html>