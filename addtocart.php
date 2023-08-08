<!-- add_to_cart.php -->
<?php
session_start();
$host="localhost";
$username="root";
$password="";
$database="shop_express";
// Connect to the database
$conn = new mysqli($host,$username,$password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add the product to the cart
if (!isset($_SESSION['cart'][$product_id])) {
    // Product is not in cart, add with quantity 1
    $_SESSION['cart'][$product_id] = 1;
} else {
    // Product is already in cart, increment quantity
    $_SESSION['cart'][$product_id]++;
}


$conn->close();

// Redirect back to the product list page
header("Location: ./cartpage.php");
exit();
?>
