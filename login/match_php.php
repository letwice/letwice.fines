
<?php 
	include('validate.php');

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  $homeScore= $_POST["home_scoretxt"];
	  $awayScore = $_POST["away_scoretxt"];
	  $beerPerson = $_POST["beertxt"];
	  $bottlePerson = $_POST["bottletxt"];
	  $beerMoney = $_POST["beermoneytxt"];
	}

	$gameID = "";
	$gameDate ="";

	include($_SERVER['DOCUMENT_ROOT']."/connect.php");

	$select = new mysqli($servername, $username, $password, $dbname);
	$sql = "SELECT game_id, date FROM games where game_state = 1 Order By date LIMIT 1";
	$result = $select->query($sql);
	if (!$result) {
		trigger_error('Invalid query: ' . $select->error);
	}
	if ($result->num_rows > 0) 
	{
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			$gameID = $row["game_id"];
			$gameDate = $row["date"];
		}
	}
		
	mysqli_close($select);
	
	//Create connection
	$mysqli = new mysqli($servername, $username, $password, $dbname);
	if ($mysqli->connect_error) {
		die("Connection failed: " . $mysqli->connect_error);
	}
		
	
	$sql = "UPDATE games SET game_state=0,home_score=".$homeScore.",away_score=".$awayScore." WHERE game_id = ".$gameID.";";
	$sql .= "INSERT INTO `drinks`(`beers`, `bottle`, `beers_sales`, `game_date`) VALUES ('".$beerPerson."','".$bottlePerson."',".$beerMoney.",'".$gameDate."');";
	if ($mysqli->multi_query($sql) === TRUE) 
	{
		echo "<h1 style=\"color:green; display: block\" align=\"center\">Game on date".$gameDate." has been updated successfully.</h1>";
		
	} 
	else 
	{
		echo "<h1 style=\"color:red; display: block\" align=\"center\">Error on the update: " . $sql . "<br>" . $mysqli->error."</h1>";
	}
	

	mysqli_close($mysqli);
	
?>
