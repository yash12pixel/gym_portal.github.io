<?php 
include 'connection.php';
include('include/header.php');
session_start();
// include('include/navbar.php');


$BMI=$MEMBERSHIP_TYPE=$customer_id='';
// echo $_SESSION['username'];
if(isset($_SESSION['username']))
{
    $user= $_SESSION['username'];
    $sql1="select * from customer where username='$user' or email='$user'";
    $res1 = mysqli_query($con, $sql1);
    $result1 = mysqli_fetch_array($res1);
    if ($res1)
    {
        $customer_id = $result1['customer_id'];
        $BMI=$result1['BMI'];
        $MEMBERSHIP_TYPE=$result1['membership_type'];
    }
    
}   


$gym_id=$_GET['id'];
$sql="select * from gyms as g inner join gym_owner as go on g.gym_owner_id=go.gym_owner_id where gym_id=$gym_id";
$result = mysqli_query($con,$sql);
$rows = mysqli_fetch_array($result);
$gym_id=$rows['gym_id'];
//include('include/slider.php');
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>View gym</title>
        <meta charset="utf-8">
      
        
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">
<!-- 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> -->
<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css_view_gym/bootstrap.min.css">
    <link rel="stylesheet" href="css_view_gym/magnific-popup.css">
    <link rel="stylesheet" href="css_view_gym/jquery-ui.css">
    <link rel="stylesheet" href="css_view_gym/owl.carousel.min.css">
    <link rel="stylesheet" href="css_view_gym/owl.theme.default.min.css">
    <link rel="stylesheet" href="css_view_gym/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css_view_gym/animate.css">
    <link rel="stylesheet" href="css/starstyle.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <ink href="https://fonts.googleapis.com/css?family=Teko&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  
    <link rel="stylesheet" href="css_view_gym/aos.css">

    <link rel="stylesheet" href="css_view_gym/style.css">
      
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="package/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="package/dist/sweetalert2.min.css">
        
    <script type="text/javascript">
        function success()
           {
              Swal.fire(
  'Plan Purchased Successfully!',
  '',
  'success'
);
           }
           $(document).on("click","#link",function(){
Swal.fire({
  icon: 'error',
  title: 'Authentication failed',
  text: 'Please log in to purchase gym plans'
  });
});

           $(document).on("click","#rate",function(){
Swal.fire({
  icon: 'error',
  title: 'Authentication failed',
  text: 'Only registered users can reate gyms'
  });
});

           $(document).on("click","#member",function(){
Swal.fire({
  icon: 'warning',
  title: 'You are not member of the gym!',
  text: 'you can rate gyms after 7 days of membership'
  });
});
           $(document).on("click","#member_true",function(){
Swal.fire({
  icon: 'warning',
  title: 'You can rate this gym after 7 days of membership!',
  text: 'Please try again after few days'
  });
});

           $(document).on("click","#Done",function(){
Swal.fire({
  icon: 'warning',
  title: 'You can not rate this gym twice',
  text: ''
  });
});

           $(document).on("click","#membership",function(){
Swal.fire({
  icon: 'error',
  title: 'You are already member of a gym!',
  text: 'Please wait until current gym membership is over'
  });
});

           $(document).on("click","#NO_keys",function(){
Swal.fire({
  icon: 'error',
  title: 'This functionality is currently not available for this gym!',
  text: 'Please try again later'
  });
});

           $(document).on("click","#Alr_done",function(){
Swal.fire({
  icon: 'error',
  title: 'You can not rate gym again till 3 months of last rating are over',
  text: ''
  });
});



        </script>
     
          <?php
        //Alertbox if key regeneration is successful
        $purchased = false;
        if (isset($_SESSION['purchased'])) {
            $purchased = $_SESSION['purchased'];
            //echo $purchased;
            echo "<input type='hidden' value=$purchased>";
        }
        if ($purchased == 'true')
       {
            echo '<script type="text/javascript">success();</script>';
            unset($_SESSION['purchased']);
       }
       ?>
    </head>
    <body>
