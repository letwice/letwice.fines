<?php
	include('validate.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Match Details</title>
		<link rel="stylesheet" src="../global.css" href="../global.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<link rel="shortcut icon" href="../siteimages/favicon.ico" type="image/x-icon">
		<link rel="icon" href="../siteimages/favicon.ico" type="image/x-icon">
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
						<img src="../siteimages/shapeimage_1.png" alt="" >
					</div>
				</div>
				  
				<div id="banner-image" class="tinyText style_SkipStroke_1 stroke_0">
					<img src="../siteimages/logoTaskBar.png" alt="">
				</div>

				<div id="nav_menu" class="tinyText style_SkipStroke_1 stroke_0">
					<form class="navbar-form navbar-right ">
						<ol class="breadcrumb" style="font-size: 20px" >
							<li><a href="../index.php"><strong>Home</strong></a></li>
							<li class="active"><a href="./match.php"><strong>Match Details</strong><span class="sr-only">(current)</span></a></li>
							<li><a href="./admin.php"><strong>Fine Manager</strong></a></li>
							<li><a href="./index.php?logout=1"><strong>Logout</strong></a></li>
						</ol>
					</form>	
				 </div>
				
			    <div style="" id="info_form" class="tinyText">
					<script type="text/javascript">
						function ajaxRequest(){
							var activexmodes=["Msxml2.XMLHTTP", "Microsoft.XMLHTTP"] //activeX versions to check for in IE
							if (window.ActiveXObject){ //Test for support for ActiveXObject in IE first (as XMLHttpRequest in IE7 is broken)
								for (var i=0; i<activexmodes.length; i++){
									try{
										return new ActiveXObject(activexmodes[i])
									} catch(e){
										//suppress error
									}
								}
							} else if (window.XMLHttpRequest) // if Mozilla, Safari etc
								return new XMLHttpRequest()
							else
								return false
						}
						
						function submitPlayerForm() {
							var formElements = [];
							formElements.push('home_scoretxt');
							formElements.push('away_scoretxt');
							formElements.push('beertxt');
							formElements.push('bottletxt');
							formElements.push('beermoneytxt');
							
							var postString = '';
							for (var i = 0; i < formElements.length; ++i) {
								var item = document.getElementById(formElements[i]);
								postString += item.name + "=" + item.value + "&";
							}
							
							postString += "submit=true";
							
							var mypostrequest=new ajaxRequest()
							mypostrequest.onreadystatechange=function(){
								if (mypostrequest.readyState==4){
									if (mypostrequest.status==200 || window.location.href.indexOf("http")==-1){
										document.getElementById("dataview").innerHTML=mypostrequest.responseText;
									} else {
										alert("An error has occured making the request")
									}
								}
							}
							
							mypostrequest.open("POST", "match_php.php", true)
							mypostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
							mypostrequest.send(postString)
						}
					</script>
					
					<div style="width: 70%; text-align: center; margin: 0px auto">
						<div class="col-xs-12" style="display: block; margin-bottom: 0px auto; margin: 0px auto; width: 150px">
							<span style="font-size: 36px; border-radius: 1em;" class="label label-info"><strong>Update Previous Game Details</strong></span> 
						</div>
					</div>
					<form action="javascript:submitPlayerForm();">
					
						<div class="row" style="padding-left: 10%">
							<div class="col-xs-10">
								<div class="input-group input-group-lg">
									<span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
									<input type="number" id="home_scoretxt" name="home_scoretxt" placeholder="home score" class="form-control" required/>
								</div>
							</div>
						</div>
						
						<div class="row" style="padding-left: 10%">
							<div class="col-xs-10">
								<div class="input-group input-group-lg">
									<span class="input-group-addon"><span class="glyphicon glyphicon-road"></span></span>
									<input type="number" id="away_scoretxt" name="away_scoretxt" placeholder="away score" class="form-control" required>
								</div>
							</div>
						</div>
						
						<div class="row" style="padding-left: 10%">
							<div class="col-xs-10">
								<div class="input-group input-group-lg">
									<span class="input-group-addon"><span class="glyphicon glyphicon-glass"></span></span>
									<input type="text" id="beertxt" name="beertxt" placeholder="drinks man" class="form-control" >
								</div>
							</div>
						</div>
						
						<div class="row" style="padding-left: 10%">
							<div class="col-xs-10">
								<div class="input-group input-group-lg">
									<span class="input-group-addon"><span class="glyphicon glyphicon-fire"></span></span>
									<input type="text" id="bottletxt" name="bottletxt" placeholder="bottle man" class="form-control">
								</div>
							</div>
						</div>
						
						<div class="row" style="padding-left: 10%">
							<div class="col-xs-10">
								<div class="input-group input-group-lg">
									<span class="input-group-addon"><span class="glyphicon glyphicon-piggy-bank"></span></span>
									<input type="number" id="beermoneytxt" name="beermoneytxt"  placeholder="drank money" class="form-control" required>
								</div>
							</div>
						</div>
						
						<div class="span12">
						  
							<h1><button type="submit" class="btn btn-info btn-lg" name="submit" value="sumbit" >
								<span class="glyphicon glyphicon-thumbs-up"></span> Submit
							  </button></h1>
						 
						</div>
			
					</form>
					<div class="dataview" id="dataview";>
						<ul class="viewlist">
						
						</ul>
					</div>

				</div>
			</div>	
				  
				  <!-- <div style="height: 900px; line-height: 900px; " class="spacer">&nbsp;</div> -->
				</div>
				
		  </div>
			
			
	</body>

</html>
