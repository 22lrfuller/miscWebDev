<?php
session_start();
session_destroy();
session_write_close();

echo "You have logged out.";
header('Refresh: 2; URL = login.php');
?>
<html>
	<head>
		<title>Logout</title>
	</head>
	<body>
		<p>Thanks for trying my login page!</p>
	</body>
</html>
<style>
	body {
		text-align: center;
		background-color: red;
	}
</style>