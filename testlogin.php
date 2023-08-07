<?php 
$email=$_POST='email';
$password=$_POST='password';

$feedback="";

if($email==""){
    $feedback .="<br> Email Field Empty";
}

if($password==""){
    $feedback .="<br> Password Field Empty";
}
if($feedback!=""){
    Header("Location: ../pages/createAccountForm.html");
}

?>