<div class="site-navbar-wrap bg-white"  >
      
      <div class="container" >
        <div class="site-navbar bg-light" >
          <div class="py-1" >
            <div class="row align-items-center" >
              <div class="col-2" >  
                <h2 class="mb-0 site-logo"><a href="index.php"><strong><?php echo $rows['gym_name']; ?></strong></a></h2>
              </div>
              <div class="col-10">
                <nav class="site-navigation text-right" role="navigation">
                  <div class="container">
                    <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                    <ul class="site-menu js-clone-nav d-none d-lg-block">
                      <li class="active">
                        <a href="#">Home</a>
                      </li>
                      <li>
                        <a href="#exercise">Exercise</a>
                      </li>
                      <li>
                        <a href="#plans">Plans</a>
                      </li>
                      <li><a href="#trainer">Trainers</a></li>
                      <li><a href="#gallery">Gallery</a></li>
                      <li><a href="#rating">Ratting & Feddback</a></li>
                     
                      
                    
                    </ul>
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
<section id="about_us">
<div class="site-section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-12 col-lg-5 mb-1 mb-lg-0 heading-with-border ">
            <h2 class="mb-5 text-uppercase" style="font-size:18px;">All About <strong class="text-black font-weight-bold">Our Gym</strong></h2>
			
            <p  style="font-size: 15px" class="lead">
            <?php
            if(empty($rows['gym_desc']))
            {
                echo "No details available yet.";
            }
            else
            {
                $description=$rows['gym_desc'];
                echo "$description";
            }
            ?></p>
            <h2 class="mb-5 text-uppercase" style="font-size:18px;"><strong class="text-black font-weight-bold">Address</strong></h2>		
            <p style="font-size: 15px" class="lead">
            <?php
            if(empty($rows['address']))
            {
                echo "No details available yet.";
            }
            else
            {
                $description=$rows['address'];
                echo "$description";
            }
            ?></p>
            <h2 class="mb-5 text-uppercase" style="font-size:18px;"><strong class="text-black font-weight-bold">Contact us</strong></h2>		
            <p style="font-size: 15px" class="lead">
            <?php
            if(empty($rows['email']))
            {
                echo "No details available yet.";
            }
            else
            {
                $description=$rows['email'];
                echo "$description";
            }
            ?></p>
            
               <p><a href="view_gym_video.php?id=<?php echo $gym_id; ?>" class="btn btn-primary pill px-4">Watch Video</a></p>

          </div>
          <div class="col-md-12 col-lg-6 ml-auto">
              <?php
            if(empty($rows['gym_logo']))
            {
                echo "<img src='images12/about.jpg' alt='Image' class='img-fluid'>";
            }
            else
            {
                $logo=$rows['gym_logo'];
                echo "<img src='images/profiles/gym/$logo' alt='Image' class='img-fluid'>";;
            }
            ?>
            
          </div>
        </div>
      </div>
    </div>
    </section> 
    
<!-- exercise management start -->
<section id="exercise">
<div class="border-bottom mt-1">
<div class="heading-with-border mt-1 text-center">
          <h2 class="heading text-uppercase">Exercises</h2>
        </div>
      <div class="row no-gutters">

      <?php
        $query_exercise = "select * from gym_exercise where gym_id = '$gym_id'";
        $run = mysqli_query($con,$query_exercise);
        $check = mysqli_num_rows($run) > 0;

        if($check)
        {
            while($row = mysqli_fetch_array($run))
            {
              ?>
                  <div class="col-md-6 col-lg-3">
          <div class="w-100 h-100 block-feature p-5 bg-light">
            <span class="d-block mb-2 mt-2">
              <!-- <span class="flaticon-padmasana display-4"></span> -->
             
              <h1>
              <?php
                    // if($row['gym_exercise_type'] == "yoga")
                    // {
                    //   echo"<span class='flaticon-padmasana display-4'></span>";
                    // }
                    // else if($row['gym_exercise_type'] == "weight_lifting")
                    // {
                    //   echo"<span class='flaticon-weight display-4'></span>";
                    // }
                    // else if($row['gym_exercise_type'] == "boxing")
                    // {
                    //   echo"<span class='flaticon-boxing-gloves display-4'></span>";
                    // }
                    // else if($row['gym_exercise_type'] == "running")
                    // {
                    //   echo"<span class='flaticon-running display-4'></span>";
                    // }
                    // else if($row['gym_exercise_type'] == "cardio")
                    // {
                    //   echo"<span class='flaticon-spinning display-4'></span>";
                    // }
              ?>
              </h1>
            </span>
            <h2 class="mt-2 mb-2"><?php echo $row['gym_exercise_name']; ?></h2>
            <p ><?php echo $row['gym_exercise_desc']; ?></p>
          </div>
        </div>
              <?php
            }
        }
        else{
          echo"<p style='text-align: center'>no records available</p>";
        }
      ?>
    
    </section>

   <section id="plans">
   <div class="site-section">        
      <div class="container">         
        <div class="row">           
          <div class="col-md-6 mx-auto text-center mb-1 section-heading heading-with-border ">
            <h2 class="mb-5 text-success" style="font-size:25px;">Plans</h2>
            <?php
                   //BMI OUTPUT
            //FOR TESTING SET BEELOW BMI VALUE
           // $BMI=30;
            $BMIoutput="";
            if ($BMI <= 18.5 && $BMI >0 ) {
                $BMIoutput = "UNDERWEIGHT";
            } else if ($BMI > 18.5 AND $BMI <= 24.9) {
                $BMIoutput = "NORMAL WEIGHT";
            } else if ($BMI > 24.9 ) {
                $BMIoutput = "OVERWEIGHT";
            }
            
            if($BMI!=null)
            {
            echo "<h2 color='blue' style='font-size:18px;'>Your bmi is $BMI and you are $BMIoutput</h2><br>";
            }
            else
            {
             echo "<h2 color='blue' style='font-size:18px;'>Please enter yout height and weight in profile for better experiance</h2><br>";   
            }
