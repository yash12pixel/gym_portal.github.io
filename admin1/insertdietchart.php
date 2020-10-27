<?php
session_start();
include('connection.php');
include('header2.php');
//include('security.php');
?>

<!-- Modal -->
<div class="modal fade" id="dietchart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">diet chart</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="insert_diet_chart.php" method="post" enctype="multipart/form-data">
    <div class="modal-body">

        <!-- <div class="form-group">
            <label>Diet Chart Name</label>
            <input type="text" name="dietchart_name" class="form-control" placeholder="enter DietChart Name">
        </div> -->
<br>
        <div class="form-group">
            <label>Diet Chart Type</label>
           <!--   <input type="text" name="dct" class="form-control" placeholder="enter dietchart type"> -->
            <select name="dct" id="">
            <option value="">--Select Dietchart Type--</option>
            <option value="Weight gain">Weight gain</option>
            <option value="Weight loss">Weight loss</option>
            </select> 
        </div>

        <div class="form-group">
            <label>Upload File</label>
            <input type="file" name="myfile" class="form-control" placeholder="Upload File">
        </div>

        <!-- <div class="form-group">
            <label>Dinner</label>
            <input type="text" name="dinner" class="form-control" placeholder="enter dinner details">
        </div>

        <div class="form-group">
            <label>Weekday id</label>
            <input type="text" name="weekday_id" class="form-control" placeholder="enter weekdayid details">
        </div> -->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="save" class="btn btn-primary">Upload </button>
      </div>
    </form>
    </div>
  </div>
</div>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Diet chart
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#dietchart">
                        Add Diet Chart
                    </button>
              </h6>
            </div>
</div>
<div class="card-body">

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
  ?>
    <div class="table-responsive">

      <?php
        $q = "SELECT * FROM dietchart";
        $run = mysqli_query($con,$q);
      ?>

    <table class="table table-bordered table-striped table-hover table-responsive-lg " style="background-color: white;">
    <thead class="table table-dark">
                    <tr class="bg-dark text-white text-center">
                      <th>dietchart_id</th>
                     
                      <th>File Name</th>
                      <th>Dietchart Type</th>
                      <th>Size</th>
                      <th>Downloads</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                      if(mysqli_num_rows($run)>0)
                      {
                        while($row= mysqli_fetch_assoc($run))
                        {
                          ?>
                    <tr class="text-center">
                      <td><?php echo $row['dietchart_id']; ?></td>
                      <td><?php echo $row['dietchart_name']; ?></td>
                      
                      <td><?php echo $row['dietchart_type']; ?></td>
                
                      <td><?php echo $row['size']/1000; ?></td>
                      <td><?php echo $row['downloads']; ?></td>
                      <td>
                        <form action="insert_diet_chart.php" method="post">
                          <input type="hidden" name="delete_dietchart_id" value="<?php echo $row['dietchart_id']; ?>">
                        <button type="submit" name="btn_delete" class="btn btn-danger">Delete</button>
                        </form>
                      </td>
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

</div>
</div>
        <!-- /.container-fluid -->




<?php
include('include/scripts.php');
include('include/footer.php');
?>