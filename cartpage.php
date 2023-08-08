<!-- cartpage.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
</head>
<body>
    <h2>Your Shopping Cart</h2>
    <table>
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
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

        if (!empty($_SESSION['cart'])) {
            $cartItems = array();
            foreach ($_SESSION['cart'] as $productId => $quantity) {
                $productQuery = "SELECT productID, productName, productPrice FROM products WHERE productID = ?";
                $stmt = $conn->prepare($productQuery);
                $stmt->bind_param("i", $productId);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $product = $result->fetch_assoc();
                    $product['quantity'] = $quantity;
                    $cartItems[] = $product;
                }
            }

            foreach ($cartItems as $item) {
                $subtotal = $item['productPrice'] * $item['quantity'];
                echo "<tr>";
                echo "<td>{$item['productName']}</td>";
                echo "<td>{$item['productPrice']}</td>";
                echo "<td>{$item['quantity']}</td>";
                echo "<td>{$subtotal}</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
    <a href="./pages/Products.html">Continue Shopping</a>
</body>
</html>
