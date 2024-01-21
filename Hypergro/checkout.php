<?php
session_start();
require_once 'db_connection.php';

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
    <title>checkout</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 60%;
            margin: 20px auto;
        }

        .box {
            background-color: #f5f5f5;
            border: 2px solid #4CAF50;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 15px;
            margin-bottom: 20px;
        }

        .box h2 {
            color: #4CAF50;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 10px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .container ul {
            list-style-type: none;
            padding: 0;
            text-align: left;
        }

        .container li {
            margin-bottom: 10px;
        }

        .container form {
            margin-top: 20px;
            text-align: center;
        }

        .container input[type="text"],
        .container textarea {
            width: 100%;
            padding: 8px;
            margin: 5px 0 10px;
            box-sizing: border-box;
        }

        .container button {
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

        .container button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="box">
        <h2>Order Details</h2>
        <?php
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            echo '<ul>';
            foreach ($_SESSION['cart'] as $productId) {
                $query = "SELECT name, price FROM products WHERE id = ?";
                $stmt = mysqli_prepare($conn, $query);

                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, "i", $productId);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    if ($result && $product = mysqli_fetch_assoc($result)) {
                        echo '<li>' . $product['name'] . ' - ₹' . $product['price'] . '</li>';
                    } else {
                        echo '<li>Product ID: ' . $productId . '</li>';
                    }

                    mysqli_stmt_close($stmt);
                } else {
                    echo 'Error in preparing statement: ' . mysqli_error($conn);
                }
            }
            echo '</ul>';
        } else {
            echo '<p>Your cart is empty</p>';
        }
        ?>
    </div>
    <div class="box">
        <h2>Shipping Information</h2>
        <form action="submit_order.php" method="post">
            Name: <input type="text" name="name" required><br>
            Address: <textarea name="address" required></textarea><br>
            City: <input type="text" name="city" required><br>
            State: <input type="text" name="state" required><br>
            Country: <input type="text" name="country" required><br>
            Pin Code: <input type="text" name="pinCode" pattern="\d{6}" title="Please enter a valid 6-digit pin code" required><br>
        </form>
    </div>
    <div class="box">
        <h2>Payment Information</h2>
        <form id="payment-form">
            <div id="card-element"></div>
            <div id="card-errors" role="alert"></div>
            <button type="submit">Submit Order</button>
        </form>
    </div>

</div>

<script src="https://js.stripe.com/v3/"></script>

<script>
    var stripe = Stripe('YOUR_PUBLIC_STRIPE_KEY');
    var elements = stripe.elements();

    var card = elements.create('card');

    card.mount('#card-element');

    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function (event) {
        event.preventDefault();


        stripe.createToken(card).then(function (result) {
            if (result.error) {
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                stripeTokenHandler(result.token);
            }
        });
    });

    function stripeTokenHandler(token) {
        var formData = new FormData(form);
        formData.append('stripeToken', token.id);

        fetch('submit_order.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            alert(data.message);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
</script>

</body>
</html>
