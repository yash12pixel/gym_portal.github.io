<!DOCTYPE html>
<?php
session_start();
include ('security.php');
include 'connection.php';
$user_username=$_SESSION['username'];
//join query for gym and gym owner detailes
$sql = "SELECT * FROM gym_owner as g inner join gyms as gm on g.gym_owner_id=gm.gym_owner_id where username='$user_username' or email='$user_username'";
$result = mysqli_query($con,$sql) or die(mysqli_error($con)); 
$rows = mysqli_fetch_array($result);

//defining variables
$ins_logo=false;
$username=$gymname=$address=$description=$mobile=$email=$msg="";
//error variables
$error=$unmErr=$gymnmErr=$addressErr=$descriptionErr=$mobileErr=$emailErr="";

if(isset($_POST['submit']))
{
    
      
    
    //Gym logo upload   
    if(!empty($_FILES["file"]["name"]))
    {
         //target path
        $targetDir = "images/profiles/gym/";
        //storing all necessary data into the respective variables.
        $file_size = $_FILES['file']['size'];
        $file_name = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir .$file_name;
        $allowTypes = array('jpg','png','jpeg');
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        if(in_array($fileType, $allowTypes))
        {
            if ($file_size < 10000000)
            {
                if(move_uploaded_file($_FILES["file"]["tmp_name"],$targetFilePath))
                {
                    echo "File Upload successfully";
                    $qryImg="update gyms set gym_logo='".$file_name."' where gym_name='".$rows['gym_name']."'";
                    $ins_logo=mysqli_query($con,$qryImg);                 
                }
                else
                {
                    $errAvatar= "error while uploading file";
                }
            }
            else
            {
                $errAvatar=  "file size must be 10MB or less";
            }
        }
        else
        {
            $errAvatar= "only jpg, jpeg and png files aer allowed";
        }      
    }
    
    //
    if(!empty($_POST['txtunm']) && !empty($_POST['txtgymnm']) && !empty($_POST['gymadd']) && !empty($_POST['gymdesc']) &&  !empty($_POST['txtmob']) && !empty($_POST['txtemail']))
    {
        $username=$_POST['txtunm'];
        $gymname=$_POST['txtgymnm'];
        $address=$_POST['gymadd'];
        $description=$_POST['gymdesc'];
        $mobile=$_POST['txtmob'];
        $email=$_POST['txtemail'];
        
        $query="update gym_owner set username='$username',contactno='$mobile',email='$email' where username='".$rows['username']."'";
        $ins_gymowner=mysqli_query($con, $query);
        $GymOwnerID=$rows['gym_owner_id'];
        $query2="update gyms set gym_name='$gymname',address='$address',gym_desc='$description' where gym_owner_id='$GymOwnerID'";
        $ins_gyms=mysqli_query($con,$query2);
       if($ins_gymowner == true && $ins_gyms==true )
       {
        $msg= "Information updated successfully";
       header("location:Editgymprof.php?updated=true");
       }
       else
       {
          echo "error while updating".mysqli_error($con);
          $error=mysqli_error($con);
       }    
    }
  
}
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
     <script>
        function success()
           {
               swal("Information Updated Successfully!", "", "success");
           }
        </script>
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

    
  <center>
    <h1 class="w3-text-blue">Edit Gym profile</h1>
	<form class="w3-container w3-card-4" action="" method="post" id="Gym_prof" enctype="multipart/form-data">
    <br/>
    <div align="center">
        <?php
        if(empty($rows['gym_logo']))
        {
           echo "<img src='avatar/gym.jpg' alt='Avatar' class='avatar'>"; 
        }
        else
        {
            $logo=$rows['gym_logo'];
            echo "<img src='images/profiles/gym/$logo' alt='Avatar' class='avatar'>"; 
        }
        ?>
    </div><br/>
    <div>

    <div color="blue" align="center"  style="">
        <a class="btn btn-primary" href="upld_images.php">Upload Gym images</a>
    </div>
  <table>

      <tr>
      <td></td><td class="file">
      <div class="upload-btn-wrapper" align="center"  style="padding-left: 120px">
    <button class="btn btn-primary">Upload Gym logo</button>
    <input type="file" name="file" />
    <span class="text-danger"><?php if (isset($errAvatar)){ echo $errAvatar;} ?></span>
    </div>
  </td>
  </tr>
   <tr>
        <td>
            <div class="form-group">
            <label class="w3-text-blue">Username</label>
        </td>
        <td>
            <input type="text" name="txtunm" value='<?php echo $rows['username']; ?>'  placeholder="Enter username">
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="form-group">
            <label class="w3-text-blue">Gym name</label>
        </td>
        <td>
            <input type="text" name="txtgymnm" value='<?php echo $rows['gym_name']; ?>' placeholder="Enter Gym name">
            </div>
        </td>
    </tr>
    <tr>
        <td><div class="form-group">
            <label class="w3-text-blue">GymAddress</label>
         </td>
        
        <td>
            <textarea rows="4" cols="50" name="gymadd" placeholder="Enter gym address"><?php echo $rows['address']; ?></textarea>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="form-group">
            <label class="w3-text-blue">Gym Descryption</label>
        </td>
        <td>
            <textarea rows="4" cols="50" name="gymdesc" placeholder="Enter gym Descryption"><?php echo $rows['gym_desc']; ?></textarea>
            </div>
        </td>
    </tr>
      <tr>
        <td>
            <div class="form-group">
            <label class="w3-text-blue">Mobile number</label>
        </td>
        <td>
            <input type="text" name="txtmob" value='<?php echo $rows['contactno']; ?>'  placeholder="Enter mobile number">
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="form-group">
            <label class="w3-text-blue">Email</label>
        </td>
        <td>
            <input type="text" name="txtemail"  value='<?php echo $rows['email']; ?>'placeholder="Enter E-mail address">
            </div>
        </td>
    </tr>
</div>
    <tr>
    <div class="form-group">
       <td></td><td><input type='submit' name='submit' value='save changes' class="w3-btn w3-blue"></td>
       <?php echo $error; ?>
    </tr></div>
  </table>
</div>
    <span  style="color:blue"><?php  echo $msg; ?></span>
</form></center>

<!-- <script type="text/javascript" src="js/dist/jquery.validate.min.js"></script>
        <script type="text/javascript" src="js/dist/jquery.validate.js"></script>
        <script type="text/javascript" src="js/Gym_prof.js"></script>
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
  <script type="text/javascript" src="js/Gym_prof.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
        <script type="text/javascript" src="js/dist/jquery.validate.min.js"></script>
        <script type="text/javascript" src="js/dist/jquery.validate.js"></script>
        <script type="text/javascript" src="js/Gym_prof.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>

  <script src="js_view_gym/main.js"></script>
</body>
</body>
</html>
<?php
//Alert if updated Successfully
$updated=false;
if(isset($_GET['updated']))
{
    $updated=$_GET['updated'];
}
if ($updated == 'true')
{
    echo '<script type="text/javascript">',
     'success();',
     '</script>';
    //swal("Good job!", "You clicked the button!", "success");
}
?>
