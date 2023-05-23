<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Market</title>
    <link rel="stylesheet" href="./css/styles.css">
    <!-- Title font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bebas%20Neue">
</head>
<body>
    <main class="container">
        <div class="central-box">
            <!-- Title -->
            <h1 class="main-title">Fruit Market</h1>

            <!-- Global form -->
            <form class="input-section" action="traitement.php" method="post">
                <!-- Fruit selection -->
                <div class="inputs">
                    <p class="input-title">Fruit name :</p>
                    <input class="input-button" type="text" name="name" placeholder="Insert a name">
                </div>

                <!-- Setting a price -->
                <div class="inputs">
                    <p class="input-title">Price :</p>
                    <input class="input-button" type="number" placeholder="Choose a price" min="0" step="any" name="price">
                </div>

                <!-- Choosing a quantity -->
                <div class="inputs">
                    <p class="input-title">Quantity :</p>
                    <input class="input-button" type="number" name="quantity" placeholder="Choose a quantity" min="1" max="50">
                </div>

                <!-- Submit button -->
                <input class="submit-button" type="submit" name="submit" value="Add to the list">
                
                <a class="cart-link" href="cart.php">See cart <?php
                    if (isset($_SESSION["cart"])) {
                        echo "(".count($_SESSION["cart"])." items)";
                    }
                    ?></a>
            </form>
        </div>
    </main>
</body>
</html>