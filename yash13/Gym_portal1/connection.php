<?php
$server="localhost";
$user="root";
$pass="";
$db="adminpanel";
$con= mysqli_connect($server, $user, $pass, $db);
if(!$con)
{
    die("Error while connectiong to database ". mysqli_connect_error());
}
else
{
    
}   

?>
