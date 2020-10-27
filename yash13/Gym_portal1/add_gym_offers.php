<?php
session_start();
include ('security.php');
include 'connection.php';
$user_username=$_SESSION['username'];
//join query for gym and gym owner detailes
$sql = "SELECT * FROM gym_owner as g inner join gyms as gm on g.gym_owner_id=gm.gym_owner_id where username='$user_username' or email='$user_username'";
$result = mysqli_query($con,$sql) or die(mysqli_error($con)); 
$rows = mysqli_fetch_array($result);
$gym_id=$rows['gym_id'];

//form data variables
$plan=$percentage=$Offername="";
$ChkPlan=false;
//error variables
$PlanErr=$perErr=$OffernameErr=$ChkErr="";     
     
//Check if offer for plan already exists
  $ChkSQL="Select * from gym_offers o inner join plan p on p.plan_id=o.plan_id where o.gym_id='$gym_id'";
  $ChkRes= mysqli_query($con, $ChkSQL);
  $ChkNum= mysqli_num_rows($result);

if (isset($_POST["submit"])) 
{
    
    //Check if offer for plan already exists
    if($ChkNum!=0)
    {
       // $_SESSION['message'] = "Plan Already Exist";
        //header('Location:offers.php'); 
    }
    else
    {
        //  $ChkPlan=true;
    }

    //Offer name validation
     if(empty($_POST['txtnm']))
    {
        $_SESSION['message1'] = "Plz Select Offer Name";
        header('Location:offers.php'); 
    }
    else
    {
        $Offername=$_POST['txtnm'];
    }
    //plan validation
     if($_POST['Sel_plan']=='')
    {
        $_SESSION['message2'] = "Plz Choose Plan Name";
        header('Location:offers.php'); 
    }
    else
    {
        $Plan=$_POST['Sel_plan'];
        echo $plan;
    }
    
    //Offer percentage
    if (empty($_POST['txtper']))
    {
        $_SESSION['message3'] = "Plz Add Offer Percentage";
        header('Location:offers.php'); 
    }
    else
    {
        if(!is_numeric($_POST['txtper']))
        {
            $_SESSION['message4'] = "Only numeric value Allowed.";
            header('Location:offers.php'); 
        }
        else
        {
            if($_POST['txtper']>0 && $_POST['txtper'] <=30)
            {
                $percentage=trim($_POST["txtper"]);
            }
            else
            {
                $_SESSION['message5'] = "Plz Add Offer Percentage Ratio Between 1 to 30...";
                header('Location:offers.php'); 
            }
        }
       
    }
     if (!empty($Offername) && !empty($Plan)&& !empty($percentage) && $ChkPlan=true)
    {

    
            //$sql="insert into plan(plan_type,plan_price,gym_id,plan_duration) values ('$plan_name',$price,'$gym_id','$plan_duration')";
            $sql1 = "INSERT INTO `gym_offers`(`plan_id`, `gym_id`, `offer_percentage`, `offer_name`) VALUES('$Plan','$gym_id','$percentage','$Offername')";
            $result = mysqli_query($con, $sql1);
            if ($result)
            {
                $_SESSION['success'] = "Offer Added Successfully";
                header('Location:offers.php'); 
            } 
            else 
            {
                // echo "<script>alert('Something went wrong');</script>";
                $_SESSION['status'] = "Offer Not Added Something Went Wrong..";
                header('Location:offers.php'); 
            }

    }
} 

if(isset($_POST['btn_delete']))
{
    $delete_id = $_POST['delete_id'];

    $que = "DELETE FROM gym_offers WHERE offer_id = '$delete_id'";
    $run = mysqli_query($con,$que);

    if($run)
    {
         $_SESSION['success'] = "Your Data is Deleted";
         header('Location:offers.php');   
    }
    else
    {
         $_SESSION['status'] = "Your Data is Not Deleted";
         header('Location:offers.php');    
    }
}

?>