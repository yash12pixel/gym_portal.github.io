<!DOCTYPE html>
<html>
<head>
	<title>Gym Sign Up</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
	<link rel="stylesheet" href="css/propic.css" type="text/css" />
	<link href='https://fonts.googleapis.com/css?family=Megrim' rel='stylesheet'>
</head>
<body>
<?php
include 'connection.php';
include_once'header.php';
// define error variables and set to empty values
$fnameErr = $lnameErr = $unmErr = $emailErr = $mobileErr = $passwordErr = $cpassErr= $gymnameErr=$addErr="";
//define variables for user data storage
$fname=$lname=$username=$email=$mobileno=$password=$gymname=$address="";

if (isset($_POST["submit"])) 
{
    //firstname validation
    if (empty($_POST['txtfname']))
    {
        $fnameErr="Please enter first name";
    }
    else
    {
        $fname=trim($_POST["txtfname"]);
    }
    //last name validation
    if (empty($_POST['txtlname']))
    {
        $lnameErr="Please enter last name";
    }
    else
    {
        $lname=trim($_POST["txtlname"]);
    }
    //Gym name validation
     if (empty($_POST['txtgymname']))
    {
        $gymnameErr="Please enter your gym's name";
    }
    else
    {
         
            $gymnm=$_POST['txtgymname'];
            $result = mysqli_query($con,"SELECT gym_name FROM gyms WHERE gym_name='$gymnm'");

             if (mysqli_num_rows($result)>=1) //checking if gym name already exist in database
             {
                 $gymnameErr="Gym name already exists";
             }
             else
             {
                 $gymname=trim($_POST['txtgymname']);
             }
        
    }
    //username validation
    if (empty($_POST['txtunm']))
    {
        $unmErr="Please enter username";
    }
    else
    {
        
             $unm=$_POST['txtunm'];
            $result = mysqli_query($con,"SELECT username FROM gym_owner WHERE username='$unm'");

             if (mysqli_num_rows($result)>=1)//checking if username already exist in database
             {
                 $unmErr="Username already exists";
             }
             else
             {
                 $username=trim($_POST['txtunm']);
             }      
    }
    //E-mail validaion
    if (empty($_POST['txtemail']))
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
            $tmpemail=$_POST['txtemail'];
            $result = mysqli_query($con,"SELECT email FROM gym_owner WHERE email='$tmpemail'");

             if (mysqli_num_rows($result)>0)
             {
                 $emailErr="Email already exists";
             }
             else
             {
                 $email=trim($_POST['txtemail']);
             }
        }
    }
    //Address validation
    if(empty($_POST['address']))
    {
        $addErr="please enter your address";
    }
    else
    {
        $address=$_POST['address'];
    }
    //mobile number validation
    if (empty($_POST['txtmobile']))
    {
        $mobileErr="Please enter mobile number";
    }
    else
    {
        
            $mobileno=trim($_POST['txtmobile']);
        
    }
    //Password validation
    if (empty($_POST['txtpassword']))
    {
        $passwordErr="Please enter password";
    }
    else
    {
        if (strlen(trim($_POST['txtpassword'])) < 6)
        {
            $passwordErr="Password must be 6 characters long";
        }
        else
        {
            //confirm password validation
             if(empty($_POST['txtcpass'])) 
            {
                $cpassErr="Please Re-enter password";
            }
            else
            {
                  if ($_POST["txtpassword"] === $_POST["txtcpass"]) {
                     // success
                        $password=trim($_POST['txtpassword']);
                        $md5pass= md5($password); //md5 encrtyption on password
                     }
                 else 
                {
                      $cpassErr="Passwords do not match";
                 }
              }    
        }
    }
    if (!empty($fname) && !empty($address) && !empty($lname)&& !empty($username)&& !empty($email)&& !empty($mobileno)&& !empty($password) && !empty($gymname))
    {
      $query="INSERT INTO temp_gym(fname, lname, username, password, email, contactno, gym_name,address) VALUES ('".$fname."', '".$lname."', '".$username."', '".$md5pass."','".$email."','".$mobileno."','".$gymname."','".$address."')";
       $res=mysqli_query($con,$query);
       if($res)
       {         
         header("location:Gymlogin.php?registered=true");
       }
       else
    {
        echo "<script type=\"text/javascript\">".
        "alert('There was some problem while inserting record');".
        "</script>";
    }

   
  }  
}?>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="" method="post" name="signupform" id="Gym-register">
				<fieldset>
					<legend>Sign up as GYM</legend>
                                        
                                        
					<div class="form-group">
						<label for="name">Owner's First Name</label>
						<input type="text" name="txtfname" placeholder="Enter owner's First Name" class="form-control" />
                                                <span class="text-danger"><?php if (isset($fnameErr)){ echo $fnameErr;} ?></span>
					</div>
					<div class="form-group">
						<label for="name">Owner's Last Name</label>
						<input type="text" name="txtlname" placeholder="Enter owner's Last Name"  class="form-control" />
						 <span class="text-danger"><?php if (isset($lnameErr)){ echo $lnameErr;} ?></span>
					</div>
					
                                        <div class="form-group">
						<label>Gym Name</label>  
						<input type="text" name="txtgymname" placeholder="Gym name" id="gymname" class="form-control" />
                                                <span class="text-danger"><?php if (isset($gymnameErr)){ echo $gymnameErr;} ?></span>
                                        </div>
                                        
                                        <div class="form-group">
						<label>Gym Address</label>  
						<textarea rows="3" cols="50" class="form-control" name="address"></textarea>
                                                <span class="text-danger"><?php if (isset($gymnameErr)){ echo $gymnameErr;} ?></span>
                                        </div>
                                        
					<div class="form-group">
						<label>Username</label>  
						<input type="text" name="txtunm" placeholder="Username" id="username" class="form-control" />
                                                <span class="text-danger"><?php if (isset($unmErr)){ echo $unmErr;} ?></span>
                                        </div>
					
					<div class="form-group">
						<label for="name">Email</label>
						<input type="text" name="txtemail" placeholder="Email"   class="form-control" />
						<span class="text-danger"><?php if (isset($emailErr)){ echo $emailErr;} ?></span>
					</div>
					<div class="form-group">
						<label for="name">Mobile Number</label>
						<input type="text" name="txtmobile" placeholder="Mobile Number"   class="form-control" />
						<span class="text-danger"><?php if (isset($mobileErr)){ echo $mobileErr;} ?></span>
					</div>
					<div class="form-group">
						<label for="name">Password</label>
						<input id="password" type="password" name="txtpassword" placeholder="Password" class="form-control" />
						<span class="text-danger"><?php if (isset($passwordErr)){ echo $passwordErr;} ?></span>
					</div>

					<div class="form-group">
						<label for="name">Confirm Password</label>
						<input type="password" name="txtcpass" placeholder="Confirm Password"  class="form-control" />
						<span class="text-danger"><?php if (isset($cpassErr)){ echo $cpassErr;} ?></span>
					</div>

					<div class="form-group">
						<input type="submit" name="submit" value="Sign Up" class="btn btn-primary" id="register"/>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">	
		Already Registered? <a href="Gymlogin.php">Login Here</a>
	</div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script type="text/javascript" src="js/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/dist/jquery.validate.js"></script>
<script type="text/javascript" src="js/gym_reg.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</body>
</html>