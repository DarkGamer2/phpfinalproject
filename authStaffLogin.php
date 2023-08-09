<?php 

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $staff_email=$_POST['staff_email'];
    $staff_password=$_POST['staff_password'];
    $hashedPassword=password_hash($staff_password,PASSWORD_BCRYPT);

    if(password_verify($staff_password,$hashedPassword)){
        $_SESSION['staff_email'] = $staff_email;
        $_SESSION['authenticated'] = true;
        header('Location: ./staffDashboard.php');
        exit;
    }
    else{
        
        header("Location:./pages/AdminLogin.html");
        exit;
    }
}

?>