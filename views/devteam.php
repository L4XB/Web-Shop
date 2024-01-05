<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevTeam</title>

    <!-- Favicons -->
    <link rel="icon" type="image/x-icon" href="../assets/icons/favicon-192x192.ico">

     <!-- bootstrap css -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" href="../style/#.css">

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <style>
        body {
            overflow-y: scroll;
        }

        .card-img-wrapper {
            height: 30%;

        }

        .bottom-image {
            width: 100%;
            height: auto;
        }

        .top-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 30%;
            height: auto;
            z-index: 2;
        }
    </style>

</head>
<body>

    <!-- header -->
    <?php include 'header.php'; ?>

    <div class="container pt-4" style="margin-left: 12%;">
        <div class="col-lg-6 order-2 order-lg-1">
            <h1>Developer Team</h1>
        </div>
        <ul class="breadcrumb undefined">
            <li class="breadcrumb-item"><a href="homepage.php" class="text-dark">Home</a></li>
            <li class="breadcrumb-item active"><span class="text-dark">Developer Team</span></li>
        </ul>
    </div>


    <main class="container">
        <div class="row">
            <!-- Developer 1 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="../assets/images/devteam/dev_lukas.jpg" class="card-img-top" alt="Developer 1">
                    <div class="card-body">
                        <h5 class="card-title">Lukas Buck: <a href="https://github.com/L4XB">L4XB</a></h5>
                        <p class="card-text">Lukas, der mutige König des versehentlichen Selbstvergessens - er
                            beherrscht die hohe Kunst, den USB-Stecker nie richtig herum einzustecken und findet stets
                            neue Wege, um mit seinem Schuh an der Türschwelle hängenzubleiben. Seine furchtlose Mission,
                            immer die Fernbedienung zu suchen, während sie in seiner Hand liegt, ist eine Huldigung an
                            die rätselhaften Mysterien des Heimkinos.</p>
                    </div>
                </div>
            </div>

            <!-- Developer 2 -->
            <div class="col-md-4">
                <div class="card">

                    <img src="../assets/images/devteam/dev_felix.jpg" class="card-img-top bottom-image"
                        alt="Developer 1">
                    <div class="card-img-wrapper">
                        <img src="../assets/images/mdm.png" class="top-image" alt="Developer 1">
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Felix Johannes Jochum: <a
                                href="https://github.com/moechtegernmoench">DerMoench</a></h5>
                        <p class="card-text">Felix, der unangefochtene Meister im Sammeln von Staubflusen unter dem Bett
                            - seine passionierte Hingabe für den Stillstand könnte ihn zum offiziellen Botschafter der
                            trägen Gemüter ernennen. Seine beeindruckende Fähigkeit, jedes Gerät in einen unerklärlichen
                            Zustand des Nichtfunktionierns zu verwandeln, ist eine wahre Ode an die unergründlichen
                            Geheimnisse der Technik.</p>
                    </div>
                </div>
            </div>

            <!-- Developer 3 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="../assets/images/devteam/dev_quentin.jpg" class="card-img-top" alt="Developer 3">
                    <div class="card-body">
                        <h5 class="card-title">Quentin Walz: <a href="https://github.com/QWellCOD">QWellCODe</a></h5>
                        <p class="card-text">Quentin, der glorreiche Sonnenkönig des Nichtstuns, erlangte Ruhm durch den
                            Weltrekord für die ausgedehnteste Mittagspause. Seine bewundernswerte Fähigkeit, im
                            Arrangement seiner Socken die Essenz des Lebens zu erkennen, zeichnet ihn als einen wahren
                            Helden des Alltags aus, der die Welt durch seine Abwesenheit auf wundervolle Weise
                            bereichert.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- footer -->
    <?php include 'footer.php'; ?>

</body>

</html>