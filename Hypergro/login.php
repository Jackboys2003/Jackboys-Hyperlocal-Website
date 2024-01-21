<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor login</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: 30px auto;
            background-color: #f5f5f5;
            border: 2px solid #4CAF50;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        .container form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container label {
            margin-top: 10px;
        }

        .container input {
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
            margin-top: 15px;
        }

        .container button:hover {
            background-color: #45a049;
        }

        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .closebtn:hover {
            color: black;
        }
        h1 {
          text-align:center;
        }
    </style>
</head>
<body>
<?php
include("header.html");
?>
<header>
  <h1> vendor login </h1>
<div class="container">
    <form action="login_process.php" method="post">
        <label for="vendorname">Username:</label>
        <input type="text" name="vendorname" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>
</div>
      </header>

</body>
</html>
