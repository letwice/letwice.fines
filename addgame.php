<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
		<link rel="stylesheet" src="global.css" href="global.css"/>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
					<table>
						<tr>
							<td>
								<a href="./index.html" title="Home.html"><img src="./siteimages/buttonHome.png" alt="" style="border: none; height: 32px; width: 86px; "></a>
							</td>
							<td>
								<a href="./admin.html" title="Home.html"><img src="./siteimages/buttonDraft.png" alt="" style="border: none; height: 32px; width: 121px; "></a>
							</td>
							<td>
								<a href="./report.html" title="Report.html"><img src="./siteimages/buttonInfo.png" alt="" style="border: none; height: 32px; width: 66px; "></a>
							</td>
						</tr>
					</table>					
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
							
							mypostrequest.open("POST", "match.php", true)
							mypostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
							mypostrequest.send(postString)
						}
					</script>
					<h1><strong>Game Summary</strong></h1>
					<form action="javascript:submitPlayerForm();">
							<div class="input-group">
							  <span class="input-group-addon" id="home_team">Home Team</span>
							  <input type="text" id="home_teamtxt" name="away_teamtxt" class="form-control" placeholder="Home Team" aria-describedby="sizing-addon1" required>
							</div>
							<!--input type="number" id="away_teamtxt" name="away_teamtxt" placeholder="away score" required/--> 
							<div class="input-group">
							
							 <span class="input-group-addon" id="away_team">Away Team </span>
							
							  <input type="text" id="away_teamtxt" name="away_teamtxt" class="form-control" placeholder="Away Team" aria-describedby="sizing-addon1" required>
							</div>
	
							<div class="container">
							<div class="row">
								<div class='col-sm-6'>
									<div class="form-group">
										<div class='input-group date' id='datetimepicker1'>
											<input type='text' class="form-control" />
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
									</div>
								</div>
								<script type="text/javascript">
									$(function () {
										$('#datetimepicker1').datetimepicker();
									});
								</script>
							</div>
						</div>

						<button type="submit" class="btn btn-primary btn-lg">        Submit        </button>
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
