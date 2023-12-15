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

          // Geben Sie das Layout mit den Daten aus
          echo "<br>";
          echo '<form class="" novalidate="" action="../services/userProvider/order_again.php" method="post">
              <input type="hidden" name="transactionId" value="' . $transactionId . '">
              <p data-toggle="collapse" href="#collapse' . $orderNumber . '" role="button" aria-expanded="false" aria-controls="collapse' . $orderNumber . '">
                  <strong class="text-gray-dark">Bestellung: ' . $orderNumber . '</strong>
                  <button type="submit" class="btn btn-warning float-right">erneut bestellen</button>
              </p>
              <div class="collapse" id="collapse' . $orderNumber . '">
                  <div class="card card-body">
                      Order Details
                  </div>
              </div>
              <div class="media text-muted pt-3">
                  <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                      <strong class="d-block text-gray-dark">vom ' . $orderDate . '</strong></p>
              </div>
          </form>';
        }
      } else {
        echo "Keine Bestellungen gefunden.";
      }
      ?>

      <!-- Optional! Noch zu überlegen ob eine implementierung notwendig ist -->
      <small class="d-block text-right mt-3">
        <a href="products.php" class="btn btn-outline-dark">zur Atrikelübersicht</a>
      </small>
    </div>
  </main>

</body>

</html>