<?php include('include/header.php');  ?>
<?php include('include/navbar.php');  ?>
<?php include('include/slider.php'); 
//echo $_SESSION['user_type'];
if(isset($_SESSION['user_type']))
{
    if($_SESSION['user_type']== 'Already_customer')
    {
        session_destroy();
        //exit(header("location:login.php"));
    }
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>View gym</title>
        <meta charset="utf-8">
        <style>
.checked {
  color: orange;
}
</style>
<link rel="stylesheet" href="css/pagination.css"> 

<script src="package/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="package/dist/sweetalert2.min.css">
  <script type="text/javascript">
        function success()
           {
              Swal.fire(
  'Membership Purchased Successfully!',
  'You are now Prime Member of GYM PORTAL',
  'success'
);}
</script>
</head>
<?php
        //Alertbox if Prime membership purchase successful
        $prime = false;
        if (isset($_GET['prime'])) {
            $prime = $_GET['prime'];
            //echo $purchased;
            echo "<input type='hidden' value=$prime>";
        }
        if ($prime == 'true')
       {
            echo '<script type="text/javascript">success();</script>';
       }
       ?>

        </script>
<section class="section" id="section_about">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <h2 class="section-title text-center">
                    <span class="text-red">About</span> 
                    Us</h2>
                <div class="underline mr-auto ml-auto mb-3"></div>
                <p class="section-subtitle text-center">
                    we are all set to rock
                </p>
            </div>
            <div class="col-md-12">
                <p class="text-center mb-1">
                  Gym Portal is used for online booking of gym membership 
                  it is helpful for users,
                  We are Well known for our service
                  we provide best deal or package to our customer
                </p>
            </div>
        </div>
    </div>
</section>


<section class="section bg-f2f2f2" id="section_service">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
            <h2 class="section-title text-center">
                    <span class="text-red">our</span> 
                    services</h2>
                <div class="underline1 mr-auto ml-auto mb-3"></div>
                <p class="section-subtitle text-center">
                    we are all set to rock
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 mt-3">
              <div class="card">
                <img src="images/13.jpg" class="card-img-top" alt="...">
                  <div class="card-body text-center">
                    <h5 class="card-title">
                      Get Gym Membership 
                    </h5>
                    <div class="underline1 mr-auto ml-auto mb-3"></div>
                    <p class="card-text">We provide gym Membership to our user's. In this user can compare one gym plan with multiple other gym plans. And customer find best plan for him.</p>
                    <a href="#" class="readmore">read more</a>
                     </div>
                 </div>
            </div>

            <div class="col-md-3 mt-3">
              <div class="card">
                <img src="images/14.jpg" class="card-img-top" alt="...">
                  <div class="card-body text-center">
                    <h5 class="card-title">
                    Find Perfect Gym Plan 
                    </h5>
                    <div class="underline1 mr-auto ml-auto mb-3"></div>
                    <p class="card-text">With the help of Gym Portal customer can purchase his/her plan according to their BMI(Body Mass Index).Also we show the past customer's Rating for that gym.</p>
                    <a href="#" class="readmore">read more</a>
                     </div>
                 </div>
            </div>

            <div class="col-md-3 mt-3">
              <div class="card">
                <img src="images/16.jpg" class="card-img-top" alt="...">
                  <div class="card-body text-center">
                    <h5 class="card-title">
                    Prime Videoes
                    </h5>
                    <div class="underline1 mr-auto ml-auto mb-3"></div>
                    <p class="card-text">One of the best Part of our system is Prime Video.In this we Provide Yoga,Meditation Video.so if customer want to do Exercise at home so with the help of he/she can able to do that.</p>
                    <a href="#" class="readmore">read more</a>
                     </div>
                 </div>
            </div>

            <div class="col-md-3 mt-3">
              <div class="card">
                <img src="images/20.jpg" class="card-img-top" alt="...">
                  <div class="card-body text-center">
                    <h5 class="card-title">
                    diet Chart
                    </h5>
                    <div class="underline1 mr-auto ml-auto mb-3"></div>
                    <p class="card-text">We provide a healthy life to our customer.so according to this we also provide diet char to our customer.so they can maintain their body.because only exercise is not necessary.</p>
                    <a href="#" class="readmore">read more</a>
                     </div>
                 </div>
            </div>

        </div>

    </div>
</section>


<section class="section bg-howitworks" id="section_find">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="section-title text-white"> 
                    <span class="text-red">Find</span> Gym
                </h2>
                <div class="underline2 mr-auto ml-auto mb-3"></div>
                <p class="section-subtitle text-white">
                Find the gym you like
                </p>
            </div>
        </div>
        <div class="row">
        <?php

            include('connection.php');
            if (isset($_GET['page_no']) && $_GET['page_no']!="") {
            $page_no = $_GET['page_no'];
            } else {
                $page_no = 1;
                }
                
            $total_records_per_page = 6;

            $offset = ($page_no-1) * $total_records_per_page;
            $offset = ($page_no-1) * $total_records_per_page;
            $previous_page = $page_no - 1;
            $next_page = $page_no + 1;
            $adjacents = "2";
            
            $result_count = mysqli_query(
            $con,
            "SELECT COUNT(*) As total_records FROM `gyms`"
            );
            $total_records = mysqli_fetch_array($result_count);
            $total_records = $total_records['total_records'];
            $total_no_of_pages = ceil($total_records / $total_records_per_page);
            $second_last = $total_no_of_pages - 1; // total pages minus 1

            $q = "select * from gyms LIMIT $offset, $total_records_per_page";
            //$q="select * from gyms g inner join item_rating r on g.gym_id=r.gym_id order by ";
            $run = mysqli_query($con,$q);
            $find_gym = mysqli_num_rows($run);

                if($find_gym > 0)
                {
                    while($row = mysqli_fetch_assoc($run))
                    {
                      $gym_name=$row['gym_name'];   
                        
                    //display average rating if gyms in star           
        $ratingDetails = "SELECT ratingNumber FROM item_rating  where gym_id=(select gym_id from gyms where gym_name='$gym_name' )";
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
                <div class="col-md-4 mt-3">
                <div class="card">
                    <?php 
                    if(empty($row['gym_logo']))
                    {
                        echo "<img src='avatar/default.jpg' style='width: 100%; height:15rem; object-fit: cover;' alt='...'>";
                    }
                    else
                    {
                    ?>
                    <img src="images/profiles/gym/<?php echo $row['gym_logo']; ?>" style="width: 100%; height:15rem; object-fit: cover;" alt="...">
                    <?php
                    }
                    ?>
                    <div class="card-body text-center">                 
                        <h5 class="card-title text-center"><?php echo $gym_name."<br>Rating:".$averageRating; ?></h5>
                        <?php
                        if($averageRating==5)
                        {
                          ?><div class="underline ml-auto mr-auto mb-2"></div>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span><?php
                        }
                        else if($averageRating==4)
                        {
                            ?><div class="underline ml-auto mr-auto mb-2"></div>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star "></span><?php
                        }
                        else if($averageRating==4.5)
                        {
                            ?><div class="underline ml-auto mr-auto mb-2"></div>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star-half-o checked"></span><?php
                        }
                        else if($averageRating==3)
                        {
                            ?><div class="underline ml-auto mr-auto mb-2"></div>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star "></span>
                        <span class="fa fa-star "></span><?php
                        }
                        else if($averageRating==3.5)
                        {
                            ?><div class="underline ml-auto mr-auto mb-2"></div>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star-half-o checked "></span>
                        <span class="fa fa-star"></span><?php
                        }
                         else if($averageRating==2.5)
                        {
                            ?><div class="underline ml-auto mr-auto mb-2"></div>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star-half-o checked"></span>
                        <span class="fa fa-star "></span>
                        <span class="fa fa-star"></span><?php
                        }
                        else if($averageRating==2)
                        {
                            ?><div class="underline ml-auto mr-auto mb-2"></div>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star "></span>
                        <span class="fa fa-star "></span>
                        <span class="fa fa-star "></span><?php
                        }
                         else if($averageRating==1.5)
                        {
                            ?><div class="underline ml-auto mr-auto mb-2"></div>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star-half-o checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star "></span>
                        <span class="fa fa-star"></span><?php
                        }
                        else if($averageRating==0.5)
                        {
                            ?><div class="underline ml-auto mr-auto mb-2"></div>
                        <span class="fa fa-star-half-o checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star "></span>
                        <span class="fa fa-star"></span><?php
                        }
                        else if($averageRating==1)
                        {
                            ?><div class="underline ml-auto mr-auto mb-2"></div>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star "></span>
                        <span class="fa fa-star "></span>
                        <span class="fa fa-star "></span><?php
                        }
                        else if($averageRating==0)
                        {
                            ?><div class="underline ml-auto mr-auto mb-2"></div>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star "></span>
                        <span class="fa fa-star "></span>
                        <span class="fa fa-star "></span><?php
                        }
                        ?>                     
                        
                        <p class="card-text text-center">
                            <?php 
                            if(!empty($row['gym_desc']))
                            {
                                echo substr($row['gym_desc'],0,30).'....';
                                
                            } 
                            else
                            {
                                echo "No information available";
                            }
                                ?>
                        </p>
                       
                        <a href="View_gym.php?id=<?php echo $row['gym_id'];?>" id="btn_find_gym" class="btn btn-primary">View Gym</a>
                    </div>
                </div>
                </div>
                        <?php

                    }
                }

                else{
                    echo"no record found";
                }
                mysqli_close($con);
            ?>
        </div>
    </div>
    
</section>
<div>
<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
<strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
<ul class="pagination" style="float: right;">
	<?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
    &nbsp
	<li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
	<a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
	</li>
     
    <?php 
	if ($total_no_of_pages <= 10){  	 
		for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
			if ($counter == $page_no) {
		   echo "&nbsp<li class='active'><a>$counter</a></li>";	
				}else{
           echo "&nbsp<li><a href='?page_no=$counter'>$counter</a></li>";
				}
        }
	}
	elseif($total_no_of_pages > 10){
		
	if($page_no <= 4) {			
	 for ($counter = 1; $counter < 8; $counter++){		 
			if ($counter == $page_no) {
		   echo "&nbsp<li class='active'><a>$counter</a></li>";	
				}else{
           echo "&nbsp<li><a href='?page_no=$counter'>$counter</a></li>";
				}
        }
		echo "&nbsp<li><a>...</a></li>";
		echo "&nbsp<li><a href='?page_no=$second_last'>$second_last</a></li>";
		echo "&nbsp<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
		}

	 elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
		echo "&nbsp<li><a href='?page_no=1'>1</a></li>";
		echo "&nbsp<li><a href='?page_no=2'>2</a></li>";
        echo "&nbsp<li><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
           if ($counter == $page_no) {
		   echo "&nbsp<li class='active'><a>$counter</a></li>";	
				}else{
           echo "&nbsp<li><a href='?page_no=$counter'>$counter</a></li>";
				}                  
       }
       echo "&nbsp<li><a>...</a></li>";
	   echo "&nbsp<li><a href='?page_no=$second_last'>$second_last</a></li>";
	   echo "&nbsp<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
            }
		
		else {
        echo "&nbsp<li><a href='?page_no=1'>1</a></li>";
		echo "&nbsp<li><a href='?page_no=2'>2</a></li>";
        echo "&nbsp<li><a>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}                   
                }
            }
	}
?>
    &nbsp
	<li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
	<a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
	</li>
    <?php if($page_no < $total_no_of_pages){
		echo "&nbsp<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
		} ?>
</ul>
</div>


<br>



<?php include('include/scripts.php');  ?>

<script>
    $('.testimonials').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    dots: true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})
</script>

<?php include('include/footer.php');  ?>
