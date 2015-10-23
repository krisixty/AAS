<?php
ob_start(); //Turn on output buffering
require_once('aas_includes.php');
session_start();

$username=$_POST['username'];
$passwd=$_POST['passwd'];

if (isset($_POST['username'])&&($_POST['passwd'])) //bejelentkezés próba
/*if ($username && $passwd)*/
	{
	try
		{
		login($username, $passwd); // ha benne van az adatbázisban regisztráljs a user id-t
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
check_valid_user();
//display_user_menu();

$conn = db_connect();
$applicant = $conn->query("SELECT jel_id FROM applicants WHERE username='$username'");

if ($applicant->num_rows==0) //vizsgálja, hogy adott-e már be jelentkezést
	{
	//display_program_switcher(); //ez mutatja meg a jelentkezési infot jelentkezési időszakban
	display_application_over_info(); //ez mutatja meg, hogy a jelentkezési időszak véget ért
	}
else
	{	
	$sor=mysqli_fetch_array($applicant);
	$jel_id=$sor['jel_id'];
	print $sor['jel_id'];
	
	$bewerbung= $conn->query("SELECT program FROM jel_es_prog WHERE jel_id='$jel_id' AND (program='G1' OR program='V')");
	
	if ($bewerbung->num_rows>0)
		{
		header("Location:bewform.php" );
		}
	else
		{
		header("Location:appform.php" );
		}
	}	
	
do_html_footer();

?>
