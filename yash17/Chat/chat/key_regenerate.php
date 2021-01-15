<?php
   session_start();
  
    $userid=$_SESSION['user_id'];
   $username=$_SESSION['username'];
   //decrypting chat message
   //getting old key data for decryption
   $con= mysqli_connect("localhost", "root","", "chat");
        $sql1="select AES_DECRYPT(d,'RSACYPHER'),n,e from login where user_id='".$userid."'";
            $result1= mysqli_query($con, $sql1);
            $rows= mysqli_fetch_array($result1);
            $Ee=$rows[2];
            $En=$rows[1];
            $Ed=$rows[0];
            //echo "old D : ".$Ed;
//
            
   require_once('RSA_CLASS.php');
   include('database_connection.php');
  //Generating new keys
   $obj=new RSA(); 
   list($p,$q)=$obj->generate_Prime();
   list($n,$e,$d)=$obj->Generate_keys($p,$q);
   $query="update login set e=".$e.",d=AES_ENCRYPT('".$d."','RSACYPHER'),n=".$n." where username='".$username."'";

   //echo "<br>New D is ".$d;
   $res=mysqli_query($con, $query);
   if(!$res)
    {
       echo "error".mysqli_error($con);
    }
    else
    {
       //$del="delete delete from chat_message where to_user_id=".$userid."";
        
        //first decryption old messages using old keys
        $sql="select * from chat_message where to_user_id=".$userid."";
        $result= mysqli_query($con, $sql);
        if(!$result)
            {
                echo "Error : ".mysqli_error($con);
                
            }
         if(mysqli_num_rows($result)==0)
         {
              header("location:index.php?updated=true");
         }
        while($row = mysqli_fetch_assoc($result))
        { 
            echo $userid;
            $sql1="select AES_DECRYPT(d,'RSACYPHER'),n,e from login where user_id='".$userid."'";
            $result1= mysqli_query($con, $sql1);
            $rows= mysqli_fetch_array($result1);
            $e=$rows[2];
            $n=$rows[1];
            $d=$rows[0];
            $time=$row['timestamp'];
            echo "time : ".$time;
            //decryption of old messages 
        $c = $row["chat_message"];
        $c = explode("_", $c);
        $M = array();
        $obj = new RSA();
        for ($j = 0; $j < count($c); $j++) {
            $M[$j] = (int) $obj->decrypt($c[$j], $Ed, $En);
            $M[$j] = chr($M[$j]);
        }
        $msg = implode("", $M);
        echo "<br>Message : ".$msg;
        
       // encryption of old messages using new key
        
        $lenght = strlen($msg);
        $c = array();
        $obj=new RSA();
        for($i=0; $i<$lenght; $i++){            
            $c[$i]=(int)$obj->encrypt(ord($msg[$i]), $e, $n);      
        }
        $c=implode("_",$c);
        
        
        //replacing old messages with       
        $sql2="update chat_message set chat_message='".$c."' where to_user_id=".$userid." and timestamp='".$time."'";
            $result2= mysqli_query($con, $sql2);
            if(!$result2)
            {
                echo "Error : ".mysqli_error($con);
            }
            else
            {
                //echo "Updated successfully";
               header("location:index.php?updated=true");
            }
        }
       
    }    
        


