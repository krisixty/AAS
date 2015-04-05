<?php 
require_once('aas_includes.php');
session_start();
do_html_header('');
check_valid_user();
display_officer_menu();

$username=$_SESSION['valid_user'];

include 'db_switcher.php'; //Eldönti az $app_year alapján, hogy melyik adatbázishoz kapcsolódjon 

//Csinál két lekérdezést, egyikben csak az M1-esek vannak, másikban csak a G1-esek, aztán van a fő lekérdezés, ami lekérdezi az applicantst, de csak azokat a rekordokat szedi le, amik mindkét másik lekérdezésben szerepelnek
$apps=$conn->query("SELECT * FROM applicants WHERE jel_id IN
( SELECT jel_id FROM jel_es_prog WHERE program = 'M1' )
AND jel_id IN ( SELECT jel_id FROM jel_es_prog WHERE program = 'G1' )
ORDER by fname");
?>
Angol és német program párhuzamos jelentkezései, <strong><?php echo $app_year ?></strong><br  />
<br  />
<?php


include 'apptable_contents2.php';

?>


