<?php
require_once('aas_includes.php');
session_start();
do_html_header('');
check_valid_user();
display_officer_menu();
$username=$_SESSION['valid_user'];

include 'db_switcher.php';
?>
flatadmin <strong><?php echo $app_year;?></strong><br>
<br>
<a href="flatform.php">Új albérlet felvitele</a><br>
<a href="flat_list.php">Albérletek</a>
<br>
<br>
<br>
(Runs under DB maintest_15!) 
<?php
do_html_footer();
?>





