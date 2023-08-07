<?php 
$productName=$_POST["productName"];
$productDescription=$_POST["productDescription"];
$productPrice=$_POST["productPrice"];
$productImageUrl=$_POST["productImageUrl"];

$host = "localhost";
$username = "root";
$password = "";
$database = "shop_express";

$conn=new mysqli($host, $username, $password, $database);
$sql="INSERT INTO products (productName, productDescription, productPrice, productImageUrl) VALUES ('$productName', '$productDescription', '$productPrice','$productImageUrl')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
