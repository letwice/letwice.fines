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
	}
	echo "<div style=\"width: 100%; text-align: center\">
		<div style=\"display: inline-block\"><span style=\"font-size: 30px; border-radius: 1em; width: 150px\" class=\"label label-success\"><strong>Result</strong></span> </div>
	</div>";
	if ($result->num_rows > 0) 
	{
		 $x = "";

		echo "<div style=\"width: 100%; text-align: center\">
			<div style=\"display: inline-block\"><table><colgroup>
			   <col span=\"1\" style=\"width: 25%;\">
			   <col span=\"1\" style=\"width: 8%;\">
			   <col span=\"1\" style=\"width: 8%;\">
			   <col span=\"1\" style=\"width: 8%;\">
			   <col span=\"1\" style=\"width: 25%;\">
			   <col span=\"1\" style=\"width:25%;\">
			   </colgroup><tr>
			   <th><span style=\"font-size: 15px; border-radius: 1em;  background-color: #ffab0a; width: 100%; display: block\" class=\"label label-success\">Home Team</span></th>
			   <th></th>
			   <th></th>
			   <th></th>
			   <th><span style=\"font-size: 15px; border-radius: 1em;  background-color: #ffab0a; width: 100%; display: block\" class=\"label label-success\"> Away Team</span></th>
			   <th><span style=\"font-size: 15px; border-radius: 1em;  background-color: #ffab0a; width: 100%; display: block\" class=\"label label-success\">Date</span></th></tr>";
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			$x ++;
			$class = ($x%2 == 0)? 'background-color:#fff': 'background-color:#ccc';
			echo "<tr align=\"center\"><td><span style=\"font-size: 15px; border-radius: 1em;  background-color: #5cb85c; width: 100%; display: block\" class=\"label label-success\">".$row["home_team"]."</span></td>
			<td><span style=\"font-size: 15px; border-radius: 1em;  background-color: #5cb85c; width: 100%; display: block\" class=\"label label-success\">".$row["home_score"]."</span></td>
			<td><span style=\"font-size: 15px; border-radius: 1em;  background-color: #5cb85c; width: 100%; display: block\" class=\"label label-success\">VS</span></td>
			<td><span style=\"font-size: 15px; border-radius: 1em;  background-color: #5cb85c; width: 100%; display: block\" class=\"label label-success\">".$row["away_score"]."</span></td>
			<td><span style=\"font-size: 15px; border-radius: 1em;  background-color: #5cb85c; width: 100%; display: block\" class=\"label label-success\">".$row["away_team"]."</span></td>
			<td><span style=\"font-size: 15px; border-radius: 1em;  background-color: #5cb85c; width: 100%; display: block\" class=\"label label-success\">".$row["date"]."</span></td></tr>";
		}
		echo "</table></div></div>";
	}
	
	else 
	{
		echo "We haven't Flexed our muscels yet"."<br>";
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
	echo "<br><div style=\"width: 100%; text-align: center\">
		<div style=\"display: inline-block\"><span style=\"font-size: 30px; border-radius: 1em; width: 150px\" class=\"label label-success\"><strong>Fixtures</strong></span> </div>
	</div>";
	if ($result->num_rows > 0) 
	{
		 $x = "";

		echo "<table><colgroup>
	   <col span=\"1\" style=\"width: 33%;\">
	   <col span=\"1\" style=\"width: 10%;\">
	   <col span=\"1\" style=\"width: 33%;\">
	   <col span=\"1\" style=\"width: 45%;\">
	   </colgroup><tr>
	   <th><span style=\"font-size: 15px; border-radius: 1em;  background-color: #ffab0a; width: 100%; display: block\" class=\"label label-success\">Home Team</span></th>
	   <th></th>
	   <th><span style=\"font-size: 15px; border-radius: 1em;  background-color: #ffab0a; width: 100%; display: block\" class=\"label label-success\">Away Team</span></th>
	   <th><span style=\"font-size: 15px; border-radius: 1em;  background-color: #ffab0a; width: 100%; display: block\" class=\"label label-success\">Date</span></th></tr>";
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			$x ++;
			$class = ($x%2 == 0)? '#fff': '#ccc';
			echo "<tr style=\"".$class."\" align=\"center\">
			<td><span style=\"font-size: 15px; border-radius: 1em;  background-color: ".$class."; width: 100%; display: block\" class=\"label label-success\">".$row["home_team"]."</span></td>
			<td><span style=\"font-size: 15px; border-radius: 1em;  background-color: ".$class."; width: 100%; display: block\" class=\"label label-success\">vs</span></td>
			<td><span style=\"font-size: 15px; border-radius: 1em;  background-color: ".$class."; width: 100%; display: block\" class=\"label label-success\">".$row["away_team"]."</span></td>
			<td><span style=\"font-size: 15px; border-radius: 1em;  background-color: ".$class."; width: 100%; display: block\" class=\"label label-success\">".$row["date"]."</span></td></tr>";
		}
		echo "</table>";
	}
	
	else 
	{
		echo "We are done for the season folks"."<br>";
	}

	mysqli_close($fixture);	
					
?>