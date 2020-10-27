<?php
//session_start();

$con=mysqli_connect('localhost', 'root' );
if($con)
{
	//echo "connected";
}
else
{
	echo "not connected";
}

$db=mysqli_select_db($con, 'adminpanel');
?>

