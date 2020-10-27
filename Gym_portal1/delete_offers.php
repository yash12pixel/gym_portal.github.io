<?php
session_start();
include ('security.php');
include 'connection.php';
$id=$_GET['id'];
//echo $delete;
$sql = "delete from gym_offers where offer_id=$id";
$result = mysqli_query($con,$sql) or die(mysqli_error($con)); 
if($result)
{
    header("location:offers.php");
}
else
{
    echo "<script>alert('Something went wrong!');</script>";
    header("location add_gym_plans.php");
}

