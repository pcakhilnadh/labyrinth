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
				<a href="userOnline.php" id="logo"><img src="images/logo.png" alt=""/></a>
			<ul>
					<li><a href="userOnline.php">Home</a></li>
					<li><a href="rules.html">Rules</b></a></li>
					<li><a href="#">Leaderboard</a></li>
					<li><a href="logout.php"><b>Logout</b></a></li>
				</ul>
			</div>
			<div class="body">
		

		<?php
 
		if(strcmp($_SESSION['uid'],"") == 0){
			echo "<center>You need to be logged in to use this feature!</center>";print "<script>";
      print " self.location='login.php'";
          print "</script>";	
		}else{
			$time = date('U')+50;
			$update = mysql_query("UPDATE `users` SET `online` = '".$time."' WHERE `id` = '".$_SESSION['uid']."'");
			?>
			<div id="borde">
				<table cellpadding="2" cellspacing="0" border="0" width="100%">
					<tr>
						<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </td>
						<td>
						<?php
 
						$res = mysql_query("SELECT * FROM `users` WHERE `online` > '".date('U')."'");
 
						while($row = mysql_fetch_assoc($res)){
								$user=$row['username'];
															?>
<div id="mem">
<?php
$level=$row['level'];

		echo $user;
                                                        
						}
 
						?></div>


                                               <td>
<div id="mem">
<?php
echo "Level : ".$level;
?>

						</td>
					





					</tr>
				</table><hr>
			</div>


</br></br></br>
<div id="mem1">
<?php
$q=mysql_query("select * from users WHERE active=1 ORDER BY level DESC");


echo "<table>";
echo "<tr ><td><u><b>".Username."</u></b></td><td><u><b>".Level."</u></b></td></tr>";
while($nt=mysql_fetch_array($q)){
echo "<tr ><td> $nt[username]</td><td> $nt[level] </td></tr>";
}

echo "</table>";?>
</div>
<br />



<?php
		
			
			
			
 
		}
 
		?>

					
					
					
					
			</div>
			<div class="footer">
				<ul>
					<li><a href="userOnline.php">Home</a></li>
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