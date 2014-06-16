<?php
session_start();
ob_start();


 
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
 
		if($_POST['submit']){
			$username = protect($_POST['username']);
			$password = md5(protect($_POST['password']));
 
			if(!$username || !$password){
				echo "<center>You need to fill in a <b>Username</b> and a <b>Password</b>!</center>";
			}else{
			$res = mysql_query("SELECT * FROM `users` WHERE `username` = '".$username."'");
				$num = mysql_num_rows($res);
 
				if($num == 0){
					echo "<center>The <b>Username</b> you supplied does not exist!</center>";
				}else{
				$res = mysql_query("SELECT * FROM `users` WHERE `username` = '".$username."' AND `password` = '".$password."'");
					$num = mysql_num_rows($res);
					if($num == 0){
						echo "<center>The <b>Password</b> you supplied does not match the one for that username!</center>";
					}else{
						$row = mysql_fetch_assoc($res);
 
						if($row['active'] != 1){
							echo "<center>We have not yet <b>Activated</b> your account!<br><center>Please Wait</centre></center>";
						}else{
							$_SESSION['uid'] = $row['id'];
							echo "<center>You have successfully logged in!</center>";
 
							$time = date('U')+50;
							mysql_query("UPDATE `users` SET `online` = '".$time."' WHERE `id` = '".$_SESSION['uid']."'");
 
							header('Location: userOnline.php');
						}
					}
				}
			}
		}
 
		?>
		
		<form  action="login.php" method="post">
			<div id="border">
				<div class="log"></br>
				<table id="col" cellspacing="0" border="0">
					<tr >
						<td><b>Username:</b></td>
						<td><input type="text" name="username" /></td>
					</tr></br></br>
					<tr >
						<td><b></br>Password:</b></td>
						<td></br><input type="password" name="password" /></td>
					</tr>
					<tr>
						<td colspan="2" align="center"><input type="submit" name="submit" value="Login" /></td>
					</tr>
					<tr>
					
						<td align="center" colspan="2"><a  href="register.php"  ></br>Not Registered Yet??</a></td>
					</tr>
				</table>
				</div>
			</div>
		</form>
		
				
				
				
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