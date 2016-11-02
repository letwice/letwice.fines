<?php
	include("connect.php");
	$results = new mysqli($servername, $username, $password, $dbname);
	if ($results->connect_error) {
		die("Connection failed: " . $results->connect_error);
	}
		
	$sql = "SELECT `home_team`, `away_team`, `home_score`, `away_score`,`date` FROM `games` WHERE `game_state` = 0 ORDER BY `date` desc LIMIT 1;";

	$result = $results->query($sql);
	if (!$result) {
		trigger_error('Invalid query: ' . $results->error);
	} ?>
	
	<div style="width: 50%; text-align: center; margin: 0px auto">
			<div style="display: block; margin-bottom: 0px auto; margin: 0px auto; width: 190px">
				<span style="font-size: 30px; border-radius: 1em" class="label label-info"><strong>Last Result</strong></span> 
			</div>
	
	<?php
	if ($result->num_rows > 0) 
	{
		 $x ="";

		?>
		
		<table><colgroup>
			   <col span="1" style="width: 25%">
			   <col span="1" style="width: 8%">
			   <col span="1" style="width: 9%">
			   <col span="1" style="width: 8%">
			   <col span="1" style="width: 25%">
			   <col span="1" style="width: 25%">
			   </colgroup><tr>
			   <th><span style="font-size: 15px; border-radius: 1em;  background-color: #ffab0a; width: 100%; display: block" class="label label-success">Home Team</span></th>
			   <th></th>
			   <th></th>
			   <th></th>
			   <th><span style="font-size: 15px; border-radius: 1em;  background-color: #ffab0a; width: 100%; display: block" class="label"> Away Team</span></th>
			   <th><span style="font-size: 15px; border-radius: 1em;  background-color: #ffab0a; width: 100%; display: block" class="label">Date</span></th></tr>
		
		<?php 
		while($row = $result->fetch_assoc()) 
		{
			$x ++;
			$class = ($x%2 == 0)? 'background-color:#fff': 'background-color:#ccc';
			?>
			<tr align="center"><td><span style="font-size: 15px;  color:black; border-radius: 1em; width: 100%; display: block" class="label label-info"><?php echo $row["home_team"] ?></span></td>
			<td><span style="font-size: 15px; color:black; border-radius: 1em; width: 100%; display: block" class="label label-info"><?php echo $row["home_score"] ?></span></td>
			<td><span style="font-size: 15px; color:black; border-radius: 1em; width: 100%; display: block" class="label label-info">VS</span></td>
			<td><span style="font-size: 15px; color:black; border-radius: 1em; width: 100%; display: block" class="label label-info"><?php echo $row["away_score"] ?></span></td>
			<td><span style="font-size: 15px; color:black; border-radius: 1em; width: 100%; display: block" class="label label-info"><?php echo $row["away_team"] ?></span></td>
			<td><span style="font-size: 15px; color:black; border-radius: 1em; width: 100%; display: block" class="label label-info"><?php echo $row["date"] ?></span></td></tr>"
		<?php 
		}
		?>
		</table>
	<?php 
	}
	
	else 
	{   ?>
		We haven't Flexed our muscels yet<br>
	<?php 
	}

	mysqli_close($results);	

	$fixture = new mysqli($servername, $username, $password, $dbname);
	if ($fixture->connect_error) {
		die("Connection failed: " . $fixture->connect_error);
	}
	
	$sql = "SELECT `home_team`, `away_team`,`date` FROM `games` WHERE `game_state` = 1 ORDER BY `date` LIMIT 5;";

	$result = $fixture->query($sql);
	if (!$result) {
		trigger_error('Invalid query: ' . $fixture->error);
	}
	?>
	<br>
	<div style="display: block; margin-bottom: 30px auto; margin: 0px auto; width: 150px">
				<span style="font-size: 30px; border-radius: 1em;" class="label label-info"><strong>Fixtures</strong></span> 
			</div> <br>
	<?php 
	if ($result->num_rows > 0) 
	{
		 $x = "";

		?>
		<table><colgroup>
	   <col span="1" style="width: 33%;">
	   <col span="1" style="width: 10%;">
	   <col span="1" style="width: 33%;">
	   <col span="1" style="width: 45%;">
	   </colgroup><tr>
	   <th><span style="font-size: 15px; border-radius: 1em;  background-color: #ffab0a; width: 100%; display: block" class="label label-success">Home Team</span></th>
	   <th></th>
	   <th><span style="font-size: 15px; border-radius: 1em;  background-color: #ffab0a; width: 100%; display: block" class="label label-success">Away Team</span></th>
	   <th><span style="font-size: 15px; border-radius: 1em;  background-color: #ffab0a; width: 100%; display: block" class="label label-success">Date</span></th></tr>
		<?php
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			$x ++;
			$class = ($x%2 == 0)? '#96cae8': '#c1e8ff';
			?>
			<tr style="<?php echo $class ?>" align="center">
			<td><span style="font-size: 15px; border-radius: 1em; color:black;  background-color: <?php echo $class ?>; width: 100%; display: block" class="label" ><?php echo $row["home_team"] ?></span></td>
			<td><span style="font-size: 15px; border-radius: 1em; color:black;  background-color: <?php echo $class ?>; width: 100%; display: block" class="label">vs</span></td>
			<td><span style="font-size: 15px; border-radius: 1em; color:black;  background-color: <?php echo $class ?>; width: 100%; display: block" class="label"><?php echo $row["away_team"] ?></span></td>
			<td><span style="font-size: 15px; border-radius: 1em; color:black;  background-color: <?php echo $class ?>; width: 100%; display: block" class="label"><?php echo $row["date"] ?></span></td></tr>
		<?php 
		}
		?> 
		</table>
		</div>
	<?php
	}
	
	else 
	{
		?> We are done for the season folks"
		</div>
		<?php
	}

	mysqli_close($fixture);	
					
?>