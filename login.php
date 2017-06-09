<?php
	ob_start();
	session_start();
?>
<html>
	<style>
		body {
			text-align: center;
		}
		#loginText {
			color:red;
		}
		#loginBoxes {
			text-align: center;
		}
		#usernameBox {
			margin-bottom: 1%;
		}
		#passwordBox {
			margin-bottom: 1%;
		}
	</style>
	<body>
		<h2>Enter Username and Password</h2>
		<div>
			<?php
				$msg = "";
				if(   isset( $_POST['login'] ) && !empty( $_POST['username'] ) && !empty( $_POST['password'] )   ){
					if($_POST['username'] == 'Lincoln' && $_POST['password'] == 'Neato'){
						$_SESSION['valid'] = true;
						$_SESSION['timeout'] = time;
						$_SESSION['username'] = $_SESSION['username'];

						echo "<p id='loginText'>congratz</p>";
					}
					if($_POST['username'] == 'someoneElse' && $_POST['password'] == 'hey'){
						$_SESSION['valid'] = true;
						$_SESSION['timeout'] = time;
						$_SESSION['username'] = $_SESSION['username'];

						echo "<p id='loginText'>congratz</p>";
					}
				}else{
					$msg = "ur bad";
				}
			?>
		</div>
		<div id="loginBoxes">
			<form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method = "post">
				<h4><?php echo $msg; ?></h4>
				<input id="usernameBox" type = "text" name = "username" placeholder = "Type your Username Here" required autofocus></br>
				<input id="passwordBox" type = "password" name = "password" placeholder = "Type your Password Here" required><br>
				<button type = "submit" name = "login">Login</button>
			</form>
			Click here to clean <a href = "logout.php" tite = "Logout">Session.
			<a href="index.php">Return to Home</a>
		</div>
	</body>
</html>