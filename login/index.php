<?php
	error_reporting(E_ALL & ~E_NOTICE);
	session_start();
	if ($_REQUEST['logout'] == 1){
		unset($_SESSION);
		session_destroy();
	}
	
	if ($_POST['email']){
		include("../connect.php");
		
		$select = new mysqli($servername, $username, $password, $dbname);
		if ($mysqli->connect_error) {
			die("Connection failed: " . $select->connect_error);
		}	
		
		$email = $_POST['email'];
		$password = $_POST['password'];
		$access_level = "";
		
		$sql = "SELECT * FROM users where email = '".$email."' and password = '".$password."'";
		$result = $select->query($sql);
		if (!$result) {
			trigger_error('Invalid query: ' . $select->error);
		}
		if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc()) 
			{
				$access_level = $row['access_level'];
			}
			if (!empty($access_level)) {
				
				$_SESSION['email'] = $email;
				$_SESSION['access_level'] = $access_level;
				header('Location: admin.php');
			}
	
		} else {
			?>
			<script language="javascript">
				alert('Email or Password incorrect');
			</script>
			<?php
		}
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" src="../global.css" href="../global.css"/>
		<link rel="stylesheet" href="../bootstrap.css">
		<link rel="shortcut icon" href="../siteimages/favicon.ico" type="image/x-icon">
		<link rel="icon" href="../siteimages/favicon.ico" type="image/x-icon">
		<style type="text/css">
			body {
				background: #eee !important;	
			}

			.wrapper {	
				margin-top: 80px;
			  margin-bottom: 80px;
			}

			.form-signin {
			  max-width: 380px;
			  padding: 15px 35px 45px;
			  margin: 0 auto;
			  background-color: #fff;
			  border: 1px solid rgba(0,0,0,0.1);  

			  .form-signin-heading,
				.checkbox {
				  margin-bottom: 30px;
				}

				.checkbox {
				  font-weight: normal;
				}

				.form-control {
				  position: relative;
				  font-size: 16px;
				  height: auto;
				  padding: 10px;
					@include box-sizing(border-box);

					&:focus {
					  z-index: 2;
					}
				}

				input[type="text"] {
				  margin-bottom: -1px;
				  border-bottom-left-radius: 0;
				  border-bottom-right-radius: 0;
				}

				input[type="password"] {
				  margin-bottom: 20px;
				  border-top-left-radius: 0;
				  border-top-right-radius: 0;
				}
			}
	</style>
	</head>
	<body>
  <div class="wrapper">
    <form class="form-signin" action="index.php" method="POST">       
      <h2 class="form-signin-heading">Please login</h2>
      <input type="email" class="form-control" name="email" placeholder="Email Address" required="" autofocus="" />
      <input type="password" class="form-control" name="password" placeholder="Password" required=""/>      
      <label class="checkbox">
        <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
      </label>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   
    </form>
  </div>
 </body>

</html>
