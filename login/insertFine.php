<?php 

	//include('validate.php');
	include($_SERVER['DOCUMENT_ROOT']."/connect.php");
	/*$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "fines"; */

		$finer = $_POST["finerlist"];
		$finertype = $_POST["finetypelist"];
		$finee = $_POST["fineelist"];
		$amount = $_POST["amountlist"];
	
	//Get needed values from DB
	
	$select = new mysqli($servername, $username, $password, $dbname);
	if ($select->connect_error) {
		die("Connection failed: " . $select->connect_error);
	}
	
	$finerCurrentBalance = "";
	$fineeCurrentBalance = "";
	$finerBalance = "";
	$fineeBalance = "";
	
	$sql = "SELECT Balance as finer FROM player_balance WHERE Player_id = '".$finee."';";
	$sql .= "SELECT Balance as finee FROM player_balance WHERE Player_id = '".$finer."';";

	if (mysqli_multi_query($select, $sql)) {
		do {
			/* store first result set */
			if ($result = mysqli_store_result($select)) {
				while ($row = mysqli_fetch_row($result)) {
					if (empty($fineeCurrentBalance)) {
						$fineeCurrentBalance = $row[0];
					}else {
						$finerCurrentBalance = $row[0];
					}
				}
				mysqli_free_result($result);
			}
		} while (mysqli_more_results($select) && mysqli_next_result($select));
	} 
	
	mysqli_close($select);
	
	if ($finertype == 2) {
		$fineeBalance = $fineeCurrentBalance - $amount; 
		$amount = $amount * -1;
	}else {
		$fineeBalance = $fineeCurrentBalance + $amount;
	}
	
	// Start Inserts
	
	$insert = new mysqli($servername, $username, $password, $dbname);
	if ($insert->connect_error) {
		die("Connection failed: " . $insert->connect_error);
	}
	
	if ($finertype == 4) {
		$finerBalance = $finerCurrentBalance + 100;
		$sql = "INSERT INTO transactions (player_id,transtype,playerfrom,date,amount,balance) VALUES ('".$finee."',3,'".$finer."',CURDATE(),'".$amount."','".$fineeBalance."');";
		$sql .= "INSERT INTO transactions (player_id,transtype,date,amount,balance) VALUES ('".$finer."','".$finertype."',CURDATE(),'100','".$finerBalance."');";
		$sql .= "UPDATE `player_balance` SET `Balance`='".$fineeBalance."' WHERE `Player_id` = '".$finee."';";
		$sql .= "UPDATE `player_balance` SET `Balance`='".$finerBalance."' WHERE `Player_id` = '".$finer."';";
	}ELSE{
		if (empty($finer)) {
			$sql = "INSERT INTO transactions (player_id,transtype,date,amount,balance) VALUES ('".$finee."','".$finertype."',CURDATE(),'".$amount."','".$fineeBalance."');";
		} else {
			$sql = "INSERT INTO transactions (player_id,transtype,playerfrom,date,amount,balance) VALUES ('".$finee."','".$finertype."','".$finer."',CURDATE(),'".$amount."','".$fineeBalance."');";
		}

		$sql .= "UPDATE `player_balance` SET `Balance`='".$fineeBalance."' WHERE `Player_id` = '".$finee."';";
	}
	if ($insert->multi_query($sql) === TRUE) 
	{
		echo "<h2 style=\"color:green\">Player ID: ".$finee."</h2>"."<br>";
		echo "<h2 style=\"color:green; font-weight: bold\">New Balance: R". $fineeBalance/100 ."</h2>"."<br>";
	} 
	else 
	{
		echo "Error on 2nd insert: " . $sql . "<br>" . $insert->error."<br>";
	}
		
	mysqli_close($insert);				
?>
