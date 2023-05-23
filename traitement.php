<?php
    // Starting session to create an user unique data container
    // In our case, the server will store user's cart information (quantity, items ect..)
    session_start();


    // Native global variables are php variables you can access anywhere in the project (any files).
    // Some of them are very useful as $_SESSION wich exists when session is started
    // -and stores any data related with user.
    // Native global variables are tables (key --> value)


    // Cookies works as text file with hashed content in it, 
    //it can be use to locally store data for future usage (ex: darkmode, passwords..)


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
            // works like an "array-push" in the cart table
            $_SESSION["cart"][] = $new_fruit;
        }
    }

    header("Location:index.php")
?>