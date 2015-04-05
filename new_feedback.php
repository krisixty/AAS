<?php
require_once('aas_includes.php');


//jelentkező azonosító változó
$jel_id=$_POST['jel_id'];

//Eldönti az $app_year alapján, hogy melyik adatbázishoz kapcsolódjon
include 'db_switcher.php'; 

//visszajelzések változói
$fbyear = $_POST['fbyear'];
$fbmonth = $_POST['fbmonth'];
$fbday = $_POST['fbday'];
$fbdate=$fbyear.$fbmonth.$fbday;

//visszajelzés dátuma
//if(($fbyear)&&($fbmonth)&&($fbday)) //vizsgálja, hogy van-e visszajelzés
//{
$insert_feedbacks=$conn->query
	("INSERT INTO feedbacks (jel_id, date) VALUES ('$jel_id', '$fbdate')");
	echo 'Visszajelzés dátuma rögzítve.';
	?><br /><?php

//}
include 'back_to_applicants.php';
do_html_footer();
