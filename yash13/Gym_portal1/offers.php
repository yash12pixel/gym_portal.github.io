<?php
session_start();
include ('security.php');
include ('connection.php');
$user_username=$_SESSION['username'];
//join query for gym and gym owner detailes
$sql = "SELECT * FROM gym_owner as g inner join gyms as gm on g.gym_owner_id=gm.gym_owner_id where username='$user_username' or email='$user_username'";
$result = mysqli_query($con,$sql) or die(mysqli_error($con)); 
$rows = mysqli_fetch_array($result);
$gym_id=$rows['gym_id'];

// //form data variables
// $plan=$percentage=$Offername="";
// $ChkPlan=false;
// //error variables
// $PlanErr=$perErr=$OffernameErr=$ChkErr="";     
     
// //Check if offer for plan already exists
//   $ChkSQL="Select * from gym_offers o inner join plan p on p.plan_id=o.plan_id where o.gym_id='$gym_id'";
//   $ChkRes= mysqli_query($con, $ChkSQL);
//   $ChkNum= mysqli_num_rows($result);

// if (isset($_POST["submit"])) 
// {
    
//     //Check if offer for plan already exists
//     if($ChkNum!=0)
//     {
//         $_SESSION['status'] = "Plan Already Exist";
//         header('Location:offers.php'); 
//     }
//     else
//     {
//         $ChkPlan=true;
//     }

//     //Offer name validation
//      if(empty($_POST['txtnm']))
//     {
//         $_SESSION['status'] = "Plz Select Offer Name";
//         header('Location:offers.php'); 
//     }
//     else
//     {
//         $Offername=$_POST['txtnm'];
//     }
//     //plan validation
//      if($_POST['Sel_plan']=='')
//     {
//         $_SESSION['status'] = "Plz Choose Plan Name";
//         header('Location:offers.php'); 
//     }
//     else
//     {
//         $Plan=$_POST['Sel_plan'];
//         echo $plan;
//     }
    
//     //Offer percentage
//     if (empty($_POST['txtper']))
//     {
//         $_SESSION['status'] = "Plz Add Offer Percentage";
//         header('Location:offers.php'); 
//     }
//     else
//     {
//         if(!is_numeric($_POST['txtper']))
//         {
//             $_SESSION['status'] = "Only numeric value Allowed.";
//             header('Location:offers.php'); 
//         }
//         else
//         {
//             if($_POST['txtper']>0 && $_POST['txtper'] <=30)
//             {
//                 $percentage=trim($_POST["txtper"]);
//             }
//             else
//             {
//                 $_SESSION['status'] = "Plz Add Offer Percentage Ratio Between 1 to 30...";
//                 header('Location:offers.php'); 
//             }
//         }
       
//     }
//      if (!empty($Offername) && !empty($Plan)&& !empty($percentage) && $ChkPlan=true)
//     {

    
//             //$sql="insert into plan(plan_type,plan_price,gym_id,plan_duration) values ('$plan_name',$price,'$gym_id','$plan_duration')";
//             $sql1 = "INSERT INTO `gym_offers`(`plan_id`, `gym_id`, `offer_percentage`, `offer_name`) VALUES('$Plan','$gym_id','$percentage','$Offername')";
//             $result = mysqli_query($con, $sql1);
//             if ($result)
//             {
//                 $_SESSION['success'] = "Offer Added Successfully";
//                 header('Location:offers.php'); 
//             } 
//             else 
//             {
//                 // echo "<script>alert('Something went wrong');</script>";
//                 $_SESSION['status'] = "Offer Not Added Something Went Wrong..";
//                 header('Location:offers.php'); 
//             }

