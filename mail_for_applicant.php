<?php
require_once('aas_includes.php');
session_start();
do_html_header('');
check_valid_user();
display_officer_menu();
$username=$_SESSION['valid_user'];

include 'db_switcher.php';

$jel_id = $_POST['jel_id'];

$notification_type = $_POST['notification_type'];

$result=$conn->query("SELECT * FROM applicants WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($result);
$applicant_username = $sor['username'];

echo $applicant_username;


				try
					{
					send_mail_for_applicant($applicant_username, $notification_type);
					}
				catch (Exception $e)
					{
					echo 'Information email could not be sent. Please try again later.';
					}
					
include 'back_to_applicants.php';
do_html_footer();
?>





