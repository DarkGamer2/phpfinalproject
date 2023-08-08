<?php
session_start();

// Clear the cart
$_SESSION['cart'] = array();

// Redirect back to the cart page
header("Location: cartpage.php");
exit();
?>
