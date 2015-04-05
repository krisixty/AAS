<?php
require_once('aas_includes.php');
session_start();
do_html_header('');
check_valid_user();
display_officer_menu();

$username=$_SESSION['valid_user'];
$prog=$_POST['prog'];
include 'db_switcher.php'; //Eldönti az $app_year alapján, hogy melyik adatbázishoz kapcsolódjon 

?>
Felvettek névsora, <strong><?php echo $app_year ?></strong><br  />
Program: <?php include 'programs_dec_stat.php';?> 
<br>
<?php
include 'db_switcher.php'; //Eldönti az $app_year alapján, hogy melyik adatbázishoz kapcsolódjon 

$apps=$conn->query("SELECT * FROM applicants INNER JOIN decisions ON applicants.jel_id=decisions.jel_id WHERE prog='$prog' AND decision='F' ORDER BY fname");


include 'apptable_contents2.php';

?>


