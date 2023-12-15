<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doku</title>
    <link rel="icon" type="image/x-icon" href="../assets/icons/favicon-192x192.ico">
    <link rel="stylesheet" href="doku.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../scripts/doku.js"></script>
        
</head>
<body>
    <?php include 'klettergerüst.php'; ?>
    <div class="album py-5 bg-light">

        <div class="container">
          <h1 id="headLineTextStyle">Dokumentation</h1>
        <br>

          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="../assets/images/doku/meilensteinplanung.png" data-holder-rendered="true">
                <div class="card-body">
                  <p class="card-text">Als ersten Schritt haben wir die Kriterien des Webshops zur Hand genommen, und anhand der eine <b>Meilensteinplanung</b> erstellt.</p> <br>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" onclick="popUp_1()" class="btn btn-sm btn-outline-secondary">Anzeigen</button>
                    </div>
                    <small class="text-muted">06.11.2023</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="../assets/images/doku/mindmap.png" data-holder-rendered="true">
                <div class="card-body">
                  <p class="card-text">Als weiteren Schritt zur besseren Planung haben wir ein <b>"Flussdiagramm"</b> angelegt, anhand welchem wir uns den Userflow durch die Seiten unseres Webshops besser darstellen können.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" onclick="popUp_2()" class="btn btn-sm btn-outline-secondary">Anzeigen</button>
                    </div>
                    <small class="text-muted">07.11.2023</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="../assets/images/doku/mindmap_2.png" data-holder-rendered="true">
                <div class="card-body">
                  <p class="card-text">Ein <b>Jambord</b> wurde erstellt für eine bessere Veranschaulichung der Kriterien unseres Webshops. Dabei wurde jede Page als Post-it erstellt und die zu erfüllenden Kriterien aufgelistet. </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" onclick="popUp_3()" class="btn btn-sm btn-outline-secondary">Anzeigen</button>
                    </div>
                    <small class="text-muted">07.11.2023</small>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="../assets/images/doku/figma.png" data-holder-rendered="true">
                <div class="card-body">
                  <p class="card-text">Mit <b>Figma</b> haben wir ein Tool, mit welchem wir die gesamte Webshop UI designen können. Dies ermöglicht uns Designs zu entwerfen und erste Gedanken kreativ zu gestalten.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" onclick="popUp_4()" class="btn btn-sm btn-outline-secondary">Anzeigen</button>
                    </div>
                    <small class="text-muted">14.11.2023</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="../assets/images/doku/datenbank.png" data-holder-rendered="true">
                <div class="card-body">
                  <p class="card-text">Um das <b>Backend</b> unseres Webshops entsprechend implementieren zu können, war der erste Schritt ein <b>Relationales Modell</b> zu erstellen.</p> <br>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" onclick="popUp_5()" class="btn btn-sm btn-outline-secondary">Anzeigen</button>
                    </div>
                    <small class="text-muted">25.11.2023</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="../assets/images/doku/work_in_progress.png" data-holder-rendered="true">
                <div class="card-body">
                  <p class="card-text">"Work in progess" - ganz nach dem Motto selbst ist der Mann, hier ein Einblick in das händische erstellen des <b>Warenkorbs</b>.</p> <br>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" onclick="popUp_6()" class="btn btn-sm btn-outline-secondary">Anzeigen</button>
                    </div>
                    <small class="text-muted">26.11.2023</small>
                  </div>
                </div>
              </div>
            </div>
</body>
</html>