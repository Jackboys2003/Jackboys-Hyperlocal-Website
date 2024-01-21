<?php
require_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username1 = isset($_POST['username1']) ? $_POST['username1'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;

    if ($username1 !== null && $password !== null) {
        
        $stmt = mysqli_prepare($conn, "INSERT INTO customer (username1, password) VALUES (?, ?)");

        if ($stmt) {
            
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt, "ss", $username1, $hashedPassword);
            $success = mysqli_stmt_execute($stmt);

            if ($success) {
                
                header('Location: ulogin.php');
                exit();
            } else {
                
                die('Error in database query: ' . mysqli_error($conn));
            }
        } else {
            
            die('Error in preparing statement: ' . mysqli_error($conn));
        }
    } else {
        echo 'Invalid form submission';
    }
}
?>
