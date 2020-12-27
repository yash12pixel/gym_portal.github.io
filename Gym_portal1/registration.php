<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
	<link rel="stylesheet" href="css/propic.css" type="text/css" />
	<link href='https://fonts.googleapis.com/css?family=Megrim' rel='stylesheet'>

       
        
</head>
<body>

<?php
include_once'header.php';
include_once'connection.php';
//Customer_id auto increment

// define variables and set to empty values
$fnameErr = $lnameErr = $unmErr = $emailErr = $mobileErr = $genErr= $addErr= $passwordErr = $cpassErr= "";
//define variables for user data storage
$fnmae=$lname=$username=$email=$mobileno=$gender=$address=$password="";

if (isset($_POST["submit"])) {
    //firstname validation
    if(empty($_POST['txtfname']))
    {
        $fnameErr="Please enter first name";
    }
    else
    {
        $fnmae=trim($_POST["txtfname"]);
    }
    //last name validation
    if(empty($_POST['txtlname']))
    {
        $lnameErr="Please enter last name";
    }
    else
    {
        $lname=trim($_POST["txtlname"]);
    }
     //username validation
    if(empty($_POST['txtunm']))
    {
        $unmErr="Please enter username";
    }
    else
    {

             $unm=$_POST['txtunm'];
            $result = mysqli_query($con,"SELECT username FROM customer WHERE username='$unm'");

             if (mysqli_num_rows($result)>=1)
             {
                 $unmErr="Username already exists";
             }
             else
             {
                 $username=trim($_POST['txtunm']);
             }
        
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
            $tmpemail=$_POST['txtemail'];
            $result = mysqli_query($con,"SELECT email FROM customer WHERE email='$tmpemail'");

             if (mysqli_num_rows($result)>=1)
             {
                 $emailErr="Email already exists";
             }
             else
             {
                 $email=trim($_POST['txtemail']);
             }
        }
    }
    //gender validation
    if(empty($_POST["gen"]))
    {
        $genErr= "Please select gender";
    }
    else
    {
        $gender=$_POST['gen'];
    }
   
    //mobile number validation
    if(empty($_POST['txtmobile']))
    {
        $mobileErr="Please enter mobile number";
    }
    else
    {

            $mobileno=trim($_POST['txtmobile']);
        
    }
    //Password validation
    if(empty($_POST['txtpassword']))
    {
        $passwordErr="Please enter password";
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
                        $password=md5(trim($_POST['txtpassword']));
                     }
                 else 
                {
                      $cpassErr="Passwords do not match";
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

    //Inserting data into the database
    if(!empty($fnmae) && !empty($lname)&& !empty($username)&& !empty($email)&&!empty($mobileno)&&!empty($gender)&&!empty($address)&&!empty($password))
    {
        //Cust id auto increment
        $get_id="select * from customer";
         $cust_result=mysqli_query($con,$get_id);
         if(mysqli_num_rows($cust_result) != 0)
         {
             //last record
             $sql_last_rec="select * from customer order by customer_id desc limit 1";
             $res_rec=mysqli_query($con,$sql_last_rec);
             $row=mysqli_fetch_assoc($res_rec);
             $id=$row['customer_id'];
             
            
            $stringSplit2 = trim(substr($id, (0 + 1)));
            $val = (int) $stringSplit2;
            $inc = $val + 1;
            // echo $inc."<br/>";
            $new_id = "c" . $inc;
            echo $new_id;
            //
             
              $sql = "insert into customer(customer_id,fname,lname,username,password,address,mobile_no,email,gender,membership_type) values('" . $new_id . "','" . $fnmae . "', '" . $lname . "', '" . $username . "', '" . $password . "','" . $address . "','" . $mobileno . "','" . $email . "','" . $gender . "','b')";
            $res = mysqli_query($con, $sql);
            If ($res) {
                echo "<script type=\"text/javascript\">" .
                "alert('Registration successful');" .
                "</script>";
                header("location:login.php");
            } Else {
                echo "<script type=\"text/javascript\">" .
                "alert('There was some problem while inserting record');" .
                "</script>";
            }
        }
        else
        {
            
        }
    }
        
        
        //
   
}
?>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="cust-register" name="signupform">
				<fieldset>
					<legend>Sign Up</legend>

					<div class="form-group">
						<label for="name">First Name</label>
						<input type="text" name="txtfname" placeholder="Enter First Name"  class="form-control" />
						<span class="text-danger"><?php if (isset($fnameErr)){ echo $fnameErr;} ?></span>
					</div>
					<div class="form-group">
						<label for="name">Last Name</label>
						<input type="text" name="txtlname" placeholder="Enter Last Name"  class="form-control" />
						<span class="text-danger"><?php if (isset($lnameErr)){ echo $lnameErr;} ?></span>
					</div>
					
					<div class="form-group">
						<label>Username</label>  
                                                <input type="text" name="txtunm" placeholder="Username" id="username" class="form-control" />
						<span class="text-danger"><?php if (isset($unmErr)){ echo $unmErr;} ?></span>
					</div>
					
					<div class="form-group ">
						<label for="name">Email</label>
						<input id="Email"type="text" name="txtemail" placeholder="Email"   class="form-control" />
						<span class="text-danger"><?php if (isset($emailErr)){ echo $emailErr;} ?></span>
					</div>
                                        
                                        <div class="form-group ">
                                                <label for="name">Gender</label><br>                                                
                                                <input type="radio" name="gen" value="M" > Male<br>                                                
                                                <input type="radio" name="gen" value="F"> Female<br>                                         
                                                <span class="text-danger"><?php if (isset($genErr)){ echo $genErr;} ?></span>
                                        </div>
                                        
                                        <div class="form-group ">
                                                <label for="name">Address</label><br>
                                                <textarea rows="3" cols="50" class="form-control" name="address"></textarea>
                                                <span class="text-danger"><?php if (isset($addErr)){ echo $addErr;} ?></span>
                                        </div>
                                        
					<div class="form-group ">
						<label for="name">Mobile Number</label>
						<input type="text" name="txtmobile" placeholder="Mobile Number"  class="form-control" />
						<span class="text-danger"><?php if (isset($mobileErr)){ echo $mobileErr;} ?></span>
					</div>
					<div class="form-group ">
						<label for="name">Password</label>
						<input id="password" type="password" name="txtpassword" placeholder="Password" class="form-control" />
						<span class="text-danger"><?php if (isset($passwordErr)){ echo $passwordErr;} ?></span>
					</div>

					<div class="form-group ">
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
		Already Registered? <a href="login.php">Login Here</a>
		</div>
		<div class="col-md-4 col-md-offset-4 text-center">	
		<a href="Gymregistration.php">Sign up as gym</a>
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script type="text/javascript" src="js/dist/jquery.validate.min.js"></script>
        <script type="text/javascript" src="js/dist/jquery.validate.js"></script>
        <script type="text/javascript" src="js/cust_reg.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
</body>
</html>