<?php 
//összes jelentkező - ideiglenes megoldás
require_once('aas_includes.php');
session_start();
do_html_header('');
check_valid_user();
display_officer_menu();

$username=$_SESSION['valid_user'];

include 'db_switcher.php'; //Eldönti az $app_year alapján, hogy melyik adatbázishoz kapcsolódjon 

$apps=$conn->query("SELECT * FROM applicants, jel_es_prog WHERE applicants.jel_id=jel_es_prog.jel_id AND (program='G1' OR program='V') ORDER BY fname");

?>
<!-- Adatbázis választó táblázat: -->
<table class="table_database">
<tr>
<td>Jelenlegi adatbázis: <strong><?php echo $app_year ?></strong> | Váltás a következőre:</td>
<td>
<form action="applicants_all_d.php" method="post" id="form1">
<select name="app_year">
<option>2015</option>
<option>2014</option>   
<option>2013</option>   
</select>
<input type="submit" name="Submit" id="Submit" value="választ" />
</form>
</td>
</tr>
</table>

<table class="table_pagenum">
<tr>
<td>
<form action="applicants_all_d.php" method="post" id="form1">
<input name="app_year" type="hidden" value="<?php print $app_year ?>" />
<input type="submit" name="Submit" id="Submit" value="Összes" />
</form>
</td>
<td>
<form action="applicants_d.php" method="post" id="form1">
<input name="app_year" type="hidden" value="<?php print $app_year ?>" />
<input type="submit" name="Submit" id="Submit" value="Oldalanként" />
</form>
</td>
</tr>
</table>
<?php




include 'apptable_contents1_d.php';

?>


