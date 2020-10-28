
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
// $plan=$percentage=$Offername="";
// $ChkPlan=false;
$exercise_type = $_POST['exercise_type'];
$exercise_name = $_POST['txtexnm'];
$exercise_desc = $_POST['txtdesc'];
//error variables
// $PlanErr=$perErr=$OffernameErr=$ChkErr="";     
     
//Check if offer for plan already exists
  $ChkSQL="Select * from gym_exercise where gym_id='$gym_id'";
  $ChkRes= mysqli_query($con, $ChkSQL);
  $ChkNum= mysqli_num_rows($result);

if (isset($_POST["submit"])) 
{
    
    //Check if offer for plan already exists
    // if($ChkNum!=0)
    // {
    //    $_SESSION['message'] = "Exercise Already Exist";
    //     header('Location:exercise_management.php'); 
    // }
    // else
    // {
    //     $ChkPlan=true;
    // }

  
    //exercise type validation
    //  if(empty($_POST['exercise_type']))
    // {
    //     $_SESSION['message2'] = "Plz Choose Exercise Name";
    //     header('Location:exercise_management.php'); 
    // }
    // else
    // {
    //     $exercise_type=$_POST['exercise_type'];
       
    // }

    //   //exercise name validation
    //   if(empty($_POST['txtexnm']))
    //   {
    //       $_SESSION['message1'] = "Plz Enter exercise Name";
    //       header('Location:exercise_management.php'); 
    //   }
    //   else
    //   {
    //       $exercise_name=$_POST['txtexnm'];
    //   }
    
    //   //exercise description validation
    //   if(empty($_POST['txtdesc']))
    //   {
    //       $_SESSION['message1'] = "Plz Enter exercise Description";
    //       header('Location:exercise_management.php'); 
    //   }
    //   else
    //   {
    //       $exercise_name=$_POST['txtdesc'];
    //   }
 
    //  if (!empty($exercise_type) && !empty($exercise_name)&& !empty($exercise_desc))
    

    
            //$sql="insert into plan(plan_type,plan_price,gym_id,plan_duration) values ('$plan_name',$price,'$gym_id','$plan_duration')";
            $sql1 = "insert into gym_exercise (gym_exercise_type,gym_exercise_name,gym_exercise_desc,gym_id) values ('".$exercise_type."','".$exercise_name."','".$exercise_desc."','".$gym_id."')";
            $result = mysqli_query($con, $sql1);
            if ($result)
            {
                $_SESSION['success'] = "Exercise Added Successfully";
                header('Location:exercise_management.php'); 
            } 
            else 
            {
                // echo "<script>alert('Something went wrong');</script>";
                $_SESSION['status'] = "Offer Not Added Something Went Wrong..";
                header('Location:exercise_management.php'); 
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