?>
          </div>
        </div>
          <div class="row align-items-stretched mb-1 text-center" style="text-align: center;">
       
                  <?php
            $res = mysqli_query($con, "SELECT * FROM plan where gym_id=$gym_id");          
            if(mysqli_num_rows($res)==0)
            {
                echo "<p class='lead'>No plans available yet</p>";
            }
            while ($row = mysqli_fetch_array($res)) {
                
                //Suggession BY BMI (BLUE outline on division)
               // echo $row['Suggested_for_BMI'];
                if( $BMIoutput==$row['Suggested_for_BMI'])
                {
                       
                        echo "<div class='col-md-6 col-lg-4 mb-1' style='border-style:solid;border-color: Dodgerblue; '>";                      
                }              
                else 
                {
                    echo "<div class='col-md-6 col-lg-4 mb-1' >";
                }

                ?>
          
            <div class="pricing p-5 h-100 text-center" style=" border: 1px solid #ccc; border-color:hsl(89, 43%, 51%);" >
              <div class="text-center mb-4" >
                <h3 class="h4 mb-4" style="font-size:20px;"><?php 
                echo  $row['plan_type'];
                ?></h3>
                  <?php
                   //getting offer data
                  $OfferSql="Select * from gym_offers where gym_id='$gym_id' and plan_id='".$row['plan_id']."' ";
                  $Offerresult= mysqli_query($con, $OfferSql);
                  $OfferNum= mysqli_num_rows($Offerresult);
                  $Offerrows = mysqli_fetch_array($Offerresult);
                  
                  //15% Discount to Prime members
                  //15% + offer Discount to Prime members
                  if($MEMBERSHIP_TYPE=='p')
                  {
                      $price=$row['plan_price'];
                       echo "<h3>15% Prime Discount</h3><br>";
                       if($OfferNum!=0)
                      {
                           echo "<h3>+<br/>".$Offerrows['offer_percentage']."% ".$Offerrows['offer_name']."</h3><br>";
                      }
                      echo "<Strike><strong class='font-weight-normal h1'>Rs. $price</strong></Strike><br>";
                      $amount=15;//Percentage
                      //$new_price= ($price * ((100-$amount) / 100));//Substracting Prime Discount
                       if($OfferNum!=0)
                      {
                           $amount=$amount+(int)$Offerrows['offer_percentage'];
                           $new_price=($price * ((100-$amount) / 100));
                      }
                      else
                      {
                          $new_price= ($price * ((100-$amount) / 100));//Substracting Prime Discount
                      }
                      echo "<strong class='font-weight-normal h1'>Rs. $new_price</strong>";
                     
                  }
                 //Offer discount for normal users
                  else                      
                  {
                       if($OfferNum!=0)
                      {
                           $Old_price=$row['plan_price'];
                           echo "<h3>".$Offerrows['offer_percentage']."% ".$Offerrows['offer_name']."</h3><br>";
                           echo "<Strike><strong class='font-weight-normal h1'>Rs. $Old_price</strong></Strike><br>";
                           $amount=(int)$Offerrows['offer_percentage'];
                           $price=($Old_price * ((100-$amount) / 100));
                      }
                      else
                      {                    
                          $price=$row['plan_price'];
                          
                      }
                      echo "<strong class='font-weight-normal h1'>Rs. $price</strong>";
                  }
                ?>
              </div>
              <ul class="list-unstyled mb-5">
                  <li style='font-size:22px;'>Duration</li>
                  <li style='font-size:20px;'><?php echo $row['plan_duration'];?> Months</li>
                </ul>
                <?php
                //check if gym owner have given their merchant keys
                $GymOwnersql = "select * from gym_owner go inner join gyms g on go.gym_owner_id=g.gym_owner_id where gym_id=$gym_id";
                  $GO_res = mysqli_query($con, $GymOwnersql);
                  $GO_result = mysqli_fetch_array($GO_res);
                  $Gym_owner_id = $GO_result['gym_owner_id'];
                  $Go_keys_sql = "SELECT * FROM gym_owner as g inner join gyms as gm on g.gym_owner_id=gm.gym_owner_id where g.gym_owner_id='$Gym_owner_id'";
                  $Go_keys = mysqli_query($con, $Go_keys_sql);
                  $Go_row= mysqli_fetch_array($Go_keys);
                  $key1=$Go_row['Merchant_key'];
                  $key2=$Go_row['Merchant_ID'];
                // echo $Chk_keys;

                  //Checking if customer is already member of a gym 
                $query= "SELECT * FROM customer_membership WHERE customer_id='$customer_id' and gym_id=$gym_id";
                 $result = mysqli_query($con,$query);
                 $rows2 = mysqli_num_rows($result);
                //End
                if (!isset($_SESSION["username"]))
                    {
                    ?>
                
                        <p class="mb-0"><a  id="link" class="btn pill btn-primary btn-lg">Join Now</a></p>
                    <?php 
                    }             
                    else
                    {
                         if($rows2>0)
                        {
                          echo "<p class='mb-0'><a id='membership' class='btn pill btn-primary btn-lg'>Join Now</a></p>";
                        }
                        else
                        {
                            if($key1=='' || $key2=='' )
                            {
                                 echo "<p class='mb-0'><a id='NO_keys' class='btn pill btn-primary btn-lg'>Join Now</a></p>";
                            }
                            else
                            {                                                          
                    ?>
                        <p class="mb-0"><a href="purchase_plan.php?plan_id=<?php echo $row['plan_id'] ?>&gym_id=<?php echo $gym_id ?>" class="btn pill btn-primary btn-lg">Join Now</a></p>
                    <?php  
                            }
                        }
                    }
                    ?>
            </div>
              <?php
     
    ?>
          </div>
            <?php
        }
       ?>
        </div>
      </div>
    </div>
    </section>
 <!-- trainer start -->
 <section id="trainer">
 <div class="site-section bg-light mb-1">

