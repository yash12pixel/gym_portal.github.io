<?php
session_start();
   include('header2.php'); 
   //include('include/navbar.php');
   include('connection.php'); 
 //  include('security.php');
   $GymQry="Select * from gyms";
   $gyms=mysqli_query($con,$GymQry);
   //$rows = mysqli_fetch_array($gyms);
  ?>

    <html>
        <head>
    <script src="package/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="package/dist/sweetalert2.min.css">
            <script >
            function error()
           {
              Swal.fire({
  type: 'error',
  title: "<p style='font-size: 200px;'>&#129298;</p>",
  text: 'Currently, there are no members of the selected gym'
  }
);

           }
            </script>
        </head>
    <body>
      <div class="container">
          
          <div class="col-lg-15 m-auto row justify-content-center overflow-auto table-box table-responsive">
              <form action="" method="post">
              <center>
                  <div class="form-group">
              <label style="font-size: 20px;" class="badge badge-dark">Select gym :</label>
              <select name="gyms"  class="form-control">
                  <option value="">--Select--</option>
              <?php
              while ($rows = mysqli_fetch_array($gyms)) {
              ?>
              
                  <option value="<?php echo $rows['gym_id']; ?>"><?php echo $rows['gym_name']; ?></option>
              
              <?php
              }
              echo "</select><br/>";
              ?>
                  <input type="submit" name="submit" value="Go" class="btn btn-outline-primary">
                  </div>
                  <br/><br/>
              </center>
              <?php
              if(isset($_POST['submit']))
              {
                  if($_POST['gyms']!='')
                  {
                    $Gym_id=$_POST['gyms'];
                  
              
                $query="Select * from customer inner join customer_membership on customer.customer_id=customer_membership.customer_id inner join plan p on p.plan_id=customer_membership.plan_id where customer_membership.gym_id=$Gym_id";
                $query_run=mysqli_query($con,$query);
                if(mysqli_num_rows($query_run)==0)
                {
                    echo "<script type='text/javascript'>error();</script>";
                }
                else
                {
                ?>

                  <?php
                     $GymQry="Select * from gyms";
                    $gyms=mysqli_query($con,$GymQry);
                    $rows = mysqli_fetch_array($gyms);
                    
                  ?>
                  <center> <H3 >Members of <?php echo $rows['gym_name']; ?></h3></center>
                  
                <table class="table table-bordered table-striped table-hover table-responsive-lg " style="background-color: white;">
                    <thead class="table table-dark">
                        <tr class="bg-dark text-white text-center">
                            
                            <th>Customer Name</th>
                            <th>Gender</th>
                            <th>Membership Start Date</th>
                            <th>Membership End Date</th>
                            <th>Plan name</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>

                <?php
                if($query_run)
                {
                    while($row = mysqli_fetch_array($query_run))
                    {
                        ?>
                            <tbody>
                                <tr class="text-center">
                                   
                                    <th><?php echo $row['fname']." ".$row['lname']; ?></th>
                                    
                                   <th><?php echo $row['gender']; ?></th>
                                    <th><?php echo $row['membership_start_date']; ?></th>
                                    <th><?php echo $row['membership_end_date']; ?></th>
                                <th><?php echo $row['plan_type']; ?></th>

                                    <form action="purchase_membership_delete.php" method="post"> 
                                        <input type="hidden" name="customer_id" value="<?php echo $row['customer_id']?>">
                                        <th><input type="submit" name="delete" class="btn btn-danger" value="DELETE"></th>
                                    </form>
                                </tr>
                            </tbody>
                        <?php                        
                    }
                }
                else
                {
                    echo"<p class='text-center' style='color:red; font-size:24px;'>No recors Available";
                    echo"</p>";                
                }
                }
                }
                }
              ?>
                </table>
          </div>
      </div>
            </div>
            <?php
                include('include/footer.php');
                include('include/scripts.php');
            ?>
            </form>
    </body>
    </html>