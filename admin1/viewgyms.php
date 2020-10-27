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
                $query="select * from gyms inner join gym_owner on gym_owner.gym_owner_id=gyms.gym_owner_id";
                $query_run=mysqli_query($con,$query);
                ?>

                <table class="table table-bordered table-striped table-hover table-responsive-lg " style="background-color: white;">
                    <thead class="table table-dark">
                        <tr class="bg-dark text-white text-center">
                            
                            <th>Gym Name</th>
                            <th>Gym address</th>
                            <th>Gym Description</th>
                            <th>Gym Owner Name</th>
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
                                    
                                    
                                    <th><?php echo $row['gym_name']; ?></th>
                                    <th><?php echo $row['address']; ?></th>
                                    <th><?php echo $row['gym_desc']; ?></th>
                                    <th><?php echo $row['fname']." ".$row['lname']; ?></th>
                                      <form action="deletegyms.php" method="post"> 
                                        <input type="hidden" name="gym_id" value="<?php echo $row['gym_id']?>">
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