<div class="container">
  
  <div class="heading-with-border text-center mb-1">
    <h2 class="heading text-uppercase" style="font-size:22px;">Experts Trainer</h2>
  </div>   
  <div class="row">
<?php

$query_trainer = "SELECT * FROM trainer_gym WHERE gym_id = '$gym_id'";
$run = mysqli_query($con,$query_trainer);
$check = mysqli_num_rows($run) > 0;

if($check)
{
    while($row = mysqli_fetch_array($run))
    {
      ?>

 
      <div class="col-lg-4 mb-4">
        <div class="block-trainer">
          <img src="gym_trainer_and_Certificate/<?php echo $row['image']; ?>" alt="Image" height="100px" class="img-fluid">
          <div class="block-trainer-overlay">
            <a href="view_trainer_info.php?id=<?php echo $gym_id; ?>&Tid=<?php echo $row['trainer_id']; ?>" class="text-center" style="font-size:25px; text-align:center;"><?php echo $row['trainer_name']; ?></a>
            <p class="text-white" style="font-size:15px;"><?php echo $row['trainer_description']; ?></p>
            <p style="font-size:15px;">
              <!-- <a href="#" class="p-2"><span class="icon-facebook"></span></a>
              <a href="#" class="p-2"><span class="icon-twitter"></span></a>
              <a href="#" class="p-2"><span class="icon-instagram"></span></a> -->
              <a>age:- <?php echo $row['trainer_age']; ?> years</a>
            </p>
            <p style="font-size:15px;">
            <a>exp:- <?php echo $row['trainer_experience']; ?> years</a>
            </p>
          </div>
        </div>    
      </div>
 
 
      <?php
    }
}
else
{
  echo "no record found";
}

