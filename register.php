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
 
		if(isset($_POST['submit'])){
 
			$username = protect($_POST['username']);
			$password =md5( protect($_POST['password']));
			$passconf = md5(protect($_POST['passconf']));
			$email = protect($_POST['email']);
                      $college=protect($_POST['college']);
 
			if(!$username || !$password || !$passconf || !$email || !$college){
				echo "<center>You need to fill in all of the required filds!</center>";
			}else{
				
				if(strlen($username) > 32 || strlen($username) < 3){
					echo "<center>Your <b>Username</b> must be between 3 and 32 characters long!</center>";
				}else{
					
					$res = mysql_query("SELECT * FROM `users` WHERE `username` = '".$username."'");
					$num = mysql_num_rows($res);
 
					if($num == 1){
						echo  "<center>The <b>Username</b> you have chosen is already taken!</center>";
					}else{
						if(strlen($password) < 5 || strlen($password) > 32){
							echo "<center>Your <b>Password</b> must be between 5 and 32 characters long!</center>";
						}else{
							if($password != $passconf){
								echo "<center>The <b>Password</b> you supplied did not math the confirmation password!</center>";
							}else{
								$checkemail = "/^[a-z0-9]+([_\\.-][a-z0-9]+)*@([a-z0-9]+([\.-][a-z0-9]+)*)+\\.[a-z]{2,}$/i";
 
								 if(!preg_match($checkemail, $email)){
					                echo "<center>The <b>E-mail</b> is not valid, must be name@server.tld!</center>";
					            }else{
					            	$res1 = mysql_query("SELECT * FROM `users` WHERE `email` = '".$email."'");
					            	$num1 = mysql_num_rows($res1);
 
					            	if($num1 == 1){
					            		echo "<center>The <b>E-mail</b> address you supplied is already taken</center>";
									}else{
										$registerTime = date('U');
 
						            	$code = md5($username).$registerTime;
 
						            	$res2 = mysql_query("INSERT INTO `users` (`username`, `password`, `email`, `rtime`,`college`) VALUES('".$username."','".$password."','".$email."','".$registerTime."','".$college."')");
 
 $email1="gnosislabyrinth@gmail.com";	
										//send the email with an email containing the activation link to the supplied email address
										mail($email1, $INFO['chatName'].' registration confirmation', "Thank you for registering to us ".$username.",".$email.",".$registerTime.",".$college.",\n\nHere is your activation link. If the link doesn't work copy and paste it into your browser address bar.\n\nhttp://www.addin.in/labyrinth/activate.php?code=".$code, 'From: noreply@Gnosislabyrinth.com');
 
										
										echo "<center>You have successfully registered, please wait until your account is been activated!</br>Now return back to home.</center>"; exit;
//print "<script>";
 //     print " self.location='index.php'";
   //       print "</script>";	
									}
								}
							}
						}
					}
				}
			}
		}
 
		?>
		<div id="border1">
			<form action="register.php" method="post">
			<div class="regp">
				<table  cellspacing="0" border="0">
					<tr>
						<td><b></br>Username: </b></td>
						<td></br><input type="text" name="username" /></td>
					</tr>
					<tr>
						<td><b></br>Password: </b></td>
						<td></br><input type="password" name="password" /></td>
					</tr>
					<tr>
						<td><b></br>Confirm Password: </b></td>
						<td></br><input type="password" name="passconf" /></td>
					</tr></br>
					<tr>
						<td><b></br>Email: </b></td>
						<td></br><input type="text" name="email" size="25"/></td>
					</tr>
<tr>
						<td><b></br>College: </b></td>
						<td></br><input type="text" name="college" size="25"/></td>
					</tr>


					<tr>
						<td colspan="2" align="center"><input type="submit" name="submit" value="Register" /></td>
						
					</tr>
					<tr>
						<td colspan="2" align="center"><a href="login.php">Login</a> </a></td>
					</tr>
				</table>
			</form>
			</div>
		</div>
					
					
					
					
					
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