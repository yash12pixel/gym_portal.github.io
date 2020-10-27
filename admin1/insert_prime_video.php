<?php
session_start();
include('connection.php');
//include('security.php');
if(isset($_POST['insert']))
{
if(file_exists("../Gym_portal1/videos/video_and_img/".$_FILES['file']['name']))
{
    $store = $_FILES['file']['name'];
    $_SESSION['status'] = " video already exist. '.$store.'";
    header("location: primevideo.php");
}
  else if(empty($_FILES['file']['name']) && ($_FILES["image"]["name"]) && $_POST['video_type']!='')
        {
            $msg= "Please select a file to upload";
        }
        else{
                $maxsize = 200800320; // 70MB
                $maxsize_img = 10000000;
                $video_type = $_POST['video_type'];
                $name = $_FILES['file']['name'];
                $imgname = $_FILES['image']['name'];
                
                $target_dir = "../Gym_portal1/videos/video_and_img/";
                $target_file = $target_dir . $_FILES["file"]["name"];
                $target_file_img = $target_dir . basename($_FILES["image"]["name"]);


                // Select file type
                $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $imageFileType = strtolower(pathinfo($target_file_img,PATHINFO_EXTENSION));


                // Valid file extensions
                $extensions_arr = array("mp4","avi","3gp","mov","mpeg","mkv");
                $extensions_arr_img = array("jpg","jpeg","png","gif");


                // Check extension
                if( in_array($videoFileType,$extensions_arr) && in_array($imageFileType,$extensions_arr_img)){

                  // Check file size
                  if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0) && ($_FILES['image']['size'] >= $maxsize_img) || ($_FILES["image"]["size"] == 0)) {
                    echo "File too large.";
                  }else{
                    // Upload
                    if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file) &&  move_uploaded_file($_FILES['image']['tmp_name'],$target_file_img)){
                      // Insert record
                      // $image_base64 = base64_encode(file_get_contents($_FILES['image']['tmp_name']) );
                      // $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;

                      $img = 
                     
                      $query = "INSERT INTO prime_videos(video_name,location,image,video_type) VALUES('".$name."','". $target_file."','".$imgname."','".$video_type."')";

                      $run = mysqli_query($con,$query);
                     
                      if($run){
                        $_SESSION['success'] = "Video & Image  Added";
                        header("Location:Primevideo.php");
                    }
                    else{
                        $_SESSION['status'] = "Video Or Image Not Added";
                        header("Location:Primevideo.php");
                    }
                    }
                  }

                }else{
                  $_SESSION['extension'] = "Invalid Extension.";
                  header("Location:Primevideo.php");
                }

              }

          // for image upload.........

          // if(!empty($_FILES["image"]["name"]))
          // {
          //   $name = $_FILES['image']['name'];
          //   $target_dir = "../Gym_portal1/videos/video_and_img/";
          //   $target_file = $target_dir . basename($_FILES["image"]["name"]);
          
          //   // Select file type
          //   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
          
          //   // Valid file extensions
          //   $extensions_arr = array("jpg","jpeg","png","gif");
          
          //   // Check extension
          //   if( in_array($imageFileType,$extensions_arr) ){
           
          //     // Convert to base64 
          //     $image_base64 = base64_encode(file_get_contents($_FILES['image']['tmp_name']) );
          //     $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
          //     // Insert record
          //     $query = "insert into prime_videos(video_name,location,image) values('".$name."','".$target_file."','".$image."')";
          //     mysqli_query($con,$query);
            
          //     // Upload file
          //     move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$name);
          //   }
           
          // }  
          // else
          // {
          //   echo "image not added";
          // }
      }

 if(isset($_POST['btn_delete']))
   {
       $delete_id = $_POST['delete_id'];

       $que = "DELETE FROM prime_videos WHERE prime_video_id = '$delete_id'";
       $run = mysqli_query($con,$que);

       if($run)
       {
            $_SESSION['success'] = "Your Data is Deleted";
            header('Location:primevideo.php');   
       }
       else
       {
            $_SESSION['status'] = "Your Data is Not Deleted";
            header('Location:primevideo.php');    
       }
   }

?>

