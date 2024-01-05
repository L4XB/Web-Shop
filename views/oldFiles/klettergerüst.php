<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Klettergerüst</title>
  <link rel="icon" type="image/x-icon" href="../assets/icons/favicon-192x192.ico">
  <link rel="stylesheet" href="../style/klettergerüst.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script>
    document.addEventListener('DOMContentLoaded', (event) => {
      var button2 = document.getElementById("button2");
      var badge = document.querySelector(".badge");

      // Verstecke den Info-Kreis, wenn die Seite geladen wird und der Wert 0 ist
      badge.style.display = badge.textContent > 0 ? "inline" : "none";

      button2.onclick = function () {
        var badgeValue = parseInt(badge.textContent, 10);
        badgeValue++;
        badge.textContent = badgeValue;
        badge.style.display = badgeValue > 0 ? "inline" : "none";
      }
    });
  </script>
</head>

<body>
  <?php

  // Stellen Sie sicher, dass die Benutzer-ID in der Session gespeichert ist
  if (!isset($_SESSION['userId'])) {

  } else {
    $userId = $_SESSION['userId'];

    // Serververbindung
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webShopFSI";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Verbindung fehlgeschlagen: " . $conn->connect_error);
    }

    // SQL-Abfrage, um die Anzahl der Elemente im Warenkorb zu ermitteln
    $stmt = $conn->prepare("SELECT COUNT(DISTINCT productID) AS count FROM shoppingCart WHERE userID = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $cartCount = $row['count'];

    $stmt->close();
    $conn->close();
  }


  ?>
  <header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="row">
        <!-- Logo -->
        <div class="col-md-2">
          <div>
            <a href="homepage.php"><img style="width:169px; hight:87px" src="../assets/images/fsi_logo_header.png"
                alt="logo" class="logo"></a>
          </div>
        </div>
        <!-- Searchbar -->
        <div class="col-md-8 d-flex align-items-center">
          <form class="w-100" action="search.php" method="get">
            <input type="search" name="search" class="form-control form-control-dark" placeholder="Produktsuche..."
              aria-label="Search">
          </form>
        </div>
        <!-- Buttons -->
        <div class="col-md-2">
          <ul class="d-flex list-unstyled" style=" <?php
          echo isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true ? ' ' : ''; ?>">
            <li class="me-2"><a href="products.php" class="nav-link px-2 text-white">Artikelübersicht</a></li>
            <li class="me-2"><a href="favorits.php" class="nav-link px-2 text-white">Favoriten</a></li>
            <li class="me-2">
              <a href="warenkorb.php" class="nav-link px-2 text-white position-relative">
                Warenkorb
                <?php if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true): ?>
                  <span class="badge">
                    <?php echo $cartCount; ?>
                  </span>
                <?php endif; ?>
              </a>
            </li>

          </ul>
          <!-- Login/Signout -->
          <?php
          if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true):
            ?>
            <!-- Login und SignUp Buttons -->
            <div style="padding-left: 10px;">
              <a href="login.php"><button type="button" class="btn btn-outline-light me-2">Login</button></a>
              <a href="signUp.php"><button type="button" class="btn btn-warning">Sign-up</button></a>
            </div>
            <?php
          else:
            ?>
            <!-- Anderer Button -->
            <div style="padding-left: 10px; display: flex;">
              <a href="profil.php">
                <button type="button" class="btn btn-outline-light me-2">Profil</button>
              </a>

              <form action="../services/userProvider/logout.php" method="post" style=" ">
                <button type="submit" class="btn btn-warning">Logout</button>
              </form>
            </div>
            <?php
          endif;
          ?>

        </div>

      </div>
    </div>
  </header>
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col">
        </div>
        <div class="col-2" style="text-align: right;">
          <a class="footerlink nav-link px-2 text-white" href="doku.php"><img height="20px"
              src="https://cdn.icon-icons.com/icons2/2429/PNG/512/figma_logo_icon_147289.png"> Doku</a>
        </div>
        <div class="col-2">
          <a class="footerlink nav-link px-2 text-white" href="devteam.php"><svg xmlns="http://www.w3.org/2000/svg"
              width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
              <path
                d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8" />
            </svg> DevTeam</a>
        </div>
        <div class="col-2" style="text-align: left;">
          <a class="footerlink nav-link px-2 text-white" href="kontakt.php"><svg xmlns="http://www.w3.org/2000/svg"
              width="16" height="16" fill="currentColor" class="bi bi-chat-right-dots" viewBox="0 0 16 16">
              <path
                d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z" />
              <path
                d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
            </svg> Kontakt</a>
        </div>
        <div class="col">
        </div>
      </div>
  </footer>
</body>

</html>