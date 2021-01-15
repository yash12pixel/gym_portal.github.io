<?php
require_once('RSA_CLASS.php');

$connect = new PDO("mysql:host=localhost;dbname=chat", "root", "");

date_default_timezone_set('Asia/Kolkata');

function fetch_user_last_activity($user_id, $connect)
{
 $query = "
 SELECT * FROM login_details 
 WHERE user_id = '$user_id' 
 ORDER BY last_activity DESC 
 LIMIT 1
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  return $row['last_activity'];
 }
}

function fetch_user_chat_history($from_user_id, $to_user_id, $connect)
{
 $query = "
 SELECT * FROM chat_message 
 WHERE (from_user_id = '".$from_user_id."' 
 AND to_user_id = '".$to_user_id."') 
 OR (from_user_id = '".$to_user_id."' 
 AND to_user_id = '".$from_user_id."') 
 ORDER BY timestamp DESC
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $output = '<ul class="list-unstyled">';
 foreach($result as $row)
 {
  $user_name = '';
  if($row["from_user_id"] == $from_user_id)
  {
   $user_name = '<b class="text-success" text-align="right">You</b>';
  }
  else
  {
   $user_name = '<b class="text-danger">'.get_user_name($row['from_user_id'], $connect).'</b>';
  }
//Decryption of Message
  /*
$p=29;
$q=61;
$n=1769;
$e=11;
$d=611;   
   */
$con= mysqli_connect("localhost", "root","", "chat");


//retriving private key from database
$sql1="select AES_DECRYPT(d,'RSACYPHER'),n from login where user_id=".$row['to_user_id']."";
$result1= mysqli_query($con, $sql1);
$row1 = mysqli_fetch_row($result1);


$d=(int) $row1[0];//GETS d from database
//$d= $_COOKIE['d'];
//echo "D is ".$d;
$n=$row1[1];//GEts n drom database
$c=$row["chat_message"];
$c= explode("_",$c);
$M=array();
$obj=new RSA();
for($j=0;$j<count($c);$j++)
{
    $M[$j]=(int)$obj->decrypt($c[$j], $d, $n);
    $M[$j]= chr($M[$j]);
    
}
$message= implode("",$M);

//End
if($user_name=='<b class="text-success" text-align="right">You</b>')
{
  $output .= '
  <li style="border-bottom:1px dotted #ccc">
  <div align="right">
   <p>'.$message.' - '.$user_name.'
    <div align="right">        
     
    </div>
    </div>
   </p>
  </li>
  ';
}
else
{
    $output .= '
  <li style="border-bottom:1px dotted #ccc">
   <p>'.$user_name.' - '.$message.'
    <div align="right">
     
    </div>
   </p>
  </li>
  ';
}
 }
 $output .= '</ul>';
 $query = "
 UPDATE chat_message 
 SET status = '0' 
 WHERE from_user_id = '".$to_user_id."' 
 AND to_user_id = '".$from_user_id."' 
 AND status = '1'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 return $output;
}

function get_user_name($user_id, $connect)
{
 $query = "SELECT username FROM login WHERE user_id = '$user_id'";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  return $row['username'];
 }
}

function count_unseen_message($from_user_id, $to_user_id, $connect)
{
 $query = "
 SELECT * FROM chat_message 
 WHERE from_user_id = '$from_user_id' 
 AND to_user_id = '$to_user_id' 
 AND status = '1'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 $count = $statement->rowCount();
 $output = '';
 if($count > 0)
 {
  $output = '<span class="label label-success">'.$count.'</span>';
 }
 return $output;
}


?>
