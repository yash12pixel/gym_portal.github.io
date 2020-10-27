<!DOCTYPE html>
<html>
<head>
	<title>Gym Login</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
	<link rel="stylesheet" href="css/propic.css" type="text/css" />
	<link href='https://fonts.googleapis.com/css?family=Megrim' rel='stylesheet'>
        <script src="sweetalert-master/docs/assets/sweetalert/sweetalert.min.js"></script>
        <script>
        function success()
           {
               swal("Registration request sent!", "Your registration request will be examined by our support staff, you will recieve email once registration hase been approved!", "success");
           }
        </script>
</head>
<body>

<?php

session_start();
ob_start();
include_once'header.php';
include_once'connection.php';

//successfull registration popup
$registered=false;
if(isset($_GET['registered']))
{
    $registered=$_GET['registered'];
}
if ($registered == 'true')
{
    echo '<script type="text/javascript">',
     'success();',
     '</script>';
    //swal("Good job!", "You clicked the button!", "success");
}
    
    
//declaring error variables
$unmErr=$passErr="";
//declaration of uesr's data variables
$err=$username=$password=$md5pass="";

if (isset($_POST["login"])) 
    {
     if (empty($_POST['txtunm']))
    {
        $unmErr="Please enter username";
    }
    else
    {
        $username=$_POST['txtunm'];
    }
    if (empty($_POST['txtpass']))
    {
        $passErr="Please enter password";
    }
    else
    {
        $password=$_POST['txtpass'];
        $md5pass= md5($password); //apply hash function on password
        //echo $md5pass;
    }
    $query= "SELECT * FROM gym_owner WHERE username='$username'and password='$md5pass'"; //for username authentication
    $query2="SELECT * FROM gym_owner WHERE email='$username'and password='$md5pass'"; //for email authentication
    $result = mysqli_query($con,$query);
    $result2=mysqli_query($con,$query2);
    $rows = mysqli_num_rows($result);
    $rows2=mysqli_num_rows($result2);
    if($rows==1 || $rows2==1)
    {
        $_SESSION['username'] = $username;
       // Redirect user to index.php      
        header("Location: index_view_page.php");
    }
    
    else
    {
        $err="Invalid username or password";
    }
    
}
?>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
				<fieldset>
					<legend>Gym Login</legend>

					<div class="form-group">
						<label for="name">Username or Email</label>
						<input type="text" name="txtunm" placeholder="Enter Username or Email"  class="form-control" />
						<span class="text-danger"><?php if (isset($unmErr)){ echo $unmErr;} ?></span>
					</div>
					<div class="form-group">
						<label for="name">Password</label>
						<input type="password" name="txtpass" placeholder="Password"  class="form-control" />
						<span class="text-danger"><?php if (isset($passErr)){ echo $passErr;} ?></span>
					</div>

					<div class="form-group">
						<input type="submit" name="login" value="Login" class="btn btn-primary" id="login"/>
					</div>
                                          
                                        <div class="form-group">
                                        <span class="text-danger"><?php if (isset($err)){ echo $err;} ?></span>
                                        </div>
				</fieldset>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">	
		Not Registered? <a href="Gymregistration.php">Sign up</a>
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</body>
</html>