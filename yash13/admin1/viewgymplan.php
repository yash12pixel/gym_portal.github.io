<?php
session_start();
//include('security.php');
   include('header2.php'); 
   //include('include/navbar.php');
   include('connection.php'); 
?>

    <html>
    <body>
      <div class="container">
          <div class="col-lg-15 m-auto row justify-content-center overflow-auto table-box table-responsive">
              <?php
                $query="select * from plan inner join gyms on gyms.gym_id=plan.gym_id";
                $query_run=mysqli_query($con,$query);
                ?>

                <table class="table table-bordered table-striped table-hover table-responsive-lg " style="background-color: white;">
                    <thead class="table table-dark">
                        <tr class="bg-dark text-white text-center">
                          
                            <th>Plan Type</th>
                            <th>Plan Price</th>
                            <th>Gym Id</th>
                            <th>Gym Name</th>
                            <th>Gym City</th>
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
                                    
                                    
                                    <th><?php echo $row['plan_type']; ?></th>
                                    <th><?php echo $row['plan_price']; ?></th>
                                    <th><?php echo $row['gym_id']; ?></th>
                                    <th><?php echo $row['gym_name']; ?></th>
                                    <th><?php echo $row['address']; ?></th>
                                      <form action="deletegymplan.php" method="post"> 
                                        <input type="hidden" name="plan_id" value="<?php echo $row['plan_id']?>">
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
                    echo"</p>";                }
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