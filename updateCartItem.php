<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $product_id = $_POST["product_id"];
    $quantity = (int)$_POST["quantity"];

    if ($quantity <= 0) {
        // Remove item if quantity is zero or negative
        if (isset($_SESSION['cart'][$product_id])) {
            unset($_SESSION['cart'][$product_id]);
        }
    } else {
        // Update item quantity
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id] = $quantity;
        }
    }
}

// Redirect back to the cart page
header("Location: cartpage.php");
exit();
?>
