<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All fruits - Market</title>
    <link rel="stylesheet" href="./css/cart.css">
    <!-- Adding a new font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bebas%20Neue">
</head>
<body>
    <main class="container">
        <div class="central-box">
            <?php
                // Check if the cart is empty or not
                if ( !isset($_SESSION["cart"]) || empty($_SESSION["cart"]) ) {

                    // Adding a message with a cross
                    echo "<img class='no-cart-image' src='./img/cross.png'>". 
                    "<p class='no-cart-text'>There are no items in the cart</p>";

                } else {
                    echo    "<h2 class='cart-title'>My shopping cart</h2>",
                            "<table class='table-main'>",
                                "<thead>",
                                    "<tr>",
                                        "<th class='table-header-title id'>#</th>",
                                        "<th class='table-header-title name'>Name</th>",
                                        "<th class='table-header-title price'>Price/unit</th>",
                                        "<th class='table-header-title quantity'>Quantity</th>",
                                        "<th class='table-header-title total'>Total</th>",
                                    "</tr>",
                                "</thead>",
                                "<tbody>";
                    
                    // Adding items
                    foreach($_SESSION["cart"] as $index => $product) {
                        echo    "<tr>",
                                    "<td class='id'>".$index."</td>",
                                    "<td class='name'>".$product["name"]."</td>",
                                    "<td class='price'>".$product["price"]."$</td>",
                                    "<td class='quantity'>".$product["quantity"]."</td>",
                                    "<td class='total'>".$product["total"]."$</td>",
                                "</tr>";
                    }

                    echo    "</tbody>",
                            "</table>";
                }
            ?>
        </div>
    </main> 
</body>
</html>