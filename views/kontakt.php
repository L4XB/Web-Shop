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
            <!--die Krokodilmäuler verändern sich beim öffnen noch nicht falls uns langweilig ist haha-->
            <p data-toggle="collapse" href="#collapse1" role="button" aria-expanded="false" aria-controls="collapse1">
                > Wie kann ich etwas zurücksenden oder umtauschen?
            </p>
            <div class="collapse" id="collapse1">
                <div class="card card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                </div>
            </div>

            <p data-toggle="collapse" href="#collapse2" role="button" aria-expanded="false" aria-controls="collapse2">
            <button class="dropbtn" id="dropbtn"><i class="arrow down"></i></button> Wo finde ich mein Retourenlabel?
            </p>
            <div class="collapse" id="collapse2">
                <div class="card card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                </div>
            </div>

            <p data-toggle="collapse" href="#collapse3" role="button" aria-expanded="false" aria-controls="collapse3">
                > Wo finde ich meine Rechnung?
            </p>
            <div class="collapse" id="collapse3">
                <div class="card card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                </div>
            </div>

            <p data-toggle="collapse" href="#collapse4" role="button" aria-expanded="false" aria-controls="collapse4">
                > Wann wurde meine Bestellung versendet?
            </p>
            <div class="collapse" id="collapse4">
                <div class="card card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                </div>
                <br>
            </div>

            <p>Vielleicht hast Du Deine Antwort schon in unseren FAQ gefunden. Ansonsten freuen wir uns über Deine Anfrage über unser Kontaktformular.</p>
            <h3>Kontaktformular</h3>
            
            <form>
                <div class="form-group">
                    <label for="InputName">Name*</label>
                    <input type="name" class="form-control" id="nameInput" placeholder="Sag uns wie du heißt.">
                </div>
                <div class="form-group">
                    <label for="InputEmail">E-Mail Adresse*</label>
                    <input type="email" class="form-control" id="emailInput" placeholder="E-Mail Adresse hier, Bitte!">
                    <small id="emailHelp" class="form-text text-muted">Wir teile deine Daten mit niemandem! Versprochen (:</small>
                </div>
                <div class="form-group">
                    <label for="InputBetreff">Betreff*</label>
                    <input type="betreff" class="form-control" id="betreffInput" placeholder="Was ist dein Anliegen? Kurzfassung">
                </div>
                <div class="form-group">
                <label for="InputNachricht">Nachricht</label>
                <textarea class="form-control" id="nachrichtInput" placeholder="Deine Nachricht an uns!" rows="6"></textarea>
                </div>
                <div class="form-group">
                    <label for="InputNummer">Deine Bestell- oder Rechnungsnummer</label>
                    <input type="nummer" class="form-control" id="nummerInput">
                </div>
                
                <br>
                <button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                    <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                </svg> Submit </button>
            </form>
            <br>
            <br>
        </div>
    </div>
</div>

</body>
</html>