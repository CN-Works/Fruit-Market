<?php
    session_start();

    //
    //  Functions
    //

    function RemoveItemFromCart($item_id) {
        unset($_SESSION["cart"][$item_id]);
    }

    function AddItemQuantity($item_id, $item_amount) {
        $_SESSION["cart"][$item_id]["quantity"] = $_SESSION["cart"][$item_id]["quantity"] + $item_amount;
    }

    function RemoveItemQuantity($item_id, $item_amount) {
        $_SESSION["cart"][$item_id]["quantity"] = $_SESSION["cart"][$item_id]["quantity"] - $item_amount;
    }

    //
    //  "Events" (post)
    //

    // "+" button - Adding item quantity
    if (isset($_POST["add-item"])) {
        // Checking in session -> cart the item key by form value. It will return an array with all item (like quantity)
        $item_amount = $_SESSION["cart"][$_POST["add-item"]]["quantity"];

        // Just checking if it need to remove from cart or reduce by one
        if ($item_amount >= 1) {
            AddItemQuantity($_POST["add-item"],1);
        }
    }

    // "-" button - Remove one unit
    if (isset($_POST["remove-item"])) {
        // Same, checking item amount
        $item_amount = $_SESSION["cart"][$_POST["remove-item"]]["quantity"];

        if ($item_amount > 1) {
            // Reducing quantity by 1 when greater than 1.
            RemoveItemQuantity($_POST["remove-item"], 1);
        } else {
            // When amount is 1, it need to delete item from cart (seems logic)
            RemoveItemFromCart($_POST["remove-item"]);
        }
    }

    // "X" button - Remove item from cart
    if (isset($_POST["delete-item"])) {
        RemoveItemFromCart($_POST["delete-item"]);
    }

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
                    $total = 0;
                    echo    "<p class='cart-title'>My shopping cart</p>",
                            "<table class='table-main'>",
                                "<thead>",
                                    "<tr>",
                                        "<th id='number' class='table-header-title'>#</th>",
                                        "<th id='name' class='table-header-title'>Name</th>",
                                        "<th id='price' class='table-header-title'>Price/unit</th>",
                                        "<th id='quantity' class='table-header-title'>Quantity</th>",
                                        "<th id='total' class='table-header-title'>Total</th>",
                                        "<th id='action'>Action</th>",
                                    "</tr>",
                                "</thead>",
                                "<tbody>";
                    
                    // Adding items
                    foreach($_SESSION["cart"] as $index => $product) {
                        echo    "<tr>",
                                    "<td class='number'>".$index."</td>",
                                    "<td class='name'>".$product["name"]."</td>",
                                    "<td class='price'>".number_format($product["price"],2,",")."$</td>",
                                    "<td class='quantity'>
                                        <form class='button-form' action='cart.php' method='post'>
                                        <button class='button-remove' type='submit' name='remove-item' value=$index>-</button>"
                                            .$product["quantity"].
                                        "<button class='button-add' type='submit' name='add-item' value=$index>+</button>
                                        </form>
                                    </td>",
                                    "<td class='total'>".number_format($product["total"],2,",")."$</td>",
                                    "<td class='remove-button-part'>
                                        <form class='delete-button-form' action='cart.php' method='post'>
                                            <button class='button-item' type='submit' name='delete-item' value=$index>X</button>
                                        </form>
                                    </td>",
                                "</tr>";
                        $total += $product["total"];
                    }

                    echo    "<tr>",
                                "<td colspan=6 class='cart-total'>Total : ".number_format($total,2,",")."$</td>",
                            "</tr>",
                            "</tbody>",
                            "</table>";
                }
            ?>
            <a class="index-link" href="index.php">Add more fruits <?php
                    if (isset($_SESSION["cart"]) && count($_SESSION["cart"]) > 0) {
                        echo "(".count($_SESSION["cart"])." items)";
                    }
                    ?></a>
        </div>
    </main> 
</body>
</html>