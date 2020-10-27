<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>video</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="https://unpkg.com/bootstrap@4.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="videostyle.css">
</head>
<body>
	<section>
		<video id="slider" autoplay controls  preload="auto" loop>
			
		</video>
		<ul class="navigation">
			<li onclick="videourl('Chappie Sample')"><img src="img1.jpg"></li>
			<li onclick="videourl('Chappie Sample')"><img src="img1.jpg"></li>
			<li onclick="videourl('Chappie Sample')"><img src="img1.jpg"></li>
			<li onclick="videourl('Chappie Samples')"><img src="img1.jpg"></li>
			
		</ul>
	</section>
	<script src="https://unpkg.com/jquery@3.4.1/dist/jquery.min.js"></script>
    <script src="https://unpkg.com/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		function videourl(hmmmmmmmmm){
			document.getElementById("slider").src = hmmmmmmmmm;
		}
	</script>
</body>
</html>