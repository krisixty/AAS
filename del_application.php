<?php
require_once('aas_includes.php');
include 'db_switcher.php';

//jelentkező azonosító változója
$jel_id=$_POST['jel_id'];

//törlendő jelentkezés változója
$appid = $_POST['appid'];

$del_decision=$conn->query
	("DELETE FROM jel_es_prog WHERE appid='$appid'");
	echo 'Jelentkezés törölve.';
	?><br /><?php


include 'back_to_applicants.php';
do_html_footer();
