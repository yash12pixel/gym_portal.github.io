<?php
 session_start();
 include ('security.php');
//include('include/header.php');
//include('include/navbar.php');
include 'connection.php';

$user_username=$_SESSION['username'];
$gym_id=$_GET['id'];
//join query for gym and gym owner detailes
$sql = "SELECT * FROM gym_owner as g inner join gyms as gm on g.gym_owner_id=gm.gym_owner_id where username='$user_username' or email='$user_username'";
$result = mysqli_query($con,$sql) or die(mysqli_error($con)); 
$rows = mysqli_fetch_array($result);
$gym_id=$rows['gym_id'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>video</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="https://unpkg.com/bootstrap@4.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="videos/videostyle.css">
</head>
<body>
	<section>
		
		<?php
        $res = mysqli_query($con, "SELECT * FROM gym_video where gym_id = '$gym_id'");
        $check = mysqli_num_rows($res) > 0;

        if($check)
        {
            while ($row = mysqli_fetch_array($res)) {
                ?>
                <video id="slider" autoplay="on" controls  preload="auto" loop>
		
		</video>
		
		<ul class="navigation">
                <li onclick="videourl('gym_videos/<?php echo $row['video_name'];?>')"><img src="gym_videos/<?php echo $row['image']; ?>"></li>
                </ul>
                <?php
            }
        }
        else
        {
            echo"<h1 style='margin-top:3rem;text-align:center'>No Video Available Now..</h1>";
        }
		
		?>
		
		
	</section>
	<script src="https://unpkg.com/jquery@3.4.1/dist/jquery.min.js"></script>
    <script src="https://unpkg.com/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
	<script>
		function videourl(hmmmmmmmmm){
			document.getElementById("slider").src = hmmmmmmmmm;
		}
	</script> 
</body>
</html>