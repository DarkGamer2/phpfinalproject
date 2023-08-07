<?php 
$host="localhost";
$username="root";
$password="";
$database="shop_express";

$conn=new mysqli($host,$username,$password,$database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$products=array(
    array("OEM Lenovo ThinkCentre M75s Gen 2 SFF AMD Ryzen 5 Pro 5650G (Beats Intel i7-12700T), 32GB RAM, 1TB NVMe, DisplayPorts, W10P, WiFi, 3YR, Desktop","Lenovo Desktop","880","https://m.media-amazon.com/images/I/61dOpaaH9fL._AC_SX522_.jpg"),
    array("NVIDIA RTX 3060","12GB Graphics Card with Ray Tracing","280","https://m.media-amazon.com/images/I/71tduSp8ooL._AC_SX522_.jpg"),
    array("Dell G16","Gaming Laptop","1299","https://m.media-amazon.com/images/I/71+-TCr-moL._AC_SX522_.jpg"),
    array("G.Skill Trident Z DDR5 Memory","RGB DDR5 Desktop Memory","102","https://m.media-amazon.com/images/I/51c+p6RY+AL._AC_SX522_PIbundle-2,TopRight,0,0_SH20_.jpg"),
    array("SAMSUNG USB-C Flashdrive","USB C Flashdrive","15","https://m.media-amazon.com/images/I/817xK9Cd6JL._AC_SX522_.jpg"),
);

$sql="INSERT INTO products (productName,productDescription,productPrice,productImageUrl) VALUES (?,?,?,?)";
$stmt=$conn->prepare($sql);

foreach($products as $product){
    $productName=$product[0];
    $productDescription=$product[1];
    $productPrice=$product[2];
    $productImageUrl=$product[3];

    $stmt->bind_param("ssd", $productName, $productDescription, $productPrice,$productImageUrl);
    
    if ($stmt->execute()) {
        echo "Record added successfully for project: $name<br>";
    } else {
        echo "Error adding record for project: $name. Error: " . $stmt->error . "<br>";
    }
}

// Close the statement
$stmt->close();

// Close the connection
$conn->close();
?>