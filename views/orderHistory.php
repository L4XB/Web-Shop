<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order history</title>
  <link rel="icon" type="image/x-icon" href="../assets/icons/favicon-192x192.ico">

  <!-- Bootstrap core CSS -->
  <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  <!-- JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
    .img {
      height: 60px;
    }

    .flex-column {
      display: flex;
      flex-direction: column;
      align-items: flex-start;
    }

    .product {
      padding-right: 50vw;
    }
  </style>


</head>

<body>
  <?php include 'klettergerüst.php'; ?>
  <br>
  <main role="main" class="container">

    <div>
      <h1 id="headLineTextStyle" style="text-align: left; padding-left: 10px;">Bestellverlauf</h1>
    </div>

    <div class="my-3 p-3 bg-white rounded box-shadow">
      <h6 class="border-bottom border-gray pb-2 mb-0">Meine Bestellhistorie:</h6>
      <br>
    </div>
    <?php
    // Starten Sie die Session
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webShopFSI";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Verbindung fehlgeschlagen: " . $conn->connect_error);
    }

    // Holen Sie die aktuelle Benutzer-ID
    $currentUserId = $_SESSION['userId'];

    // Erstellen Sie eine SQL-Abfrage, um die Bestellungen des aktuellen Benutzers zu holen
    $sql = "SELECT * FROM transactions WHERE userID = $currentUserId ORDER BY timestamp DESC";

    // Führen Sie die SQL-Abfrage aus
    $result = $conn->query($sql);

    // Überprüfen Sie, ob die Abfrage erfolgreich war
    if ($result->num_rows > 0) {
      // Durchlaufen Sie jede Zeile im Ergebnis
      while ($row = $result->fetch_assoc()) {
        // Extrahieren Sie die Daten aus der Zeile
        $orderNumber = $row['orderNumber'];
        $transactionId = $row['transactionID']; // Stellen Sie sicher, dass 'transactionId' der korrekte Spaltenname in Ihrer Tabelle ist
        $orderDate = $row['timestamp'];
        $adress = $row['adress'];
        $paymentMethod = $row['paymentMethod'];

        // Geben Sie das Layout mit den Daten aus
        echo "<br>";
        echo '<form class="" novalidate="" action="../services/userProvider/order_again.php" method="post">';
        echo '<input type="hidden" name="transactionId" value="' . $transactionId . '">';
        echo '<p data-toggle="collapse" href="#collapse' . $orderNumber . '" role="button" aria-expanded="false" aria-controls="collapse' . $orderNumber . '">';
        echo '<strong class="text-gray-dark">Bestellung: ' . $orderNumber . '</strong>';
        echo '<button type="submit" class="btn btn-warning float-right">erneut bestellen</button>';
        echo '</p>';
        echo '<div class="collapse" id="collapse' . $orderNumber . '">';
        echo '<div class="card card-body">';
        echo '<strong class="text-gray-dark">Bestellinformationen</strong>';
        echo '<div class="media text-muted pt-3">';
        echo '<p class="media-body pb-3 mb-0 small"><strong class="d-block text-gray-dark">Rechnungsadresse:  ' . $adress . '</strong>';
        echo '</div>';
        echo '<div class="media text-muted pt-3">';
        echo '<p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray"><strong class="d-block text-gray-dark">Zahlungsart:  ' . $paymentMethod . '</strong>';
        echo '</div>';
        echo '<br>';
        echo '<strong class="text-gray-dark">Bestellte Produkte</strong>';
        echo '<div class="media text-muted pt-3">';
        echo '<p class="media-body pb-3 mb-0 small"><strong class="d-block text-gray-dark"></strong>';
        $sqlHistory = "SELECT productID, SUM(amount) as totalQuantity FROM history WHERE transactionID = $transactionId GROUP BY productID";

        // Führen Sie die SQL-Abfrage aus
        $resultHistory = $conn->query($sqlHistory);

        // Überprüfen Sie, ob die Abfrage erfolgreich war
        if ($resultHistory->num_rows > 0) {
          // Durchlaufen Sie jede Zeile im Ergebnis
          echo "<div class='flex-column'>";
          while ($rowHistory = $resultHistory->fetch_assoc()) {
            // Extrahieren Sie die productId und die Menge aus der Zeile
            $productId = $rowHistory['productID'];
            $quantity = $rowHistory['totalQuantity'];

            // Erstellen Sie eine SQL-Abfrage, um das Produkt aus der products-Tabelle zu holen
            $sqlProduct = "SELECT * FROM products WHERE productID = $productId";

            // Führen Sie die SQL-Abfrage aus
            $resultProduct = $conn->query($sqlProduct);

            // Überprüfen Sie, ob die Abfrage erfolgreich war
            if ($resultProduct->num_rows > 0) {
              // Holen Sie die Daten des Produkts
              $rowProduct = $resultProduct->fetch_assoc();
              $productName = $rowProduct['productName'];
              $productImage = $rowProduct['pathName'];

              // Geben Sie das Layout mit den Daten aus
              echo '<div class="media text-muted pt-3 product">';
              echo '<img class="img" src="../assets/images/produkts/' . $productImage . '.png" alt="' . $productName . '">';
              echo '<p class="media-body pb-3 mb-0 small"><strong class="d-block text-gray-dark">' . $productName . '</strong> Menge: ' . $quantity . '</p>';
              echo '</div>';
            } else {
              echo "Produkt nicht gefunden.";
            }
          }
          echo "</div>";
        } else {
          echo "Keine Einträge in der history-Tabelle für diese Transaktion gefunden.";
        }
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<div class="media text-muted pt-3">';
        echo '<p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">';
        echo '<strong class="d-block text-gray-dark">vom ' . $orderDate . '</strong></p>';
        echo '</div>';
        echo '</form>';
      }
    } else {
      echo "Keine Bestellungen gefunden.";
    }
    ?>

    <!-- Optional! Noch zu überlegen ob eine implementierung notwendig ist -->
    <small class="d-block text-right mt-3">
      <a href="products.php" class="btn btn-outline-dark">zur Atrikelübersicht</a>
    </small>

  </main>

</body>

</html>