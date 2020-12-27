<?php
session_start();
include ('security.php');
include 'connection.php';
$user_username=$_SESSION['username'];
//join query for gym and gym owner detailes
$sql = "SELECT * FROM gym_owner as g inner join gyms as gm on g.gym_owner_id=gm.gym_owner_id where username='$user_username' or email='$user_username'";
$result = mysqli_query($con,$sql) or die(mysqli_error($con)); 
$rows = mysqli_fetch_array($result);
$gym_id = $rows['gym_id'];


//Restriction
//$sql2="select count(image_id) as count from gym_image where gym_id=$gym_id";
//$result2 = mysqli_query($con,$sql2);
//$data=mysqli_fetch_assoc($result2);
//echo $data['count'];

//Rsstriction
$sql2="select count(image_id) as count from gym_image where gym_id=$gym_id";
$result2 = mysqli_query($con,$sql2);
$data=mysqli_fetch_assoc($result2);
$count= $data['count'];
//echo $count;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Upload images</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="package/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="package/dist/sweetalert2.min.css">
  <script type="text/javascript">
      function error()
           {
               Swal.fire({
  icon: 'warning',
  title: 'Only 15 images allowed at the time',
  text: 'Please remove older images'
  });
           }
  </script>

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

<script>
        $(document).ready(function(){
            var id = 1;
            $("#moreImg").click(function(){
                var showId = ++id;
                if(showId <=10)
                {
                    $(".input-files").append('<br><input type="file" name="image_upload-'+showId+'">');
                }
            });
        });
    </script>
</head>
<body>
<center>

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
                          <li><a href="view_gym_video.php?id=<?php echo $gym_id; ?>">Videos</a></li>
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
    
    <div class="form-container">
 

     <br><br><br>
    <div class="add-more-cont"><a id="moreImg"><img src="images/add_icon2.png"> Click here to add more Image</a></div>
    <form name="uploadFile" action="" method="post" enctype="multipart/form-data" id="upload-form">
        <div class="input-files">
        <input type="file" name="image_upload-1">
        </div>
       
        <br>
        <input type="submit" name="submit" value="Upload"  class="w3-btn w3-blue">
        <span  style="color:blue"><?php  echo "<br/>Current total images :".$count; ?></span>
        <?php
//file upload
if (isset($_POST["submit"]))
{
//    $targetDir = "gym_images";
//    $filename = $_FILES['img']['name'];
//    $file_tmp = $_FILES['img']['tmp_name'];
//    $filetype = $_FILES['img']['type'];
//    $filesize = $_FILES['img']['size'];
//    $targetFilePath = $targetDir . $filename;
    
    //Change below value for restriction
     
    
 
        $targetFolder = "gym_images";
        $errorMsg = array();
        $successMsg = array();
 
        foreach($_FILES as $file => $fileArray)
        {
            if($count < 15)
            {
            
            if(!empty($fileArray['name']) && $fileArray['error'] == 0)
            {
                $getFileExtension = pathinfo($fileArray['name'], PATHINFO_EXTENSION);;
 
                if(($getFileExtension =='jpg') || ($getFileExtension =='jpeg') || ($getFileExtension =='png'))
                {
                    if ($fileArray["size"] <= 10485760) //10 MB
                    {
                        $breakImgName = explode(".",$fileArray['name']);
                        $imageOldNameWithOutExt = $breakImgName[0];
                        $imageOldExt = $breakImgName[1];
 
                        $newFileName = strtotime("now")."-".str_replace(" ","-",strtolower($imageOldNameWithOutExt)).".".$imageOldExt;
 
                        
                        $targetPath = $targetFolder."/".$newFileName;
 
                        
                        if (move_uploaded_file($fileArray["tmp_name"], $targetPath))
                        {
                            
                            $qry ="insert into gym_image (image_path,gym_id) values ('".$newFileName."','".$gym_id."')";
 
 
                            $rs  = mysqli_query($con,$qry);
 
                            if($rs)
                            {
                                $successMsg[$file] = "Image is uploaded successfully";
                            }
                            else
                            {
                                $errorMsg[$file] = "Unable to save ".$file." file ";
                            }
                        }
                        else
                        {
                            $errorMsg[$file] = "Unable to save ".$file." file ";        
                        }
                    }
                    else
                    {
                        $errorMsg[$file] = "Image size is too large in ".$file;
                    }
 
                }
                else
                {
                    $errorMsg[$file] = 'Only image files allowed in '.$file.' position';
                }    
            }
            
        }
    
     else 
     {
         echo'<script type="text/javascript">error();</script>';
    }
        }
}


?>
                <?php
        if(isset($successMsg) && !empty($successMsg))
        {
            echo "<div class='success-msg'>";
            foreach($successMsg as $sMsg)
            {
                echo "<P style='color:Green;'>".$sMsg."</p><br>";
            }
            echo "</div>";
        }
    ?>
 
 
    <?php
        if(isset($errorMsg) && !empty($errorMsg))
        {
            echo "<div class='error-msg'>";
            foreach($errorMsg as $eMsg)
            {
                echo "<P style='color:Red;'>".$eMsg."</p><br>";
            }
 
            echo "</div>";
        }
    ?>
    </di
    </form>
    <?php
    $res = mysqli_query($con,"SELECT * FROM gym_image where gym_id='$gym_id'");
while($row = mysqli_fetch_array($res)){
$displ = $row['image_path'];
$imagee=$row['image_path'];
$img_id=$row['image_id'];
?>
    
    <table>
        <tr>
            <td>
                <div class='person mr-3' ><img src='gym_images/<?php echo $imagee;?>'  alt='Image' height="400px" width="500px" style="width: 300px; height: 221px; margin-right: 50rem;" ></div>
            </td>
            <td>
                </div><a onclick="return confirm('Are you sure?');" class="btn btn-primary" href="delete_images.php?id=<?php echo $img_id; ?>" style="margin-left: -50rem;">delete</a></div>
            </td>
        </tr>
    </table>
<?php
}
?>
    
    </center>
    </body>
    </html>