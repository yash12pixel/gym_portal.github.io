<?php
require_once('RSA_CLASS.php');

include('database_connection.php');
session_start();
//$md5= md5($_POST['chat_message']);

//Encryption Using RSA algorithm
/*
$p=29;
$q=61;
$n=1769;
$e=11;
$d=611;
*/
//using DB
$con= mysqli_connect("localhost", "root","", "chat");
$sql="select * from login where user_id='".$_POST['to_user_id']."'";
$result= mysqli_query($con, $sql);
$row= mysqli_fetch_array($result);
$e=$row['e'];
$n=$row['n'];
$d=$row['d'];
$res= mysqli_query($con, $sql);
$msg=$_POST['chat_message'];
$lenght = strlen($msg);
$c = array();


//Encryption :
$obj=new RSA();
for($i=0; $i<$lenght; $i++){            
         $c[$i]=(int)$obj->encrypt(ord($msg[$i]), $e, $n);
      
}
 $c=implode("_",$c);
//$encrypted=implode("",$c);
 
 
//End of encryption
$data = array(
 ':to_user_id'  => $_POST['to_user_id'],
 ':from_user_id'  => $_SESSION['user_id'],
 ':chat_message'  =>$c, //Encrypted Message
 ':status'   => '1'
);

$query = "
INSERT INTO chat_message 
(to_user_id, from_user_id, chat_message, status) 
VALUES (:to_user_id, :from_user_id, :chat_message, :status)
";

$statement = $connect->prepare($query);



if($statement->execute($data))
{
//Deleting blank all blank messages immediately after user sends
$sql="delete from chat_message where chat_message=''";
$res=mysqli_query($con, $sql);
//
 echo fetch_user_chat_history($_SESSION['user_id'], $_POST['to_user_id'], $connect);
}

?>
