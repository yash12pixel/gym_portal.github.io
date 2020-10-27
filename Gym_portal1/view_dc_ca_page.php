
<?php include('include/header.php');  ?>
<?php 
 session_start();
 include ('security.php');
include_once'connection.php';
//fetch membership type
$mem_type ="";
if(isset($_SESSION['username']))
{
 $user = $_SESSION['username'];
}
$sql = "select * from customer where username='$user' or email='$user'";
$res = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($res)) {
    $username=$row['username'];
    $mem_type = $row['membership_type'];
}
?>
<?php include('downloadcode.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/diet_chart.css">
    <title>Dietchart</title>
</head>
<body>

<header>
         <nav class="navbar navbar-expand-sm navbar-light bg-light">
                <a class="navbar-brand" href="index.php">
                    <img src="images/9.jpg" class="logo" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <?php
                     if (isset($_SESSION["username"]))
                        
                   echo " <li class='nav-item active'><a class='nav-link' href='editprof.php'>$username</a>";
                     if($mem_type=='p')
                     {?>
                         <img src="images/Prime_member.png" style="height: 20px; weight:20px;" alt="Prime Member"></li>
                   <?php 
                   }
                   ?>
                    
                    <?php
                    //Hide if Prime member                                  
                    if (isset($_SESSION["username"]))
                    {
                        if($mem_type=='b')
                        {
                        echo " <li class='nav-item active'><a class='nav-link' href='Prime_membership.php'>Prime Membership</a></li>";
                        }
                    }
                    ?>
                  
                     <?php
                    //Hide if Prime member                                  
                    if (isset($_SESSION["username"]))
                    {
                        if($mem_type=='p')
                        {
                        echo " <li class='nav-item active'><a class='nav-link' href='Prime_videos.php' tabindex='-1' aria-disabled='true'>Prime videos</a></li>";
                        }
                    }
                    ?>
                    <?php
                    //Hide if Prime member                                  
                    if (isset($_SESSION["username"]))
                    {
                        if($mem_type=='p')
                        {
                        echo " <li class='nav-item active'><a class='nav-link' href='Diet_charts.php' tabindex='-1' aria-disabled='true'>Dietchart</a></li>";
                        }
                    }
                    ?>
                    <?php 
                    if(empty($_SESSION["username"]))
                    {
                    ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="login.php" tabindex="-1" aria-disabled="true">Login</a>
                    </li>   
                    </ul>
                    <?php 
                    }
                    else{
                        echo " <li class='nav-item active'><a class='nav-link' href='Logout.php'>Log out</a></li>";
                    }
                   ?>
                </div>
             </nav>
    </header>


<section>
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            
        </ol>

        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="images/88.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
            </div>
            </div>
            
            <div class="carousel-item">
            <img src="images/86.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
            </div>
            </div>
        </div>

        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

        </div>
  </section>

  <br>
<div class="table-responsive">

<?php
 // $q = ;
  $run = mysqli_query($con,"SELECT * FROM dietchart");
?>

<table class="table table-bordered table-striped table-hover table-responsive-lg " style="background-color: white;">
<thead class="table table-dark">
              <tr class="bg-dark text-white text-center">
                <th>dietchart_Number</th>
                <th>Dietchart Name</th>
                
                <th>Dietchart Type</th>
                <th>Size</th>
                
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
            
              <?php
              $i = 1;
                if(mysqli_num_rows($run)>0)
                {
                  while($row= mysqli_fetch_assoc($run))
                  {
                    ?>
                    
              <tr class="text-center">
                <td><?php echo $i++; ?></td>
                <td><?php echo $row['dietchart_name']; ?></td>
                
                <td><?php echo $row['dietchart_type']; ?></td>
          
                <td><?php echo floor($row['size'] / 1000) . ' KB'; ?></td>
                <td><a class="btn btn-primary" href="view_dc_wg_page.php?file_id=<?php echo $row['dietchart_id']; ?>">Download</a></td>
                
              </tr>
               <?php
                  }
                }
                else{
                  echo"<p class='text-center' style='color:red; font-size:24px;'>No recors Available";
                  echo"</p>";
                }
                ?>
            </tbody>
</table>
</div> 
</div> 

<?php include('include/scripts.php');  ?>
<?php include('include/footer.php');  ?>   