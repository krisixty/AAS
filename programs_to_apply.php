<?php
$pg_name = 'programs_to_apply';
require_once('aas_includes.php');
//require_once('aas_includes.php'); 
session_start();
do_html_header('');
check_valid_user();
display_officer_menu();
$username=$_SESSION['valid_user'];

include 'db_switcher.php';

echo $app_year.'<br>';
	
$M1 = $_POST['M1'];
$M1e = $_POST['M1e'];
$A = $_POST['A'];
$M2 = $_POST['M2'];
$M3 = $_POST['M3'];
$D1 = $_POST['D1'];
$D1e = $_POST['D1e'];
$D2 = $_POST['D2'];
$D3 = $_POST['D3'];
$P1 = $_POST['P1'];
$P1e = $_POST['P1e'];
$P2 = $_POST['P2'];
$P3 = $_POST['P3'];
$F = $_POST['F'];
$G1 = $_POST['G1'];
$V = $_POST['V'];


if ($updateProgApply=$conn->query
	("UPDATE progapply SET M1='$M1', M1e='$M1e', A='$A', M2='$M2', M3='$M3', D1='$D1', D1e='$D1e', D2='$D2', D3='$D3', P1='$P1', P1e='$P1e', P2='$P2', P3='$P3', F='$F', G1='$G1', V='$V'")) 
			{
				echo 'Programadatok frissítve.';			
			}
		else
			{
				echo 'Programadatok frissítése sikertelen.';	
			}	
/*	
echo '<br>'.$M1 .'<br>';
echo $M1e .'<br>';
echo $A .'<br>';
echo $M2 .'<br>';
echo $M3 .'<br>';
echo $D1 .'<br>';
echo $D1e .'<br>';
echo $D2 .'<br>';
echo $D3 .'<br>';
echo $P1 .'<br>';
echo $P1e .'<br>';
echo $P2 .'<br>';
echo $P3 .'<br>';
echo $F .'<br>';
echo $G1 .'<br>';
echo $V .'<br>';
*/
backBack();	
do_html_footer();	
