<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding fruits to market</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <main class="container">
        <div class="central-box">
            <!-- Title -->
            <h1 class="main-title">Market</h1>

            <!-- Global form -->
            <form class="input-section" action="traitement.php" method="post">
                <!-- Fruit selection -->
                <div class="inputs">
                    <p class="input-title">Fruit name :</p>
                    <input class="input-button" type="text" name="name">
                </div>

                <!-- Setting a price -->
                <div class="inputs">
                    <p class="input-title">Fruit price :</p>
                    <input class="input-button" type="number" step="any" name="price">
                </div>

                <!-- Choosing a quantity -->
                <div class="inputs">
                    <p class="input-title">Quantity :</p>
                    <input class="input-button" type="number" name="quantity" value="0">
                </div>

                <!-- Submit button -->
                <input class="submit-button" type="submit" name="submit" value="Add to the list">
                
            </form>
        </div>
    </main>
</body>
</html>