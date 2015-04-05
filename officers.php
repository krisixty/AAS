<?php
require_once('aas_includes.php');
session_start();

@$username=$_POST['username'];
@$passwd=$_POST['passwd'];


if (isset($_POST['username'])&&($_POST['passwd'])) //bejelentkezés próba
/*if ($username && $passwd)*/
	{
	try
		{
		login2($username, $passwd); // ha benne van az officers adatbázisban regisztráljs a user id-t
		$_SESSION['valid_user']=$username;
		} 
	catch (Exception $e)	
		{
		do_html_header('Problem:'); //sikertelen bejelentkezés
		?><p class="text"><?php
		echo 'You could not be logged in. You must be logged in to view this page.';
		do_html_url('login.php', 'Login');
		do_html_footer();
		exit;
		}
	} 
	
do_html_header('');
check_valid_officer_user();
display_officer_menu();
display_officer_site_info();
do_html_footer();
?>
