<?php
require_once('aas_includes.php');
session_start();
do_html_header('');
check_valid_officer_user();
display_officer_menu();

$username=$_SESSION['valid_user'];

include 'db_switcher.php'; //Eldönti az $app_year alapján, hogy melyik adatbázishoz kapcsolódjon

//postok
@$medicine=$_POST['medicine']; 
@$dentistry=$_POST['dentistry'];
@$pharmacy=$_POST['pharmacy'];
@$prep=$_POST['prep'];

//német nyelvű képzések változói
@$medizin=$_POST['medizin'];
@$vorbjahr=$_POST['vorbjahr'];

//személyes adatok változói
$fname=trim($_POST['fname']);
//A név első betűje nagy, a többi kicsi lesz. Szóköz után megint nagy, majd kicsi
$fname=str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($fname))));
$gname=trim($_POST['gname']);
$gname=str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($gname))));

//check
if (!$fname)
	{
	echo 'Vezetéknév hiányzik';	
	}

if (!$gname)
	{
	echo 'Keresztnév hiányzik';	
	}

if((!$medicine)&&(!$dentistry)&&(!$pharmacy)&&(!$prep)&&(!$medizin)&&(!$vorbjahr))
	{
	echo 'Program hiányzik';	
	}
	
if((!$fname)||(!$gname)||(!$medicine)&&(!$dentistry)&&(!$pharmacy)&&(!$prep)&&(!$medizin)&&(!$vorbjahr))
	{
	exit;
	}
	
//insert a user táblába	

if(isset($_POST['new_user'])) //angol
	{
	$new_user=$_POST['new_user'];
	}
if(isset($_POST['new_user_d'])) //német
	{
	$new_user=$_POST['new_user_d'];
	}

//$new_user=$_POST['new_user_d'];
	 
$insert_new_user_into_user=$conn->query("INSERT INTO user (username) VALUES ('$new_user')");
echo 'Új felhasználó létrehozva. Felhasználónév: '.$new_user.'<br />';

//insert az applicants táblába
$insert_applicant=$conn->query("INSERT INTO applicants (username, fname, gname) VALUES ('$new_user','$fname','$gname')");
echo $fname.' '.$gname.' nevű jelentkező létrehozva.'.'<br />';

//jel_id lekérdezése az applicants táblából
$jel_id_q=$conn->query("SELECT jel_id FROM applicants WHERE username='$new_user'");
$sor=mysqli_fetch_array($jel_id_q);
$jel_id=$sor['jel_id'];

//insert a jel_es_prog táblába
$appdate=date('Ymd');

if($medicine)
	{
	$insert_medicine= $conn->query("INSERT INTO jel_es_prog (program, jel_id, appdate) VALUES ('$medicine', '$jel_id', '$appdate')");
	}

if($dentistry)
	{
	$insert_dentistry= $conn->query("INSERT INTO jel_es_prog (program, jel_id, appdate) VALUES ('$dentistry', '$jel_id', '$appdate')");
	}

if($pharmacy)
	{
	$insert_pharmacy= $conn->query("INSERT INTO jel_es_prog (program, jel_id, appdate) VALUES ('$pharmacy', '$jel_id', '$appdate')");
	}

if($prep)
	{
	$insert_prep= $conn->query("INSERT INTO jel_es_prog (program, jel_id, appdate) VALUES 
('$prep', '$jel_id', '$appdate')");}

if($medizin)
	{
	$insert_medizin= $conn->query("INSERT INTO jel_es_prog (program, jel_id, appdate) VALUES ('$medizin', '$jel_id', '$appdate')");
	}

if($vorbjahr)
	{
	$insert_vorbjahr= $conn->query("INSERT INTO jel_es_prog (program, jel_id, appdate) VALUES 
('$vorbjahr', '$jel_id', '$appdate')");}


?>
<br />
Tovább az új jelentkező adatlapjára:
<?php
include 'back_to_applicants.php';
?>
<br />
<form action="new_applicant.php" method="post" id="form1">
<input name="app_year" type="hidden" value="<?php print $app_year ?>" />
<input type="submit" name="Submit" id="Submit" value="Vissza az új jelentkezők felviteléhez" /></a><br  />
</form>
<?php
do_html_footer();
?>

