
        <?php
        
        //random prime numbers for p and q

        $prime=array( 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97, 101, 103, 107, 109, 113, 127, 131, 137, 139, 149, 151, 157, 163, 167, 173, 179, 181, 191, 193, 197, 199);
        $rand_keys = array_rand($prime, 2);
        $rand1= $prime[$rand_keys[0]] . "<br>";
        $rand2= $prime[$rand_keys[1]];
        $p=(int)$rand1;
        $q=(int)$rand2;       
        
        $p=29;
        $q=61;
       
        $msg=113;//H
        echo "message :- ".$msg."<br><br>";
       // $p=113;//Random prime number p
        //$q=127;//Random prime number q
        echo "Value of P is :".$p."<br>Value if Q is :".$q."<br><br>";
        $n=$p*$q;
        $x=($p-1)*($q-1);

        //Function for finding gcd for E
        function gcd($a, $b) 
        { 
        // Everything divides 0
          
          if($b==0) 
          {
              return $a ; 
          }
          else
          {
          return gcd( $b , $a % $b ) ; 
          }  
  
        }    
        
        //Finding Encryption key e
        function generatePublicKeyValue($xp){
            $n = 0;
            for( $i = 1; $i < $xp;$i++ ){
                if( gcd($i,$xp) == 1 && $i > 1 )
                {
                 
                        $n = $i;
                        return $n;
                    
                }
            }
        }
        $e=generatePublicKeyValue($x);
        echo "Value of e : ".$e."<br>";


       //$e=7;//Random coprime integer number e such that 1<e<x    
       // echo ($e*7)%20;
        
        //Function for generating Decryption key
        function desc_key($enc, $xp)
        {
            for ($i = 0;; $i++) 
            {
                if (($enc * $i) % $xp == 1) 
                {
                    return $i;
                }
            }
        }

        $d=desc_key($e,$x);
        
        //Encryption
        $pow=gmp_pow($msg, $e);
        $C= $pow%$n;
        
        //Decryption
      // $pow=pow($C,$d);
       $M= gmp_pow( $C,$d )%$n;
        //$pow2=(string)$pow;
       
        echo "value of N is ".$n."<br>";
        echo "value of x is ".$x."<br>";
        echo "encryption key is :- ".$e."<br>";
        echo "Decryption key is :- ".$d."<br>";
        echo "Encrypterd message/Cypher text :- ".$C."<br><br>";
        echo "power of numbers for encryption :".$pow."<br>";
        echo "Decrypted/Orignal msg :- ".$M;
     
       ?>
