<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['product_id'])) {
    $product_id = $_POST["product_id"];

    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
    }
}

// Redirect back to the cart page
header("Location: cartpage.php");
exit();
?>
