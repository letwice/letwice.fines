
<?php 

	function test_input($data)
	{
	   $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  $playerName = test_input($_POST["player_name"]);
	  $playerSurname = test_input($_POST["player_surname"]);
	  $playerNick = test_input($_POST["player_nick"]);
	  $playerPhone = test_input($_POST["player_phone"]);
	  $kinName = test_input($_POST["kin_name"]);
	  $kinPhone = test_input($_POST["kin_phone"]);
	  $playerMail = test_input($_POST["player_email"]);
	}

	//function test_input($data) {
	 // $data = trim($data);
	//  $data = stripslashes($data);
	//  $data = htmlspecialchars($data);
	//  return $data;
	//}
	/*if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (empty($_POST["submit"])) {
			$nameErr = "Name is required";
		  } else {
			$playerName = test_input($_POST["player_name"]);
		  }

		  if (empty($_POST["submit"])) {
			$surnameErr = "Surname is required";
		  } else {
			$playerSurname = test_input($_POST["player_surname"]);
		  }

		  if (empty($_POST["submit"])) {
			$phoneErr = "Phone number is required";
		  } else {
			$playerPhone = test_input($_POST["player_phone"]);
		  }

		  if (empty($_POST["submit"])) {
			$kinErr = "Next of Kin is required";
		  } else {
			$kinName = test_input($_POST["kin_name"]);
		  }

		  if (empty($_POST["submit"])) {
			$kinphoneErr = "Next of Kin phone number is required";
		  } else {
			$kinPhone = test_input($_POST["kin_phone"]);
		  }
		  
		   if (empty($_POST["submit"])) {
			$playerNick = "";
		  } else {
			$playerNick = test_input($_POST["player_nick"]);
		  }
		  if (empty($_POST["submit"])) {
			$playerMail = "";
		  } else {
			$playerMail = test_input($_POST["player_email"]);
		  }
		}
	*/
	$rbi = 0;
	$strikeouts = 0;
	$homeruns = 0;
	
	include("connect.php");
	/*$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "fines"; */

	//Create connection
	$mysqli = new mysqli($servername, $username, $password, $dbname);
	if ($mysqli->connect_error) {
		die("Connection failed: " . $mysqli->connect_error);
	}	
	
	$status ="";
	$last_id = "";
	$stmt = $mysqli->prepare("INSERT INTO players (lastName,firstName,nickname,phonenumber,emailadd,nextofkin,nextofkinphone,rbi,strikeouts,homeruns) VALUES (?,?,?,?,?,?,?,?,?,?)");
	$stmt->bind_param('sssissiiii', $playerSurname,$playerName,$playerNick,$playerPhone,$playerMail,$kinName,$kinPhone,$rbi,$strikeouts,$homeruns);
			
			/*VALUES ('".$playerSurname."','".$playerName."','".$playerNick."','".$playerPhone."','".$playerMail."','".$kinName."','".$kinPhone."','0','0','0');";

			
								
										$stmt = $mysqli->prepare("INSERT INTO CountryLanguage VALUES (?, ?, ?, ?)");
					$stmt->bind_param('sssd', $code, $language, $official, $percent);

					$code = 'DEU';
					$language = 'Bavarian';
					$official = "F";
					$percent = 11.2;

					/* execute prepared statement */
		if($stmt->execute()) {
			$last_id = $stmt->insert_id;	
		} else {
			IF ($stmt->errno == 1062) {
				echo "<div style=\"width: 100%; text-align: center\">
						<div style=\"display: inline-block\"><span style=\"font-size: 30px; border-radius: 1em; width: 150px\" class=\"label label-danger\"><strong><span class=\"glyphicon glyphicon-floppy-remove\"></span> Insert failed.</strong></span> </div> <br>
						<div style=\"display: inline-block\"><span style=\"font-size: 18px; border-radius: 1em; width: 150px\" class=\"label label-danger\"> * Review your data or check if the user doesn't already exist</span> </div><br>
						<div style=\"display: inline-block\"><span style=\"font-size: 18px; border-radius: 1em; width: 150px\" class=\"label label-danger\"> Than try again.</span> </div>
					</div>";
			}
		}
		

			
	if (!empty($last_id) )
	{
		$sql = "INSERT INTO player_balance(player_id,balance)
				VALUES ('".$last_id."','0');";
		$sql .= "INSERT INTO transactions(player_id,transtype,playerfrom,amount,balance)
				VALUES ('".$last_id."','1',NULL,'0','0');";
		if ($mysqli->multi_query($sql) === TRUE) 
		{
			echo "";
			
		} 
		else 
		{
			echo "Error on 2nd insert: " . $sql . "<br>" . $mysqli->error."<br>";
			$status = "broken";
		}
	}
	else 
	{
		//echo "Error on 1st insert: " . $sql . "<br>" . $mysqli->error."<br>";

		$status = "broken";
	}
	mysqli_close($mysqli);
	
	 IF (empty($status)) {
		 
		$select = new mysqli($servername, $username, $password, $dbname);
		$sql = "SELECT player_id, firstname , lastname FROM players where player_id = '".$last_id."'";
		$result = $select->query($sql);
		if (!$result) {
			trigger_error('Invalid query: ' . $select->error);
		}
		if ($result->num_rows > 0) 
		{
		//	echo "<table><colgroup>
		//				   <col span=\"1\" style=\"width: 15%;\">
		//				   <col span=\"1\" style=\"width: 50%;\">
		//				   <col span=\"1\" style=\"width: 35%;\">
		//				</colgroup><tr style=\"background-color:#ffab0a\"><th><strong>ID</strong></th><th><strong>Name</strong></th><th><strong>Status</strong></th></tr>";
			// output data of each row
			while($row = $result->fetch_assoc()) 
			{
				echo "<div style=\"width: 100%; text-align: center\">
						<div style=\"display: inline-block\"><span style=\"font-size: 30px; border-radius: 1em; width: 150px\" class=\"label label-success\"><strong><span class=\"glyphicon glyphicon-floppy-saved\"></span>  ".$row["firstname"]." ".$row["lastname"]." was created successfully</strong></span> </div>
					</div>";
				//echo "<tr><td>".$row["player_id"]."</td><td>".$row["firstname"]." ".$row["lastname"]."</td><td>Successfully Created</td></tr>";
			}
			//echo "</table>";
		}
		
		else 
		{
			echo "SELECT Failed"."<br>";
		}

		mysqli_close($select);	
	}	
?>
