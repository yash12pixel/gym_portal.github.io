<?php 
include 'connection.php';
include('include/header.php');
include('include/navbar.php');
include ('security.php');
$sql="select * from prime_plans";
$result = mysqli_query($con,$sql);

?>
<!DOCTYPE html>
<html>
<head>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.price {
  color: grey;
  font-size: 22px;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;
}
</style>
</head>
<body style="align: center">
<div class="row align-items-stretched mb-1">
 <?php   
 if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        ?>
       <div class="col-md-6 col-lg-4 mb-1">
            <div class="pricing p-5 h-100 text-center" style=" border: 1px solid #ccc; border-color:hsl(89, 43%, 51%);">
              <div class="text-center mb-4">
                <h3 class="h4 mb-4"><?php echo $row['plan_duration']; ?> month</h3>
                <strong class="font-weight-normal h1">Rs <?php echo $row['plan_price']; ?></strong>
              </div>
              <ul class="list-unstyled mb-5">                 
                  <li>Diet charts</li>
                  <li>15% discount on gym plans</li>
                  <li>Prime videos</li>
                </ul>
                <p class="mb-0"><a href="purchase_prime.php?id=<?php echo $row['plan_id']; ?>" class="btn pill btn-primary">Join Now</a></p>
            </div>
          </div>
    
    <?php
    }
} else {
    echo "0 results";
}   
    
   ?> 
</div>
    
    
    
    
    
    


</div>
</cemter>
</body>
</html>