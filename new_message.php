<?php
require_once('aas_includes.php');
session_start();
do_html_header('');
check_valid_user();
display_officer_menu();
$username=$_SESSION['valid_user'];

include 'db_switcher.php'; 

$jel_id=$_POST['jel_id'];
$message = $_POST['message'];
$mes_dt = date("Y-m-d-H-i-s");
//üzenetek változója
//$message = trim(preg_replace('/\s+/', ' ', $_POST['message'])); /*Kiveszi az entereket és a tabokat*/

$insert_message=$conn->query
	("INSERT INTO messages (jel_id, message, mes_dt) VALUES ('$jel_id', '$message', '$mes_dt')");
	echo 'Üzenet rögzítve.';


include 'back_to_applicants.php';
do_html_footer();
