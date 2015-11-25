<?php 
require_once('aas_includes.php');
session_start();
do_html_header('');
check_valid_officer_user();
display_officer_menu();

$username=$_SESSION['valid_user'];

include 'db_switcher.php'; //Eldönti az $app_year alapján, hogy melyik adatbázishoz kapcsolódjon 

//az új jelentkező számára felhasználónevet kell generálni
$user='user';
$date=date('ymdGis'); //megadja a mai dátumot év/hónap/nap/óra/perc/másodperc formában
$new_user=$user.$date; //hozzáfűzi ezt a user szóhoz

?>
<fieldset><legend>Új jelentkező létrehozása, <strong><?php echo $app_year ?></strong><br  /></legend>
<br />
Figyeljetek arra, hogy egyszerre csak az egyik űrlap tölthető ki.<br />
<br />
<fieldset><legend>Angol programokra:</legend>
<form method='post' action='create_new_applicant.php'>
<input name="new_user" type="hidden" value="<?php print $new_user ?>" />
Vezetéknév:
<input  name="fname" type="text" id="fname" size="40" maxlength="100"><br />
Keresztnév:
<input name="gname" type="text" id="gname" size="40" maxlength="100"><br />
<table>
<?php include 'list_of_app_progs.php'; //a választható angol programok listája?> 
</table>
<input name="app_year" type="hidden" value="<?php print $app_year ?>" />
<input type='submit' value='Új jelentkező létrehozása'>
</form>
</fieldset>
<br />
<fieldset><legend>Német programokra:</legend>
<form method='post' action='create_new_applicant.php'>
<input name="new_user_d" type="hidden" value="<?php print $new_user ?>" />
Vezetéknév:
<input  name="fname" type="text" id="fname" size="40" maxlength="100"><br />
Keresztnév:
<input name="gname" type="text" id="gname" size="40" maxlength="100"><br />
<table>
<?php include 'list_of_app_progs_d.php'; //a választható német programok listája?> 
</table>
<input name="app_year" type="hidden" value="<?php print $app_year ?>" />
<input type='submit' value='Új jelentkező létrehozása'>
</form>
</fieldset>
<br />
</fieldset>
<br />
<?php
do_html_footer()
?>


