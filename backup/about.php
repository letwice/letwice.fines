<!DOCTYPE html>
<html>
	<head>
		<title>Player Info</title>
		<link rel="stylesheet" src="global.css" href="global.css"/>
		<link rel="stylesheet" href="/bootstrap.css">
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
								<a href="./index.php" title="Home.html"><img src="./siteimages/buttonHome.png" alt="" style="border: none; height: 32px; width: 86px; "></a>
							</td>
							<td>
								<img src="./siteimages/buttonDraft.png" alt="" style="border: none; height: 32px; width: 121px; ">
							</td>
							<td>
								<a href="./about.php" title="Report.html"><img src="./siteimages/buttonInfo.png" alt="" style="border: none; height: 32px; width: 66px; "></a>
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
							formElements.push('player_nametxt');
							formElements.push('player_surname');
							
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
							
							mypostrequest.open("POST", "search.php", true)
							mypostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
							mypostrequest.send(postString)
						}
					</script>
					<form action="javascript:submitPlayerForm();">
						<h2><table>
							<tr><td>
							<label value="FirstName">First Name</label></td><td>
							<input type="text" id="player_nametxt" name="player_name" placeholder="Name"/></td>
							<tr><td>
							<label value="LastName">Last Name</label></td><td>
							<input type="text" id="player_surname" name="player_surname" placeholder="Surname"/> </td>
						</table></h2>
						<button type="search" name="search" value="sumbit">Search</button>
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