//     }
// }   
// ?>
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
                  <li>
                    <a href="index_view_page.php">Home</a>
                  </li>
                  <li>
                    <a href="gym_payments.php">Payments</a>  
                  </li>
                  <li><a href="add_gym_plans.php">Plan</a></li>
                  <li class="active"><a href="offers.php">Ofers</a></li>
                  <!-- <li><a href="gym_trainer.php">gym tariner</a></li> -->
                  <!-- <li><a href="Editgymprof.php">Edit Gym Profile</a></li> -->
                  <li class="has-children">
                    <a href="Editgymprof.php">Edit Gym Progile</a>
                    <ul class="dropdown arrow-top">
                      <li><a href="Editgymprof.php">Edit Gym Profile</a></li>
                      <li><a href="gym_trainer.php">Gym Trainer</a></li>
                      <li><a href="upld_images.php">Gallery</a></li>
                    </ul>
                  </li>
                  
                  <li><a href="view_members.php">View Members</a></li>
                  <li><a href="Logout.php">Log out</a></li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
    <br>

            <!-- Modal -->
            <div class="modal fade" id="add_offer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Offer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="Offer" action="add_gym_offers.php" method="post" enctype="multipart/form-data">
    <div class="modal-body">

        <div class="form-group">
            <label>Choose Plan</label> &nbsp&nbsp&nbsp
            <!-- <input type="text" name="txtplan" class="form-control" placeholder="Enter Plan Name"> -->
            <?php
             $sql1 = "SELECT * FROM plan where gym_id='".$gym_id."'";
             $result1 = mysqli_query($con, $sql1);

             echo "<select name='Sel_plan' class='select-css'>";
             echo "<option value=''>--select--</option>";
             while ($rows = mysqli_fetch_array($result1)) {
                 echo "<option value='" . $rows['plan_id'] . "'>" . $rows['plan_type'] . "</option>";
             }
             echo "</select>";
             ?>
        </div>

        <div class="form-group">
            <label>Offer Name</label>
            <input type="text" name="txtnm" id = "txtnm" class="form-control" placeholder="Enter Offer Name">
        </div>

        <div class="form-group">
            <label>Offer Percentage</label>
            <input type="text" name="txtper" id = "txtper" class="form-control" placeholder="Enter Offer Percentage In Digits.">
        </div>


      </div>
    
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" name="submit" value='Add' class="btn btn-primary">Add Offer</button>
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
              <h6 class="m-0 font-weight-bold text-primary">Add Offers Here
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_offer">
                       Add Offers
                    </button>
              </h6>
            </div>
</div>
     
                <br>
            
                <div class="card-body">
            <br>
            
            
            <h2 class="text-center"> Available Offers </h2>
      <div class="table-responsive">
      <?php 
                        $sql2="Select offer_id,offer_percentage,offer_name,plan_type from gym_offers o inner join plan p on p.plan_id=o.plan_id where o.gym_id='$gym_id'";
                        $result= mysqli_query($con, $sql2);
                        ?>
      <table class="table table-bordered table-striped table-hover table-responsive-lg " width="100%" cellspacing="0" style="background-color: white;">
          <thead class="table table-dark">
                        <tr class="bg-dark text-white text-center">
                          <th class="text-center">Plan Name</th>
                          <th class="text-center">Offer Name</th>
                          <th class="text-center">Offer percentage</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>

                      <tbody>
                    <?php
                      if(mysqli_num_rows($result)>0)
                      {
                        while($row= mysqli_fetch_assoc($result))
                        {
                            $id=$row['offer_id'];
                          ?>
                      <tr class="text-center">
                      <td><?php echo $row['plan_type']; ?></td>
                      <td><?php echo $row['offer_name']; ?></td>
                      <td><?php echo $row['offer_percentage']."%"; ?></td>
                      <td>
                        <form action="add_gym_offers.php" method="post">
                          <input type="hidden" name="delete_id" value="<?php echo $row['offer_id']; ?>">
                        <button type="submit" name="btn_delete" class="btn btn-danger">Delete</button>
                        </form>
                      </td>
                    </tr>
                     <?php
                        }
                      }
                      else{
                        echo"<p class='text-center' style='color:red; font-size:24px;'>No Offers Available";
                        echo"</p>";
                      }
                      ?>
                  </tbody>

      </table>

      </div>

      <script type="text/javascript" src="js/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/dist/jquery.validate.js"></script>
<script type="text/javascript" src="js/offer-validation.js"></script>

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
