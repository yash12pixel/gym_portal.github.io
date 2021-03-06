<?php
session_start();
include ('security.php');
include ('connection.php');
//join query for gym and gym owner detailes
$user_username=$_SESSION['username'];

$sql = "SELECT * FROM gym_owner as g inner join gyms as gm on g.gym_owner_id=gm.gym_owner_id where username='$user_username' or email='$user_username'";
$result = mysqli_query($con,$sql) or die(mysqli_error($con)); 
$rows = mysqli_fetch_array($result);
$gym_id=$rows['gym_id'];


?>

<html>
    <head>
        <title>Add Offers</title>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css_view_gym/bootstrap.min.css">
    <link rel="stylesheet" href="css_view_gym/magnific-popup.css">
    <link rel="stylesheet" href="css_view_gym/jquery-ui.css">
    <link rel="stylesheet" href="css_view_gym/owl.carousel.min.css">
    <link rel="stylesheet" href="css_view_gym/owl.theme.default.min.css">
    <link rel="stylesheet" href="css_view_gym/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css_view_gym/animate.css">
    <link rel="stylesheet" href="css/starstyle.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <ink href="https://fonts.googleapis.com/css?family=Teko&display=swap" rel="stylesheet">

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  
    <link rel="stylesheet" href="css_view_gym/aos.css">

    <link rel="stylesheet" href="css_view_gym/style.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="package/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="package/dist/sweetalert2.min.css">
        <style>
          

        </style>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        
    </head>
    <body>
    <div class="site-wrap">

<div class="site-mobile-menu">
  <div class="site-mobile-menu-header">
    <div class="site-mobile-menu-close mt-3">
      <span class="icon-close2 js-menu-toggle"></span>
    </div>
  </div>
  <div class="site-mobile-menu-body"></div>
</div> <!-- .site-mobile-menu -->


<div class="site-navbar-wrap bg-white">
      
      <div class="container">
        <div class="site-navbar bg-light">
          <div class="py-1">
            <div class="row align-items-center">
              <div class="col-2">
                <h2 class="mb-0 site-logo"><a href="index_view_page.php"><strong><?php echo $rows['gym_name']; ?></strong>  </a></h2>
              </div>
              <div class="col-10">
                <nav class="site-navigation text-right" role="navigation">
                  <div class="container">
                    <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                    <ul class="site-menu js-clone-nav d-none d-lg-block">
                      <li class="active">
                        <a href="index_view_page.php">Home</a>
                      </li>
                      <li>
                        <a href="gym_payments.php">Payments</a>  
                      </li>
                      <li class="has-children">
                        <a href="#">Add</a>
                        <ul class="dropdown arrow-top">
                          <li><a href="add_gym_plans.php">Plan</a></li>
                          <li><a href="offers.php">Offers</a></li>
                        </ul>
                      </li>
                      <!-- <li><a href="add_gym_plans.php">Plan</a></li>
                      <li><a href="offers.php">Ofers</a></li> -->
                      <!-- <li><a href="gym_trainer.php">gym tariner</a></li> -->
                      <!-- <li><a href="Editgymprof.php">Edit Gym Profile</a></li> -->
                      <li class="has-children">
                        <a href="Editgymprof.php">Edit Gym Profile</a>
                        <ul class="dropdown arrow-top">
                          <li><a href="Editgymprof.php">Edit Gym Profile</a></li>
                          <li><a href="gym_trainer.php">Gym Trainer</a></li>
                          <li><a href="upld_images.php">Gallery</a></li>
                          <li><a href="exercise_management.php">Exercise</a></li>
                          <li><a href="add_gym_video.php">Video</a></li>
                        </ul>
                      </li>
                      <li class="has-children">
                        <a href="#">View</a>
                        <ul class="dropdown arrow-top">
                          <li><a href="view_members.php">Members</a></li>
                          <li><a href="view_gym_video.php?id=<?php echo $gym_id; ?>">Videoes</a></li>
                        </ul>
                      </li>
			                <!-- <li><a href="view_members.php">View Members</a></li> -->
                      <li><a href="Logout.php">Log out</a></li>
                    </ul>
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div></div>    <br>

            <!-- Modal -->
            <div class="modal fade" id="add_offer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Add Gym Video</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="Offer" action="Add_gym_videos.php" method="post" enctype="multipart/form-data">
    <div class="modal-body">

    <div class="form-group">
            <label>Upload Video</label>
            <input type="file" name="file" class="form-control" placeholder="Upload video" required>
        </div>

        <div class="form-group">
            <label>Upload Video Image</label>
            <input type="file" name="image" id = "image" class="form-control" placeholder="Upload video image" required>
        </div>

        <!-- <div class="form-group">
        <div class="input-files">
        <label>Trainer Certificates:</label><br>
        <a id="moreImg"><img src="images/add_icon2.png"> Click here to add more certificate</a>
        <input type="file" name="image_upload-1">
        </div>
        </div> -->

      </div>
    
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" name="submit" value='Add' class="btn btn-primary">Add Video</button>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
<?php
    if(isset($_SESSION['success']) && $_SESSION['success'] !='')
    {
      echo'<h3 class="bg-info"> '.$_SESSION['success'].' </h3>';
      unset($_SESSION['success']);
    }

    if(isset($_SESSION['status']) && $_SESSION['status'] !='')
    {
      echo'<h3 class="bg-danger"> '.$_SESSION['status'].' </h3>';
      unset($_SESSION['status']);
    }

    if(isset($_SESSION['message']) && $_SESSION['message'] !='')
    {
      echo'<h3 class="bg-warning"> '.$_SESSION['message'].' </h3>';
      unset($_SESSION['message']);
    }

    if(isset($_SESSION['message1']) && $_SESSION['message1'] !='')
    {
      echo'<h3 class="bg-warning"> '.$_SESSION['message1'].' </h3>';
      unset($_SESSION['message1']);
    }

    if(isset($_SESSION['message2']) && $_SESSION['message2'] !='')
    {
      echo'<h3 class="bg-warning"> '.$_SESSION['message2'].' </h3>';
      unset($_SESSION['message2']);
    }

    if(isset($_SESSION['message3']) && $_SESSION['message3'] !='')
    {
      echo'<h3 class="bg-warning"> '.$_SESSION['message3'].' </h3>';
      unset($_SESSION['message3']);
    }

    if(isset($_SESSION['message4']) && $_SESSION['message4'] !='')
    {
      echo'<h3 class="bg-warning"> '.$_SESSION['message4'].' </h3>';
      unset($_SESSION['message4']);
    }

    if(isset($_SESSION['message5']) && $_SESSION['message5'] !='')
    {
      echo'<h3 class="bg-warning"> '.$_SESSION['message5'].' </h3>';
      unset($_SESSION['message5']);
    }
  ?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Add Gym Video Here
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_offer">
                    Add Gym Video
                    </button>
              </h6>
            </div>
