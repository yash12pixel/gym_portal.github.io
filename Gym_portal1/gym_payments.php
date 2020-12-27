<?php
session_start();
include ('security.php');
include 'connection.php';
$user_username=$_SESSION['username'];
//join query for gym and gym owner detailes
$sql = "SELECT * FROM gym_owner as g inner join gyms as gm on g.gym_owner_id=gm.gym_owner_id where username='$user_username' or email='$user_username'";
$result = mysqli_query($con,$sql) or die(mysqli_error($con)); 
$rows = mysqli_fetch_array($result);

//Getting keys from database
$sql1 = "SELECT AES_DECRYPT(Merchant_key,'shaktiman'),AES_DECRYPT(Merchant_ID,'shaktiman') FROM gym_owner as g inner join gyms as gm on g.gym_owner_id=gm.gym_owner_id where username='$user_username' or email='$user_username'";
$result1= mysqli_query($con,$sql1) or die(mysqli_error($con)); 
$rows1 = mysqli_fetch_array($result1);
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
  <head>
    <title>View GYM</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

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
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="package/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="package/dist/sweetalert2.min.css">
        
    <script type="text/javascript">
function success()
           {
               swal.fire("Ipdated successfully!", "Your transactions will be made by new keys", "success");
           }
        </script>
         <?php
        //Alertbox if key regeneration is successful
        $updated= false;
        if (isset($_GET['updated'])) {
            $updated = $_GET['updateed'];
            //echo $purchased;
            echo "<input type='hidden' value=$purchased>";
        }
        if ($updated == 'true')
       {
            echo '<script type="text/javascript">success();</script>';
       }
       ?>
  </head>
  <body>
  <?php
//variables
$MID=$MKEY="";
//Error variables
$errorMID=$errorMKEY="";
if(isset($_POST['submit']))
{
    //Id validation
    if (empty($_POST['txtMID']))
    {
        $errorMID="Please enter Merchant ID";
    }
    else 
    {
        $MKEY=$_POST['txtMID'];
    }
    //KEY validation
    if (empty($_POST['txtMKEY']))
    {
        $errorMKEY="Please enter Merchant KEY";
    }
    else
     {
        $MID=$_POST['txtMKEY'];
    }
    
    
   if (!empty($MID) && !empty($MKEY))
   {
        $Merchant_id = $_POST['txtMID'];
        $Merchant_key = $_POST['txtMKEY'];
        $query="update gym_owner set Merchant_key=AES_ENCRYPT('$Merchant_key','shaktiman'),Merchant_ID=AES_ENCRYPT('$Merchant_id','shaktiman') where username='".$rows['username']."'";
        //$query="update gym_owner set Merchant_key='$Merchant_key',Merchant_ID='$Merchant_id' where username='".$rows['username']."'"; 
        $res=mysqli_query($con, $query);
        if($res)
        {
            $msg="Information updated successfully";
        }
    }
 else {

     echo "please fill details";
 }
    

}
?>
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
                      <li class="has-children">
                        <a href="#">Add</a>
                        <ul class="dropdown arrow-top">
                          <li><a href="add_gym_plans.php">Plan</a></li>
                          <li><a href="offers.php">Offers</a></li>
                        </ul>
                      </li>
                      <!-- <li><a href="add_gym_plans.php">Plan</a></li>
                      <li><a href="offers.php">Ofers</a></li> -->
                      <!-- <li><a href="gym_trainer.php">gym tariner</a></li> -->
                      <!-- <li><a href="Editgymprof.php">Edit Gym Profile</a></li> -->
                      <li class="has-children">
                        <a href="Editgymprof.php">Edit Gym Profile</a>
                        <ul class="dropdown arrow-top">
                          <li><a href="Editgymprof.php">Edit Gym Profile</a></li>
                          <li><a href="gym_trainer.php">Gym Trainer</a></li>
                          <li><a href="upld_images.php">Gallery</a></li>
                          <li><a href="exercise_management.php">Exercise</a></li>
                          <li><a href="add_gym_video.php">Videos</a></li>
                        </ul>
                      </li>
                      <li class="has-children">
                        <a href="#">View</a>
                        <ul class="dropdown arrow-top">
                          <li><a href="view_members.php">Members</a></li>
                          <li><a href="view_gym_video.php?id=<?php echo $gym_id; ?>">Videoes</a></li>
                        </ul>
                      </li>
			                <!-- <li><a href="view_members.php">View Members</a></li> -->
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
    
    <center>
        
    <h1 class="w3-text-blue">Update Information for Payment Gateway</h1>
     <p color="blue">Please visit <a href="https://business.paytm.com/">https://business.paytm.com/</a> for more information</p>
	<form class="w3-container w3-card-4" action="" method="post" enctype="multipart/form-data">
             <h3 class="w3-text-blue">PayTm</h3>
    <br/>
    <div>

  <table>

      <tr>
  </tr>
   <tr>
        <td><label class="w3-text-blue">Merchant ID</label></td><td><input type="text" name="txtMID" value='<?php echo $rows1[1]; ?>'  placeholder="Merchent ID">
        <br/><span class="text-danger"><?php if (isset($errorMID)){ echo $errorMID;} ?></span>
        </td>
        
    </tr>
    <tr>
        <td><label class="w3-text-blue">Merchant Key</label></td><td><input type="text" name="txtMKEY" value='<?php  echo  $rows1[0]; ?>' placeholder="Merchant Key">
        <br/><span class="text-danger"><?php if (isset($errorMKEY)){ echo $errorMKEY;} ?></span></td>
        
    </tr>
</div>
    <tr>
       <td></td><td><input type='submit' name='submit' value='save changes' class="w3-btn w3-blue"></td>
    </tr>
  </table>
</div>
      
    <span  style="color:blue"><?php 
    if(!empty($msg))
    {
        echo $msg; 
    }
    ?></span>
</form></center>
</body>
</html>

    </body>
</html>
