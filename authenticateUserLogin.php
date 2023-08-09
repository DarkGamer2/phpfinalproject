<?php 

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email=$_POST['email'];
    $account_password=$_POST['account_password'];
    $hashedPassword=password_hash($account_password,PASSWORD_BCRYPT);

    if(password_verify($account_password,$hashedPassword)){
        $_SESSION['email'] = $email;
        $_SESSION['authenticated'] = true;
        header('Location: ./dashboard.php');
        exit;
    }
    else{
        
        header("Location:./pages/LoginForm.html");
        exit;
    }
}

?>