</div>
     
                <br>
            
                <div class="card-body">
            <br>
            
            <h2 class="text-center"> Your Videoes </h2>
      <div class="table-responsive">
      <?php 
                     //   $sql2="Select offer_id,offer_percentage,offer_name,plan_type from gym_offers o inner join plan p on p.plan_id=o.plan_id where o.gym_id='$gym_id'";
                          $sql2 = "select * from gym_video where gym_id = '$gym_id'";
                        $result= mysqli_query($con, $sql2);
                        ?>
      <table class="table table-bordered table-striped table-hover table-responsive-lg " width="100%" cellspacing="0" style="background-color: white;">
          <thead class="table table-dark">
                        <tr class="bg-dark text-white text-center">
                          <th class="text-center">Video Name</th>
                          <th class="text-center">Image</th>
                          <!-- <th class="text-center">Edit</th> -->
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>

                      <tbody>
                    <?php
                      if(mysqli_num_rows($result)>0)
                      {
                        while($row= mysqli_fetch_assoc($result))
                        {
                            $id=$row['gym_video_id'];
                           // $image_src2 = $row['image'];
                          ?>
                      <tr class="text-center">
                      <td><?php echo $row['video_name']; ?></td>
                      <td><?php echo '<img src="gym_videos/'.$row['image'].'" width="100px;" height="100px" alt="images">'?></td>
                      
                     
                     <!-- <td>
                          <form action="Edit_Gym_Trainer.php" method="post">
                            <input type="hidden" name="edit_id" value="<?php echo $row['trainer_id']; ?>">
                            <button type="submit" name="btn_edit" class="btn btn-success">Edit</button>
                          </form>
                     </td>      -->

                      <td>
                        <form action="" method="post">
                          <input type="hidden" name="delete_id" value="<?php echo $row['gym_video_id']; ?>">
                        <button type="submit" name="btn_delete" class="btn btn-danger">Delete</button>
                        </form>
                      </td>
                    </tr>
                     <?php
                        }
                      }
                      else{
                        echo"<p class='text-center' style='color:red; font-size:24px;'>No Trainers Available";
                        echo"</p>";
                      }
                      ?>
                  </tbody>

      </table>

      </div>

          

         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
         <script src="js_view_gym/jquery-3.3.1.min.js"></script>
  <script src="js_view_gym/jquery-migrate-3.0.1.min.js"></script>
  <script src="js_view_gym/jquery-ui.js"></script>
  <script src="js_view_gym/popper.min.js"></script>
  <script src="js_view_gym/bootstrap.min.js"></script>
  <script src="js_view_gym/owl.carousel.min.js"></script>
  <script src="js_view_gym/jquery.stellar.min.js"></script>
  <script src="js_view_gym/jquery.countdown.min.js"></script>
  <script src="js_view_gym/jquery.magnific-popup.min.js"></script>
  <script src="js_view_gym/bootstrap-datepicker.min.js"></script>
  <script src="js_view_gym/aos.js"></script>

  <script src="js_view_gym/main.js"></script>    
    </body>
</html>
