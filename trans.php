<?php 

	include($_SERVER['DOCUMENT_ROOT']."/connect.php");
	/*$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "fines"; */

	//Create connection
	$mysqli = new mysqli($servername, $username, $password, $dbname);
	if ($mysqli->connect_error) {
		die("Connection failed: " . $mysqli->connect_error);
	}
		
	$sql = "SELECT `Player_Id`, CONCAT(`FirstName`,' ',`LastName`) as fullName FROM players where Player_Id not in (select player_id from transactions where date = CURDATE() and TransType in (3,4)  group by player_id having IFNULL(sum(amount),0) > 2000) order by FirstName";

	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) 
	{
		 $x = "";

		?>
		<table>
		<tr><th>Person fined</th><th>Type of Fine</th><th>Person finning</th></tr>
		<tr><td><select id="fineelist" required> <option value="" disabled="disabled" selected="selected" >Please select a name</option>
		<?php
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			$x ++;
			$class = ($x%2 == 0)? 'background-color:#fff': 'background-color:#ccc';
			?>
			<option class="<?php echo $class ?>" value="<?php echo $row["Player_Id"] ?>"><?php echo $row["fullName"] ?></option>
		<?php
		}
		?></select></td>
	<?php
	}
	
	$sql = "SELECT `TransType_Id`,`Name` FROM `transaction_types`;";
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) 
	{
		 $x = "";

		?>
		<td><select id="finetypelist" required> <option value="" selected="selected" >Please select a fine type</option>
		<?php
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			$x ++;
			$class = ($x%2 == 0)? 'background-color:#fff': 'background-color:#ccc';
			?>
			<option class="<?php echo $class ?>" value="<?php echo $row["TransType_Id"] ?>"><?php echo $row["Name"] ?></option>
	<?php	}
		?>
		</select></td>
	<?php 
	}
	$sql = "SELECT `Player_Id` as finedplayer, CONCAT(`LastName`,' ',`FirstName`) as finedfullName FROM players;";
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) 
	{
		 $x = "";

		?>
		<td><select id="finerlist"> <option value="" selected="selected" >Please select a fined player</option>
		<?php
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			$x ++;
			$class = ($x%2 == 0)? 'background-color:#fff': 'background-color:#ccc';
			?>
			<option class="<?php echo $class ?>" value="<?php echo $row["finedplayer"] ?>"><?php echo $row["finedfullName"] ?></option>
		<?php	}
		?>
		</select></td></tr>
	<?php	}
		
			mysqli_close($mysqli);				
?>
	<tr><td></td><td><select id="amountlist" required> <option value="" disabled="disabled" selected="selected" >SELECT AMOUNT</option>
						   <option value="100">R 1.00</option>
						  <option value="200">R 2.00</option>
						  <option value="500">R 5.00</option>
						  <option value="1000">R 10.00</option>
						  <option value="2000">R 20.00</option>
						  <option value="5000">R 50.00</option>
						  <option value="10000">R 100.00</option>
						</select></td></tr><td></td></table>

