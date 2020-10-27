<?php
session_start();
//include ('security.php');
include('header2.php');
//include('include/navbar.php');
include('connection.php');
?>

<!-- Modal -->
<div class="modal fade" id="primevideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Prime Video</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="insert_prime_video.php" method="post" enctype="multipart/form-data">
    <div class="modal-body">

        <div class="form-group">
            <label>Upload Video</label>
            <input type="file" name="file" class="form-control" placeholder="Upload video" required>
        </div>

        <div class="form-group">
            <label>Upload Video Image</label>
            <input type="file" name="image" id = "image" class="form-control" placeholder="Upload video image" required>
        </div>

        <div class="form-group">
            <label>Video Type</label><br>
            <select name="video_type">
            <option>--Select Video Type--</option>
            <option value="Dietchart">Dietchart</option>
            <option value="Exercise">Exercise</option>
            <option value="Yoga_And_Meditation">Yoga & Meditation</option>
            </select>
        </div>
      </div>
    
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" name="insert" class="btn btn-primary">Upload</button>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
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

    if(isset($_SESSION['extension']) && $_SESSION['extension'] !='')
    {
      echo'<h3 class=".bg-warning"> '.$_SESSION['extension'].' </h3>';
      unset($_SESSION['extension']);
    }
  ?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Prime Video
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#primevideo">
                        Add Prime Video
                    </button>
              </h6>
            </div>
</div>

<h2 class="text-center"> Available Videos </h2>
      <div class="table-responsive">
        
        <?php
          $que = "select * from prime_videos";
          $run = mysqli_query($con,$que);
        ?>

      <table class="table table-bordered table-striped table-hover table-responsive-lg " width="100%" cellspacing="0" style="background-color: white;">
          <thead class="table table-dark">
                        <tr class="bg-dark text-white text-center">
                          <th>Prime video id</th>
                          <th>Video Name</th>
                          <th>Location</th>
                          <th>Image</th>
                          <th>Video Type</th>
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
                      <td><?php echo $row['prime_video_id']; ?></td>
                      <td><?php echo $row['video_name']; ?></td>
                      <td><?php echo $row['location']; ?></td>
                      <td><?php echo '<img src="../Gym_portal1/videos/video_and_img/'.$row['image'].'" width="100px;" height="100px" alt="images">'?></td>
                      <td><?php echo $row['video_type']; ?></td>
                      <td>
                        <form action="insert_prime_video.php" method="post">
                          <input type="hidden" name="delete_id" value="<?php echo $row['prime_video_id']; ?>">
                        <button type="submit" name="btn_delete" class="btn btn-danger">Delete</button>
                        </form>
                      </td>
                    </tr>
                     <?php
                        }
                      }
                      else{
                        echo"<p class='text-center' style='color:red; font-size:24px;'>No recors Available";
                        echo"</p>";                      }
                      ?>
                  </tbody>

      </table>

      </div>
  
<?php
include('include/scripts.php');
include('include/footer.php');
?>