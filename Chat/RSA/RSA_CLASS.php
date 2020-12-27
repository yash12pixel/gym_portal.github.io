<?php
class RSA{

    public function generate_Prime()
    {
        $prime=array( 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97, 101, 103, 107, 109, 113, 127, 131, 137, 139, 149, 151, 157, 163, 167, 173, 179, 181, 191, 193, 197, 199);
        $rand_keys = array_rand($prime, 2);
        $rand1= $prime[$rand_keys[0]] . "<br>";
        $rand2= $prime[$rand_keys[1]];
        $p=(int)$rand1;
        $q=(int)$rand2;
        return array( $p, $q) ;
    }
    
    Public function Generate_keys($p,$q)
    {
        $n=$p*$q;
        $x=($p-1)*($q-1);
        $e=$this->findE($x);
        $d=$this->FindD($e,$x);
        $keys =array($n, $e, $d);
        return $keys;
    } 
    
    ////Function for finding gcd for E
    function gcd($a, $b) 
    { 
        // Everything divides 0 
        if($b==0) 
          {
              return $a ; 
          }
          else
          {
                return $this->gcd( $b , $a % $b ) ; 
          }  
     }  

    //Finding Encryption key e
    function findE($xp)
    {
            $n = 0;
        for ($i = 1; $i < $xp; $i++) {
            if ($this->gcd($i, $xp) == 1)
            {
                if( $i > 1 )
                {
                    $n = $i;
                    return $n;
                }
            }
        }
    }



        
        //Function for generating Decryption key
    function FindD($enc, $xp)
        {
            for ($i = 0;; $i++) 
            {
                if (($enc * $i) % $xp == 1) 
                {
                    return $i;
                }
            }
        }

        
    //Encryption
    function encrypt($msg, $e, $n)
    {
    $C=gmp_pow($msg, $e)%$n;
    return $C;
    }
    
    
    //Decryption
    function decrypt($C, $d, $n)
    {
    $M=gmp_pow( $C,$d )%$n;
    return $M;
    }       
}