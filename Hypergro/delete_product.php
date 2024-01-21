<?php
session_start();
require_once 'db_connection.php';


if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); 
    exit();
}

$user_id = $_SESSION['user_id'];

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    $query = "DELETE FROM products WHERE id = ? AND vendor_id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ii", $product_id, $user_id);
    mysqli_stmt_execute($stmt);

    header("Location: dashboard.php");
    exit();
} else {
    
    header("Location: dashboard.php");
    exit();
}
?>
