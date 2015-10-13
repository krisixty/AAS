<?php
require_once('aas_includes_UI_test.php');
//require_once('aas_includes.php'); 
session_start();
do_html_header('');
check_valid_user();
display_officer_menu();
$username=$_SESSION['valid_user'];

include 'db_switcher.php';

$pic_filename = $_POST['pic_filename'];
$flat_id = $_POST['flat_id'];
$pic_id = $_POST['pic_id'];
		echo $flat_id.'<br>';
		echo $pic_id;
		
		
	$del_flatpic=$conn->query
	("DELETE FROM flatpics WHERE pic_id='$pic_id'");
	echo $pic_filename.' deleted';

	$picsPath="upload/";
	unlink($picsPath.$pic_filename);
	
	?><br /><?php

backToFlat();
do_html_footer();
?>