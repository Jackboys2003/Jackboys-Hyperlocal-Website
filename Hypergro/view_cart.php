<?php
session_start();
require_once 'db_connection.php';
include("header.html");


if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: ulogin.php'); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
    <link rel="stylesheet" href="cart.css">
    <style>
        .cart-container form {
            margin-top: 20px;
        }

        .cart-container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
        }

        .cart-container input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="cart-container">
    <h1>Your Cart</h1>

    <?php
   
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $productId) {
            
            $query = "SELECT name FROM products WHERE id = ?";
            $stmt = mysqli_prepare($conn, $query);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "i", $productId);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if ($result && $product = mysqli_fetch_assoc($result)) {
                    
                    echo '<div class="product-box">';
                    echo '<h2>' . $product['name'] . '</h2>';
                    echo '<p>Product ID: ' . $productId . '</p>';
                    echo '</div>';
                }

                mysqli_stmt_close($stmt);
            } else {
                echo 'Error in preparing statement: ' . mysqli_error($conn);
            }
        }
        echo '<form action="checkout.php" method="post">';
        echo '<input type="submit" value="Proceed to Checkout">';
        echo '</form>';
    } else {
        echo '<p>Your cart is empty</p>';
    }
    ?>

</div>

</body>
</html>
