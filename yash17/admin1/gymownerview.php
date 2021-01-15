<?php
session_start();
   include('header2.php'); 
   //include('include/navbar.php');
   include('connection.php'); 
  // include ('security.php');
?>

    <html>
    <body>
      <div class="container">
          <div class="col-lg-15 m-auto row justify-content-center overflow-auto table-box table-responsive">
              <?php
                $query="select * from gym_owner inner join gyms on gym_owner.gym_owner_id=gyms.gym_owner_id";
                $query_run=mysqli_query($con,$query);
                ?>

                <table class="table table-bordered table-striped table-hover table-responsive-lg " style="background-color: white;">
                    <thead class="table table-dark">
                        <tr class="bg-dark text-white text-center">
                            
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>User Name</th>
                            <th>Email id</th>
                            <th>Contact No</th>
                            <th>Gym Name</th>
                            <th>Gym Address</th>
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
                                    
                                    <th><?php echo $row['fname']; ?></th>
                                    <th><?php echo $row['lname']; ?></th>
                                    <th><?php echo $row['username']; ?></th>
                                    <th><?php echo $row['email']; ?></th>
                                    <th><?php echo $row['contactno']; ?></th>
                                    <th><?php echo $row['gym_name']; ?></th>
                                    <th><?php echo $row['address']; ?></th>
                                
                                      <form action="gymownerdelete.php" method="post"> 
                                        <input type="hidden" name="gym_owner_id" value="<?php echo $row['gym_owner_id']?>">
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
              ?>
                </table>
          </div>
      </div>
            <?php
                include('include/footer.php');
                include('include/scripts.php');
            ?>
    </body>
    </html>