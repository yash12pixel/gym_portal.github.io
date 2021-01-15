<?php
session_start();
include ('security.php');
include('include/header.php');
include ('connection.php');
$user_username=$_SESSION['username'];
//join query for gym and gym owner detailes
$sql = "SELECT * FROM gym_owner as g inner join gyms as gm on g.gym_owner_id=gm.gym_owner_id where username='$user_username' or email='$user_username'";
$result = mysqli_query($con,$sql) or die(mysqli_error($con)); 
$rows = mysqli_fetch_array($result);
$gym_id=$rows['gym_id'];

//Restriction
$sql2="select count(plan_id) as count from plan where gym_id=$gym_id";
$result2 = mysqli_query($con,$sql2);
$data=mysqli_fetch_assoc($result2);
$count= $data['count'];


//form data variables
$plan_name=$price=$plan_duration="";
//error variables
$plan_nameErr=$priceErr=$plan_durationErr="";     
     
if (isset($_POST["submit"])) 
{
    //plan name validation
     if(empty($_POST['txtplan']))
    {
        $_SESSION['message1'] = "Plz Enter Plan Name..";
        header("Location:add_gym_plans.php");
    }
    else
    {
        $plan_name=$_POST['txtplan'];
    }
    
    //Price validation
    if (empty($_POST['txtprice']))
    {
        $_SESSION['message2'] = "Plz Enter Plan Price..";
        header("Location:add_gym_plans.php");
    }
    else
    {
        if(!is_numeric($_POST['txtprice']))
        {
            $_SESSION['message3'] = "Plz Enter Plan Price in Digits..";
            header("Location:add_gym_plans.php");
        }
        else
        {
            $price=trim($_POST["txtprice"]);
        }
       // $price=trim($_POST["txtprice"]);
    }
    //BMI suggession validateon
    if($_POST['BMI']!='')
    {
        $BMI=$_POST['BMI'];
    }
    else
    {
        // $BMIerror="Please Select BMI type for customer suggession";
        $_SESSION['message4'] = "Please Select BMI type for customer suggession..";
            header("Location:add_gym_plans.php");
    }
    //Plan duration validation
    if($_POST['duration']=="")
    {
        $_SESSION['message5'] = "Please Select Plan Duration..";
        header("Location:add_gym_plans.php");   
    }
    else
    {
        $plan_duration=$_POST['duration'];
    }
     if (!empty($plan_name) && !empty($price)&& !empty($plan_duration) && !empty($BMI) )
     {
         if ($count < 3)
         {
            //type conversion for price
            $price = intval($price);      
            //$sql="insert into plan(plan_type,plan_price,gym_id,plan_duration) values ('$plan_name',$price,'$gym_id','$plan_duration')";
            $sql1 = "INSERT INTO `plan`( `plan_type`, `plan_price`, `gym_id`, `plan_duration`,Suggested_for_BMI) VALUES('$plan_name',$price,'$gym_id','$plan_duration','$BMI')";
            $result = mysqli_query($con, $sql1);
            if ($result)
            {
                $_SESSION['success'] = "Plan Added Successfully.";
                header("Location:add_gym_plans.php");
            } 
            else 
            {
                $_SESSION['status'] = "Plan Not Added.";
                header("Location:add_gym_plans.php");
            }
        } 
        else 
        {
            $_SESSION['message6'] = "You Have Already Reached out of limits..";
            header("Location:add_gym_plans.php");
        }
    }
}

if(isset($_POST['btn_delete']))
{
    $delete_id = $_POST['delete_id'];

    $que = "DELETE FROM plan WHERE plan_id = '$delete_id'";
    $run = mysqli_query($con,$que);

    if($run)
    {
         $_SESSION['success'] = "Your Data is Deleted";
         header('Location:add_gym_plans.php');   
    }
    else
    {
         $_SESSION['status'] = "Your Data is Not Deleted";
         header('Location:add_gym_plans.php');    
    }
}
?>