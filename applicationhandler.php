<?php 
require_once('aas_includes.php');
session_start();
do_html_header('');
check_valid_user();
display_officer_menu();

$username=$_SESSION['valid_user'];

include 'db_switcher.php'; //Eldönti az $app_year alapján, hogy melyik adatbázishoz kapcsolódjon 

$formAction = '';
dbSwitcherSelect();


$result=$conn->query("SELECT * FROM progapply");
$row=mysqli_fetch_array($result);

$M1 = $row['M1'];
$M1e = $row['M1e'];
$A = $row['A'];
$M2 = $row['M2'];
$M3 = $row['M3'];
$D1 = $row['D1'];
$D1e = $row['D1e'];
$D2 = $row['D2'];
$D3 = $row['D3'];
$P1 = $row['P1'];
$P1e = $row['P1e'];
$P2 = $row['P2'];
$P3 = $row['P3'];
$F = $row['F'];
$G1 = $row['G1'];
$V = $row['V'];

?>
<br><br><br>
<?
display_appHandlerForm();
do_html_footer()
?>

