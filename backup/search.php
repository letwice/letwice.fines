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
	  $tranType = $_POST["tran_type"];
	}
	
	include("connect.php");

	//Create connection
	$mysqli = new mysqli($servername, $username, $password, $dbname);
	if ($mysqli->connect_error) {
		die("Connection failed: " . $mysqli->connect_error);
	}
	// user Information
	if ($tranType == 1) {
			$sql = "SELECT lastName,firstName,nickname,phonenumber,emailadd,nextofkin,nextofkinphone,CAST(Balance/100 as DECIMAL(7,2)) as Balance FROM players p INNER JOIN player_balance pb ON p.Player_Id = pb.Player_id WHERE firstName like '%".$playerName."%' AND lastName like '%".$playerSurname."%';";
		
		$result = $mysqli->query($sql);
		if (!$result) {
			trigger_error('Invalid query: ' . $mysqli->error);
		}
		if ($result->num_rows > 0) 
		{
			 $x = "";

			echo "<br><table><colgroup>
		   <col span=\"1\" style=\"width: 25%;\">
		   <col span=\"1\" style=\"width: 12%;\">
		   <col span=\"1\" style=\"width: 11%;\">
		   <col span=\"1\" style=\"width: 19%;\">
		   <col span=\"1\" style=\"width: 12%;\">
		   <col span=\"1\" style=\"width: 11%;\">
		   <col span=\"1\" style=\"width: 10%;\">
		</colgroup><tr style=\"background-color:#ffab0a\" ><th style=\"text-align: center\">Full Name</th><th>Nick Name</th><th style=\"text-align: center\">Phone Number</th><th style=\"text-align: center\">Email</th><th style=\"text-align: center\">Next of Kin</th><th style=\"text-align: center\">Kin Phone Number</th><th>Balance</th></tr>";
			// output data of each row
			while($row = $result->fetch_assoc()) 
			{
				$x ++;
				$class = ($x%2 == 0)? 'background-color:#fff': 'background-color:#ccc';
				echo "<tr style=\"".$class."\"><td>".$row["firstName"]." ".$row["lastName"]."</td><td>".$row["nickname"]."</td><td>0".$row["phonenumber"]."</td><td>".$row["emailadd"]."</td><td>".$row["nextofkin"]."</td><td>0".$row["nextofkinphone"]."</td><td> R ".$row["Balance"]."</td></tr>";
			}
			echo "</table>";
		}
		
		else 
		{
			echo "<br><div style=\"width: 100%; text-align: center\">
						<div style=\"display: inline-block\"><span style=\"font-size: 30px; border-radius: 1em; width: 150px\" class=\"label label-warning\"><strong><span class=\"glyphicon glyphicon-globe\"></span> No user found <strong><span class=\"glyphicon glyphicon-search\"></span></strong></span> </div>
					</div>"."<br>";
		}
	} else if ($tranType == 2) {             	// Transaction Information
		
				$sql = "SELECT CONCAT(p.LastName, ' ', p.FirstName) AS PlayerName,tt.name AS TransType, CONCAT(p2.LastName ,' ', p2.FirstName) AS finedBY,t.date,CAST(IFNULL(t.amount, 0)/100 as DECIMAL (7,2)) as amount, CAST(IFNULL(t.balance, 0)/100 as DECIMAL (7,2)) as balance  FROM players p 
				INNER JOIN transactions t  on p.player_id = t.player_id 
				LEFT JOIN players p2  on p2.player_id = t.PlayerFrom
				INNER JOIN transaction_types tt on t.transtype = tt.transtype_id
				WHERE t.TransType <> 1 AND p.FirstName like '%".$playerName."%' AND p.LastName like '%".$playerSurname."%'
				Order by trans_id;";
		// SELECT CAST(IFNULL(SUM(beers_sales),0) as DECIMAL(7,2))

		$result = $mysqli->query($sql);
		if (!$result) {
			trigger_error('Invalid query: ' . $mysqli->error);
		}
		if ($result->num_rows > 0) 
		{
			 $x = "";

			echo "<br><table><colgroup>
		   <col span=\"1\" style=\"width: 25%;\">
		   <col span=\"1\" style=\"width: 12%;\">
		   <col span=\"1\" style=\"width: 11%;\">
		   <col span=\"1\" style=\"width: 19%;\">
		   <col span=\"1\" style=\"width: 12%;\">
		   <col span=\"1\" style=\"width: 11%;\">
		</colgroup><tr style=\"background-color:#ffab0a; text-align: center \"><th style=\"text-align: center\">Full Name</th><th>Transaction Type</th><th style=\"text-align: center\">By</th><th style=\"text-align: center\">Date</th><th style=\"text-align: center\">Amount</th><th style=\"text-align: center\">New Balance</th></tr>";
			// output data of each row
			while($row = $result->fetch_assoc()) 
			{
				$x ++;
				$class = ($x%2 == 0)? 'background-color:#fff': 'background-color:#ccc';
				echo "<tr style=\"".$class."\"><td>".$row["PlayerName"]."</td><td>".$row["TransType"]."</td><td>".$row["finedBY"]."</td><td>".$row["date"]."</td><td> R ".$row["amount"]."</td><td> R ".$row["balance"]."</td></tr>";
			}
			echo "</table>";
		}
		
		else 
		{
			echo "<br><div style=\"width: 100%; text-align: center\">
						<div style=\"display: inline-block\"><span style=\"font-size: 30px; border-radius: 1em; width: 150px\" class=\"label label-warning\"><strong><span class=\"glyphicon glyphicon-globe\"></span> No user found <strong><span class=\"glyphicon glyphicon-search\"></span></strong></span> </div>
					</div>"."<br>";
		} 
	}else {                                                  	// beers Information
		$sql = "SELECT beers, bottle, game_date FROM `drinks` WHERE (`beers` like '%".$playerName."%' OR `bottle` like '%".$playerName."%');";
		

		$result = $mysqli->query($sql);
		if (!$result) {
			trigger_error('Invalid query: ' . $mysqli->error);
		}
		if ($result->num_rows > 0) 
		{
			 $x = "";

			echo "<br><table align=\"center\"><colgroup>
		   <col span=\"1\" style=\"width: 25%;\">
		   <col span=\"1\" style=\"width: 25%;\">
		   <col span=\"1\" style=\"width: 11%;\">
		</colgroup><tr style=\"background-color:#ffab0a; text-align: center\"><th style=\"text-align: center\">Beers</th><th style=\"text-align: center\">Bottle</th><th style=\"text-align: center\">Date</th></tr>";
			// output data of each row
			while($row = $result->fetch_assoc()) 
			{
				$x ++;
				$class = ($x%2 == 0)? 'background-color:#fff': 'background-color:#ccc';
				echo "<tr style=\"".$class."\"><td>".$row["beers"]."</td><td>".$row["bottle"]."</td><td>".$row["game_date"]."</td></tr>";
			}
			echo "</table>";
		}
		
		else 
		{
			echo "<br><div style=\"width: 100%; text-align: center\">
						<div style=\"display: inline-block\"><span style=\"font-size: 30px; border-radius: 1em; width: 150px\" class=\"label label-warning\"><strong><span class=\"glyphicon glyphicon-globe\"></span> No user found <strong><span class=\"glyphicon glyphicon-search\"></span></strong></span> </div>
					</div>"."<br>";
		}
	}
	
	

	mysqli_close($mysqli);				
?>
