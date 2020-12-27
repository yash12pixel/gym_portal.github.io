
<?php include('include/header.php');  ?>
<?php include('include/navbar.php');  ?>
<?php //include('include/slider.php'); 
//echo $_SESSION['user_type'];
//if(isset($_SESSION['user_type']))
//{
//    if($_SESSION['user_type']== 'Already_customer')
//    {
//        session_destroy();
//        //exit(header("location:login.php"));
//    }
//}

$con = mysqli_connect('localhost','root','','adminpanel');

$productOne = $productTwo = '';

//$productOne = $_REQUEST['card_one'];
//$productTwo = $_REQUEST['card_two'];
if(isset($_REQUEST['card_one']) && isset($_REQUEST['card_two']))
{
$_SESSION['productOne']=$_REQUEST['card_one'];
$_SESSION['productTwo']=$_REQUEST['card_two'];
}
$productOne = $_SESSION['productOne'];
$productTwo = $_SESSION['productTwo'];


    $pro1_sql = "select *,COUNT(tr.trainer_id) as cnt from gyms g inner join trainer_gym tr on g.gym_id=tr.gym_id where g.gym_id='".$productOne."'";
$pro1_query = mysqli_query($con, $pro1_sql);
$row1 = mysqli_fetch_assoc($pro1_query);

$pro2_sql = "select *,COUNT(tr.trainer_id) as cnt from gyms g inner join trainer_gym tr on g.gym_id=tr.gym_id where g.gym_id='".$productTwo."'";
$pro2_query = mysqli_query($con, $pro2_sql);
$row2 = mysqli_fetch_assoc($pro2_query);




