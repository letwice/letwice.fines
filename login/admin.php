
<?php
	include('validate.php');
?>
<!DOCTYPE html>
<html>

	<head>
		<title>Player Info</title>
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
						<ol class="breadcrumb" style="font-size: 20px">
							<li><a href="../index.php"><strong>Home</strong></a></li>
							<!--?php if ($_SESSION['access_level'] == 2){ ?--------------------------------------------------------------SESSION CODE------------>   
							<li><a href="./match.php"><strong>Match Details</strong></a></li>
							<!--?php } ?-->
							<li class="active"><a href="./admin.php"><strong>Fine Manager</strong><span class="sr-only">(current)</span></a></li>
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
						
						function submitFinePlayerForm() {
							var formElements = [];
							formElements.push('finerlist');
							formElements.push('finetypelist');
							formElements.push('fineelist');
							formElements.push('amountlist');
							
							var postString = '';
							for (var i = 0; i < formElements.length; ++i) {
								var item = document.getElementById(formElements[i]);
								console.log("fetching" + formElements[i]) ;
								postString += formElements[i] + "=" + item.options[item.selectedIndex].value + "&";
								console.log("complete fgetched");
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
							
							mypostrequest.open("POST", "insertFine.php", true)
							mypostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
							mypostrequest.send(postString)
						}
						
						function requestPlayers() {
							
							var mypostrequest=new ajaxRequest()
							mypostrequest.onreadystatechange=function(){
								if (mypostrequest.readyState==4){
									if (mypostrequest.status==200 || window.location.href.indexOf("http")==-1){
										document.getElementById("dataview2").innerHTML=mypostrequest.responseText;
									} else {
										alert("An error has occured making the request");
									}
								}
							}
							
							mypostrequest.open("GET", "trans.php", true);
							mypostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
							mypostrequest.send("");
						}
						requestPlayers();
					</script>
					<form action="javascript:submitFinePlayerForm();">
						<div class="home_details">
						<?php
							$output ="";
							ob_start();
							include("trans.php");
							$output = ob_get_contents();
							
							ob_end_clean();
							echo $output;
						?>
					</div>
						<!--button type="search" name="search" value="sumbit" style ="width: 216px;height:96">Submit</button></h3-->
						<div class="span10">
						  
							<button type="search" class="btn btn-info btn-lg" name="search" value="sumbit" style="height: 70px; font-size:30px" >
								<span class="glyphicon glyphicon-search"></span> Submit
							  </button>
						 
						</div>
					</form>
					<div class="dataview" id="dataview";>
						<ul class="viewlist">
						
						</ul>
					</div>
				</div>
			</div>	
			
						
			
	</body>

</html>
