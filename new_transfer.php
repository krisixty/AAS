<?php
require_once('aas_includes.php');
$conn = db_connect();

//jel_id azonosító változó
$jel_id=$_POST['jel_id']; 

//Eldönti az $app_year alapján, hogy melyik adatbázishoz kapcsolódjon
include 'db_switcher.php'; 

//transfers változói
$tstart=$_POST['tstart'];
$tamount=$_POST['tamount'];
$tcurr=$_POST['tcurr'];

$tbyear = $_POST['tbyear'];
$tbmonth = $_POST['tbmonth'];
$tbday = $_POST['tbday'];
$tbdate = $tbyear.$tbmonth.$tbday;

//ITT hagytam abba:

if(($tbyear)&&($tbmonth)&&($tbday)) //vizsgálja, hogy van-e dátum
{
$check_transfer=$conn->query("SELECT * FROM transfers WHERE jel_id='$jel_id'");

if ($check_transfer->num_rows==0) 
	{
	$insert_transfers=$conn->query
	("INSERT INTO transfers (jel_id, tstart, tamount, tcurr, tbdate) VALUES ('$jel_id', '$tstart', '$tamount', '$tcurr', '$tbdate')");
	echo 'Visszautalás rögzítve.';
	?><br /><?php
	}
else
	{
	$update_transfer=$conn->query
	("UPDATE transfers SET tstart='$tstart', tamount='$tamount', tcurr='$tcurr', tbdate='$tbdate' WHERE jel_id='$jel_id'");
	echo 'Visszautalás frissítve.';	
	?><br /><?php
	}	
}
	

include 'back_to_applicants.php';
do_html_footer();
