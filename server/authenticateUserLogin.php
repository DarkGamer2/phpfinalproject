<?php 

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email=$_POST['email'];
    $password=$_POST['password'];

    if(password_verify($password,$hashedPassword)){
        $_SESSION['email'] = $email;
        header('Location:index.html');
        exit;
    }
    else{
        header("Location:LoginForm.html?login_error=1");
        exit;
    }
}

?>