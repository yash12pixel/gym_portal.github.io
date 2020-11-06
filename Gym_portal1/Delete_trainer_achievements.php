<?php
session_start();
include ('security.php');
include 'connection.php';
$Image_id=$_GET['id'];
$Trainer_id=$_GET['Tid'];
//echo $delete;

//get imaeg name
$select = "select * from trainer_achievements where image_id=$Image_id";
$result = mysqli_query($con,$select) or die(mysqli_error($con)); 
$rows = mysqli_fetch_array($result);
$img_name=$rows['image_path'];
//end
$sql = "delete from trainer_achievements where image_id=$Image_id";

$result = mysqli_query($con,$sql) or die(mysqli_error($con)); 
if($result)
{
    unlink("gym_trainer_and_Certificate/$img_name");
    
    header("location:Edit_Gym_Trainer.php?id=$Trainer_id");
}
else
{
    echo "<script>alert('Something went wrong!')</script>";
    header("location Editgymprof.php");
}
?>