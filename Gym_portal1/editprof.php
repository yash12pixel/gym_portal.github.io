<!DOCTYPE html>
<?php
//session_start();
include('include/header.php');
include('include/navbar.php');
include 'connection.php';
include ('security.php');




$user_username = $_SESSION['username'];
$sql = "SELECT * FROM customer where username='$user_username' or email='$user_username'";
$result = mysqli_query($con, $sql) or die(mysqli_error($con));
$rows = mysqli_fetch_array($result);//retriving and storing user data into associative array
//defining variables and setting initial values
$height = $weight = $bmi = $output = $msg = '';
//data insertion variables
$username = $email = $mobile = $address = $image = '';


//error variables
$errAvatar=$usernameErr=$emailErr=$mobileErr=$weightErr=$heightErr=$AddressErr='';

if (isset($_POST['submit']))
{
    //username validation
    if (!empty($_POST['txtunm']))
    {
        $username=$_POST['txtunm'];
    }
    else
    {
        $usernameErr="please enter username";
    }
    //address validation
    if (!empty($_POST['txtadd']))
    {
        $address=$_POST['txtadd'];
    }
    else
    {
        $AddressErr="please enter username";
    }
   
    //E-mail validaion
    if(empty($_POST['txtemail']))
    {
        $emailErr="Please enter E-mail";
    }
    else
    {
        if (!filter_var($_POST['txtemail'], FILTER_VALIDATE_EMAIL)) 
        {      
         $emailErr = "Invalid email format";
        }
        else
        {                   
            $email=trim($_POST['txtemail']);          
        }
    }
    //Mobile number validation
   if(empty($_POST['txtmobile']))
    {
        $mobileErr="Please enter mobile number";
    }
    else
    {
        if(!preg_match('/^[0-9]{10}+$/', $_POST['txtmobile']))
        {
            $mobileErr="Mobile number must contain 10 digits";
        }
        else
        {
            $mobile=trim($_POST['txtmobile']);
        }
    }
    //height validation
   if(!is_numeric($_POST['txtheight']))
    {
        $heightErr="Digits only";
    }
    else
    {
        $height = filter_var(htmlentities(floatval($_POST['txtheight'])), FILTER_SANITIZE_NUMBER_FLOAT);;             
    }
    //height validation
   if(!is_numeric($_POST['txtweight']))
    {
        $weightErr = "Digits only";
    }
    else
    {
        $weight=filter_var(htmlentities(floatval($_POST['txtweight'])), FILTER_SANITIZE_NUMBER_FLOAT);         
    }
    

    if (!empty($height) && !empty($weight))
    {
        // echo "height is ".$height;
        // echo "<br/>weight is ".$weight;
        $bmi = $weight / ($height / 100 * $height / 100);
        // echo "<br/>BMI is ".$bmi;
        $query = "update customer set BMI=$bmi,height=$height,weight=$weight where username='" . $rows['username'] . "'";
        mysqli_query($con, $query);
    }

    //Profile picture upload
    if (!empty($_FILES["file"]["name"]))
    {
         //target path
        $targetDir = "images/profiles/customers/";
        //storing all necessary data into the respective variables.
        define('MB', 1048576);
        $file_size = $_FILES['file']['size'];
        $file_name = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir .$file_name;
        $allowTypes = array('jpg','png','jpeg');
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        if (in_array($fileType, $allowTypes))
        {
            if ($file_size < 10*MB)
            {
                if(move_uploaded_file($_FILES["file"]["tmp_name"],$targetFilePath))
                {
                    echo "File Upload successfully";
                    $qryImg="update customer set avatar_path='".$file_name."' where username='".$rows['username']."'";
                    mysqli_query($con,$qryImg);                 
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
    //Data isertion
    $query = "update customer set username='$username',address='$address',mobile_no='$mobile',email='$email' where username='" . $rows['username'] . "'";

    //BMI OUTPUT
    if ($bmi <= 18.5) 
    {
        $output = "UNDERWEIGHT";
    } 
    else if ($bmi > 18.5 AND $bmi <= 24.9) {
        $output = "NORMAL WEIGHT";
    } 
    else if ($bmi > 24.9 AND $bmi <= 29.9) {
        $output = "OVERWEIGHT";
    } 
    else if ($bmi > 30.0) {
        $output = "OBESE";
    }
    $update = mysqli_query($con, $query);
    if ($update) 
   {
        $_SESSION['updated']=true;
        header("location:editprof.php");
        $msg = "Information updated successfully";
    } else {
        echo "error while updating" . mysqli_error($con);
    }
}
?>
<html>
<head>
  <title>Edit profile</title>
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
  </style>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
</script>
<?php
//Alertbox if update is successful
        $updated = false;
        if (isset($_SESSION['updated'])) {
            $updated = $_SESSION['updated'];
            //echo $purchased;
            //echo "<input type='hidden' value=$updated>";
        }
        if ($updated == true)
       {
            echo '<script type="text/javascript">success();</script>';
            unset($_SESSION['updated']);
       }
       ?>
</head>
<body>
  <center>
    <h1 class="w3-text-blue">Edit profile</h1>
    
  <form class="w3-container w3-card-4" action="" method="post" id="cust_prof" enctype="multipart/form-data">
    <div align="center">
      <img src="avatar/avatar.png" alt="Avatar" class="avatar">
    </div>
    <div class="upload-btn-wrapper" align="center">
    <button class="btn" name="ptnProf">Upload profile picture</button>
    <input type="file" name="file" /><br>
    <span class="text-danger"><?php if (isset($errAvatar)){ echo $errAvatar;} ?></span>
</div>
<div>
  <table>
   <tr>
        <td>
            <div class="form-group">
                <label class="w3-text-blue">Username</label></td>
            <td>
                <input type="text" name="txtunm"  value='<?php echo $rows['username'] ?>'  placeholder="Enter username">
                <span class="text-danger"><?php if (isset($usernameErr)){ echo $usernameErr;} ?></span>
            </td>
            </div>
    </tr>
    <tr>
        <td>
            <label class="w3-text-blue">Height(CM)</label>
        </td>
        <td>
            <input type="text" name="txtheight" value='<?php if($rows['height'] != 0.00){echo $rows['height'];} ?>' placeholder="Height(centimeter)">
            <span class="text-danger"><?php if (isset($heightErr)){ echo $heightErr;} ?></span>
        </td>
    </tr>
    <tr>
        <td>
            <label class="w3-text-blue">weight(KG)</label>
        </td>
        <td>
            <input type="text" name="txtweight" value='<?php if($rows['weight'] != 0.00){echo $rows['weight'];} ?>'  placeholder="Weight(Kilogram)">
            <span class="text-danger"><?php if (isset($weightErr)){ echo $weightErr;} ?></span>
        </td>
    </tr>
    <tr>
        <td>
            <label class="w3-text-blue">Address</label>
        </td>
        <td>
            <textarea name='txtadd' rows="4" cols="50" placeholder="Enter your address"><?php echo $rows['address']; ?></textarea>
            <span class="text-danger"><?php if (isset($AddressErr)){ echo $AddressErr;} ?></span>
        </td>
    </tr>
      <tr>
        <td><label class="w3-text-blue">Mobile number</label></td><td><input type="text" name="txtmobile" value='<?php echo $rows['mobile_no']; ?>' placeholder="Enter mobile number"></td>
    </tr>
    <tr>
        <td>
            <label class="w3-text-blue">Email</label>
        </td>
        <td>
            <input type="text" name="txtemail" value='<?php echo $rows['email'] ?>' placeholder="Enter E-mail address">
            <span class="text-danger"><?php if (isset($emailErr)){ echo $emailErr;} ?></span>
        </td>
    </tr>
    <tr>
    <div class="form-group">
        <td></td><td><input type='submit' name='submit' value='save changes' class="w3-btn w3-blue">
              <?php if(!empty($rows['BMI']))
        {
            $show_bmi=$rows['BMI'];
            echo "<h4 >Your BMI is $show_bmi</h4>";
        }?>
        </td>     
        </div>
    </tr>
    <tr>
        <td></td><td></span></td>
    </tr>
  </table>
</div>
      <?php
        if (!empty($bmi) && !empty($output))
        {
            echo "<span style='color:red'>Your BMI is ".round($bmi,1)." and you are $output</span><br>";
        }
      ?>
      <span  style="color:blue"><?php  echo $msg; ?></span>
</form>
       
  </center>


    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script type="text/javascript" src="js/dist/jquery.validate.min.js"></script>
        <script type="text/javascript" src="js/dist/jquery.validate.js"></script>
        <script type="text/javascript" src="js/Cust_prof.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
</body>
</html>
