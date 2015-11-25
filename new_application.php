<?php 
require_once('aas_includes.php');
session_start();
do_html_header('');
check_valid_officer_user();
display_officer_menu();

$username=$_SESSION['valid_user'];
$jel_id=$_POST['jel_id'];

include 'db_switcher.php';

$result=$conn->query("SELECT * FROM applicants WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($result);
?>
<fieldset><legend>Új jelentkezés rögzítése:</legend>
<br />
Jel ID: <?php print $jel_id ?><br>
Vezetéknév: <?php print $sor['fname']; ?><br />
Keresztnév: <?php print $sor['gname']; ?><br />


<fieldset><legend>Angol programokra:</legend>
<form method='post' action='submit_new_application.php'>
<input name="jel_id" type="hidden" value="<?php print $jel_id ?>" />
<input name="app_year" type="hidden" value="<?php print $app_year?>" />
<table>
<?php include 'list_of_app_progs.php'; //a választható angol programok listája?> 
</table>
<input type='submit' value='Új angol programra jelentkezés rögzítése'>
</form>
</fieldset>


<fieldset><legend>Német programokra:</legend>
<form method='post' action='submit_new_application.php'>
<input name="app_year" type="hidden" value="<?php print $app_year?>" />
<input name="jel_id" type="hidden" value="<?php print $jel_id ?>" />
<table>
<?php include 'list_of_app_progs_d.php'; //a választható német programok listája?> 
</table>
<input type='submit' value='Új német programra jelentkezés rögzítése'>
</form>
</fieldset>
</fieldset>
<br />

<fieldset><legend>Jelenlegi jelentkezések:</legend>
<?php
$programs= $conn->query("SELECT * FROM jel_es_prog WHERE jel_id='$jel_id'");
while($sor=mysqli_fetch_array($programs))
	{
	?>
	<form action='del_application.php' method='post'>
    <input name="jel_id" type="hidden" value="<?php print $jel_id ?>" />
    <input name="appid" type="hidden" value="<?php print $sor['appid'] ?>" />
	<?php
	include 'programs.php';
	?>
	<input type='submit' name='submit' value='Töröl'><br />
	</form>
	<?php
	
	}
?>
</fieldset>
<br />



<?php
do_html_footer()
?>


