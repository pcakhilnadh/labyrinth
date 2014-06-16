<?php




/* Database config */

$db_host		= 'localhost';
$db_user		= 'addinin_root';
$db_pass		= 'aspoder9895%*';
$db_database	= 'addinin_labyrinth'; 

/* End config */



$link = mysql_connect($db_host,$db_user,$db_pass) or die('Unable to establish a DB connection');

mysql_select_db($db_database,$link);
mysql_query("SET names UTF8");

?>