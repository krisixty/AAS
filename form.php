<?php
ob_start(); //Turn on output buffering
require_once('aas_includes.php');
session_start();

do_html_header('');
check_valid_user();
//display_user_menu();

$username=$_SESSION['valid_user'];
$conn = db_connect();
$applicant = $conn->query("SELECT jel_id FROM applicants WHERE username='$username'");

if ($applicant->num_rows==0) //vizsgálja, hogy adott-e már be jelentkezést
	{
	display_program_switcher(); 
	}
else
	{	
	$sor=mysqli_fetch_array($applicant);
	$jel_id=$sor['jel_id'];
	print $sor['jel_id'];
	
	$bewerbung= $conn->query("SELECT program FROM jel_es_prog WHERE jel_id='$jel_id' AND (program='G1' OR program='V')");
	
	if ($bewerbung->num_rows>0)
		{
		header("Location:bewform.php" );
		}
	else
		{
		header("Location:appform.php" );
		}
	}	
do_html_footer();
?>
