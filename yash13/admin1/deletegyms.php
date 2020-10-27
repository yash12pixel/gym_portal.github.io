<?php
    include('include/header.php');
    //include('include/navbar.php');
    include('connection.php');
   // include('userdelete.php');
//include ('security.php');
   
    if(isset($_POST['delete']))
    {
        $gym_id = $_POST['gym_id'];

        $query = "DELETE FROM gyms WHERE gym_id='$gym_id'";
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