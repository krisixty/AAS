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
program='M1' OR 
program='M1e' OR 
program='A' OR
program='M2' OR
program='M3' OR
program='D1' OR 
program='D1e' OR 
program='D2' OR
program='D3' OR
program='P1' OR 
program='P1e' OR 
program='P2' OR
program='P3' OR
program='F' )
ORDER by fname");
*/


$apps=$conn->query("SELECT * FROM applicants, jel_es_prog, decisions WHERE applicants.jel_id=jel_es_prog.jel_id AND 
(program='M1' OR 
program='M1e' OR 
program='A' OR
program='M2' OR
program='M3' OR
program='D1' OR 
program='D1e' OR 
program='D2' OR
program='D3' OR
program='P1' OR 
program='P1e' OR 
program='P2' OR
program='P3' OR
program='F') AND decisions.jel_id=applicants.jel_id AND (dfdate < '$current_date' ) ORDER BY fname");


?>
Lejárt visszajelzési határidős jelentkezők listája, angol program, <strong><?php echo $app_year ?></strong><br  />
<br  />
<?php


include 'apptable_contents3.php';

?>


