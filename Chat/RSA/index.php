<?php 
require_once('RSA_CLASS.php');
$obj=new RSA();
$msg=72;
echo "Message : ".$msg."<br><br>";
list($p,$q)=$obj->generate_Prime();
$p=29;
$q=61;
echo "Value of P : ".$p."<br>";
echo "Value of Q : ".$q."<br>";
list($n,$e,$d)=$obj->Generate_keys($p,$q);
echo "Value of n : ".$n."<br>";
echo "Value of e : ".$e."<br>";
echo "Value of d : ".$d."<br><br>";

$cipherText=$obj->encrypt($msg, $e, $n);
echo "Value of Cipher message = : ".$cipherText."<br>";

$plainText=$obj->decrypt($cipherText, $d, $n);
echo "Value of Decrypted/Orignal message : ".$plainText."<br>";