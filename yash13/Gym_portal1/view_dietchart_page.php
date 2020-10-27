<?php include('downloadcode.php'); ?>
<?php
session_start();
include ('security.php');
?>

<?php include('include/header.php'); ?>
<?php include('connection.php'); ?>

<?php 
//fetch membership type
$mem_type ="";
if(isset($_SESSION['username']))
{
 $user = $_SESSION['username'];
}
$sql = "select * from customer where username='$user' or email='$user'";
$res = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($res)) {
    $username=$row['username'];
    $mem_type = $row['membership_type'];
}
?>

<html>
<head>
<link rel="stylesheet" href="css/diet_chart.css">
</head>
    <header>
         <nav class="navbar navbar-expand-sm navbar-light bg-light">
                <a class="navbar-brand" href="index.php">
                    <img src="images/logo2.png" class="logo" alt="logo" style="  height: auto;
                         width: auto;
                         max-height: 72px;
                         max-width: 250px;">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <?php
                     if (isset($_SESSION["username"]))
                        
                   echo " <li class='nav-item active'><a class='nav-link' href='editprof.php'>$username</a>";
                     if($mem_type=='p')
                     {?>
                         <img src="images/Prime_member.png" style="height: 20px; weight:20px;" alt="Prime Member"></li>
                   <?php 
                   }
                   ?>
                    
                    <?php
                    //Hide if Prime member                                  
                    if (isset($_SESSION["username"]))
                    {
                        if($mem_type=='b')
                        {
                        echo " <li class='nav-item active'><a class='nav-link' href='Prime_membership.php'>Prime Membership</a></li>";
                        }
                    }
                    ?>
                  
                     <?php
                    //Hide if Prime member                                  
                    if (isset($_SESSION["username"]))
                    {
                        if($mem_type=='p')
                        {
                        echo " <li class='nav-item active'><a class='nav-link' href='video_disp_hm_page.php' tabindex='-1' aria-disabled='true'>Prime videos</a></li>";
                        }
                    }
                    ?>
                    <?php
                    //Hide if Prime member                                  
                    if (isset($_SESSION["username"]))
                    {
                        if($mem_type=='p')
                        {
                        echo " <li class='nav-item active'><a class='nav-link' href='view_dietchart_page.php' tabindex='-1' aria-disabled='true'>Dietchart</a></li>";
                        }
                    }
                    ?>
                    <?php 
                    if(empty($_SESSION["username"]))
                    {
                    ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="login.php" tabindex="-1" aria-disabled="true">Login</a>
                    </li>   
                    </ul>
                    <?php 
                    }
                    else{
                        echo " <li class='nav-item active'><a class='nav-link' href='Logout.php'>Log out</a></li>";
                    }
                   ?>
                </div>
             </nav>
    </header>

<section>
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            
        </ol>

        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="images/88.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
            </div>
            </div>
            
            <div class="carousel-item">
            <img src="images/86.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
            </div>
            </div>
        </div>

        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

        </div>
  </section>

  <section class="section bg-howitworks" id="section_find">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
            <h2 class="section-title text-white"> 
                    <span class="text-red">Diet</span> Charts
                </h2>
                <div class="underline2 mr-auto ml-auto mb-3"></div>
                <p class="section-subtitle text-white">
                it is helpful for users
                  and others <br>
                  We Provide Different types of Diet-Chart for only prime users.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mt-3">
                <div class="card">
                    <img src="images/90.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title text-center">Weight Gain</h5>
                        <div class="underline ml-auto mr-auto mb-2"></div>
                        
                        <p class="card-text text-center">We provide some Diet-Chart For the Customer Who want to increase Or gain their weight..</p>
                       
                        <a href="view_dc_wg_page.php" id="btn_find_gym" class="btn btn-primary">View Diet Chart</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6  mt-3">
                <div class="card">
                    <img src="images/92.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title text-center">Weight Loss</h5>
                        <div class="underline ml-auto mr-auto mb-2"></div>
                        <p class="card-text text-center">We provide some Diet-Chart For the customer who want to loose their weight.. </p>
                        <a href="view_dc_wl_page.php" id="btn_find_gym" class="btn btn-primary">View Diet Chart</a>
                    </div>
                </div>
            </div>

</div>
</div>
</section>

<?php include('include/scripts.php'); ?>
<?php include('include/footer.php'); ?>