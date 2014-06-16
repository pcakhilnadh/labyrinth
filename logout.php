<?php
session_start();
 
require 'connect.php';
 
include "./functions.php";
 
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>GNOSIS Quiz '12</title>
		<link rel="stylesheet" href="css/style.css" type="text/css" />
		<!--[if IE 7]>
			<link rel="stylesheet" href="css/ie7.css" type="text/css" />
		<![endif]-->
	</head>
	<body>
		<div class="page">
			<div class="header">
				<a href="index.php" id="logo"><img src="images/logo.png" alt=""/></a>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="rules.html">Rules</b></a></li>
					<li class="selected"><a href="login.php">Login</a></li>
					<li><a href="memberlist.php">Leaderboard</a></li>
				</ul>
			</div>
			<div class="body">
					
					
	

		<?php
 
		if(strcmp($_SESSION['uid'],"") == 0){
		echo "<center>You need to be logged in to log out!</center>";
		}else{
			mysql_query("UPDATE `users` SET `online` = '".date('U')."' WHERE `id` = '".$_SESSION['uid']."'");
 
			session_destroy();
 
			echo "<center>You have successfully logged out!</center>";
		}
 
		?>
		
					
					
					
					
			</div>
			<div class="footer">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="rules.html">Rules</a></li>
					<li><a href="login.php">Login</a></li>
					<li><a href="memberlist.php">Leaderboard</a></li>
				</ul>
				<p>&#169; Copyright &#169; 2012. Design by <a href="http://facebook.com/geetsin">geets</a></p>
			<div class="connect">
					<a href="https://www.facebook.com/cecfoces" id="facebook">facebook</a>
				</div>
					<a href="http://www.summit12.in/" id="twitter"><img src="images/summit.png" alt="Summit 2012"></a>
					<a href="https://www.facebook.com/cecfoces" id="vimeo"><img src="images/foces.png" alt="CEC FOCES"></a>
					
			</div>
		</div>
	</body>
</html>  