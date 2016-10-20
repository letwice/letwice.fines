<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
		<link rel="stylesheet" src="global.css" href="global.css"/>
	</head>
	
	<body>
		<div class="container">
			<h1 class="centered">You suck balls!</h1>
			<hr/>
			
			<div class="nav">
				<a href="#" class="fancybtn">Next Page</a>
				<a href="#" class="fancybtn">Next Page</a>
				<a href="#" class="fancybtn">Next Page</a>
			</div>
			<hr/>
			
			<?php
				$nameErr = "";
				$surnameErr  = "";
				$kinErr = "";
				$phoneErr  = "";
				$kinphoneErr = "";
				$playerName = "";
				$playerSurname  = "";
				$playerNick  = "";
				$playerPhone = "";
				$kinName = "";
				$kinPhone = "";
				$playerMail = "";
			?>
			
			<form method="POST" action="/action.php">
				<table style="width:50%">
					<tr><td>
					<label value="FirstName">First Name</label></td><td>
					<input type="text" id="player_name" name="player_name"  placeholder="Name" required/> <span class="error">* <?php echo $nameErr; ?></span></td>
					<tr><td>
					<label value="LastName">Last Name</label></td><td>
					<input type="text" id="player_surname" name="player_surname" placeholder="Surname" required/><span class="error">* <?php echo $surnameErr;?></span></td>
					<tr><td>
					<label value="KinName">Nick Name</label></td><td>
					<input type="text" id="player_nick" name="player_nick" placeholder="Choose wisely" /></td>
					<tr><td>
					<label value="PhoneName">Phone Number</label></td><td>
					<input type="text" id="player_phone" name="player_phone" placeholder="Cell Number" required/><span class="error">* <?php echo $phoneErr;?></span></td>
					<tr><td>
					<label value="PhoneName">Email</label></td><td>
					<input type="text" id="player_email" name="player_email"  placeholder="Your co.za or com"/></td>
					<tr><td>
					<label value="PhoneName">Next Of Kin</label></td><td>
					<input type="text" id="kin_name" name="kin_name" placeholder="Person you suck up to" required/><span class="error">* <?php echo $kinErr;?></span></td>
					<tr><td>
					<label value="PhoneName">Next of Kin Phone Number</label></td><td>
					<input type="text" id="kin_phone" name="kin_phone" placeholder="Next of Kin phone number" required/><span class="error">* <?php echo $kinphoneErr;?></span></td>
				</table>
				<button type="submit" name="submit" value="sumbit">Submit</button>
			
			<div class="dataview">
				<ul class="viewlist">
					<?php
						
						
						//$playerName = $_POST['player_name'];
						//$playerSurname = $_POST['player_surname'];
						//$playerNick = $_POST['player_nick'];
						//$playerPhone = $_POST['player_phone'];
						//$kinName = $_POST['kin_name'];
						//$kinPhone = $_POST['kin_phone'];
						//$playerMail = $_POST['player_email'];
						if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

							  if (empty($_POST["kin_phone"])) {
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

						//$servername = "localhost";
						//$username = "root";
						//$password = "";

						// Create connection
						//$mysqli = new mysqli($servername, $username, $password);
						//if ($mysqli->connect_error) {
							//die("Connection failed: " . $mysqli->connect_error);
						//} 
						//echo "Connected successfully";
//						$call = mysqli_prepare($mysqli, 'CALL create_user(?, ?, ?, ?, @first_name, @last_name, @nick_name, @phone_number)');
	//					mysqli_stmt_bind_param($call, 'iii', $playerName, $playerSurname, $playerKin, $playerPhone);
		//				mysqli_stmt_execute($call);

			//			$select = mysqli_query($mysqli, 'SELECT @sum, @product, @average');
				//		$result = mysqli_fetch_assoc($select);
					//	$procOutput_name     = $result['@full_name'];
						
					//	echo "<li><div class=\"viewitem\">".$procOutput_name."</div></li>";
					function test_input($data)
					{
					   $data = trim($data);
					   $data = stripslashes($data);
					   $data = htmlspecialchars($data);
					   return $data;
					}
										
					?>
				</ul>
			</div>
			
			</form>
			
			
			
		</div>
	</body>

</html>
