<?php
session_start();
include('connection.php');
//include('security.php');
$user_username=$_SESSION['username'];
$sql = "SELECT * FROM gym_owner as g inner join gyms as gm on g.gym_owner_id=gm.gym_owner_id where username='$user_username' or email='$user_username'";
$result = mysqli_query($con,$sql) or die(mysqli_error($con)); 
$rows = mysqli_fetch_array($result);
$gym_id=$rows['gym_id'];
 
    if(isset($_POST['submit'])){

        if(file_exists("gym_trainer_and_Certificate/".$_FILES['image']['name']))
      {
          $store = $_FILES['image']['name'];
          $_SESSION['status'] = " Image already exist. '.$store.'";
           header("location: gym_trainer.php");
      }

      
else{

        $name = $_FILES['image']['name'];
        $trainer_name = $_POST['txtnm'];
        $trainer_age = $_POST['txtage'];
        $trainer_exp = $_POST['txtexperiance'];
        $trainer_desc = $_POST['txtdesc'];
        $target_dir = "gym_trainer_and_Certificate/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");

        // Check extension
        if( in_array($imageFileType,$extensions_arr) ){
            
            // Convert to base64 
            // $image_base64 = base64_encode(file_get_contents($_FILES['image']['tmp_name']) );
            //$image = 'data:image/'.$imageFileType.';base64,'.$image_base64;

            // Insert record
            $query = "insert into trainer_gym (trainer_name,trainer_age,trainer_experience,trainer_description,image,gym_id) values ('".$trainer_name."','".$trainer_age."','".$trainer_exp."','".$trainer_desc."','".$name."','".$gym_id."')";
           
           $run = mysqli_query($con,$query);
            if($run){
                $_SESSION['success'] = "Trainer Info Added";
                header("Location:gym_trainer.php");
            }
            else{
                $_SESSION['status'] = "Trainer Info Not Added";
                header("Location:gym_trainer.php");
            }
            // Upload file
            move_uploaded_file($_FILES['image']['tmp_name'],'gym_trainer_and_Certificate/'.$name);

        }
    
    }

}

if(isset($_POST['btn_delete']))
{
    $delete_id = $_POST['delete_id'];

    $que = "DELETE FROM trainer_gym WHERE trainer_id = '$delete_id'";
    $run = mysqli_query($con,$que);

    if($run)
    {
         $_SESSION['success'] = "Your Data is Deleted";
         header('Location:gym_trainer.php');   
    }
    else
    {
         $_SESSION['status'] = "Your Data is Not Deleted";
         header('Location:gym_trainer.php');    
    }
}

    ?>
        