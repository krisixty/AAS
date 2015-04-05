<?php 
require_once('aas_includes.php');
session_start();
do_html_header('');
check_valid_user();
display_officer_menu();

$username=$_SESSION['valid_user'];

include 'db_switcher.php'; //Eldönti az $app_year alapján, hogy melyik adatbázishoz kapcsolódjon 
?>
<!-- Adatbázis választó táblázat: -->
<table class="table_database">
<tr>
<td>Jelenlegi adatbázis: <strong><?php echo $app_year ?></strong> | Váltás a következőre:</td>
<td>
<form action="maintenance.php" method="post" id="form1">
<select name="app_year">
<option>2014</option>   
<option>2013</option>   
</select>
<input type="submit" name="Submit" id="Submit" value="választ" />
</form>
</td>
</tr>
</table>

<br />
<br />
Karbantartás<br />
<br />
<form action="new_applicant.php" method="post" id="form1">
<input name="app_year" type="hidden" value="<?php print $app_year ?>" />
<input type="submit" name="Submit" id="Submit" value="Új jelentkező felvitele" /></a><br  />
</form>
<?php
do_html_footer()
?>

