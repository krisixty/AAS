<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
ob_start(); //Turn on output buffering
require_once('aas_includes.php');
session_start();
do_html_header('');
check_valid_user();

$appdate=date('Ymd');
$username=$_SESSION['valid_user'];
$conn = db_connect();


div_open();
	include 'regcheck.php'; 
div_close();



$applicant = $conn->query("SELECT * FROM applicants WHERE username='$username'");

if (!$applicant->num_rows==0)
	{
	header("Location:appform.php" );
	exit;
	}

//'$er_fname', '$er_gname', '$er_relation', '$er_phone', '$er_email', '$er_permadd', '$er_add_pc', '$er_add_city', '$er_add_country', 	
	
$insert_applicant=$conn->query("INSERT INTO applicants 
(username, fname, gname, gender, pob_country, pob_city, dob, citizen, mfname, mgname, permadd, add_pc, add_city, add_country, phone, proof_type, proof_num, firstlang, hs_name, hs_year, hs_date, hs_certnum, hs_country, hs_city,  pack, er_fname, er_gname, er_relation, er_phone, er_email, er_permadd, er_add_pc, er_add_city, er_add_country, about) 

VALUES 
('$username','$fname','$gname','$gender','$pob_country','$pob_city','$birthdate',
'$citizen', '$mfname', '$mgname', '$permadd', '$add_pc', '$add_city','$add_country', '$phone', '$proof_type', '$proof_num', '$firstlang','$hs_name','$hs_year', '$hs_date', '$hs_certnum', '$hs_country','$hs_city','$pack', '$er_fname', '$er_gname', '$er_relation', '$er_phone', '$er_email', '$er_permadd', '$er_add_pc', '$er_add_city', '$er_add_country','$about')");


//lekérdezi a jel_id-t az applicants táblából
$jel_id_q=$conn->query("SELECT jel_id FROM applicants WHERE username='$username'");
$sor=mysqli_fetch_array($jel_id_q);
$jel_id=$sor['jel_id'];

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

//No-ra állítja a jelentkezési doksikat
$insert_appdocs_No=$conn->query
	("INSERT INTO appdocs (jel_id, xray, dyslexia, HB_test, HB_vacc, HC_test, med_cert, hiv_test, app_form, school_cert, cv, photo, app_fee, passport, toefl, comp, birthcert) VALUES ('$jel_id', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No')");	
	
//No-ra állítja a beiratkozási doksikat
$insert_regdocs_No=$conn->query
	("INSERT INTO regdocs (jel_id, proof, study_a, fee_dec, prep, vorb, eng_ent, rd_subm, var_rub, imm_vacc, labreport) VALUES ('$jel_id', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No')");

if(($medicine)||($dentistry)||($pharmacy)||($prep)) //No-ra állítja az angolos doksikat
	{
	$insert_engdocs_No=$conn->query
	("INSERT INTO engdocs (jel_id, appfee, regform, entfee, trscrpt, crsdsc, diploma) VALUES ('$jel_id', 'No', 'No', 'No', 'No', 'No', 'No')");
	}
	
if(($medizin)||($vorbjahr)) //No-ra állítja a németes doksikat
	{	
	$insert_gerdocs_No=$conn->query
	("INSERT INTO gerdocs (jel_id, rh_pro, r_helf, r_san, r_ass, ges_kr, m_fach, phys, sg_fach, itbtms, krank, vbjmcd, ziv_d, fsj) VALUES ('$jel_id', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No')");
	}


//érettségi utáni tanulmányok
if($studs)
	{
	$insert_studs= $conn->query("INSERT INTO studs (jel_id, studs) VALUES ('$jel_id', '$studs')");
	}	
	
//képviselő neve
if($studs)
	{
	$insert_studs= $conn->query("INSERT INTO reps (jel_id, rep_name) VALUES ('$jel_id', '$rep_name')");
	}

//Kettős állampolgárság
if($citizen2)
	{
	$insert_citizen2= $conn->query("INSERT INTO citizen2 (jel_id, citizen2) VALUES ('$jel_id', '$citizen2')");
	}

	

if (!$insert_applicant)
	{
    throw new Exception('Could not register you in database. Please try again later.');
	}
	include('confirmation.php');
	do_html_footer();
	return true;
?>
