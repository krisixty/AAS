<?php 
require_once('aas_includes.php');
session_start();
do_html_header('');
check_valid_officer_user();
display_officer_menu();

$username=$_SESSION['valid_user'];

include 'db_switcher.php'; //Eldönti az $app_year alapján, hogy melyik adatbázishoz kapcsolódjon 

?>
Jelentkezők száma programonként, <strong><?php echo $app_year ?></strong><br  />
<br  />
<?php

$app_no=$conn->query("SELECT program, COUNT(*) AS szamok FROM jel_es_prog INNER JOIN applicants ON jel_es_prog.jel_id=applicants.jel_id GROUP BY program;");

while($sor=mysqli_fetch_array($app_no))
	{
	include 'programs.php'; 
	print $sor['szamok'];
?>
	<form action="app_stat_details.php" method="post" id="form1">
	<input name="program" type="hidden" value="<?php print $sor['program'] ?>" />
	<input name="app_year" type="hidden" value="<?php print $app_year ?>" />
	<input type="submit" name="Submit" id="Submit" value="Névsor" />
	</form>
	<?php
	echo "<br/>";
	}
?>




