<?php 
require_once('aas_includes.php');
session_start();
do_html_header('');
check_valid_user();
display_officer_menu();

$username=$_SESSION['valid_user'];

include 'db_switcher.php'; //Eldönti az $app_year alapján, hogy melyik adatbázishoz kapcsolódjon 

$result=$conn->query("SELECT * FROM applicants, jel_es_prog WHERE applicants.jel_id=jel_es_prog.jel_id AND (program='G1' OR program='V') ORDER BY fname");

$row_cnt = $result->num_rows; //megszámolja az applicants tábla sorainak számát
$rows_per_page=50;
$no_of_pages=ceil($row_cnt/$rows_per_page);

$limit=$rows_per_page; //elosztja az oldalszámmal

?>
<!-- Adatbázis választó táblázat: -->
<table class="table_database">
<tr>
<td>Jelenlegi adatbázis: <strong><?php echo $app_year ?></strong> | Váltás a következőre:</td>
<td>
<form action="applicants_d.php" method="post" id="form1">
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
<input type="submit" name="Submit" id="Submit" value="Összes jelentkező" />
</form>
</td>

<td>Oldalszám:</td>
<?php
for($i=1; $i<$no_of_pages+1; $i++)
	{
	?>
    <td>
	<form action='applicants_d.php' method='post'>
	<input class="input_app" name="pg_num" type="hidden" value="<?php print $i ?>" />
	<input name="app_year" type="hidden" value="<?php print $app_year ?>" />
    <input type='submit' name='submit' value='<?php print $i ?>'>
    </form>
    </td>
	<?php	
	} 
?>
</tr>
<tr><td>
<?php

if(@$_POST['pg_num']) //ha ki van töltve a post, akkor berakja a pg_num változóba
	{
	$pg_num=$_POST['pg_num'];
	print $pg_num.'. oldal';
	$limit_num=($pg_num-1)*$limit;
	}
else
	{
	print '1. oldal';
	$limit_num=0;
	}
?>	
</td></tr>
</table>
<?php
$apps=$conn->query("SELECT * FROM applicants, jel_es_prog WHERE applicants.jel_id=jel_es_prog.jel_id AND (program='G1' OR program='V') ORDER BY fname LIMIT $limit_num, $limit ");

include 'apptable_contents1_d.php';

?>


