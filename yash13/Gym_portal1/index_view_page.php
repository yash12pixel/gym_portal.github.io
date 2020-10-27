<?php
 session_start();
 include ('security.php');
include('include/header.php');
//include('include/navbar.php');
include 'connection.php';
$user_username=$_SESSION['username'];
//join query for gym and gym owner detailes
$sql = "SELECT * FROM gym_owner as g inner join gyms as gm on g.gym_owner_id=gm.gym_owner_id where username='$user_username' or email='$user_username'";
$result = mysqli_query($con,$sql) or die(mysqli_error($con)); 
$rows = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>View GYM</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    
<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/footer.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/animate.css">
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
    
  </head>
  <body>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    

    <div class="site-navbar-wrap bg-white">
      
      <div class="container">
        <div class="site-navbar bg-light">
          <div class="py-1">
            <div class="row align-items-center">
              <div class="col-2">
                <h2 class="mb-0 site-logo"><a href="index_view_page.php"><strong><?php echo $rows['gym_name']; ?></strong>  </a></h2>
              </div>
              <div class="col-10">
                <nav class="site-navigation text-right" role="navigation">
                  <div class="container">
                    <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                    <ul class="site-menu js-clone-nav d-none d-lg-block">
                      <li class="active">
                        <a href="index_view_page.php">Home</a>
                      </li>
                      <li>
                        <a href="gym_payments.php">Payments</a>  
                      </li>
                      <li><a href="add_gym_plans.php">Plan</a></li>
                      <li><a href="offers.php">Ofers</a></li>
                      <!-- <li><a href="gym_trainer.php">gym tariner</a></li> -->
                      <!-- <li><a href="Editgymprof.php">Edit Gym Profile</a></li> -->
                      <li class="has-children">
                        <a href="Editgymprof.php">Edit Gym Progile</a>
                        <ul class="dropdown arrow-top">
                          <li><a href="Editgymprof.php">Edit Gym Profile</a></li>
                          <li><a href="gym_trainer.php">Gym Trainer</a></li>
                          <li><a href="upld_images.php">Gallery</a></li>
                          <li><a href="exercise_management.php">Exercise Manage</a></li>
                        </ul>
                      </li>
                      
			                <li><a href="view_members.php">View Members</a></li>
                      <li><a href="Logout.php">Log out</a></li>
                    </ul>
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  


    <section>
    <div class="site-section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-12 col-lg-5 mb-1 mb-lg-0 heading-with-border ">
            <h2 class="mb-5 text-uppercase" style="font-size:18px;">All About <strong class="text-black font-weight-bold">Our Gym</strong></h2>
			
            <p style="font-size: 15px"  class="lead">
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
<div class="border-bottom">
      <div class="row no-gutters">
        <div class="col-md-6 col-lg-3">
          <div class="w-100 h-100 block-feature p-5 bg-light">
            <span class="d-block mb-3">
              <span class="flaticon-padmasana display-4"></span>
            </span>
            <h2>Yoga</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora fugiat iure eveniet perferendis odit est.</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="w-100 h-100 block-feature p-5">
            <span class="d-block mb-3">
              <span class="flaticon-weight display-4"></span>
            </span>
            <h2>Weight Lifting</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora fugiat iure eveniet perferendis odit est.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="w-100 h-100 block-feature p-5 bg-light">
            <span class="d-block mb-3">
              <span class="flaticon-boxing-gloves display-4"></span>
            </span>
            
            <h2>Boxing</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora fugiat iure eveniet perferendis odit est.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="w-100 h-100 block-feature p-5">
            <span class="d-block mb-3">
              <span class="flaticon-running display-4"></span>
            </span>
            <h2>Running</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora fugiat iure eveniet perferendis odit est.</p>
          </div>
        </div>
      </div>
    </div> <!-- .block-feature -->
    <!-- exercise manage ends -->
    

   <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-1 section-heading heading-with-border ">
            <h2 class="mb-5 text-success" style="font-size:25px;" >Plan Price</h2>
          </div>
        </div>
        <div class="row align-items-stretched mb-1">
     
          
          <?php
         $gym_id = $rows['gym_id'];
            $res = mysqli_query($con, "SELECT * FROM plan where gym_id=$gym_id");
            while ($row = mysqli_fetch_array($res)) {
                ?>
          <div class="col-md-6 col-lg-4 mb-1">
            <div class="pricing p-5 h-100 text-center" style=" border: 1px solid #ccc; border-color:hsl(89, 43%, 51%);">
              <div class="text-center mb-4">
                <h3 class="h4 mb-4" style="font-size: 24px;"><?php echo  $row['plan_type'];?></h3>
                <?php
                   //getting offer data
                  $OfferSql="Select * from gym_offers where gym_id='$gym_id' and plan_id='".$row['plan_id']."' ";
                  $Offerresult= mysqli_query($con, $OfferSql);
                  $OfferNum= mysqli_num_rows($Offerresult);
                  $Offerrows = mysqli_fetch_array($Offerresult);
                  
                 
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
                  
                ?>
               <!-- <strong class="font-weight-normal h1">Rs.<?php echo $row['plan_price'];?></strong> -->
              </div>
              <ul class="list-unstyled mb-5">
                  <li style="font-size: 20px;">Duration</li>
                  <li style="font-size: 18px;"><?php echo $row['plan_duration'];?> Months</li>
                </ul>
                <p class="mb-0"><a href="#" class="btn pill btn-primary btn-lg">Join Now</a></p>
            </div>
          </div>
            <?php
        }
        ?>

          

        </div>
      </div>
    </div>




