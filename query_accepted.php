<?php 
require_once('aas_includes.php');
session_start();
do_html_header('');
check_valid_officer_user();
display_officer_menu();

$username=$_SESSION['valid_user'];

include 'db_switcher.php'; //Eldönti az $app_year alapján, hogy melyik adatbázishoz kapcsolódjon 

?>
Felvettek száma programonként, <strong><?php echo $app_year ?></strong><br  />
<br  />
<?php
//ezt meg lehetne olyan lekérdezésre csinálni, hogy a kiválasztott döntés listája jöjjön le


$accepted=$conn->query("SELECT prog, COUNT(*) AS szamok FROM applicants INNER JOIN decisions ON applicants.jel_id=decisions.jel_id WHERE decision='F' GROUP BY prog;");
while($sor=mysqli_fetch_array($accepted))
	{
	include 'programs_dec.php'; 
	print $sor['szamok'];?>
	<form action="acc_stat_details.php" method="post" id="form1">
	<input name="prog" type="hidden" value="<?php print $sor['prog'] ?>" />
	<input name="app_year" type="hidden" value="<?php print $app_year ?>" />
	<input type="submit" name="Submit" id="Submit" value="Névsor" />
	</form>
	<?php
	echo "<br/>";
	}
?>



