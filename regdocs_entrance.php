<?php
// 1. felvételi vizsga változói---------------------------------------------------------------
$e_place=$_POST['e_place'];
$e_year=$_POST['e_year'];
$e_month=$_POST['e_month'];
$e_day=$_POST['e_day'];
$e_date=$e_year.$e_month.$e_day;
$bio_wr=$_POST['bio_wr'];
$chem_wr=$_POST['chem_wr'];
$phys_wr=$_POST['phys_wr'];
$eng_wr=$_POST['eng_wr'];
$bio_or=$_POST['bio_or'];
$bio_or2=$_POST['bio_or2'];
$chem_or=$_POST['chem_or'];
$chem_or2=$_POST['chem_or2'];
$eng_or=$_POST['eng_or'];
$phys_or=$_POST['phys_or'];
$phys_or2=$_POST['phys_or2'];
$examiner=$_POST['examiner'];
$suggestion = trim(preg_replace('/\s+/', ' ', $_POST['suggestion'])); /*Kiveszi az entereket és a tabokat*/

$check_jel_id=$conn->query("SELECT * FROM entrance_exam WHERE jel_id='$jel_id'");

if ($check_jel_id->num_rows==0) 
	{
		$insert_entrance=$conn->query
	("INSERT INTO entrance_exam (jel_id, e_place, e_date, bio_wr, chem_wr, phys_wr, eng_wr, bio_or, bio_or2, chem_or, chem_or2, eng_or, phys_or, phys_or2, examiner, suggestion) VALUES ('$jel_id', '$e_place', '$e_date', '$bio_wr', '$chem_wr', '$phys_wr', '$eng_wr', '$bio_or', '$bio_or2', '$chem_or', '$chem_or2', '$eng_or', '$phys_or', '$phys_or2', '$examiner', '$suggestion')");
	echo 'Felvételi adatok rögzítve.';
	?><br /><?php
	}
else
	{
	$update_entrance=$conn->query
	("UPDATE entrance_exam SET e_place='$e_place', e_date='$e_date', bio_wr='$bio_wr', chem_wr='$chem_wr', phys_wr='$phys_wr', eng_wr='$eng_wr', bio_or='$bio_or', bio_or2='$bio_or2', chem_or='$chem_or', chem_or2='$chem_or2', eng_or='$eng_or', phys_or='$phys_or', phys_or2='$phys_or2', examiner='$examiner', suggestion='$suggestion' WHERE jel_id='$jel_id'");
	echo 'Felvételi adatok frissítve.';	
	?><br /><?php
	}	

	
	
// 2. felvételi vizsga változói---------------------------------------------------------------
$e_place_2=$_POST['e_place_2'];
$e_year_2=$_POST['e_year_2'];
$e_month_2=$_POST['e_month_2'];
$e_day_2=$_POST['e_day_2'];
$e_date_2=$e_year_2.$e_month_2.$e_day_2;
$bio_wr_2=$_POST['bio_wr_2'];
$chem_wr_2=$_POST['chem_wr_2'];
$phys_wr_2=$_POST['phys_wr_2'];
$eng_wr_2=$_POST['eng_wr_2'];
$bio_or_2=$_POST['bio_or_2'];
$bio_or2_2=$_POST['bio_or2_2'];
$chem_or_2=$_POST['chem_or_2'];
$chem_or2_2=$_POST['chem_or2_2'];
$eng_or_2=$_POST['eng_or_2'];
$phys_or_2=$_POST['phys_or_2'];
$phys_or2_2=$_POST['phys_or2_2'];
$examiner_2=$_POST['examiner_2'];
$suggestion_2 = trim(preg_replace('/\s+/', ' ', $_POST['suggestion_2'])); /*Kiveszi az entereket és a tabokat*/


$check_jel_id=$conn->query("SELECT * FROM entrance_exam_2 WHERE jel_id='$jel_id'");

if ($check_jel_id->num_rows==0) 
	{
		$insert_entrance_2=$conn->query
	("INSERT INTO entrance_exam_2 (jel_id, e_place_2, e_date_2, bio_wr_2, chem_wr_2, phys_wr_2, eng_wr_2, bio_or_2, bio_or2_2, chem_or_2, chem_or2_2, eng_or_2, phys_or_2, phys_or2_2, examiner_2, suggestion_2) VALUES ('$jel_id', '$e_place_2', '$e_date_2', '$bio_wr_2', '$chem_wr_2', '$phys_wr_2', '$eng_wr_2', '$bio_or_2', '$bio_or2_2', '$chem_or_2', '$chem_or2_2', '$eng_or_2', '$phys_or_2', '$phys_or2_2', '$examiner_2', '$suggestion_2')");
	echo '2. Felvételi vizsgaadatok rögzítve.';
	?><br /><?php
	}
else
	{
	$update_entrance=$conn->query
	("UPDATE entrance_exam_2 SET e_place_2='$e_place_2', e_date_2='$e_date_2', bio_wr_2='$bio_wr_2', chem_wr_2='$chem_wr_2', phys_wr_2='$phys_wr_2', eng_wr_2='$eng_wr_2', bio_or_2='$bio_or_2', bio_or2_2='$bio_or2_2', chem_or_2='$chem_or_2', chem_or2_2='$chem_or2_2', eng_or_2='$eng_or_2', phys_or_2='$phys_or_2', phys_or2_2='$phys_or2_2', examiner_2='$examiner_2', suggestion_2='$suggestion_2' WHERE jel_id='$jel_id'");
	echo '2. Felvételi vizsgaadatok frissítve.';	
	?><br /><?php
	}	
?>