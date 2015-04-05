<?php
require_once('aas_includes.php');

$email=$_POST['email'];
$username=$_POST['username'];
$passwd=$_POST['passwd'];
$passwd2=$_POST['passwd2'];


  require_once('recaptchalib.php');
  include 'capkeys.php';
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
    die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
         "(reCAPTCHA said: " . $resp->error . ")");
  } else 
  {
    // Your code here to handle a successful verification
	

session_start();

try
{
	
	if (!filled_out($_POST))
		{
		throw new Exception ('You have not filled the form out correctly. Please go back and try again.');
		
		}
	if (!valid_email($email))
		{
		throw new Exception ('That is not a valid email address. Please go back and try again.');
		}
	if ($passwd!==$passwd2)
		{
		throw new Exception ('The passwords you have entered do not match. Please go back and try again.');
		}
	if ((strlen($passwd)<6)||(strlen($passwd2)>16))
		{
		throw new Exception ('Your password must be between 6 and 16 characters. Please go back and try again.');	
		}
	register($username, $email, $passwd);
	$_SESSION['valid_user']=$username;
	do_html_header('Registration successful');
	//display_application_info();
	//do_html_footer();
	header("Location:member.php" );
}

catch (Exception $e)
	{
	do_html_header('Problem:');	
	echo $e->getMessage();
	do_html_footer();
	exit;
	}
 }
?>