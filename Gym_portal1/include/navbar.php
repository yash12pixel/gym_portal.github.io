 <?php 
 session_start();
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

    <header>
         <nav class="navbar navbar-expand-sm navbar-light bg-light">
                <a class="navbar-brand" href="index.php">
                    <img src="images/logo2.png" class="logo" alt="logo" style="  height: auto;
    width: auto;
    max-height: 72px;
    max-width: 250px;">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li>
                    <?php
                     if (isset($_SESSION["username"]))
                     {  
                      echo " <li class='nav-item active'><a class='nav-link' href='editprof.php'>$username</a>";
                     }
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
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#section_about">About Us</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#section_service" id="navbar" role="" data-toggle="" aria-haspopup="" aria-expanded="">
                        Service
                        </a>
                     
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#section_find" tabindex="-1" aria-disabled="true">Find Gym</a>
                    </li>
                          
                    <li>
                     <?php
                    //Hide if Prime member                                  
                    if (isset($_SESSION["username"]))
                    {
                        if($mem_type=='p')
                        {
                        echo " <li class='nav-item active'><a class='nav-link' href='video_disp_hm_page.php' tabindex='-1' aria-disabled='true'>Prime videos</a></li>";
                        }
                    }
                    ?>
                    <?php
                    //UNhide if Prime member                                  
                    if (isset($_SESSION["username"]))
                    {
                        if($mem_type=='p')
                        {
                        echo " <li class='nav-item active'><a class='nav-link' href='view_dietchart_page.php' tabindex='-1' aria-disabled='true'>Dietchart</a></li>";
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
                   </li>
                   </ul>
                </div>
             </nav>
    </header>
