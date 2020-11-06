<?php 
include 'connection.php';
include('include/header.php');

// $gym_id=$_GET['id'];
// $sql="select * from gyms as g inner join gym_owner as go on g.gym_owner_id=go.gym_owner_id where gym_id=$gym_id";
// $result = mysqli_query($con,$sql);
// $rows = mysqli_fetch_array($result);
// $gym_id=$rows['gym_id'];
?>

<html>
<head>
	<title>Edit Gym profile</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/footer.css">
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
  <style>
input[type=text], input[type=password] {
  width: 500px;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

  	.avatar {
  vertical-align: middle;
  width: 150px;
  height: 150px;
  border-radius: 50%;
}
  	.upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
}

.btn {
  border: 2px solid gray;
  color: gray;
  background-color: white;
  padding: 8px 20px;
  border-radius: 8px;
  font-size: 20px;
  font-weight: bold;
}

.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}
#s1{
  align-content: center;
}
th, td { 
              
                padding:5px;} 

  </style>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css_view_gym/bootstrap.min.css">
    <link rel="stylesheet" href="css_view_gym/magnific-popup.css">
    <link rel="stylesheet" href="css_view_gym/jquery-ui.css">
    <link rel="stylesheet" href="css_view_gym/owl.carousel.min.css">
    <link rel="stylesheet" href="css_view_gym/owl.theme.default.min.css">
    <link rel="stylesheet" href="css_view_gym/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css_view_gym/animate.css">
    
    
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  
    <link rel="stylesheet" href="css_view_gym/aos.css">

    <link rel="stylesheet" href="css_view_gym/style.css">
    <script src="sweetalert-master/docs/assets/sweetalert/sweetalert.min.js"></script>
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
                  <li>
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
                      <li class="active"><a href="Editgymprof.php">Edit Gym Profile</a></li>
                      <li><a href="gym_trainer.php">Gym Trainer</a></li>
                      <li><a href="upld_images.php">Gallery</a></li>
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

<div class="site-section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-12 col-lg-5 mb-5 mb-lg-0 order-2">
            <h2 class="mb-3 text-uppercase"> <strong class="text-black font-weight-bold">Trainer Information</strong></h2>
            <p class="lead mb-2"><strong class="text-black font-weight-bold">Trainer Name:-</strong>Yash Kothari</p>
            <p class="mb-1" style="font-size: 18px;"><strong class="text-black font-weight-bold">Trainer Age:-</strong>22</p>
            <p class="mb-1" style="font-size: 18px;"><strong class="text-black font-weight-bold">Trainer Experiance:-</strong>2</p>
            <p class="mb-1" style="font-size: 18px;"><strong class="text-black font-weight-bold">Trainer Description:-</strong></p>

            <ul class="site-block-check">
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing.</li>
           
            </ul>
            <!-- <p><a href="#" class="btn btn-primary pill px-4">Read More</a></p> -->
          </div>
          <div class="col-md-12 col-lg-6 mr-auto order-1">
            <img src="images/18.jpg" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </div>


    
    <section id="gallery"></section>   
<div class="site-section">
      <div class="">
        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading heading-with-border ">
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

<script type="text/javascript" src="js/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/dist/jquery.validate.js"></script>
<script type="text/javascript" src="js/edit_trainer.js.js"></script>
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

  <script src="js_view_gym/main.js"></script>
</body>
</body>
</html>