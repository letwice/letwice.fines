<!DOCTYPE html>
<html>
	<head>
		<title>Player Info</title>
		<link rel="stylesheet" src="global.css" href="global.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<link rel="shortcut icon" href="./siteimages/favicon.ico" type="image/x-icon">
		<link rel="icon" href="./siteimages/favicon.ico" type="image/x-icon">
	</head>
	<body>
		<div>
			<div id="body_content">
				<div id="nav_layer">
					<div class="bumper">&nbsp;</div>
					<div class="spacer">&nbsp;</div>
				</div>
		  
				<div class="tinyText">
					<div id="banner-container">
						<img src="./siteimages/shapeimage_1.png" alt="" >
					</div>
				</div>
				  
				<div id="banner-image" class="tinyText style_SkipStroke_1 stroke_0">
					<img src="./siteimages/logoTaskBar.png" alt="">
				</div>

				<div id="nav_menu" class="tinyText style_SkipStroke_1 stroke_0">
					<form class="navbar-form navbar-right ">
						<ol class="breadcrumb" style="font-size: 20px" >
							<li class="active"><a href="./index.php"><strong>Home</strong><span class="sr-only">(current)</span></a></li>
							<li><a href="./draftplayer.php"><strong>Draft Player</strong></a></li>
							<li><a href="./report.php"><strong>Reports</strong></a></li>
							<li><a href="./login/index.php"><strong>Admin</strong></a></li>
						</ol>
					</form>	
				 </div>
				
			    <div style="" id="home_form_2" class="tinyText">
					<div class="home_details">
						<?php
							$output ="";
							ob_start();
							include("homesummary.php");
							$output = ob_get_contents();
							
							ob_end_clean();
							echo $output;
						?>
					</div>
					<br>
					<!--iframe src="home.php"  align="middle"  style="border: 0; width: 100%; height: 400px"></iframe-->
					<div class="home_details">
						<?php
							$output ="";
							ob_start();
							include("home.php");
							$output = ob_get_contents();
							
							ob_end_clean();
							echo $output;
						?>
					</div>
					<br>
					
					<div style="width: 47%; text-align: center; margin: 0px auto">
						<div class="col-xs-12" style="display: block; margin-bottom: 0px auto; margin: 0px auto; width: 150px">
							<span style="font-size: 36px; border-radius: 1em;" class="label label-info"><strong>Next Game Location</strong></span> 
						</div>
					</div>
					<div style="width: 45%; text-align: center; margin: 0px auto">
						<div style="display: block; margin-bottom: 0px auto; margin: 0px auto; width: 600px">
							<iframe src="map.php" align="middle"  style="border: 0; width: 100%; height: 452px"></iframe>
						</div>
					</div>
					
				</div>
			</div>	
				  
				
				</div>
				
		  </div>
			
			
	</body>

</html>
