<?php
$pg_name = 'del_flat';
require_once('aas_includes.php');
session_start();
do_html_header('');
check_valid_user();
display_officer_menu();
$username=$_SESSION['valid_user'];

include 'db_switcher.php';

//törlendő lakás változója
$flat_id = $_POST['flat_id'];

$del_flat=$conn->query
	("DELETE FROM flats WHERE flat_id='$flat_id'");
	echo 'Lakás törölve.';
	echo $flat_id;
	?><br /><?php

backToFlat();
do_html_footer();
