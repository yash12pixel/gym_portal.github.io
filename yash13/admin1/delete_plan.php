<?php
include('include/header.php');
    //include('include/navbar.php');
    include('connection.php');
   // include('userdelete.php');
//include ('security.php');
   
    if(isset($_POST['delete']))
    {
        $plan_id = $_POST['plan_id'];

        $query = "DELETE FROM plan_names WHERE plan_id='$plan_id'";
        $query_run = mysqli_query($con,$query);

        if($query_run)
        {
            
            header('location:plans.php');
        }
        else
        {
            echo '<script> alert("Something went wrong!");</script> ';
        }
    }
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

