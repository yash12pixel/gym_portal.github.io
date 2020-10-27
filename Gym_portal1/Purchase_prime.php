
<?php
    session_start();
    include ('security.php');
    include 'connection.php';


    
    header("Pragma: no-cache");
    header("Cache-Control: no-cache");
    header("Expires: 0");
    //getting customer id
    $user= $_SESSION['username'];
    $sql="select * from customer where username='$user' or email='$user'";
    $res = mysqli_query($con, $sql);
    $result = mysqli_fetch_array($res);
    if ($res)
    {
        $customer_id = $result['customer_id'];
        $customer_name= $result['fname']." ".$result['lname'];
    }
    //amount
    $id = $_GET['id'];
    if ($id == 1) {
         $amount = 3000;
    } else if ($id = 2) {
         $amount = 5000;
    } else {
         $amount = 7000;
    }
        //Time
    $id=$_GET['id'];
    if ($id == 1) {
    $months = "1 months";
} else if ($id = 2) {
    $months = "3 months";
} else {
    $months = "6 months";
}
        //membership start date
$membership_start_date=date("Y-m-d");

//membership end date
$membership_end_date=date('Y-m-d', strtotime("$months"));
   $_SESSION['customer_id']=$customer_id;
   $_SESSION['membership_start_date']=$membership_start_date;
   $_SESSION['membership_end_date']=$membership_end_date;

//storing details in session array
if(isset($_POST['submit']))
{


}


?>
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
    <form method="POST" action="lib/pgRedirect.php">
    <div class="form-control">
    <label for="">Order ID : </label>
    <input id="ORDER_ID"  name="ORDER_ID" value="<?php $od="OD".rand(10000,500000); echo $od;  ?>" type="hidden"/>
    <?php echo $od;?>
    </div>
    <div class="form-control">
    <label for=""> Customer Name : </label>
    <input type="hidden" id="CUST_ID" name="CUST_ID" value="<?php echo $customer_id;?>"/>
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