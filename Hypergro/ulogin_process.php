<?php
session_start();
require_once 'db_connection.php';
$_SESSION['user_id'] = $user['id'];
$_SESSION['logged_in'] = true;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username1 = isset($_POST['username1']) ? $_POST['username1'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;

    if ($username1 !== null && $password !== null) {
        $query = "SELECT id, password FROM customer WHERE username1=?";
        $stmt = mysqli_prepare($conn, $query);

        if (!$stmt) {
            die('Error in preparing statement: ' . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "s", $username1);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (!$result) {
            die('Error in getting result: ' . mysqli_error($conn));
        }

        if ($user = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $user['password'])) {
            
                session_regenerate_id(true);

                $_SESSION['user_id'] = $user['id'];
                header('Location: home.php');
                exit();
            } else {
                echo 'Invalid password';
            }
        } else {
            echo 'Invalid credentials';
        }
    } else {
        echo 'Invalid form submission';
    }
}


?>
