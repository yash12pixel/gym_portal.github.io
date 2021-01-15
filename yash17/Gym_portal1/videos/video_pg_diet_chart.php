<?php
session_start();
include ('../connection.php');
?>
    
               

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>video</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="https://unpkg.com/bootstrap@4.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="videostyle.css">
</head>
<body>
	<section>
		<video id="slider" autoplay="on" controls  preload="auto" loop>
		
		</video>
		
		<ul class="navigation">
		<?php
		$res = mysqli_query($con, "SELECT * FROM prime_videos where video_type='diet chart'");
		while ($row = mysqli_fetch_array($res)) {
			?>
			<li onclick="videourl('video_and_img/<?php echo $row['video_name'];?>')"><img src="video_and_img/<?php echo $row['image']; ?>"></li>
			<?php
		}
		?>
		</ul>
		
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
       