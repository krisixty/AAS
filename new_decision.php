<?php
require_once('aas_includes.php');
session_start();
do_html_header('');
check_valid_officer_user();
display_officer_menu();
$username=$_SESSION['valid_user'];


//jelentkező azonosító változó
$jel_id=$_POST['jel_id'];

include 'db_switcher.php'; //Eldönti az $app_year alapján, hogy melyik adatbázishoz kapcsolódjon

//döntések
//döntések változói
$dyear = $_POST['dyear'];
$dmonth = $_POST['dmonth'];
$dday = $_POST['dday'];
$ddate = $dyear.$dmonth.$dday;

$prog = $_POST['prog'];
$decision = $_POST['decision'];

$dfyear = $_POST['dfyear'];
$dfmonth = $_POST['dfmonth'];
$dfday = $_POST['dfday'];
$dfdate = $dfyear.$dfmonth.$dfday;

$emailyear = $_POST['emailyear'];
$emailmonth = $_POST['emailmonth'];
$emailday = $_POST['emailday'];
$emaildate = $emailyear.$emailmonth.$emailday;

$letteryear = $_POST['letteryear'];
$lettermonth = $_POST['lettermonth'];
$letterday = $_POST['letterday'];
$letterdate = $letteryear.$lettermonth.$letterday;

$tocas=$_POST['tocas'];

$basis = $_POST['basis'];

/*if(($dyear)&&($dmonth)&&($dday)) //vizsgálja, hogy van-e döntés
{*/
$insert_decisions=$conn->query
	("INSERT INTO decisions (jel_id, date, prog, decision, dfdate, basis, emaildate, letterdate, tocas) VALUES ('$jel_id', '$ddate', '$prog', '$decision', '$dfdate', '$basis', '$emaildate', '$letterdate', '$tocas')");
	echo 'Döntés rögzítve.';
	?><br /><?php

//}
include 'back_to_applicants.php';
do_html_footer();
