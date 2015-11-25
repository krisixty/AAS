<?php 
require_once('aas_includes.php');
session_start();
do_html_header('');
check_valid_officer_user();
display_officer_menu();

$username=$_SESSION['valid_user'];

include 'db_switcher.php'; //Eldönti az $app_year alapján, hogy melyik adatbázishoz kapcsolódjon 

$current_date=date('Y-m-d');
/*
$apps=$conn->query("SELECT * FROM applicants WHERE jel_id IN
( SELECT jel_id FROM decisions WHERE dfdate < '$current_date' )
AND jel_id IN 
( SELECT jel_id FROM jel_es_prog WHERE 
program='G1' OR program='V' )
ORDER by fname");
*/


$apps=$conn->query("SELECT * FROM applicants, jel_es_prog, decisions WHERE applicants.jel_id=jel_es_prog.jel_id AND 
(program='G1' OR program='V') AND decisions.jel_id=applicants.jel_id AND (dfdate > '$current_date' ) ORDER BY fname");


?>
Még nem lejárt visszajelzési határidős jelentkezők listája, német program, <strong><?php echo $app_year ?></strong><br  />
<br  />
<?php


include 'apptable_contents3_d.php';

?>


