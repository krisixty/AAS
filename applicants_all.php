<?php 
//összes jelentkező - ideiglenes megoldás
require_once('aas_includes.php');
session_start();
do_html_header('');
check_valid_user();
display_officer_menu();

$username=$_SESSION['valid_user'];

include 'db_switcher.php'; //Eldönti az $app_year alapján, hogy melyik adatbázishoz kapcsolódjon 

$apps=$conn->query("SELECT * FROM applicants, jel_es_prog WHERE applicants.jel_id=jel_es_prog.jel_id AND 
(program='M1' OR 
program='M1e' OR 
program='A' OR
program='M2' OR
program='M3' OR
program='D1' OR 
program='D1e' OR 
program='D2' OR
program='D3' OR
program='P1' OR 
program='P1e' OR 
program='P2' OR
program='P3' OR
program='F') ORDER BY fname");

//Adatbázis választó táblázat
	$formAction = 'applicants_all.php';
	dbSwitcherSelect();
?>


<table class="table_pagenum">
<tr>
<td>
<form action="applicants_all.php" method="post" id="form1">
<input name="app_year" type="hidden" value="<?php print $app_year ?>" />
<input type="submit" name="Submit" id="Submit" value="Összes" />
</form>
</td>
<td>
<form action="applicants.php" method="post" id="form1">
<input name="app_year" type="hidden" value="<?php print $app_year ?>" />
<input type="submit" name="Submit" id="Submit" value="Oldalanként" />
</form>
</td>
</tr>
</table>
<?php

include 'apptable_contents1.php';

?>


