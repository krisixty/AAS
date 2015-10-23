<?php
require_once('aas_includes.php');
session_start();
do_html_header('');
check_valid_user();
$username=$_SESSION['valid_user'];



//include 'mimereader.class.php';
$conn = db_connect(); 

$type_of_doc = $_POST['type_of_doc'];
$jel_id = $_POST['jel_id'];

div_open();

	include 'upload_docs.php';

//végül visszaadja a jel_id-t az applicant.php vagy applicant_d.php-nak, hogy az újra le tudja kérni a jelentkező adatait, de előtte vizsgálja, hogy van-e német programra jelentkezése
$bewerbung= $conn->query("SELECT program FROM jel_es_prog WHERE jel_id='$jel_id' AND (program='G1' OR program='V')");
	
	if ($bewerbung->num_rows>0)
		{
		$backTo='app_status_d.php';
		}
	else
		{
		$backTo='app_status.php';
		}
?><br><br><?
backTo();
div_close();
do_html_footer();
?>