<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendors</title>
    <link rel="stylesheet" href="vendors.css">
</head>
<body>
    <?php
session_start();
require_once 'db_connection.php';

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: ulogin.php'); 
    exit();
}

function getAllVendorsWithProducts($conn) {
    $query = "SELECT v.id AS vendor_id, v.vendorname, p.id AS product_id, p.name, p.price
              FROM vendor v
              LEFT JOIN products p ON v.id = p.vendor_id
              ORDER BY v.id, p.id";

    $result = mysqli_query($conn, $query);

    $vendors = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $vendorId = $row['vendor_id'];
        $vendors[$vendorId]['vendorname'] = $row['vendorname'];
        $vendors[$vendorId]['products'][] = array(
            'product_id' => $row['product_id'],
            'name' => $row['name'],
            'price' => $row['price']
        );
    }

    return $vendors;
}

$vendors = getAllVendorsWithProducts($conn);
include("header.html")
?>
<h1 style="text-align: center;"> Select the vendor</h1>

<?php foreach ($vendors as $vendorId => $vendor): ?>
    <div class="ven">
    <h2><?php echo $vendor['vendorname']; ?></h2>
    <ul>
        <?php foreach ($vendor['products'] as $product): ?>
            <li>
                <?php echo $product['name']; ?> - ₹<?php echo $product['price']; ?>
                <form action="add_to_cart.php" method="post">
                    <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                    <input class="but" type="submit" value="Add to Cart">
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
    </div>
<?php endforeach; ?>
<?php
 include("footer.html");
?>
</body>
</html>

