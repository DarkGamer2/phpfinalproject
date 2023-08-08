<!-- cartpage.php -->
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./css/cart.css">
    <link rel="stylesheet" href="./css/index.css">
    <script src="https://kit.fontawesome.com/89bbf2d478.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <title>Shopping Cart</title>
</head>
<body>
    <div class="cart-container">
    <h2 class="section-title">Your Shopping Cart</h2>
    <table>
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th class="actions">Actions</th>
        </tr>
        <?php
        session_start();
        $host="localhost";
        $username="root";
        $password="";
        $database="shop_express";
    
        $conn = new mysqli($host,$username,$password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    // User is not authenticated, redirect to the login page
    header("Location: ./pages/LoginForm.html"); // Replace 'login.php' with your actual login page
    exit();
}
        $total=0;
        if (!empty($_SESSION['cart'])) {
            $cartItems = array();
            foreach ($_SESSION['cart'] as $productId => $quantity) {
                $productQuery = "SELECT productID, productName, productPrice, productImageURL FROM products WHERE productID = ?";
                $stmt = $conn->prepare($productQuery);
                $stmt->bind_param("i", $productId);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $product = $result->fetch_assoc();
                    $product['quantity'] = $quantity;
                    $cartItems[] = $product;
                }

                $subtotal = $product['productPrice'] * $quantity;
                    $total += $subtotal; // Add to total
            }

            foreach ($cartItems as $item) {
                $subtotal = $item['productPrice'] * $item['quantity'];
                echo "<tr>";
                echo "<td>{$product['productName']}</td>";
                echo "<td>{$product['productPrice']}</td>";
                echo "<td>{$quantity}</td>"; // Display quantity here
                echo "<td>{$subtotal}</td>";
                echo "<td class='actions'>";
                echo "<div class='action-buttons'>";
                // Edit button opens a form to edit quantity
                echo "<form class='edit-form' action='./updateCartItem.php' method='post'>";
                echo "<input type='hidden' name='product_id' value='{$product['productID']}'>";
                echo "<input type='number' name='quantity' value='{$quantity}' min='1'>";
                echo "<button class='edit-button' type='submit'><i class='fa-regular fa-pen-to-square margin-icon'></i>Edit</button>";
                echo "</form>";
                // Delete button
                echo "<form action='./deleteCartItem.php' method='post'>";
                echo "<input type='hidden' name='product_id' value='{$product['productID']}'>";
                echo "<button class='delete-button' type='submit'><i class='fa-solid fa-trash-can margin-icon'></i>Delete</button>";
                echo "</form>";
                echo "</div>";
                echo "</td>";
                echo "</tr>";
            }
        }
        else{
            echo "<tr><td colspan='5' class='no-items'>No items in cart</td></tr>";
        }
        ?>
    </table>
    <div class="subtotal">
    <?php echo number_format($total,2); ?>  <!-- Calculate and display subtotal here -->
        </div>
        <div class="cart-actions">
            <a href="./pages/Products.html" class="continue-shopping-button">Continue Shopping</a>
            <form action="./clearCart.php" method="post">
                <button class="clear-all-button" type="submit">Clear All</button>
            </form>
        </div>
        <a href="checkout.php" class="checkout-button">Proceed to Checkout</a>
    </div>
    </div>
</body>
</html>
