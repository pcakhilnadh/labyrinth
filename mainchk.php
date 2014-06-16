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
			echo "<center>You need to be logged in to user this feature!</center>";
		}else{
			$time = date('U')+50;
			$update = mysql_query("UPDATE `users` SET `online` = '".$time."' WHERE `id` = '".$_SESSION['uid']."'");
			?>
			<div id="border">
				<table cellpadding="2" cellspacing="0" border="0" width="100%">
					<tr>
						<td><b>Users Online:</b></td>
						<td>
						<?php
 
						$res = mysql_query("SELECT * FROM `users` WHERE `online` > '".date('U')."'");
 
						while($row = mysql_fetch_assoc($res)){
							$user=$row['username'];
$clevel=$row['level'];

		echo $user;br;
                                                        
						}
 
						?>


                                               <td>
<?php
echo "Level : ".$level;
?>

						</td>
					





						<td colspan="2" align="center"><a href="logout.php">Logout</a></td>
					</tr>
				</table>
			</div>


</h2>
<?php

$r1=$_POST['answer'];
$r1=mysql_real_escape_string(trim($r1));

$ans= protect(stripslashes(stripcslashes($r1)));

$res = mysql_query("SELECT * FROM `answers` WHERE `level` = '$clevel'");
 
			while($row = mysql_fetch_assoc($res)){
			
							$kans=$row['answer'];
                              
						}


if($ans==$kans)
{ 
mysql_query("update users set level=level+1 where username='$user'");
print "<script>";
       print " self.location='userOnline.php'";
          print "</script>";
}
else {
	
print "<script>";
        print " self.location='userOnline.php'";
          print "</script>";	  }
?>




			<?php
 
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