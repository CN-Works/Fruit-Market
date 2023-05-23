<?php
    session_start();

    // Getting post request data
    if (isset($_POST["submit"])) {
        
        // Checking user inputs using filters, avoid xss & code injections
        $name = filter_input(INPUT_POST, "name",FILTER_SANITIZE_STRING);
        $price = filter_input(INPUT_POST,"price",FILTER_VALIDATE_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
        $quantity = filter_input(INPUT_POST,"quantity",FILTER_VALIDATE_INT);

        // Checking if inputs have any values (no null)
        if ($name && $price && $quantity) {
            // Stacking in array
            $new_fruit = array(
                "name" => $name,
                "price" => $price,
                "quantity" => $quantity,
                "total" => $price*$quantity,
            );

            // Saving the new product data in session
            $_SESSION["cart"][] = $new_fruit;
        }
    }

    header("Location:index.php")
?>