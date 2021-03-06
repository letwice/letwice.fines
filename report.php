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
						<ol class="breadcrumb" style="font-size: 20px">
							<li><a href="./index.php"><strong>Home</strong></a></li>
							<li><a href="./draftplayer.php"><strong>Draft Player</strong></a></li>
							<li class="active"><a href="./report.php"><strong>Report</strong><span class="sr-only">(current)</span></a></li>
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
							formElements.push('player_nametxt');
							formElements.push('player_surname');
							
							var postString = '';
							for (var i = 0; i < formElements.length; ++i) {
								var item = document.getElementById(formElements[i]);
								postString += item.name + "=" + item.value + "&";
							}
							
							var tran_type;

							if (document.getElementById('tr1').checked) {
								tran_type = document.getElementById('tr1').value;
								postString +="tran_type=" + tran_type + "&";
							}else if (document.getElementById('tr2').checked) {
								tran_type = document.getElementById('tr2').value;
								postString +="tran_type=" + tran_type + "&";
							}else if (document.getElementById('tr3').checked){
								tran_type = document.getElementById('tr3').value;
								postString +="tran_type=" + tran_type + "&";
							}
							
						/*	var radios = formElements = [];
							formElements.push('tran_type');
    
							// loop through list of radio buttons
							for (var i=0, len=radios.length; i<len; i++) {
								if ( radios[i].checked ) { // radio checked?
									var item2 = document.getElementById(formElements[i]);
									postString +="tran_type=" + item2.value + "&"; // if so, hold its value in val
									break; // and break out of for loop
								}
							} */
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
							
							mypostrequest.open("POST", "search.php", true)
							mypostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
							mypostrequest.send(postString)
						}
					</script>
					<form action="javascript:submitPlayerForm();">
						<h2>
						<div class="row" style="padding-left: 10%">
							<div class="col-xs-10">
								<div class="input-group input-group-lg">
									<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
									<input type="text" id="player_nametxt" name="player_name" placeholder="First Name" class="form-control">
								</div>
							</div>
						</div>
							<!--label value="FirstName">First Name</label></td><td>
							<input type="text" id="player_nametxt" name="player_name" placeholder="Name"/-->
						<div class="row" style="padding-left: 10%" >
							<div class="col-xs-10">
								<div class="input-group input-group-lg">
									<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
									<input type="text" id="player_surname" name="player_surname" placeholder="Surname" class="form-control">
								</div>
							</div> 
						</div>
							<!--label value="LastName">Last Name</label></td><td>
							<input type="text" id="player_surname" name="player_surname" placeholder="Surname"/-->
						<br><div class="col-md-12" style="padding-left: 23%">
							<table><tr><th></th><th>
								<label class="label label-success">
									<input checked="checked" data-val="true" data-val-required="Select the type of report you want." id="tr1" name="tran_type" type="radio" value="1">
									User Info
								</label>
								</th><th>
								<label class="label label-primary">
									<input id="tr2" name="tran_type" type="radio" value="2">
									Transactions
								</label>
								</th><th>
								<label class="label label-info">
									<input id="tr3" name="tran_type" type="radio" value="3">
									Beers
								</label>
								</th></tr></table>
							</div>
						<br></h2>
						<div class="span12">
						  
							<button type="search" class="btn btn-info btn-lg" name="search" value="sumbit" style="height: 70px; font-size:30px" >
								<span class="glyphicon glyphicon-search"></span> Search
							  </button>
						 
						</div>
						
						<!--button type="search" name="search" value="sumbit" style ="width: 216px;height:96">Search</button-->
					</form>
					<div class="dataview" id="dataview";>
						<ul class="viewlist">
						
						</ul>
					</div>

				</div>
			</div>	
				  
				</div>
				
		  </div>
			
			
	</body>

</html>
