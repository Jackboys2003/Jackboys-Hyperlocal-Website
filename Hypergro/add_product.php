<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add_product</title>
</head>
<body>
<?php
session_start();
require_once 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); 
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $price = $_POST['price'];

    $query = "INSERT INTO products (vendor_id, name, price) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "iss", $user_id, $product_name, $price);
    mysqli_stmt_execute($stmt);

    header("Location: dashboard.php");
    exit();
}
?>

</body>
</html><?php
session_start();
require_once 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); 
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $price = $_POST['price'];

    $query = "INSERT INTO products (vendor_id, name, price) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "iss", $user_id, $product_name, $price);
    mysqli_stmt_execute($stmt);

    header("Location: dashboard.php");
    exit();
}
?>
