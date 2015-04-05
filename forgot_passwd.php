<?php
require_once('aas_includes.php');
do_html_header('Resetting Password');
$username=$_POST['username'];

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

try
	{
	$password=reset_password($username);
	notify_password($username, $password);
	echo 'Your new password has been emailed to you.<br />';
	}

catch (Exception $e)
	{
	echo 'Your password could not be reset. Please try again later.';
	}
	
	
do_html_url('login.php', 'Login');
do_html_footer();
  }
?>
