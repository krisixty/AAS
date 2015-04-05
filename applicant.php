<?php
require_once('aas_includes.php');
session_start();
do_html_header('');
check_valid_user();
display_officer_menu();
$username=$_SESSION['valid_user'];

include 'db_switcher.php';

$jel_id=$_POST['jel_id']; 
?>
Jelentkezők, angol program, <strong><?php echo $app_year;?></strong><br />
<?php
include 'data_application.php'; //ezt majd átrakni a docs.php-ba, meg kijavítani itt a katyvaszt...

$result=$conn->query("SELECT * FROM applicants WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($result);

require_once('docs.php');
do_html_footer();
?>





