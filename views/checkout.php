<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <title>Checkout</title>
    <link rel="icon" type="image/x-icon" href="../assets/icons/favicon-192x192.ico">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="form-validation.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/checkout.css">

</head>


<body class="bg-light">

    <?php include 'klettergerüst.php'; ?>

    <div class="container">

        <div class="row">
            <div class="col">
                <br>
                <h1>Bestellung abschließen</h1>
                <br>
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Warenkorb</span>
                </h4>
                <ul class="list-group mb-3">
                    <?php
                    // Serververbindung
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "webShopFSI";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Verbindung fehlgeschlagen: " . $conn->connect_error);
                    }

                    // Daten aus der Session holen
                    $userId = $_SESSION['userId'];

                    // SQL-Abfrage, um die Produkte im Warenkorb zu holen
                    $stmt = $conn->prepare("SELECT p.productName, p.description, p.price, s.amount FROM shoppingCart s JOIN products p ON s.productID = p.productID WHERE s.userID = ?");
                    $stmt->bind_param("i", $userId);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    $total = 0;
                    $discount = 0;

                    while ($row = $result->fetch_assoc()) {
                        if ($row['amount'] >= 10) {
                            $discount = 0.2; // 20% Rabatt
                        } elseif ($row['amount'] >= 5) {
                            $discount = 0.1; // 10% Rabatt
                        }

                        $price = $row['price'] * (1 - $discount);

                        echo '<li class="list-group-item d-flex justify-content-between lh-condensed">';
                        echo '<div>';
                        echo '<h6 class="my-0">' . $row['productName'] . ' (' . $row['amount'] . ')</h6>'; // Zeigt die Anzahl jedes Produkts an
                        echo '<small class="text-muted">' . $row['description'] . '</small>';
                        echo '</div>';
                        echo '<span class="text-muted">' . number_format($price, 2, '.', '') . '€</span>';
                        echo '</li>';

                        $total += $price * $row['amount'];

                        if ($discount > 0) {
                            echo '<li class="list-group-item d-flex justify-content-between bg-light">';
                            echo '<div class="text-success">';
                            echo '<h6 class="my-0">Mengenrabatt</h6>';
                            echo '<small>' . ($discount * 100) . '% Rabatt auf diesen Artikel</small>';
                            echo '</div>';
                            echo '<span class="text-success">-' . number_format($row['price'] * $discount * $row['amount'], 2, '.', '') . '€</span>';
                            echo '</li>';
                        }
                    }

                    echo '<li class="list-group-item d-flex justify-content-between">';
                    echo '<span>Gesamtbetrag (€)</span>';
                    echo '<strong>' . number_format($total, 2, '.', '') . '€</strong>';
                    echo '</li>';

                    $stmt->close();
                    $conn->close();
                    ?>

                </ul>

                <form class="card p-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Gutscheincode">
                    </div>
                </form>
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Lieferadresse</h4>
                <form class="needs-validation was-validated" novalidate="">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Vorname</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Nachname</label>
                            <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email </label>
                        <input type="email" class="form-control" id="email"
                            placeholder="inf.fachschaft@reutlingen-university.de" required="">
                        <div class="invalid-feedback">
                            Bitte geben Sie eine korrekte Emailadresse an, damit wir Sie über Ihre Lieferung informieren
                            können.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Straße, Hausnummer</label>
                        <input type="text" class="form-control" id="address" placeholder="Alteburgstraße 105"
                            required="">
                        <div class="invalid-feedback">
                            Bitte geben Sie ihre Straße sowie Hausnummer an.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address2">PLZ, Stadt</label>
                        <input type="text" class="form-control" id="address2" placeholder="72762 Reutlingen"
                            required="">
                        <div class="invalid-feedback">
                            Bitte geben Sie ihre Postleizahl sowie Wohnort an.
                        </div>
                    </div>
                    <!--
                <hr class="mb-4">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="same-address">
                        <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="save-info">
                        <label class="custom-control-label" for="save-info">Save this information for next time</label>
                    </div>
                <hr class="mb-4">
                -->

                    <br>

                    <h4 class="mb-3">Bezahlung</h4>

                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked=""
                                required="">
                            <label class="custom-control-label" for="credit">Kreditkarte</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input"
                                required="">
                            <label class="custom-control-label" for="debit">Girokarte</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input"
                                required="">
                            <label class="custom-control-label" for="paypal">Paypal</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cc-name">Karteninhaber</label>
                            <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                            <small class="text-muted">Vollständiger Name wie er auf der Karte zu finden ist</small>
                            <div class="invalid-feedback">
                                Name on card is required
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cc-number">Kredidkartennummer</label>
                            <input type="text" class="form-control" id="cc-number" placeholder="" required="">
                            <div class="invalid-feedback">
                                Credit card number is required
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="cc-expiration">Ablaufdatum</label>
                            <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
                            <div class="invalid-feedback">
                                Expiration date required
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="cc-expiration">CVV</label>
                            <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                            <div class="invalid-feedback">
                                Security code required
                            </div>
                        </div>
                    </div>
                    <div class="row container-fluid justify-content-end">
                        <hr class="mb-4">
                        <button class="btn btn-warning btn-lg btn-block" href="thankyou.php"
                            type="submit">Zahlungspflichtig bestellen</button>
                    </div>

                </form>
                <br>
                <br>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function () {
                'use strict';

                window.addEventListener('load', function () {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');

                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function (form) {
                        form.addEventListener('submit', function (event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
    </script>

</body>

</html>