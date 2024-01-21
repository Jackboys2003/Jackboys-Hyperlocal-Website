!<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = isset($_POST['product_id']) ? $_POST['product_id'] : null;

    if ($productId !== null) {
        
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        $_SESSION['cart'][] = $productId;
        echo 'Product added to cart successfully';
    } else {
        echo 'Invalid product ID';
    }
} else {
    echo 'Invalid request';
}
?>