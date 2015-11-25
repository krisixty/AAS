<?php 
require_once('aas_includes.php');
session_start();
do_html_header('');
check_valid_officer_user();
display_officer_menu();

$username=$_SESSION['valid_user'];

include 'db_switcher.php'; //Eldönti az $app_year alapján, hogy melyik adatbázishoz kapcsolódjon 

//Adatbázis választó táblázat
	$formAction = 'queries.php';
	dbSwitcherSelect();
?>

<br  />
<br  />
Excel táblák<br  />
<form action="xapplicants.php" method="post" id="form1">
<input name="app_year" type="hidden" value="<?php print $app_year ?>" />
<input type="submit" name="Submit" id="Submit" value="Angol jelentkezők - Applicants Excel tábla" /></a><br  />
</form>

<form action="xapplicantsetr.php" method="post" id="form1">
<input name="app_year" type="hidden" value="<?php print $app_year ?>" />
<input type="submit" name="Submit" id="Submit" value="Angol jelentkezők - ETR importhoz Excel tábla" /></a><br  />
</form>

<form action="xbewerbung.php" method="post" id="form1">
<input name="app_year" type="hidden" value="<?php print $app_year ?>" />
<input type="submit" name="Submit" id="Submit" value="Német jelentkezők - Bewerbung+Abitur Excel tábla" /></a><br  />
</form>

<form action="xbewerbungetr.php" method="post" id="form1">
<input name="app_year" type="hidden" value="<?php print $app_year ?>" />
<input type="submit" name="Submit" id="Submit" value="Német jelentkezők - ETR importhoz Excel tábla" /></a><br  />
</form>

<br  />
Előre meghatározott lekérdezések:<br  />
<form action="query_eng+ger_app.php" method="post" id="form1">
<input name="app_year" type="hidden" value="<?php print $app_year ?>" />
<input type="submit" name="Submit" id="Submit" value="Angol és német program párhuzamos jelentkezései" /></a><br  />
</form>

<form action="query_dec_basis.php" method="post" id="form1">
<input name="app_year" type="hidden" value="<?php print $app_year ?>" />
<input type="submit" name="Submit" id="Submit" value="Döntés alapja, angol program" /></a><br  />
</form>

<form action="query_dec_basis_d.php" method="post" id="form1">
<input name="app_year" type="hidden" value="<?php print $app_year ?>" />
<input type="submit" name="Submit" id="Submit" value="Döntés alapja, német program" /></a><br  />
</form>

<form action="query_exp_dl.php" method="post" id="form1">
<input name="app_year" type="hidden" value="<?php print $app_year ?>" />
<input type="submit" name="Submit" id="Submit" value="Lejárt visszajelzési határidős jelentkezők listája, angol program" /></a><br  />
</form>

<form action="query_not_exp_dl.php" method="post" id="form1">
<input name="app_year" type="hidden" value="<?php print $app_year ?>" />
<input type="submit" name="Submit" id="Submit" value="Még nem lejárt visszajelzési határidős jelentkezők listája, angol program" /></a><br  />
</form>

<form action="query_exp_dl_d.php" method="post" id="form1">
<input name="app_year" type="hidden" value="<?php print $app_year ?>" />
<input type="submit" name="Submit" id="Submit" value="Lejárt visszajelzési határidős jelentkezők listája, német program" /></a><br  />
</form>

<form action="query_not_exp_dl_d.php" method="post" id="form1">
<input name="app_year" type="hidden" value="<?php print $app_year ?>" />
<input type="submit" name="Submit" id="Submit" value="Még nem lejárt visszajelzési határidős jelentkezők listája, német program" /></a><br  />
</form>

<form action="query_app_no.php" method="post" id="form1">
<input name="app_year" type="hidden" value="<?php print $app_year ?>" />
<input type="submit" name="Submit" id="Submit" value="Jelentkezők száma" /></a><br  />
</form>

<form action="query_accepted.php" method="post" id="form1">
<input name="app_year" type="hidden" value="<?php print $app_year ?>" />
<input type="submit" name="Submit" id="Submit" value="Felvettek száma" /></a><br  />
</form>


<?php//<a href="query_tuition.php">Tandíjat fizetett (Teszt!!)</a><br  />?>
</p>
Állampolgárság adott állampolgárságra<br  />
<form action="result.php" method="post" id="form1">
	<select class="selectone" select name="citizen" id="citizen">
      <?php    include 'nationalities.php';
?>  
	</select>
      <br  />
	  <input name="app_year" type="hidden" value="<?php print $app_year ?>" />
      <input type="submit" name="Submit" id="Submit" value="Lekérdez" />
</form>

<br  />
<?php
?>