?>
   </div>
</div>
</div>
</section>


    <section id="gallery"></section>   
<div class="site-section mb-1">
      <div class="">
        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-2 section-heading heading-with-border">
            <h2 class="mb-0 text-success" style="font-size:25px;">Our Gallery</h2>
          </div>
            
        </div>
        <div class="row no-gutters">
            
              <?php
            $gym_id = $rows['gym_id'];
            $res = mysqli_query($con, "SELECT * FROM gym_image where gym_id='$gym_id'");
            if(mysqli_num_rows($res)==0)
            {
                echo " <p class='lead text-center' >No images available yet</p>";
            }
            while ($row = mysqli_fetch_array($res)) {
                $displ = $row['image_path'];
                $imagee = $row['image_path'];
                $img_id = $row['image_id'];
                ?>
   
           
                <div class="col-md-6 col-lg-3">
                    <a href="gym_images/<?php echo $imagee; ?>" class="image-popup img-opacity"><img src="gym_images/<?php echo $imagee; ?>" alt="Image" class="img-fluid"></a>
                </div>    
                <?php
            }
            ?>

        </div>
      </div>
    </div>
    </section>
    <div class="container">	
<br>
<br>
	<?php
	include_once("connection.php");
	$ratingDetails = "SELECT ratingNumber FROM item_rating  where gym_id='$gym_id'";
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
	?>		
	<br>		
  <section id="rating">
	<div id="ratingDetails mb-1"> 		
		<div class="row mb-1">			
			<div class="col-sm-3">				
				<h4 style="color:green; font-size: 20px;">Rating and Reviews</h4>
				<h2 class="bold padding-bottom-7"><?php printf('%.1f', $average); ?> <small>/ 5</small></h2>				
				<?php
				$averageRating = round($average, 0);
				for ($i = 1; $i <= 5; $i++) {
					$ratingClass = "btn-default btn-grey";
					if($i <= $averageRating) {
						$ratingClass = "btn-warning";
					}
				?>
				<button type="button" class="btn btn-sm <?php echo $ratingClass; ?>" aria-label="Left Align">
				  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
				</button>	
				<?php } ?>				
			</div>
			<div class="col-sm-3">
				<?php
				$fiveStarRatingPercent = round(($fiveStarRating/5)*100);
				$fiveStarRatingPercent = !empty($fiveStarRatingPercent)?$fiveStarRatingPercent.'%':'0%';	
				
				$fourStarRatingPercent = round(($fourStarRating/5)*100);
				$fourStarRatingPercent = !empty($fourStarRatingPercent)?$fourStarRatingPercent.'%':'0%';
				
				$threeStarRatingPercent = round(($threeStarRating/5)*100);
				$threeStarRatingPercent = !empty($threeStarRatingPercent)?$threeStarRatingPercent.'%':'0%';
				
				$twoStarRatingPercent = round(($twoStarRating/5)*100);
				$twoStarRatingPercent = !empty($twoStarRatingPercent)?$twoStarRatingPercent.'%':'0%';
				
				$oneStarRatingPercent = round(($oneStarRating/5)*100);
				$oneStarRatingPercent = !empty($oneStarRatingPercent)?$oneStarRatingPercent.'%':'0%';
				
				?>
				<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">5 <span class="glyphicon glyphicon-star"></span></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
						  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $fiveStarRatingPercent; ?>">
							<span class="sr-only"><?php echo $fiveStarRatingPercent; ?></span>
						  </div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;"><?php echo $fiveStarRating; ?></div>
				</div>
				
				<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">4 <span class="glyphicon glyphicon-star"></span></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
						  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $fourStarRatingPercent; ?>">
							<span class="sr-only"><?php echo $fourStarRatingPercent; ?></span>
						  </div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;"><?php echo $fourStarRating; ?></div>
				</div>
				<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">3 <span class="glyphicon glyphicon-star"></span></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
						  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $threeStarRatingPercent; ?>">
							<span class="sr-only"><?php echo $threeStarRatingPercent; ?></span>
						  </div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;"><?php echo $threeStarRating; ?></div>
				</div>
				<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">2 <span class="glyphicon glyphicon-star"></span></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
						  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $twoStarRatingPercent; ?>">
							<span class="sr-only"><?php echo $twoStarRatingPercent; ?></span>
						  </div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;"><?php echo $twoStarRating; ?></div>
				</div>
				<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">1 <span class="glyphicon glyphicon-star"></span></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
						  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $oneStarRatingPercent; ?>">
							<span class="sr-only"><?php echo $oneStarRatingPercent; ?></span>
						  </div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;"><?php echo $oneStarRating; ?></div>
				</div>
			</div>		
			<div class="col-sm-3">
                              <?php
                     //checking if customer already rated
                      if(!empty($customer_id  ) && !empty($gym_id))
                      {
                      $ChkRate= mysqli_query($con, "SELECT date(created) FROM `item_rating` WHERE customer_id=$customer_id and gym_id=$gym_id  order by created desc LIMIT 1 " );
                      $Chk_date_row= mysqli_fetch_row($ChkRate);
                      //echo $Chk_num;
                      }
                     
                     if (!isset($_SESSION["username"]))
                    {
                    ?>
                        <a  id="rate" class="btn btn-info">Rate this GYM</a> 
                    <?php
                    }
                    else if(isset($_SESSION["username"]))
                    {
                        
                        $query1 = "SELECT customer_id,membership_start_date from customer_membership  where customer_id=$customer_id";
                        $res= mysqli_query($con, $query1);                       
                        if(!$res)
                        {
                            echo "Error : ".mysqli_error($con);
                        }
                        $rows= mysqli_num_rows($res);
                        if($rows==0)
                        {
                            echo "<a  id='member' class='btn btn-info'>Rate this GYM</a> ";
                        }
                        else
                        {
                            $row= mysqli_fetch_row($res);
                            $start_date=date($row[1]);
                            $date_to_rate=date('Y-m-d', strtotime($start_date . ' +7 day'));
                            $date_chk=date('Y-m-d', strtotime($Chk_date_row[0] . ' +3 months'));                          
                            $cur_date= date("Y-m-d") ;
                           // $cur_date= date('2020-07-29');
                           // echo $start_date." ".$date_to_rate." ".$cur_date;
                            if($cur_date>$date_to_rate)
                            {
                                //check if customer  already rated
                                if($cur_date>$date_chk)
                                {
                                 echo "<button type='button' id='rateProduct' class='btn btn-info'>Rate this GYM</button>";
                                }
                                else
                                {
                                     echo "<a  id='Alr_done' class='btn btn-info'>Rate this GYM</a> ";
                                }
                            }
                            else
                            {
                                echo "<a  id='member_true' class='btn btn-info'>Rate this GYM</a> ";
                            }
                        }
                       
                    }
                    ?>     
			</div>		
		</div>
		<div class="row">
			<div class="col-sm-7">
				<hr/>
				<div class="review-block">		
				<?php
				$ratinguery = "SELECT ratingId, gym_id, customer_id, ratingNumber, title, comments, created, modified FROM item_rating  where gym_id='$gym_id'";
				$ratingResult = mysqli_query($con, $ratinguery) or die("database error:". mysqli_error($con));
				while($rating = mysqli_fetch_assoc($ratingResult)){
					$date=date_create($rating['created']);
					$reviewDate = date_format($date,"M d, Y");
                                        
                                        $rating_username=$rating['customer_id'];
                                        
                                        $users="select username from customer where customer_id=$rating_username";
                                        $Result = mysqli_query($con, $users);
                                        $row= mysqli_fetch_row($Result);
				?>				
					<div class="row">
						<div class="col-sm-3">
							<!--<img src="images/profile.png" class="img-rounded"> -->
                                                        <div class="review-block-name">By <p style="color:red; font-size: 14px;"><?php echo $row[0];?></p></div>
							<div class="review-block-date"><?php echo $reviewDate; ?></div>
						</div>
						<div class="col-sm-9">
							<div class="review-block-rate">
								<?php
								for ($i = 1; $i <= 5; $i++) {
									$ratingClass = "btn-default btn-grey";
									if($i <= $rating['ratingNumber']) {
										$ratingClass = "btn-warning";
									}
								?>
								<button type="button" class="btn btn-xs <?php echo $ratingClass; ?>" aria-label="Left Align">
								  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
								</button>								
								<?php } ?>
							</div>
							<div class="review-block-title"><?php echo $rating['title']; ?></div>
							<div class="review-block-description"><?php echo $rating['comments']; ?></div>
						</div>
					</div>
					<hr/>					
				<?php } ?>
				</div>
			</div>
		</div>	
	</div>
	<div id="ratingSection" style="display:none;">
		<div class="row">
			<div class="col-sm-12">
				<form id="ratingForm" method="POST">					
					<div class="form-group">
						<h4>Rate this product</h4>
						<button type="button" class="btn btn-primary btn-sm rateButton" aria-label="Left Align">
						  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						</button>
						<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
						  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						</button>
						<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
						  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						</button>
						<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
						  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						</button>
						<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
						  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						</button>
						<input type="hidden" class="form-control" id="rating" name="rating" value="1">
						
					</div>		
					<div class="form-group">
						<label for="usr">Subject*</label>
						<input type="text" class="form-control" id="title" name="title" required>
					</div>
					<div class="form-group">
						<label for="comment">Comment*</label>
						<textarea class="form-control" rows="5" id="comment" name="comment" required></textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-info btn-lg" id="saveReview">Save Review</button> <button type="button" class="btn btn-info" id="cancelReview">Cancel</button>
					</div>			
				</form>
			</div>
		</div>
	</div>				
	<div>
		<a class="btn btn-default read-more btn-lg" style="background:#3399ff;color:white" href="index.php">Back</a>

	</div>
