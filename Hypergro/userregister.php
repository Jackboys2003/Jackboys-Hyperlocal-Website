<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup!!!</title>
    <link rel="stylesheet" href="userlogin.css">
    <script src="userlogin.js" defer></script>
</head>
<body>

    <div class="top-box">
        <p>Welcome to </p>
        <img src="./images/Group 2.png" alt="Logo">
    </div>

    <header>
        
    <div class="form-container">
        <h1>Registration Form</h1>
        <form id="registrationForm" action="userreg_pro.php" method="post" onsubmit="return validateForm()">
            <label for="name">Name</label>
            <input type="text" name="name" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="phoneNumber">Phone Number:</label>
            <input type="tel" name="phoneNumber" pattern="\d{10}" title="Please enter a valid 10-digit phone number" oninput="validatePhoneNumber(this)" required>

            <label for="address1">Address Line 1:</label>
            <input type="text" name="address1" required>

            <label for="address2">Address Line 2:</label>
            <input type="text" name="address2">

            <label for="city">City:</label>
            <input type="text" name="city" required>

            <label for="state">State:</label>
            <input type="text" name="state" required>

            <label for="country">Country:</label>
            <input type="text" name="country" required>

            <label for="pinCode">Pin Code:</label>
            <input type="text" name="pinCode" pattern="\d{6}" title="Please enter a valid 6-digit pin code" required>

            <label for="username1">Username</label>
            <input type="text" name="username1" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <input type="submit" value="Register">
        </form>
    </div>

</body>
</html>
