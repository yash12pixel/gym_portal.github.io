<?php include('include/header.php'); 
//include('include/navbar.php');?>

<?php 
 session_start();
 include ('security.php');
include_once'connection.php';
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
<link rel="stylesheet" href="css/video_page.css">
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

    <section class="section bg-howitworks" id="section_find">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
            <h2 class="section-title text-white"> 
                    <span class="text-red">Prime</span> Videoes
                </h2>
                <div class="underline2 mr-auto ml-auto mb-3"></div>
                <p class="section-subtitle text-white">
                it is helpful for users
                  and others <br>
                  We Provide Different types of videoes for only prime users.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mt-3">
                <div class="card">
                    <img src="images/60.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title text-center">Exercise Videoes</h5>
                        <div class="underline ml-auto mr-auto mb-2"></div>
                        
                        <p class="card-text text-center">We provide some exercise videos for our users.It contains many types of exercise, cardio & Work-out  videoes so if you want to do exercise so plz click on Watch now..</p>
                       
                        <a href="videos/video_pg_exercise.php" id="btn_find_gym" class="btn btn-primary">Watch Now</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mt-3">
                <div class="card">
                    <img src="images12/img_7.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title text-center">Diet videos</h5>
                        <div class="underline ml-auto mr-auto mb-2"></div>
                        <p class="card-text text-center">We provide some Diet tips for our users.It contains many types of diet videoes so if you want Diet Secterts plz click on Watch now...</p>
                       
                        <a href="videos/video_pg_diet_chart.php" id="btn_find_gym" class="btn btn-primary">Watch Now</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mt-3">
                <div class="card">
                    <img src="images12/img_1.jpg" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title text-center">Yoga & Meditation</h5>
                        <div class="underline ml-auto mr-auto mb-2"></div>
                        
                        <p class="card-text text-center">We provide some Meditation & Yoga videos for our users.It contains many types of Yoga videoes so if you want to do yoga so plz click on Watch now...</p>
                       
                        <a href="videos/video_pg_yoga_meditation.php" id="btn_find_gym" class="btn btn-primary">Watch Now</a>
                    </div>
                </div>
            </div>
</div>
</div>
</section>
</html>
<?php include('include/scripts.php');  ?>
<?php include('include/footer.php');  ?>
