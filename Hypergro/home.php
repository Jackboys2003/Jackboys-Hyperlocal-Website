<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body> <header>
        <div class="top-box">
            <div class="logo">
                <a href="your_logo_page.html">
                    <img src="./images/Group 2.png" alt="Logo">
                </a>
            </div>
            <div class="cart" >
                <a href="view_cart.php">
                    <img src="./images/cart.png" alt="Small Logo" width="40" height="40">
                </a>
            </div>
        </div> 
        <nav>
        <div class="search-containers">
            <div class="search-bar">
                <input type="text" id="searchBar" placeholder="Search items..." oninput="searchProducts()">
            </div>
        </div>
            <div class="nav-links">
                <a href="#">Home</a>
                <a href="#">Offers</a>
                <a href="#">Help</a>
                <a href="vendors.php">Vendors</a>
                <a href="logout.php"> Logout</a>
            </div>
        </nav>
    </header>
    <div id="searchResults"></div>
    <section id="categories">
        <div class="category">
            <a href="#dairy">
                <img src="./images/dairy.jpg" alt="Dairy">
                <p>Dairy</p>
            </a>
        </div>

        <div class="category">
            <a href="#e">
                <img src="./images/vegetables.jpg" alt="Fresh Produce">
                <p>vegetables</p>
            </a>
        </div>

        <div class="category">
            <a href="#bakery">
                <img src="./images/bakery.jpg" alt="Bakery">
                <p>Bakery</p>
            </a>
        </div>

        <div class="category">
            <a href="#snacks">
                <img src="./images/snacks.jpg" alt="Snacks">
                <p>Snacks</p>
            </a>
        </div>

        <div class="category">
            <a href="#household">
                <img src="./images/household.jpg" alt="Household Essentials">
                <p>Household Essentials</p>
            </a>
        </div>

        <div class="category">
            <a href="#beverages">
                <img src="./images/bevrages.jpg" alt="Beverages">
                <p>Beverages</p>
            </a>
        </div>
        <div class="category">
            <a href="staples">
                <img src="./images/staples.jpg" alt="Beverages">
                <p>staples</p>
            </a>
        </div>
    </section>
</body>
<div class="footer">
    <footer>
        <p> &copy; 2024 your hypergro delivery services.all rights reserved </p> 
    </footer>
    <script src="script.js"></script>
</div>
</html>
