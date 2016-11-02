<?php 
	//include('validate.php');
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
		
	$sql = "SELECT `Player_Id`, CONCAT(`FirstName`,' ',`LastName`) as fullName FROM players where Player_Id not in (select player_id from transactions where date = CURDATE() and TransType in (3)  group by player_id having IFNULL(sum(amount),0) > 2000) order by FirstName";

	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) 
	{
		 $x = "";

		?>
		<div style="width: 70%; text-align: center; margin: 0px auto">
			<div class="col-xs-12" style="display: block; margin-bottom: 0px auto; margin: 0px auto; width: 150px">
				<span style="font-size: 36px; border-radius: 1em;" class="label label-info"><strong>Add All Fine Transactions</strong></span> 
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<!--h1 style="color:blue; display: block" align="center"><strong>Baaa Baaa Black Sheep</strong></h1-->
			</div>
		</div>
		
		<div class="row">
		  <div class="col-xs-4">
			<div class="form-group">
				<h1><select id="fineelist" class="form-control" data-width="auto" style="height: 70px; font-size:28px" required><option value="" disabled="disabled" selected="selected" >Person Fined</option>
			
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
	?>			</select></h1>
			</div>
		</div>
	<?php
	}
	
	$sql = "SELECT `TransType_Id`,`Name` FROM `transaction_types`;";
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) 
	{
		 $x = "";

		?>
		  <div class="col-xs-4">
			<div class="form-group">
				<h2><select class="form-control" data-width="auto" style="height: 70px; font-size:28px" id="finetypelist" required> <option value="" selected="selected" >Fine type</option>
		<?php
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			$x ++;
			$class = ($x%2 == 0)? 'background-color:#fff': 'background-color:#ccc';
			?>
			<option class="<?php echo $class ?>" value="<?php echo $row["TransType_Id"] ?>"><?php echo $row["Name"] ?></option>
	<?php	}
		?> </select></h2>
				</div>
			</div>
	<?php 
	}
	$sql = "SELECT `Player_Id` as finedplayer, CONCAT(`FirstName`,' ',`LastName`) as finedfullName FROM players order by FirstName;";
	$result = $mysqli->query($sql);
	if ($result->num_rows > 0) 
	{
		 $x = "";

		?>
		  <div class="col-xs-4">
			<div class="form-group">
				<h2><select class="form-control" data-width="auto" style="height: 70px; font-size:28px" id="finerlist"> <option value="" selected="selected" >Fining Player</option>
		<?php
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			$x ++;
			$class = ($x%2 == 0)? 'background-color:#fff': 'background-color:#ccc';
			?>
			<option class="<?php echo $class ?>" value="<?php echo $row["finedplayer"] ?>"><?php echo $row["finedfullName"] ?></option>
		<?php	}
		?> </select></h2>
				</div>
			</div>
		</div>
	<?php	}
		
			mysqli_close($mysqli);				
?>
<div class="row">
	<div class="col-xs-8" style="padding-left: 35%">
		<div class="form-group">
			<h1><select class="form-control" data-width="auto" style="height: 70px; font-size:24px" id="amountlist"  required> <option value="" disabled="disabled" selected="selected" >FINE AMOUNT</option>
								   <option value="100">R 1.00</option>
								  <option value="200">R 2.00</option>
								  <option value="500">R 5.00</option>
								  <option value="1000">R 10.00</option>
								  <option value="2000">R 20.00</option>
								  <option value="5000">R 50.00</option>
								  <option value="10000">R 100.00</option>
								</select></h1>
		</div>
	</div>
</div>

