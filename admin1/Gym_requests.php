<?php

session_start();
//include ('security.php');
include('header2.php'); 
   //include('include/navbar.php');
   include('connection.php'); 


 
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="sweetalert-master/docs/assets/sweetalert/sweetalert.min.js"></script>
        <script>
        function success()
           {
               swal("Gym Registration Successful!", "Email about completion of gym registration has been sent to the gym owner", "success");
           }
        </script>
    </head>
    <body>
        <div class="container">
          <div class="col-lg-15 m-auto row justify-content-center overflow-auto table-box table-responsive">
              <?php
              //successfull registration popup
              $registered=false;
              if(isset($_GET['registered']))
              {
                  $registered=$_GET['registered'];
              }
              if ($registered == 'true') {
                  echo '<script type="text/javascript">',
                  'success();',
                  '</script>'
                  ;
              }

              $query="select * from temp_gym";
                $query_run=mysqli_query($con,$query);
                ?>

                <table class="table table-bordered table-striped table-hover table-responsive-lg " style="background-color: white;">
                    <thead class="table table-dark">
                        <tr class="bg-dark text-white text-center">
                            <th>Gym Name</th>
                            <th>Gym Owner's First Name</th>
                            <th>Gym Owner's Last Name</th>
                            <th>Gym address</th>
                            <th>Email</th>
                            <th>Contact Number</th>
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
                                    <th><?php echo $row['fname']; ?></th>
                                    <th><?php echo $row['lname']; ?></th>
                                    <th><?php echo $row['address']; ?></th>
                                    <th><?php echo $row['email']; ?></th>
                                    <th><?php echo $row['contactno']; ?></th>

                                    <form action="gym_req.php" method="post"> 
                                        <input type="hidden" name="tmp_gym_id" value="<?php echo $row['tmp_gym_id']?>">
                                        <th><input type="submit" name="accept" class="btn btn-success" value="Accept"></th>
                                        <th><input type="submit" name="reject" class="btn btn-danger" value="Reject"></th>
                                    </form>
                                </tr>
                            </tbody>
                        <?php                       
                    }
                }
                else
                {
                    echo"no record found";
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
