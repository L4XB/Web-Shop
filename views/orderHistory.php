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
        <form class="" novalidate="" action="checkout.php" method="post">
          <p data-toggle="collapse" href="#collapse1" role="button" aria-expanded="false" aria-controls="collapse1">
            <strong class="text-gray-dark">Bestellung: {orderNR!}</strong>
            <button type="button" class="btn btn-warning float-right" onclick="window.location.href = 'checkout.php';">erneut bestellen</button>
          </p>
          <div class="collapse" id="collapse1">
            <div class="card card-body">              
              <strong class="text-gray-dark">Bestellinformationen</strong>
              <div class="media text-muted pt-3">
                <p class="media-body pb-3 mb-0 small"><strong class="d-block text-gray-dark">Rechnungsadresse: {lieferadresse!}</strong>
              </div>
              <div class="media text-muted pt-3">
              <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray"><strong class="d-block text-gray-dark">Zahlungsart: {payment!} </strong>
              </div>
            <br>
          
              <strong class="text-gray-dark">Bestellte Produkte</strong>
                <div class="media text-muted pt-3">
                  <p class="media-body pb-3 mb-0 small"><strong class="d-block text-gray-dark">{productFromOrderNR!}</strong>
                </div>
            </div>
          </div>
          <div class="media text-muted pt-3">
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
              <strong class="d-block text-gray-dark">vom {orderDate!}</strong></p>
          </div>
          
        </form>

        <!-- Optional! Noch zu überlegen ob eine implementierung notwendig ist -->
        <small class="d-block text-right mt-3">
          <a href="products.php" class="btn btn-outline-dark">zur Artikelübersicht</a>
        </small>
      </div>
    </main>

  </body>
</html>