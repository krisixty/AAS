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
$m_id = $_POST['m_id'];

$del_message=$conn->query
	("DELETE FROM messages WHERE m_id='$m_id'");
	echo 'Üzenet törölve.';
	?><br /><?php


include 'back_to_applicants.php';
do_html_footer();
