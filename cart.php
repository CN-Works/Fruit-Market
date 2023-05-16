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
                    echo    "<table class='table-main'>",
                                "<thead>",
                                    "<tr>",
                                        "<th class='table-header-title'>#</th>",
                                        "<th class='table-header-title'>Name</th>",
                                        "<th class='table-header-title'>Price</th>",
                                        "<th class='table-header-title'>Quantity</th>",
                                        "<th class='table-header-title'>Total</th>",
                                    "</tr>",
                                "</thead>",
                                "<tbody>";
                    
                    // Adding items
                    foreach($_SESSION["cart"] as $index => $product) {
                        echo    "<tr>",
                                    "<td>".$index."</td>",
                                    "<td>".$product["name"]."</td>",
                                    "<td>".$product["price"]."$</td>",
                                    "<td>".$product["quantity"]."</td>",
                                    "<td>".$product["total"]."$</td>",
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