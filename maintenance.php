<?php 
require_once('aas_includes.php');
session_start();
do_html_header('');
check_valid_user();
display_officer_menu();

$username=$_SESSION['valid_user'];

include 'db_switcher.php'; //Eldönti az $app_year alapján, hogy melyik adatbázishoz kapcsolódjon 

$formAction = 'maintenance.php';
dbSwitcherSelect();
?>


<br>
<br>
Karbantartás<br>
<br>
<p>
<a href="applicationhandler.php">Programok kezelése</a>
</p>
<form action="new_applicant.php" method="post" id="form1">
<input name="app_year" type="hidden" value="<?php print $app_year ?>" />
<input type="submit" name="Submit" id="Submit" value="Új jelentkező felvitele" /></a><br  />
</form>
<?php
do_html_footer()
?>