<div class="site-section">
      <div class="">
        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading heading-with-border ">
            <h2 class="mb-0 text-success" style="font-size:25px;">Our Gallery</h2>
          </div>
            
        </div>
        <div class="row no-gutters">
            
              <?php
            
            $res = mysqli_query($con, "SELECT * FROM gym_image where gym_id='$gym_id'");
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
	<div id="ratingDetails"> 		
		<div class="row">			
			<div class="col-sm-3">				
				<h4 style="font-size:15
                                    px;" class="text-success">Rating and Reviews</h4>
				<h2 class="bold padding-bottom-7" style="font-size:15px;"><?php printf('%.1f', $average); ?> <small>/ 5</small></h2>				
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
							
                                                        <div class="review-block-name">By <p style="color:red; font-size:13px;"><?php echo $row[0];?></p></div>
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
							<div class="review-block-title" style="font-size:12px;"><?php echo $rating['title']; ?></div>
							<div class="review-block-description" style="font-size:12px;"><?php echo $rating['comments']; ?></div>
						</div>

					</div>
					<hr/>					
				<?php } ?>
				</div>
			</div>
		</div>
        </div>
</div>		
        </div>
  
        <!-- trainer start -->
        <div class="site-section bg-light">

<div class="container">
  
  <div class="heading-with-border text-center mb-5">
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
            <h2 class="text-center" style="font-size:25px; text-align:center;"><?php echo $row['trainer_name']; ?></h2>
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

<br>


<section>    
    
    <footer class="site-footer">
      <div class="container">
        

        <div class="row">
          <div class="col-lg-7">
            <div class="row">
              <div class="col-6 col-md-4 col-lg-8 mb-5 mb-lg-0">
                <h3 class="footer-heading mb-4 text-info">About</h3>
                <p style="font-size: 18px;" class="text-success bg-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat quos rem ullam, placeat amet sint vel impedit reprehenderit eius expedita nemo consequatur obcaecati aperiam, blanditiis quia iste in! Assumenda, odio?</p>
                <p><a href="#" class="btn btn-primary pill text-white px-4 btn-lg">Read More</a></p>
              </div>
              <div class="col-6 col-md-4 col-lg-4 mb-5 mb-lg-0">
                <h3 class="footer-heading mb-4 text-info">Quick Menu</h3>
                <ul class="list-unstyled">
                  <li><a style="font-size: 18px;" class="text-success" href="#">About</a></li>
                  <li><a style="font-size: 18px;" class="text-success" href="#">Plans</a></li>
                  <li><a style="font-size: 18px;" class="text-success" href="#">Gallery</a></li>
                  <li><a style="font-size: 18px;" class="text-success" href="#">Testimony</a></li>
                  <li><a style="font-size: 18px;" class="text-success" href="#">Video</a></li>
                  
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="row mb-5">
              <div class="col-md-12"><h3 class="footer-heading mb-4 text-info">Contact Info</h3></div>
              <div class="col-md-6">
                <p class="text-success bg-light" style="font-size:18px;">New York - 2398 <br> 10 Hadson Carl Street</p>    
              </div>
              <div class="col-md-6 text-success bg-light" style="font-size:16px;">
                Tel. + (123) 3240-345-9348 <br>
                Mail. usa@youdomain.com
              </div>
            </div>

            <div class="row">
              <div class="col-md-12"><h3 class="footer-heading mb-4 text-info">Social Icons</h3></div>
              <div class="col-md-12">
                <p>
                  <a href="#" class="pb-2 pr-2 pl-0"><span class="icon-facebook" style="font-size:18px"></span></a>
                  <a href="#" class="p-2"><span class="icon-twitter" style="font-size:18px"></span></a>
                  <a href="#" class="p-2"><span class="icon-instagram" style="font-size:18px"></span></a>
                  <a href="#" class="p-2"><span class="icon-vimeo" style="font-size:18px"></span></a>

                </p>
              </div>
            </div>
            
          </div>
        </div>
      
      </div>
    </footer>
  </div>

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
  <?php include('include/footer.php'); ?>  
  </body>
</html>
