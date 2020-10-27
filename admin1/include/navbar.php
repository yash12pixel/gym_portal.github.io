<?php

?>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
 <div class="sidebar-brand-icon rotate-n-15">
 <i class="fas fa-dumbbell"></i>
 </div>
 <div class="sidebar-brand-text mx-3">Gym Portal Admin </div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
 <a class="nav-link" href="Gym_requests.php">

 <i class="fas fa-user-check"></i>
   <span>Gym Requsets</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
 users
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
 <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
 <i class="fas fa-users"></i>
   <span>customers</span>
 </a>
 <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
   <div class="bg-white py-2 collapse-inner rounded">
     <h6 class="collapse-header"></h6>
     <a class="collapse-item" href="userview.php"><i class="fas fa-user-tie"></i><span> &nbsp&nbsp Normal Users</span></a>
     <a class="collapse-item" href="primeuserview.php"><i class="fas fa-user-plus"></i>&nbsp&nbsp Prime Users </a>
     <a class="collapse-item" href="purchase_membership_view.php"><i class="fas fa-money-check-alt"></i>&nbspMembership customer's </a>

   </div>
 </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
 <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
 <i class="fas fa-dumbbell"></i>
   <span>Gyms</span>
 </a>
 <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
   <div class="bg-white py-2 collapse-inner rounded">
  
     <a class="collapse-item" href="gymownerview.php"><i class="fas fa-eye"></i> &nbsp&nbspView Gym Owners</a>
     <a class="collapse-item" href="viewgyms.php"><i class="fas fa-eye"></i> &nbsp&nbspView Gyms</a>
     <a class="collapse-item" href="viewgymplan.php"><i class="fas fa-eye"></i> &nbsp&nbspView Gym Plans</a>
     <!-- <a class="collapse-item" href="#"><i class="fas fa-eye"></i> &nbsp&nbspView Gym Videoes</a> -->
   </div>
 </div>
</li>



<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
 Diet Chart
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
 <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
 <i class="fas fa-pen-square"></i>
   <span>Diet Chart</span>
 </a>
 <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
   <div class="bg-white py-2 collapse-inner rounded">
     
     <a class="collapse-item" href="insertdietchart.php"><i class="fas fa-pen-square"></i>&nbsp&nbsp Diet Chart</a>
    
   </div>
 </div>
</li>


<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - gym plans -->


<!-- Nav Item - Charts -->
<li class="nav-item">
 <a class="nav-link" href="primevideo.php">
 <i class="fas fa-video"></i>
   <span>Prime Video</span></a>

</li>
<!-- Nav Item - Tables -->


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
 <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->

 <!-- Scroll to Top Button-->
 <a class="scroll-to-top rounded" href="#page-top">
   <i class="fas fa-angle-up"></i>
 </a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
         <button class="close" type="button" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">×</span>
         </button>
       </div>
       <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
       <div class="modal-footer">
         <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
         <form action="logout.php" method="post">
         <button type="submit" name="logout" class="btn btn-primary">Logout</button>
         </form>
       </div>
     </div>
   </div>
 </div>

 <?php
   include('include/scripts.php');
 ?>