<?php
session_start();
    include('connection.php');

    if(!$_SESSION['user']){
        header("location:adminlogin.php");
    }

?>
