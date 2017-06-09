<?php
session_start();
if (session_status() != true){
	header("Refresh: 0; URL = login.php");
}
?>
<!DOCTYPE html>
<head>
	<title>Web Dev Website</title>
	<style>
		body {
			background: url(webDev.jpe);
			background-color: #0096d5;
			background-repeat: no-repeat;
			background-size: 100%;
			height: 100%;
		}
		h1 {
			text-align: center;	
		}
		#secondLine{
			text-align: center;
			display: inline-block;
		}
		#high1{
			color:red;
			display: inline;
		}
		#links{
			background-color:#FFFFFF88; margin-right:70%;
		}
		#a1{
			color:red;
		}
		#a2{
			color:orange;
		}
		#a3{
			color:yellow;
		}
		#a4{
			color:green;
		}
		#a5{
			color:blue;
		}
		#a6{
			color:purple;
		}
	</style>
</head>
<body>
	<h1>Welcome to my web developement website!</h1>
	<br>
	<div style="margin: 0 auto; width:50%;">
	<h3 id="secondLine">I am a web developer contractor and I need a <h3 id="high1"> job.</h3></h3>
	</div>
	<br>
	<h2 id="headertwo">You've clicked the button 0 times.</h2>
	<button onclick="clicky()">Click Me!</button>
	<br>
	<div id="links" style="background-color:#FFFFFF88; margin-right:70%; margin-top:38%;">
		<a id="a1" href="/webDevStuff.html">Click me to learn more!</a>
		<br>
		<a id="a2" href="/webDevTips.html">Click here to learn about web developement!</a>
		<br>
		<a id="a3" href="/rainbowButton.html">Rainbow buttons!!!!</a>
		<br>
		<a id="a4" href="/login.php">Login</a>
		<br>
		<a id="a5" href="/cookieClicker.html">Click here to go to cookie clicker!</a>
		<br>
		<a id="a6" href="/completeFlappy.html">Click here to go to flappy bird!</a>
	</div>
</body>

<script>
var c = 0;
function clicky(){
	c += 1;
	document.getElementById("headertwo").innerHTML="You've clicked the button "+c+" times.";
}
</script>