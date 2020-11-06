<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="css/propic.css" type="text/css" />
    <link href='https://fonts.googleapis.com/css?family=Megrim' rel='stylesheet'>
</head>
<body>

<?php
session_start();
include_once'header.php';
include_once'connection.php';
//declaring error variables
$unmErr=$passErr="";
//declaration of uesr's data variables
$username=$password=$md5pass="";

if (isset($_POST["btnlogin"])) 
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
    $query= "SELECT * FROM customer WHERE username='$username'and password='$md5pass'"; //for username authentication
    $query2="SELECT * FROM customer WHERE email='$username'and password='$md5pass'"; //for email authentication
    $result = mysqli_query($con,$query);
    $result2=mysqli_query($con,$query2);
    $rows = mysqli_num_rows($result);
    $rows2=mysqli_num_rows($result2);
    if($rows==1 || $rows2==1)
    {
        $rw=mysqli_fetch_assoc($result);
        $row=$rw['customer_id'];
        $sql_mem="SELECT * FROM customer c INNER JOIN customer_membership cm ON c.customer_id=cm.customer_id inner join gyms g on g.gym_id=cm.gym_id WHERE c.customer_id=$row";
        $result_mem = mysqli_query($con,$sql_mem);
        $rows_mem = mysqli_num_rows($result_mem);
        if($rows_mem != 0)
        {
            $rw=mysqli_fetch_assoc($result_mem);
            $id=$rw['gym_id'];
            $_SESSION['username'] = $username;
            $_SESSION['user_type'] = 'Already_customer';
            // Redirect user to index.php
        header("Location: view_gym.php?id=$id");
            
        }
        else
        {
              
        $_SESSION['username'] = $username;
        $_SESSION['user_type'] = 'customer';
            // Redirect user to index.php
        header("Location: index.php");
        }
    }
    else if($rows2==1)
    {
        $_SESSION['username'] = $username;
            // Redirect user to index.php
        header("Location: index.php");
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
                    <legend>Login</legend>
                                           
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
                        <input type="submit" name="btnlogin" value="Login" class="btn btn-primary" id="login" />                                         
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
        Not Registered? <a href="registration.php">Sign up Here</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center">  
            Own a gym? <a href="Gymlogin.php">Login</a>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</body>
</html>