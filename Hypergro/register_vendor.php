<?php
require_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $sql = "INSERT INTO vendor (vendorname, password) VALUES ('$username', '$password')";
  mysqli_query($conn, $sql);

  header('Location: login.php');
  exit();
}
