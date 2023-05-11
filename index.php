<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding fruits to market</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <div class="container">
        <!-- Title -->
        <h1>Add a fruit</h1>

        <!-- Global form -->
        <form action="traitement.php" method="post">
            <!-- Fruit selection -->
            <p>
                <label>
                    Fruit name :
                    <input type="text" name="name">
                </label>
            </p>

            <!-- Setting a price -->
            <p>
                <label>
                    Fruit price :
                    <input type="number" step="any" name="price">
                </label>
            </p>

            <!-- Choosing a quantity -->
            <p>
                <label>
                    Quantity :
                    <input type="number" name="quantity" value="1">
                </label>

            </p>

            <!-- Submit button -->
            <p>
                <input type="submit" name="submit" value="Add fruit">
            </p>
        </form>
    </div>
</body>
</html>