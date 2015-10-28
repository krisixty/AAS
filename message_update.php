<?php
require_once('aas_includes.php');
session_start();
do_html_header('');
check_valid_user();
display_officer_menu();
$username=$_SESSION['valid_user'];


$jel_id=$_POST['jel_id'];
$message = $_POST['message'];
//üzenetek változója
//$message = trim(preg_replace('/\s+/', ' ', $_POST['message'])); /*Kiveszi az entereket és a tabokat*/

//Eldönti az $app_year alapján, hogy melyik adatbázishoz kapcsolódjon
include 'db_switcher.php'; 


$check_jel_id=$conn->query("SELECT * FROM messages WHERE jel_id='$jel_id'");

if ($check_jel_id->num_rows==0) 
	{
		$insert_message=$conn->query
	("INSERT INTO messages (jel_id, message) VALUES ('$jel_id', '$message')");
	echo 'Üzenet rögzítve.';
	?><br /><?php
	}
else
	{
	$update_messages=$conn->query
	("UPDATE messages SET message='$message' WHERE jel_id='$jel_id'");
	echo 'Üzenet frissítve.';	
	?><br /><?php
	}	



include 'back_to_applicants.php';
do_html_footer();
