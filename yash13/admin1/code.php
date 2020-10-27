<?php
session_start();
include('connection.php');
//include('security.php');
if(isset($_POST['login'])){

    $email_login = $_POST['email'];
    $email_pass = $_POST['password'];

    $q = "select * from admintable where user='$email_login' && pass='$email_pass' ";

    $run = mysqli_query($con,$q);

    if(mysqli_fetch_array($run)){
        $_SESSION['user'] = $email_login;
        header("location:index.php");
    }
    else{
        $_SESSION['status'] = 'Email id / Password is invalid';
        header("location:adminlogin.php");   
    }
}

?>