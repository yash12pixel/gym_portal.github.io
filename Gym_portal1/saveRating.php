<?php
include_once("connection.php");
session_start();
include ('security.php');
$user_username = $_SESSION['username'];
$sql = "SELECT * FROM customer where username='$user_username' or email='$user_username'";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));
$rows = mysqli_fetch_array($result);
if(!empty($_POST['rating'])){
	$gym_id = $_GET['id'];
        //$gym_id =18;
        $customer_id = (int)$rows['customer_id'];		
       // $customer_id=1;
	$insertRating = "INSERT INTO item_rating (gym_id, customer_id, ratingNumber, title, comments, created, modified) VALUES ('".$gym_id."', '".$customer_id."', '".$_POST['rating']."', '".$_POST['title']."', '".$_POST["comment"]."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')";
        //$insertRating ="INSERT INTO `item_rating`( `itemId`, `userId`, `ratingNumber`, `title`, `comments`, `created`, `modified`) VALUES ('".$itemId."', '".$userID."', '".$_POST['rating']."', '".$_POST['title']."', '".$_POST["comment"]."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')";
	mysqli_query($con, $insertRating) or die("database error: ". mysqli_error($con));		
	echo "rating saved!";
}
?>