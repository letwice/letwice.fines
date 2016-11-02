<?php
	 include("connect.php");
	$select = new mysqli($servername, $username, $password, $dbname);
	if ($select->connect_error) {
		die("Connection failed: " . $select->connect_error);
	}
	
	$sql = "select address From teams where team = (select home_team from games where game_state = 1 order by game_id limit 1);";
	$map_url = "";
	if (mysqli_multi_query($select, $sql)) {
		do {
			/* store first result set */
			
			if ($result = mysqli_store_result($select)) {
				while ($row = mysqli_fetch_row($result)) {
							$map_url = $row[0];
					}
						
					//printf("%s\n", $row[0]);
				
				mysqli_free_result($result);
			}
		} while (mysqli_more_results($select) && mysqli_next_result($select));
	} 
	
	echo "<iframe src=".$map_url." width=\"400\" height=\"300\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>";
	
	mysqli_close($select);
					
?>