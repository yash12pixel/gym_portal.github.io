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
//Query for trainer data
$trainer_id=$_GET['id'];
$sql1 = "SELECT * FROM trainer_gym where trainer_id=$trainer_id";
$result1 = mysqli_query($con,$sql1) or die(mysqli_error($con)); 
$rows1 = mysqli_fetch_array($result1);

//defining variables
$ins_logo=false;
$username=$gymname=$address=$description=$mobile=$email=$msg="";
//error variables
$error=$unmErr=$gymnmErr=$addressErr=$descriptionErr=$mobileErr=$emailErr="";

//Rsstriction for images
$sql_img="select count(image_id) as count from trainer_achievements where trainer_id=$trainer_id";
$result_img = mysqli_query($con,$sql_img);
$data=mysqli_fetch_assoc($result_img);
$count= $data['count'];
//echo $count;

if(isset($_POST['submit']))
{
    
           //certificates
     
         $targetFolder = "gym_trainer_and_Certificate/";
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
                            
                            $qry ="insert into trainer_achievements (image_path,trainer_id) values ('".$newFileName."','".$trainer_id."')";
 
 
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
            else {
                echo'<script type="text/javascript">error();</script>';
            }
        }

        //end certificates
      
    
    //Gym logo upload   
    if(!empty($_FILES["file"]["name"]))
    {
         //target path
        $targetDir = "gym_trainer_and_Certificate/";
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
                    $qryImg="update trainer_gym set image='".$file_name."' where trainer_id=$trainer_id";
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
    if(!empty($_POST['txtunm']) && !empty($_POST['txtage']) && !empty($_POST['txtexp']) && !empty($_POST['desc']))
    {
        $username=$_POST['txtunm'];
        $age=$_POST['txtage'];
        $exp=$_POST['txtexp'];
        $description=$_POST['desc'];
        
        $query="update trainer_gym set trainer_name='$username',trainer_age='$age',trainer_description='$description',trainer_experience='$exp' where trainer_id=$trainer_id";
        $ins_traienr=mysqli_query($con, $query);

       if($ins_traienr == true)
       {
        $msg= "Information updated successfully";
        $_SESSION['updated']='<script type="text/javascript">success();</script>';
        header("location:Edit_gym_trainer.php?id=$trainer_id");
        exit();
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
                          <li><a href="offers.php">Ofers</a></li>
                        </ul>
                      </li>
                      <!-- <li><a href="add_gym_plans.php">Plan</a></li>
                      <li><a href="offers.php">Ofers</a></li> -->
                      <!-- <li><a href="gym_trainer.php">gym tariner</a></li> -->
                      <!-- <li><a href="Editgymprof.php">Edit Gym Profile</a></li> -->
                      <li class="has-children">
                        <a href="Editgymprof.php">Edit Gym Progile</a>
                        <ul class="dropdown arrow-top">
                          <li><a href="Editgymprof.php">Edit Gym Profile</a></li>
                          <li><a href="gym_trainer.php">Gym Trainer</a></li>
                          <li><a href="upld_images.php">Gallery</a></li>
                          <li><a href="exercise_management.php">Exercise Manage</a></li>
                          <li><a href="add_gym_video.php">Video Manage</a></li>
                        </ul>
                      </li>
                      <li class="has-children">
                        <a href="#">View</a>
                        <ul class="dropdown arrow-top">
                          <li><a href="view_members.php">View Members</a></li>
                          <li><a href="view_gym_video.php?id=<?php echo $gym_id; ?>">View Videoes</a></li>
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
    <h1 class="w3-text-blue">Edit Trainer profile</h1>
	<form class="w3-container w3-card-4" action="" method="post" id="trainer_prof" enctype="multipart/form-data">
    <br/>
    <div align="center">
        <?php
        if(empty($rows1['image']))
        {
           echo "<img src='avatar/gym.jpg' alt='Avatar' class='avatar'>"; 
        }
        else
        {
            $logo=$rows1['image'];
            echo "<img src='gym_trainer_and_Certificate/$logo' alt='Avatar' class='avatar'>"; 
        }
        ?>
    </div><br/>
    <div>

  <table>

      <tr>
      <td></td><td class="file">
      <div class="upload-btn-wrapper" align="center"  style="padding-left: 120px">
    <button class="btn btn-primary">Upload Trainer profile</button>
    <input type="file" name="file" />
    <span class="text-danger"><?php if (isset($errAvatar)){ echo $errAvatar;} ?></span>
    </div>
  </td>
  </tr>
   <tr>
        <td>
            <div class="form-group">
            <label class="w3-text-blue">Trainer name</label>
        </td>
        <td>
            <input type="text" name="txtunm" value='<?php echo $rows1['trainer_name']; ?>'  placeholder="Enter trainer name">
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="form-group">
            <label class="w3-text-blue">Trainer Age</label>
        </td>
        <td>
            <input type="text" name="txtage" value='<?php echo $rows1['trainer_age']; ?>' placeholder="Enter trainer age">
            </div>
        </td>
    </tr>
     <tr>
        <td>
            <div class="form-group">
            <label class="w3-text-blue">Trainer Experiance</label>
        </td>
        <td>
            <input type="text" name="txtexp" value="<?php echo $rows1['trainer_experience']; ?> "  placeholder="Enter number of years">
            </div>
        </td>
    </tr>
 
    <tr>
        <td><div class="form-group">
            <label class="w3-text-blue">Trainer_description</label>
         </td>
        
        <td>
                <textarea rows="4" cols="50" name="desc" placeholder="Enter gym address"><?php echo $rows1['trainer_description']; ?></textarea>
            </div>
        </td>
    </tr>
    <tr>
    </tr>
        <tr>
        <td>
            <div class="form-group">
       
        <label class="w3-text-blue">Trainer Achievements: </label><br>
        </td>
        <td>  <div class="input-files">
        <a id="moreImg"><img src="images/add_icon2.png"> Click here to add more certificate</a>
        <input type="file" name="image_upload-1">
        
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
        }?>
        </div> 
        </td>
    </tr>
    <tr>
       
    </tr>
</div>
    <tr>
    <div class="form-group">
       <td></td><td><input type='submit' name='submit' value='save changes' class="w3-btn w3-blue"></td>
       <?php echo $error; ?>
    </tr></div>
  </table>
</div>
 
<br>
    <span  style="color:blue"><?php  echo $msg; ?></span>
</form> 
    
    <div>
        <br>
        <?php
            $name=$rows1['trainer_name'];
            if($count != 0){
            echo  "<h2>Achievements of $name</h2>";
            }
      
    $res = mysqli_query($con,"SELECT * FROM trainer_achievements where trainer_id='$trainer_id'");
while($row = mysqli_fetch_array($res)){
$displ = $row['image_path'];
$imagee=$row['image_path'];
$img_id=$row['image_id'];
?>
    
    <table>
        <tr>
            <td>
                <div class='person mr-3'><img src='gym_trainer_and_Certificate/<?php echo $imagee;?>'  alt='Image' height="400px" width="500px"  ></div>
            </td>
            <td>
                </div><a onclick="return confirm('Are you sure?');" class="btn btn-primary" href="Delete_trainer_achievements.php?id=<?php echo $img_id; ?>&Tid=<?php echo $trainer_id; ?>">Delete</a></div>
            </td>
        </tr>
    </table>
<?php
}
?>
    </div>
    
  </center>
  
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
<?php


//Alert if updated Successfully

 //Alertbox if key regeneration is successful
      
    if(!empty($_SESSION['updated']))
    {
        echo $_SESSION['updated'];
        unset($_SESSION['updated']);
    }
 
?>
