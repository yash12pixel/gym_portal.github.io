

<?php
require_once('RSA_CLASS.php');
$obj=new RSA();
$msg = "Hello world!";
echo "Message : ".$msg."<br><br>";
$lenght = strlen($msg);
list($p,$q)=$obj->generate_Prime();
list($n,$e,$d)=$obj->Generate_keys($p,$q);
echo "<br>Value of P : ".$p."<br>";
echo "Value of Q : ".$q."<br>";
echo "Value of n : ".$n."<br>";
echo "Value of e : ".$e."<br>";
echo "Value of d : ".$d."<br><br>";

//Encryption
$c = array();
for($i=0; $i<$lenght; $i++){            
         $c[$i]=(int)$obj->encrypt(ord($msg[$i]), $e, $n);
      
}
 $c=implode("_",$c);
echo "Encrypted String :- ".$c;

 echo "<br>Datatype :". gettype($c)."<br>";
print_r($c);

//Decryption
$c= explode("_",$c);
 echo "<br>Datatype after explode:". gettype($c)."<br>";
$M=array();
for($j=0;$j<count($c);$j++)
{
    $M[$j]=(int)$obj->decrypt($c[$j], $d, $n);
    $M[$j]= chr($M[$j]);
    
}
// echo "<br>";
 //print_r($M);
echo "<br><br>Decrypted mesdsage :- <br>";
$message= implode("",$M);
echo $message."<br>Datatype :". gettype($message);
