<?php
require_once('aas_includes.php');
session_start();
do_html_header('');
check_valid_user();
display_officer_menu();

$username=$_SESSION['valid_user'];
$program=$_POST['program'];
include 'db_switcher.php'; //Eldönti az $app_year alapján, hogy melyik adatbázishoz kapcsolódjon 

?>
Jelentkezők névsora, <strong><?php echo $app_year ?></strong><br  />
Program: <?php include 'programs_stat.php';?> 
<br>

<?php


$apps=$conn->query("SELECT * FROM applicants INNER JOIN jel_es_prog ON applicants.jel_id=jel_es_prog.jel_id WHERE program='$program' ORDER BY fname");

include 'apptable_contents2.php';

?>


