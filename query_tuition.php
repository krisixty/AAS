<?php 
require_once('aas_includes.php');
session_start();
do_html_header('');
check_valid_user();
display_officer_menu();

$username=$_SESSION['valid_user'];

?>
<p class="text">
<strong>Tandíjat fizettettek száma programonként:</strong><br  />
<br  />
<?php

$conn = db_connect();
$app_no=$conn->query("SELECT program, COUNT(*) AS szamok FROM jel_es_prog GROUP BY program; ");
while($sor=mysqli_fetch_array($app_no))
	{
	include 'programs.php'; 
	print $sor['szamok'];
	echo "<br/><br/>";
	}
?>
</p>
<?php
?>



