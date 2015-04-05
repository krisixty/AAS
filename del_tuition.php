<?php
require_once('aas_includes.php');
include 'db_switcher.php';

//jelentkező azonosító változója
$jel_id=$_POST['jel_id'];

//törlendő befizetés változója
$tui_id = $_POST['tui_id'];

$del_decision=$conn->query
	("DELETE FROM tuitions WHERE tui_id='$tui_id'");
	echo 'Befizetés törölve.';
	?><br /><?php


include 'back_to_applicants.php';
do_html_footer();
