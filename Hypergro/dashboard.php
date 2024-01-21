<?php
session_start();
require_once 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); 
    exit();
}

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM products WHERE vendor_id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Dashboard</title>
    <link rel="stylesheet" href="styles.css">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .top-box {
            width: 100%;
            padding: 15px;
            background-color: #4CAF50;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        .top-box a {
            color: white;
            text-decoration: none;
        }

        .container {
            width: 60%;
            margin: 20px auto;
        }

        h1, h2 {
            color: #4CAF50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-top: 10px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin: 5px 0 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
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
            margin-top: 15px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
            color: #4CAF50;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="top-box">
        <div class="logo">
            <a href="your_logo_page.html">
                <img src="./images/Group 2.png" alt="Logo">
            </a>
        </div>
        <div class="logout">
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <div class="container">

        <h1>Welcome to Your Dashboard, Vendor!</h1>

        <h2>Your Products</h2>
        <table>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td>₹<?php echo $row['price']; ?></td>
                    <td><a href="delete_product.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                </tr>
            <?php endwhile; ?>
        </table>

        <h2>Add New Product</h2>
        <form action="add_product.php" method="post">
            <label for="product_name">Product Name:</label>
            <input type="text" name="product_name" required>

            <label for="price">Price:</label>
            <input type="number" name="price" step="0.01" required>

            <input type="submit" value="Add Product">
        </form>

        <br>

    </div>

</body>
</html>
