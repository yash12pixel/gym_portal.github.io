<?php
    include('include/header.php');
    //include('include/navbar.php');
    include('connection.php');
   // include('userdelete.php');
//include ('security.php');
   
    if(isset($_POST['delete']))
    {
        $gym_owner_id = $_POST['gym_owner_id'];

        $query = "DELETE FROM gym_owner WHERE gym_owner_id='$gym_owner_id'";
        $query_run = mysqli_query($con,$query);

        if($query_run)
        {
            echo '<script> alert("Data Deleted");</script> ';
            header('location:gymownerview.php');
        }
        else
        {
            echo '<script> alert("Data not Deleted");</script> ';
        }
    }


?>