<?php
session_start();
include('connection.php');
include('header2.php');
//include ('security.php');
?>

<div class="card shadow mb-4">
<div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"> Edit Diet chart
              </h6>
            </div>
</div>
<div class="card-body">
	<?php
	if(isset($_POST['btn_edit']))
    {
        $id = $_POST['edit_dietchart_id'];
        $q = "SELECT * FROM dietchart WHERE diet_chart_id='$id'";

        $run = mysqli_query($con,$q);   

        foreach($run as $row)
        {
        	?>

 <form action="insert_diet_chart.php" method="post">
 	<input type="hidden" name="edit_dietchart_id" value="<?php echo $row['	diet_chart_id']; ?>">
<div class="form-group">
            <label>Breakfast</label>
            <input type="text" name="edit_breakfast" value="<?php echo $row['breakfast']; ?>" class="form-control" placeholder="enter breakfast details">
        </div>

        <div class="form-group">
            <label>Lunch</label>
            <input type="text" name="edit_lunch" value="<?php echo $row['lunch']; ?>" class="form-control" placeholder="enter lunch details">
        </div>
       
        <div class="form-group">
            <label>Eveninig Snacks</label>
            <input type="text" name="edit_evening_snacks" value="<?php echo $row['evening_snacks']; ?>" class="form-control" placeholder="enter evening snacks details">
        </div>

        <div class="form-group">
            <label>Dinner</label>
            <input type="text" name="edit_dinner" value="<?php echo $row['dinner']; ?>" class="form-control" placeholder="enter dinner details">
        </div>

        <div class="form-group">
            <label>Weekday id</label>
            <input type="text" name="edit_weekday_id" value="<?php echo $row['weekday_id']; ?>" class="form-control" placeholder="enter weekdayid details">
        </div>
        <a href="insertdietchart.php" class="btn btn-danger"> Cancel</a>
        <button type="submit" name="btn_update" class="btn btn-primary"> Update</button>
    </form>
               	<?php
        }
    }
    ?>
</div>



<?php
include('include/scripts.php');
include('include/footer.php');
?>