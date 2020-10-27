<?php
    include('include/header.php');
    //include('include/navbar.php');
    include('connection.php');
    //include('userview.php');
  //  include('security.php');

    if(isset($_POST['delete']))
    {
        $customer_id = $_POST['customer_id'];

        $que = "DELETE FROM customer_membership WHERE customer_id='$customer_id'";
        $que_run = mysqli_query($con,$que);

        if($que_run)
        {
            echo '<script> alert("Data Deleted"); </script>';
           header("location:purchase_membership_view.php");
        }
        else
        {
            echo '<script> alert("Data not Deleted"); </script>';
        }
    }

?>