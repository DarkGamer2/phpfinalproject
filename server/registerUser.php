<?php 
$email=$_POST['email'];
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$account_password=$_POST['account_password'];

$host="localhost";
$username="root";
$password="";
$database="shop_express";

$hashedPassword=password_hash($account_password,PASSWORD_BCRYPT);
$conn=new mysqli($host,$username,$password,$database);
$sql="INSERT INTO tblusers (email,first_name,last_name,account_password) VALUES ('$email','$first_name','$last_name','$hashedPassword')";

if($conn->query($sql)===TRUE){
    header("Location: ../../../frontend/pages/LoginForm.html");
    exit;
}
else{
    echo "Error:" .$sql . "<br>" . $conn->error;
}

$conn->close();
?>