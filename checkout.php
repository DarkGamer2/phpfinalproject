<?php
session_start();

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    // User is not authenticated, redirect to the login page
    header("Location: ./pages/LoginForm.html"); // Replace 'LoginForm.html' with your actual login page
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "shop_express";

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get user's email from the session
    $email = $_SESSION['email'];

    // Retrieve cart items from session
    $cartItems = array();
    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $productId => $quantity) {
            $cartItems[] = array('productID' => $productId, 'quantity' => $quantity);
        }
    }

    // Insert cart items into the 'orders' table
    foreach ($cartItems as $item) {
        $product_id = $item['productID'];
        $quantity = $item['quantity'];

        $insertQuery = "INSERT INTO orders (email, productID, quantity) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("sii", $email, $product_id, $quantity);
        $stmt->execute();
    }

    $conn->close();

    // Clear the cart after successful checkout
    $_SESSION['cart'] = array();

    // Redirect back to the cart page with a success message
    header("Location: ./cartpage.php?checkout_success=true");
    exit();
} else {
    // Redirect back to the cart page if accessed directly
    header("Location: ./cartpage.php");
    exit();
}
?>
