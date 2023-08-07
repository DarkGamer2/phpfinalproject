<?php
session_start();
require_once 'getProducts.php';
require_once 'cart.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
    <link rel="stylesheet" type="text/css" href="./css/cart.css">
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Your Shopping Cart</h1>
    </div>
    <div class="cart">
        <div class="product-list">
            <?php foreach ($_SESSION['cart'] as $product_id => $cart_item): ?>
                <div class="product-item">
                    <img class="product-image" src="images/<?php echo $cart_item['product']['image']; ?>" alt="<?php echo $cart_item['product']['name']; ?>">
                    <div class="product-details">
                        <h3><?php echo $cart_item['product']['name']; ?></h3>
                        <p class="product-price">$<?php echo $cart_item['product']['price']; ?></p>
                    </div>
                    <input class="quantity-input" type="number" name="quantity" value="<?php echo $cart_item['quantity']; ?>" min="1">
                    <span class="remove-button">&#10006;</span>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="cart-total">
            <p>Total: $<?php echo number_format($cart_total, 2); ?></p>
        </div>
    </div>
</div>
</body>
</html>
