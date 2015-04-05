<?php
require_once('aas_includes.php');
include 'db_switcher.php';

//jelentkező azonosító változója
$jel_id=$_POST['jel_id'];

//törlendő döntés változója
$dec_id = $_POST['dec_id'];

$del_decision=$conn->query
	("DELETE FROM decisions WHERE id='$dec_id'");
	echo 'Döntés törölve.';
	?><br /><?php


include 'back_to_applicants.php';
do_html_footer();
