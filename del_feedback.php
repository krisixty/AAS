<?php
require_once('aas_includes.php');
session_start();
do_html_header('');
check_valid_officer_user();
display_officer_menu();
$username=$_SESSION['valid_user'];
include 'db_switcher.php';

//jelentkező azonosító változója
$jel_id=$_POST['jel_id'];

//törlendő visszajelzés változója
$fb_id = $_POST['fb_id'];

$del_feedback=$conn->query
	("DELETE FROM feedbacks WHERE id='$fb_id'");
	echo 'Visszajelzés törölve.';
	?><br /><?php


include 'back_to_applicants.php';
do_html_footer();
