<?php
require_once('aas_includes.php');

//t azonosító változó
$jel_id=$_POST['jel_id']; 

//Eldönti az $app_year alapján, hogy melyik adatbázishoz kapcsolódjon
include 'db_switcher.php'; 

//tuitions
//tuitions változói
$paid_prg=$_POST['paid_prg'];

$tyear = $_POST['tyear'];
$tmonth = $_POST['tmonth'];
$tday = $_POST['tday'];
$tdate = $tyear.$tmonth.$tday;

$amount=$_POST['amount'];
$curr=$_POST['curr'];
$paid_org=$_POST['paid_org'];


if(($tyear)&&($tmonth)&&($tday)&&($amount)) //vizsgálja, hogy van-e befizetés
{
$insert_tuitions=$conn->query
	("INSERT INTO tuitions (jel_id, paid_prg, tdate, amount, curr, paid_org) VALUES ('$jel_id', '$paid_prg', '$tdate', '$amount', '$curr', '$paid_org')");
	echo 'Befizetés rögzítve.';
	?><br /><?php
}
else
	{
	echo 'Befizetés nem rögzíthető. Hiányos kitöltés.';
	}


include 'back_to_applicants.php';
do_html_footer();
