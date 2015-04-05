<?php
require_once('aas_includes.php');
include 'db_switcher.php';

//jelenkető azonosító változó
$jel_id=$_POST['jel_id']; 

//jelenkezési dátum változó
$appdate=date('Ymd');

//angol nyelvű képzések változói
@$medicine=$_POST['medicine']; 
@$dentistry=$_POST['dentistry'];
@$pharmacy=$_POST['pharmacy'];
@$prep=$_POST['prep'];

//német nyelvű képzések változói
@$medizin=$_POST['medizin'];
@$vorbjahr=$_POST['vorbjahr'];

if($medicine)
	{
	$app_check_med=$conn->query("SELECT * FROM jel_es_prog WHERE jel_id='$jel_id' AND program='$medicine'");
	//$sor=mysqli_fetch_array($app_check_med);
	if ($app_check_med->num_rows>0) //vizsgálja, hogy adott-e már be ilyen jelentkezést
		{
		echo 'Doctor of Medicine - Már van ilyen jelentkezése'.'<br />'; 	
		} 
	else
		{
		$insert_medicine= $conn->query("INSERT INTO jel_es_prog (program, jel_id, appdate) VALUES ('$medicine', '$jel_id', '$appdate')");
		echo 'Doctor of Medicine  - Új jelentkezés rögzítve'.'<br />'; 	
		}
	}

if($dentistry)
	{
	$app_check_dent=$conn->query("SELECT * FROM jel_es_prog WHERE jel_id='$jel_id' AND program='$dentistry'");
	if ($app_check_dent->num_rows>0) //vizsgálja, hogy adott-e már be ilyen jelentkezést
		{
		echo 'Doctor of Dentistry - Már van ilyen jelentkezése'.'<br />'; 	
		}
	else
		{
		$insert_dentistry= $conn->query("INSERT INTO jel_es_prog (program, jel_id, appdate) VALUES ('$dentistry', '$jel_id', '$appdate')");
		echo 'Doctor of Dentistry - Új jelentkezés rögzítve'.'<br />'; 	
		}
	}

if($pharmacy)
	{
	$app_check_pharm=$conn->query("SELECT * FROM jel_es_prog WHERE jel_id='$jel_id' AND program='$pharmacy'");
	if ($app_check_pharm->num_rows>0) //vizsgálja, hogy adott-e már be ilyen jelentkezést
		{
		echo 'Doctor of Pharmacy - Már van ilyen jelentkezése'.'<br />'; 	
		}
	else
		{
		$insert_pharmacy= $conn->query("INSERT INTO jel_es_prog (program, jel_id, appdate) VALUES ('$pharmacy', '$jel_id', '$appdate')");
		echo 'Doctor of Pharmacy - Új jelentkezés rögzítve'.'<br />'; 	
		}
	}

if($prep)
	{
	$app_check_prep=$conn->query("SELECT * FROM jel_es_prog WHERE jel_id='$jel_id' AND program='$prep'");
	if ($app_check_prep->num_rows>0) //vizsgálja, hogy adott-e már be ilyen jelentkezést
		{
		echo 'Foundation year (Preparatory course) - Már van ilyen jelentkezése'.'<br />'; 	
		}
	else
		{
		$insert_prep= $conn->query("INSERT INTO jel_es_prog (program, jel_id, appdate) VALUES ('$prep', '$jel_id', '$appdate')");
		echo 'Foundation year (Preparatory course) - Új jelentkezés rögzítve'.'<br />'; 	
		}
	}

if($medizin)
	{
	$app_check_medz=$conn->query("SELECT * FROM jel_es_prog WHERE jel_id='$jel_id' AND program='$medizin'");
	if ($app_check_medz->num_rows>0) //vizsgálja, hogy adott-e már be ilyen jelentkezést
		{
		echo 'Humanmedizin in deutscher Sprache - Már van ilyen jelentkezése'.'<br />'; 	
		}
	else
		{
		$insert_medizin= $conn->query("INSERT INTO jel_es_prog (program, jel_id, appdate) VALUES ('$medizin', '$jel_id', '$appdate')");
		echo 'Humanmedizin in deutscher Sprache - Új jelentkezés rögzítve'.'<br />'; 	
		}
	}
	
if($vorbjahr)
	{
	$app_check_vorb=$conn->query("SELECT * FROM jel_es_prog WHERE jel_id='$jel_id' AND program='$vorbjahr'");
	if ($app_check_vorb->num_rows>0) //vizsgálja, hogy adott-e már be ilyen jelentkezést
		{
		echo 'Parallele Bewerbung für den englischsprachigen Studiengang - Már van ilyen jelentkezése'.'<br />'; 	
		}
	else
		{
		$insert_vorbjahr= $conn->query("INSERT INTO jel_es_prog (program, jel_id, appdate) VALUES ('$vorbjahr', '$jel_id', '$appdate')");
		echo 'Parallele Bewerbung für den englischsprachigen Studiengang - Új jelentkezés rögzítve'.'<br />'; 
		}
	}


include 'back_to_applicants.php';
do_html_footer();