//average raging of 1st gym
 $ratingDetails = "SELECT ratingNumber FROM item_rating  where gym_id=(select gym_id from gyms where gym_id='$productOne' )";
	$rateResult = mysqli_query($con, $ratingDetails) or die("database error:". mysqli_error($con));
	$ratingNumber = 0;
	$count = 0;
	$fiveStarRating = 0;
	$fourStarRating = 0;
	$threeStarRating = 0;
	$twoStarRating = 0;
	$oneStarRating = 0;
	while($rate = mysqli_fetch_assoc($rateResult)) {
		$ratingNumber+= $rate['ratingNumber'];
		$count += 1;
		if($rate['ratingNumber'] == 5) {
			$fiveStarRating +=1;
		} else if($rate['ratingNumber'] == 4) {
			$fourStarRating +=1;
		} else if($rate['ratingNumber'] == 3) {
			$threeStarRating +=1;
		} else if($rate['ratingNumber'] == 2) {
			$twoStarRating +=1;
		} else if($rate['ratingNumber'] == 1) {
			$oneStarRating +=1;
		}
	}
	$average = 0;
	if($ratingNumber && $count) {
		$average = $ratingNumber/$count;
	}     
        $averageRating = round(2*$average)/2; 
        

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <title>Compare gyms</title>

    <style>
    	.card{
    		border: 2px solid #ccc; border-radius: 3px; padding: 10px;
    	}
    </style>
  </head>
  <body>
  	<div class="container">
  		<div class="row">
  			<div class="col-sm-6" style="margin-top: 30px;">
  				<h2>Compare Gyms</h2>
  			</div>
        <div class="col-sm-6" style="margin-top: 30px;">
          <a href="index.php" style="text-align: right;"><h2>Back</h2></a>
        </div>	
  		</div>

  		<div class="row" style="margin-top: 50px;">
  			
  			<div class="col-sm-6" style="margin-bottom: 30px; padding: 5px;">
          <div class="card">
            <h3 style="text-align: center; background: #ccc; width: 100%; padding: 10px;"><?php echo $row1['gym_name']; ?></h3>
  				  
            <p><b>Address : </b><?php echo $row1['address']; ?></p>
            <p><b>Description</b>.<?php echo $row1['gym_desc']; ?></p>
            <p><b>Number of trainers:  </b><?php echo $row1['cnt']; ?></p>
           <p><b>Rating:  </b><span style="color:blue;font-weight:bold"><?php echo $averageRating; ?></span></p> 
              <p><b>Plans: </b></p>
              <table>
                  <th>Plan name</th>
                  <th>Plane price</th><?php
              $plan_sel = "select *  from gyms g inner join plan p on g.gym_id=p.gym_id where g.gym_id='".$productOne."'";
                $plan_query = mysqli_query($con, $plan_sel);
                //$plans = mysqli_fetch_assoc($pro1_query);
              while ($row = mysqli_fetch_assoc($plan_query)){
                ?>
                  <tr>
                            <td><span style="color:blue;font-weight:bold"><?php echo $row['plan_type']; ?></span></td>
                                    
                            <td> <span style="color:red;font-weight:bold"><?php echo $row['plan_price']; ?></span></td>
                  </tr>   
                 <?php
              }
              ?>
                  </table>
          </div>
  			</div>
        <div class="col-sm-6" style="margin-bottom: 30px; padding: 5px;">
          <div class="card">
            <h3 style="text-align: center; background: #ccc; width: 100%; padding: 10px;"><?php echo $row2['gym_name']; ?></h3>   
            
            
                   <?php
         //average raging of 2nd gym
 $ratingDetails = "SELECT ratingNumber FROM item_rating  where gym_id=(select gym_id from gyms where gym_id='$productTwo' )";
	$rateResult = mysqli_query($con, $ratingDetails) or die("database error:". mysqli_error($con));
	$ratingNumber = 0;
	$count = 0;
	$fiveStarRating = 0;
	$fourStarRating = 0;
	$threeStarRating = 0;
	$twoStarRating = 0;
	$oneStarRating = 0;
	while($rate = mysqli_fetch_assoc($rateResult)) {
		$ratingNumber+= $rate['ratingNumber'];
		$count += 1;
		if($rate['ratingNumber'] == 5) {
			$fiveStarRating +=1;
		} else if($rate['ratingNumber'] == 4) {
			$fourStarRating +=1;
		} else if($rate['ratingNumber'] == 3) {
			$threeStarRating +=1;
		} else if($rate['ratingNumber'] == 2) {
			$twoStarRating +=1;
		} else if($rate['ratingNumber'] == 1) {
			$oneStarRating +=1;
		}
	}
	$average = 0;
	if($ratingNumber && $count) {
		$average = $ratingNumber/$count;
	}     
        $averageRating = round(2*$average)/2; 
         ?>
            
            <p><b>Address : </b><?phpif(($row2['address'])! =null){ echo $row2['address'];}else{ echo "No information provided by gym"} ?> </p>
            <p><b>Description</b>.<?php echo $row2['gym_desc']; ?></p>
         <p><b>Number of trainers:  </b><?php echo $row2['cnt']; ?></p>
         <p><b>Rating:  </b><span style="color:blue;font-weight:bold"><?php echo $averageRating; ?></span></p>
         
  
         
           <p><b>Plans: </b></p>
              <table>
                  <th>Plan name</th>
                  <th>Plane price</th><?php
              $plan_sel = "select *  from gyms g inner join plan p on g.gym_id=p.gym_id where g.gym_id='".$productTwo."'";
                $plan_query = mysqli_query($con, $plan_sel);
                //$plans = mysqli_fetch_assoc($pro1_query);         
              while ($row = mysqli_fetch_assoc($plan_query)){
                ?>
                  <tr>
                            <td><span style="color:blue;font-weight:bold"><?php echo $row['plan_type']; ?></span></td>
                                    
                            <td> <span style="color:red;font-weight:bold"><?php echo $row['plan_price']; ?></span></td>
                  </tr>   
                 <?php
              }
              ?>
                  </table>
          </div>
        </div>	
  			
  		</div>
  	</div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>
