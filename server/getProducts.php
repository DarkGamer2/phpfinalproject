<?php 
$host = "localhost";
$username = "root";
$password = "";
$database = "shop_express";

$sql="SELECT * FROM products";
$conn=new mysqli($host, $username, $password, $database);
$result = $conn->query($sql);
$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Convert data to JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
