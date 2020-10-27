<?php
    include('include/header.php');
    //include('include/navbar.php');
    include('connection.php');
   // include('userdelete.php');
//include('security.php');
   
    if(isset($_POST['delete']))
    {
        $customer_id = $_POST['customer_id'];

        $query = "DELETE FROM customer WHERE customer_id='$customer_id'";
        $query_run = mysqli_query($con,$query);

        if($query_run)
        {
            echo '<script> alert("Data Deleted");</script> ';
            header('location:userview.php');
        }
        else
        {
            echo '<script> alert("Data not Deleted");</script> ';
        }
    }


?>