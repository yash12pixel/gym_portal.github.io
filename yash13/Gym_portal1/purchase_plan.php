<?php
session_start();
include ('security.php');
include 'connection.php';
$gym_id=$_GET['gym_id'];
$_SESSION['Gym_ID']=$gym_id;

//payment id
$plan_id=$_GET['plan_id'];

//customer id
$customer_id="";
$user= $_SESSION['username'];
$sql="select * from customer where username='$user' or email='$user'";
$res= mysqli_query($con, $sql);
$result = mysqli_fetch_array($res);
if($res)
{
    $customer_id=$result['customer_id'];
    $customer_name= $result['fname']." ".$result['lname'];
    $MEMBERSHIP_TYPE=$result['membership_type'];
}
//membership dates
$query="select * from plan where plan_id=$plan_id";
$res1=mysqli_query($con, $query);
$result1=mysqli_fetch_array($res1);

//amount

////getting offer data
$OfferSql = "Select * from gym_offers where gym_id='$gym_id' and plan_id='$plan_id' ";
$Offerresult = mysqli_query($con, $OfferSql);
$OfferNum = mysqli_num_rows($Offerresult);
$Offerrows = mysqli_fetch_array($Offerresult);
//$amount=$result1['plan_price'];
//15% Discount to Prime members
if ($MEMBERSHIP_TYPE == 'p') 
{
    $old_amount=$result1['plan_price'];
    $percentage = 15; //Percentage
    $amount = ($old_amount * ((100 - $percentage) / 100)); //Substracting Prime Discount
    if ($OfferNum != 0)
    {
        $percentage = $percentage + (int) $Offerrows['offer_percentage'];
        $amount = ($old_amount * ((100 - $percentage) / 100));
    }
} 
else 
{
     if($OfferNum!=0)
     {
         $old_amount=$result1['plan_price'];
         $percentage = $Offerrows['offer_percentage'];
         $amount = ($old_amount * ((100 - $percentage) / 100));
     }
     else
     {
        $amount=$result1['plan_price'];
     }
}



//membership start date
$membership_start_date=date("Y-m-d");
//echo $membership_start_date."<br>";
//membership end date
$months=strval($result1['plan_duration']." months");
//echo $months."<br>";
$membership_end_date=date('Y-m-d', strtotime("$months"));
//echo $membership_end_date;
//$sql1="insert into customer_membership(`customer_id`, `gym_id`, `membership_start_date`, `membership_end_date`, `plan_id`) values($customer_id,$gym_id,'$membership_start_date','$membership_end_date',$plan_id)";
//$res2= mysqli_query($con, $sql1);
//if($res2)
//{
//    echo "membership started successfully";
//    header("location:view_gym.php?id=$gym_id&purchased=true");
//}
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
    <center>
    <form method="POST" action="lib/pgRedirect1.php">
    <div class="form-control">
    <label for="">Order ID : </label>
    <input id="ORDER_ID"  name="ORDER_ID" value="<?php $od="OD".rand(10000,500000); echo $od;  ?>" type="hidden"/>
    <?php echo $od;?>
    </div>
    <div class="form-control">
    <label for=""> Customer Name : </label>
    <input type="hidden" id="CUST_ID" name="CUST_ID" value="<?php echo $customer_id;?>"/>
     <input type="hidden" id="GYM_ID" name="GYM_ID" value="<?php echo $gym_id;?>"/>
     <input type="hidden" id="PLAN_ID" name="PLAN_ID" value="<?php echo $plan_id;?>"/>
    <?php 
    echo $customer_name;
?>
    
    <input id="INDUSTRY_TYPE_ID" name="INDUSTRY_TYPE_ID" type="hidden" value="Film" />
    
    <input id="CHANNEL_ID" name="CHANNEL_ID" type="hidden" value="WEB"/>
    
    <input type="hidden" id="start_date" name="start_date" value="<?php echo $membership_start_date;?>"/>
    
    <input type="hidden" id="end_date" name="end_date" value="<?php echo $membership_end_date;?>"/>
    </div>
  
    <div class="form-control">
    <label for="">Transaction Amount : </label>
    <input type="hidden" id="TXN_AMOUNT" name="TXN_AMOUNT" value="<?php echo $amount;?>" />
    <?php echo $amount;?>
    </div>
    <input type="submit" value="proceed" name='submit' class="btn btn-primary"/>
    <a href="Prime_membership.php" class="btn btn-danger">Back</a>

    </div>
    </form>
        </center>
</body>
</html>