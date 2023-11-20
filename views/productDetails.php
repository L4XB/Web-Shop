<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="icon" type="image/x-icon" href="../assets/icons/favicon-192x192.ico">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/productDetails.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            document.getElementById('minus').addEventListener('click', function () {
                var number = document.getElementById('number');
                var currentValue = parseInt(number.innerText);
                if (currentValue > 1) {
                    number.innerText = currentValue - 1;
                }
            });

            document.getElementById('plus').addEventListener('click', function () {
                var number = document.getElementById('number');
                var currentValue = parseInt(number.innerText);
                number.innerText = currentValue + 1;
            });
        });
    </script>
</head>

<body>
    <?php include 'klettergerüst.php'; ?>
    <div id="content-divs">
        <div id="black-top-box">
            <div id="black-top-box-items">
                <div id="product-card">

                </div>
                <div id="details-products">
                    <p id="product-name">{Product Name}</p>
                    <div id="details-products-data">

                    </div>
                    <div id="actions">
                        <div id="counter">
                            <div id="minus">-</div>
                            <div id="number">1</div>
                            <div id="plus">+</div>
                        </div>
                        <div class="button" id="button1">
                            <i class="icon fas fa-heart"></i>
                        </div>
                        <div class="button" id="button2">
                            <i class="icon fas fa-shopping-cart"></i>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div id="white-bottom-box">

        </div>
    </div>

</body>

</html>