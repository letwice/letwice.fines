<?php 

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
		
	$sql = "SELECT `Player_Id`, CONCAT(`LastName`,' ',`FirstName`) as fullName FROM players where Player_Id not in (select player_id from transactions where date = CURDATE() and amount >= 0  group by player_id having IFNULL(sum(amount),0) < 2000)";

	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) 
	{
		 $x = "";

		echo "<table>
		<tr><th>Person fined</th><th>Type of Fine</th><th>Person finning</th></tr>
		<tr><td><select id=\"fineelist\" required> <option value=\"\" disabled=\"disabled\" selected=\"selected\" >Please select a name</option>";
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			$x ++;
			$class = ($x%2 == 0)? 'background-color:#fff': 'background-color:#ccc';
			echo "<option class=\"".$class."\" value=\"".$row["Player_Id"]."\">".$row["fullName"]."</option>";
			//echo "<tr style=\"".$class."\"><td>".$row["firstName"]." ".$row["lastName"]."</td><td>".$row["nickname"]."</td><td>".$row["phonenumber"]."</td><td>".$row["emailadd"]."</td><td>".$row["nextofkin"]."</td><td>".$row["nextofkinphone"]."</td><td>".$row["Balance"]."</td></tr>";
		}
		echo "</select></td>";
	}
	
	$sql = "SELECT `TransType_Id`,`Name` FROM `transaction_types`;";
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) 
	{
		 $x = "";

		echo "<td><select id=\"finetypelist\" required> <option value=\"\" disabled=\"disabled\" selected=\"selected\" >Please select a fine type</option>";
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			$x ++;
			$class = ($x%2 == 0)? 'background-color:#fff': 'background-color:#ccc';
			echo "<option class=\"".$class."\" value=\"".$row["TransType_Id"]."\">".$row["Name"]."</option>";
			//echo "<tr style=\"".$class."\"><td>".$row["firstName"]." ".$row["lastName"]."</td><td>".$row["nickname"]."</td><td>".$row["phonenumber"]."</td><td>".$row["emailadd"]."</td><td>".$row["nextofkin"]."</td><td>".$row["nextofkinphone"]."</td><td>".$row["Balance"]."</td></tr>";
		}
		echo "</select></td>";
	}
	$sql = "SELECT `Player_Id` as finedplayer, CONCAT(`LastName`,' ',`FirstName`) as finedfullName FROM players;";
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) 
	{
		 $x = "";

		echo "<td><select id=\"finerlist\"> <option value=\"\" disabled=\"disabled\" selected=\"selected\" >Please select a fined player</option>";
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			$x ++;
			$class = ($x%2 == 0)? 'background-color:#fff': 'background-color:#ccc';
			echo "<option class=\"".$class."\" value=\"".$row["finedplayer"]."\">".$row["finedfullName"]."</option>";
			//echo "<tr style=\"".$class."\"><td>".$row["firstName"]." ".$row["lastName"]."</td><td>".$row["nickname"]."</td><td>".$row["phonenumber"]."</td><td>".$row["emailadd"]."</td><td>".$row["nextofkin"]."</td><td>".$row["nextofkinphone"]."</td><td>".$row["Balance"]."</td></tr>";
		}
		echo "</select></td></tr>";
	}
	echo "<tr><td></td><td><select id=\"amountlist\" required> <option value=\"\" disabled=\"disabled\" selected=\"selected\" >SELECT AMOUNT</option>
						   <option value=\"100\">R 1.00</option>
						  <option value=\"200\">R 2.00</option>
						  <option value=\"500\">R 5.00</option>
						  <option value=\"1000\">R 10.00</option>
						  <option value=\"2000\">R 20.00</option>
						  <option value=\"5000\">R 50.00</option>
						  <option value=\"10000\">R 100.00</option>
						</select></td></tr><td></td></table>";
	mysqli_close($mysqli);				
?>
