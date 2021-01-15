<?php
include('security.php');
//include('header2.php');
include('include/header.php'); 
include('include/navbar.php'); 
 
?>
    
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

        

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
            

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  Admin 
                </span>
               
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" style="font-size:20px;" aria-labelledby="userDropdown">
                
               
                <a class="dropdown-item" style="font-size:16px;" href="admin/adminlogin.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
           
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-2"><i class="fas fa-users" style="color: red;"></i>&nbsp&nbspTotal No of customers</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">

                      <?php
                          include('connection.php');

                          $query="select customer_id from customer order by customer_id";
                          $query_run=mysqli_query($con,$query);

                          $row=mysqli_num_rows($query_run);

                          echo '<h1>'.$row.'</h1>'

                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-users fa-2x" style="color: red;"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-2"><i class="fas fa-dumbbell" style="color:#0080ff;"></i>&nbsp&nbspTotal No of Gym Owners</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php
                          include('connection.php');

                          $query="select gym_owner_id from gym_owner order by gym_owner_id";
                          $query_run=mysqli_query($con,$query);

                          $raw=mysqli_num_rows($query_run);

                          echo '<h1>'.$raw.'</h1>'

                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-dumbbell fa-2x" style="color:#0080ff;"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><i class="fas fa-dumbbell" style="color:#80ff00;"></i>&nbsp&nbspTotal no of Gyms</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                          <?php
                          include('connection.php');

                          $query="select gym_id from gyms order by gym_id";
                          $query_run=mysqli_query($con,$query);

                          $raw=mysqli_num_rows($query_run);

                          echo '<h1>'.$raw.'</h1>'

                        ?>
                          </div>
                        </div>
                        <div class="col">
                        
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-dumbbell fa-2x"style="color:#80ff00;"></i>
                       
                    </div>
                  </div>
                </div>
              </div>
            </div>


          <!-- available plans-->

          <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><i class="fas fa-fw fa-chart-area" style="color:#ff00ff;"></i>&nbsp&nbspTotal No of Plans</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php
                          include('connection.php');

                          $query="select plan_id from plan order by plan_id";
                          $query_run=mysqli_query($con,$query);

                          $raw=mysqli_num_rows($query_run);

                          echo '<h1>'.$raw.'</h1>'

                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-fw fa-chart-area fa-2x"style="color:#ff00ff;"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-2"><i class="fas fa-pen-square" style="color: red;"></i>&nbsp&nbspTotal No of Diet Chart</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">

                      <?php
                          include('connection.php');

                          $query="select dietchart_id from dietchart order by dietchart_id";
                          $query_run=mysqli_query($con,$query);

                          $row=mysqli_num_rows($query_run);

                          echo '<h1>'.$row.'</h1>'

                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-pen-square fa-2x" style="color: red;"></i>
                    </div>                    
                  </div>
                </div>
              </div>
            </div>





   <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-2"><i class="fas fa-user-check" style="color:#0080ff;"></i>&nbsp&nbsp Pending Request</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">

                      <?php
                          include('connection.php');

                          $query="select tmp_gym_id from temp_gym order by tmp_gym_id";
                          $query_run=mysqli_query($con,$query);

                          $row=mysqli_num_rows($query_run);

                          echo '<h1>'.$row.'</h1>'

                        ?>

                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-check fa-2x" style="color:#0080ff;"></i>
                    </div>

                  </div>
                </div>
              </div>
            </div>


            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><i class="fas fa-money-check-alt" style="color:#80ff00;"></i>&nbsp&nbspTotal Membership Purchase Customers.</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                          <?php
                          include('connection.php');

                          $query="select 	membership_id from  customer_membership order by membership_id";
                          $query_run=mysqli_query($con,$query);

                          $raw=mysqli_num_rows($query_run);

                          echo '<h1>'.$raw.'</h1>'

                        ?>
                          </div>
                        </div>
                        <div class="col">
                        
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-money-check-alt fa-2x"style="color:#80ff00;"></i>
                       
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><i class="fas fa-video" style="color:#ff00ff;"></i>&nbsp&nbspTotal No of Videoes</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php
                          include('connection.php');

                          $query="select prime_video_id from prime_videos order by prime_video_id";
                          $query_run=mysqli_query($con,$query);

                          $raw=mysqli_num_rows($query_run);

                          echo '<h1>'.$raw.'</h1>'

                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-video fa-2x"style="color:#ff00ff;"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


          <!-- Content Row -->

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

  
 <?php
 include('include/scripts.php');
 include('include/footer.php');
 ?>

<?php
?>
 

