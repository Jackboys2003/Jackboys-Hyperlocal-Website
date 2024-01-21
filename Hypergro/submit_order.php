<?php
session_start();
require_once 'db_connection.php';

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: ulogin.php'); 
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $pinCode = $_POST['pinCode'];

    
    unset($_SESSION['cart']);

    echo 'Order submitted successfully!';
} else {
    echo 'Invalid request';
}
?>
