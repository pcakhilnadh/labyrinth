<?php
//allow sessions to be passed so we can see if the user is logged in
session_start();
 
//connect to the database so we can check, edit, or insert data to our users table
require 'connect.php';
 
//include out functions file giving us access to the protect() function made earlier
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
					<li><a href="#">Home</a></li>
					<li><a href="rules.html">Rules</a></li>
					<li><a href="memberlist.php">Leaderboard</a></li>
					<li class="selected"><a href="logout.php"><strong><b>Logout</strong></b></a></li>
					
				</ul>
			</div>
			<div class="body">
					
					
	

		<?php
 
		//if the login session does not exist therefore meaning the user is not logged in
		if(strcmp($_SESSION['uid'],"") == 0){
			//display and error message
			echo "<center>You need to be logged in to user this feature!</center>";
		}else{
			//otherwise continue the page
 
			//this is out update script which should be used in each page to update the users online time
			$time = date('U')+50;
			$update = mysql_query("UPDATE `users` SET `online` = '".$time."' WHERE `id` = '".$_SESSION['uid']."'");
			?>
			<div id="borde">
				<table cellpadding="2" cellspacing="0" border="0" width="100%">
					<tr>
						<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
						<td>
						<?php
 
						//select all rows where there online time is more than the current time
						$res = mysql_query("SELECT * FROM `users` WHERE `online` > '".date('U')."'");
 
						//loop for each row
						while($row = mysql_fetch_assoc($res)){
							//echo  each username found to be online with a dash to split them
							$user=$row['username'];
							?>
<div id="cg">
<?php
$level=$row['level'];

		echo  $user;
                                                        
						}
 
						?></div>


 	                                             <td>
 <div id="cg">	                                             
<?php
echo "Level : ".$level;
?>

						</td>
					





					</tr>
				</table>
			</div>

<hr>
</div>
<form id="form1" name="form1" method="post" action="mainchk.php">
  <div id="cg"><p align="center">Question</p></div>
  
   <div align="center">
     <?php
  
   switch($level)
   {
   case 1:
    
  echo '<img src="http://techhelpusa.com/wp-content/uploads/2012/05/technology.jpg">';

   break;
   case 2:
   echo '<img src="http://statspotting.com/wp-content/uploads/2011/02/iraq-war.jpg">';
   break;
   
   case 3:
   echo '<img src="http://t1.gstatic.com/images?q=tbn:ANd9GcQ-RYGAyBaJcYoNUhWr0geBYwybj40Jhw55JnMYv8FBm2e05y8FmkAcgtNL">';
   break;
   
   case 4:
   echo '<img src="http://hacknmod.com/wp-content/uploads/2008/09/hack.jpg">';
   break;
   
   case 5:
   echo '<img src="http://dnetcall.com/wp-content/uploads/2012/06/linus-secrets.png">';
   break;
   
  
   default: echo "Wait For the next questions.";
   }
   ?>
   </div>
  <p align="center">
    <label></br></br>
      <input type="text" name="answer" id="answer" placeholder="Your Answer Here!!"/>
    </label>
    <label>
  <input type="hidden" name="submit" value="submit"  id="yourid" />
  <button type="submit" id="submit">Go baby go!</button>
  <div id="rul"> <a href="https://www.facebook.com/cecfoces"><b>CLUES</b></a></div>
    </label>
</form>


<br />




<?php
		
			
			
			
 
		//make sure you close the check if their online
		}
 
		?>
	</body>
</html>
					
					
					
					
			</div>
			<div class="footer">
				<ul>
					<li><a href="#">Home</a></li>
					
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