<?php
    session_start();

    if (isset($_POST["submit"])) {
        
        // Checking inputs using filters
        $name = filter_input(INPUT_POST, "name",FILTER_SANITIZE_STRING);
        $price = filter_input(INPUT_POST,"price",FILTER_VALIDATE_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
        $quantity = filter_input(INPUT_POST,"quantity",FILTER_VALIDATE_INT);

        // Checking if inputs are correct
        if ($name && $price && $quantity) {
            // Stacking in array
            $new_fruit = array(
                "name" = $name,
                "price" = $price,
                "quantity" = $quantity,
                "total" = $price*$quantity,
            );

            // Saving the new product in session
            $_SESSION["products"][] = $new_fruit;
        }
    }

    header("Location:index.php")
?>