</div>	



     </div>

    





<br>

  <script src="js_view_gym/jquery-3.3.1.min.js"></script>
  <script src="js_view_gym/jquery-migrate-3.0.1.min.js"></script>
  <script src="js_view_gym/jquery-ui.js"></script>
  <script src="js_view_gym/popper.min.js"></script>
  <script src="js_view_gym/bootstrap.min.js"></script>
  <script src="js_view_gym/owl.carousel.min.js"></script>
  <script src="js_view_gym/jquery.stellar.min.js"></script>
  <script src="js_view_gym/jquery.countdown.min.js"></script>
  <script src="js_view_gym/jquery.magnific-popup.min.js"></script>
  <script src="js_view_gym/bootstrap-datepicker.min.js"></script>
  <script src="js_view_gym/aos.js"></script>

  <script>
      <?php $id=$_GET['id'];?>
$(function() {
	// rating form hide/show
 	$( "#rateProduct" ).click(function() {
		$("#ratingDetails").hide();
		$("#ratingSection").show();
	});	
	$( "#cancelReview" ).click(function() {
		$("#ratingSection").hide();
		$("#ratingDetails").show();		
	});	
	// implement start rating select/deselect
	$( ".rateButton" ).click(function() {
		if($(this).hasClass('btn-grey')) {			
			$(this).removeClass('btn-grey btn-default').addClass('btn-warning star-selected');
			$(this).prevAll('.rateButton').removeClass('btn-grey btn-default').addClass('btn-warning star-selected');
			$(this).nextAll('.rateButton').removeClass('btn-warning star-selected').addClass('btn-grey btn-default');			
		} else {						
			$(this).nextAll('.rateButton').removeClass('btn-warning star-selected').addClass('btn-grey btn-default');
		}
		$("#rating").val($('.star-selected').length);		
	});
	// save review using Ajax
	$('#ratingForm').on('submit', function(event){
		event.preventDefault();
		var formData = $(this).serialize();
		$.ajax({
			type : 'POST',
			url : 'saveRating.php?id=<?php echo $id;?>',
			data : formData,
			success:function(response){
				 $("#ratingForm")[0].reset();
				 window.setTimeout(function(){window.location.reload()},3000)
			}
		});		
	});
});
  </script>

  <script src="js_view_gym/main.js"></script>
  <br>
  <section id="contact">
  <?php include('include/footer.php'); ?>  
  </body>
</html>
        
  