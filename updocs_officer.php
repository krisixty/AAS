<?php 
require_once('aas_includes.php');
session_start();
do_html_header('');
check_valid_officer_user();
display_officer_menu();
$username=$_SESSION['valid_user'];

include 'db_switcher.php';

$jel_id = $_POST['jel_id'];
$type_of_doc = $_POST['type_of_doc'];

	include 'upload_docs.php';		
	
include 'back_to_applicants.php';
do_html_footer();
?>
