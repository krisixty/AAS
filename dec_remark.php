<?php
require_once('aas_includes.php');

//jelentkező azonosító változó
$jel_id=$_POST['jel_id'];

//Eldönti az $app_year alapján, hogy melyik adatbázishoz kapcsolódjon
include 'db_switcher.php'; 

//döntések megjegyzésének változója
$remarks_dec = trim(preg_replace('/\s+/', ' ', $_POST['remarks_dec'])); /*Kiveszi az entereket és a tabokat*/


//döntések megjegyzése
if($remarks_dec)
{
$check_jel_id=$conn->query("SELECT * FROM remarks_dec WHERE jel_id='$jel_id'");

if ($check_jel_id->num_rows==0) 
	{
		$insert_remarks_dec=$conn->query
	("INSERT INTO remarks_dec (jel_id, remarks_dec) VALUES ('$jel_id', '$remarks_dec')");
	echo 'Döntések megjegyzés rögzítve.';
	?><br /><?php
	}
else
	{
	$update_remarks1=$conn->query
	("UPDATE remarks_dec SET remarks_dec='$remarks_dec' WHERE jel_id='$jel_id'");
	echo 'Döntések megjegyzés frissítve.';	
	?><br /><?php
	}	
}
include 'back_to_applicants.php';
do_html_footer();
?>