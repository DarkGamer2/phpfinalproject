<!-- product_list.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
</head>
<body>
    <h2>Product List</h2>
    <table>
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        <?php
        $host="localhost";
        $username="root";
        $password="";
        $database="shop_express";
        // Connect to the database and fetch product data
        $conn = new mysqli($host,$username,$password,$database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve product data from the database
        $productQuery = "SELECT productID, productName, productPrice FROM products";
        $result = $conn->query($productQuery);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['productName']}</td>";
                echo "<td>{$row['productPrice']}</td>";
                echo "<td>";
                echo "<form action='./addtocart.php' method='post'>";
                echo "<input type='hidden' name='product_id' value='{$row['productID']}'>";
                echo "<button type='submit' name='add_to_cart'>Add to Cart</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
        }

        $conn->close();
        ?>
    </table>
    <a href="./cartpage.php">View Cart</a>
</body>
</html>
