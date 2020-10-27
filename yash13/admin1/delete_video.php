<?php

include('include/header.php');
    //include('include/navbar.php');
    include('connection.php');
   // include('userdelete.php');

  // include ('security.php');
    if(isset($_POST['delete']))
    {
        $video_id = $_POST['video_id'];

        $query = "DELETE FROM prime_videos WHERE video_id='$video_id'";
        $query_run = mysqli_query($con,$query);

        if($query_run)
        {
            echo '<script> alert("Data Deleted");</script> ';
            header('location:Primevideo.php');
        }
        else
        {
            echo '<script> alert("Something went wrong!");</script> ';
        }
    }

