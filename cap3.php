<html>
<body> <!-- the body tag is required or the CAPTCHA may not show on some browsers -->
<!-- your HTML content -->

<form method="post" action="register_new2.php">
<?php	
require_once('aas_includes.php');
$email=$_POST['email'];
$username=$_POST['username'];
$passwd=$_POST['passwd'];
$passwd2=$_POST['passwd2'];
?>

<input name="email" type="hidden" value="<?php print $email?>" />
<input name="username" type="hidden" value="<?php print $username?>" /> 
<input name="passwd" type="hidden" value="<?php print $passwd?>" /> 
<input name="passwd2" type="hidden" value="<?php print $passwd2?>" />  
 <?php
require_once('recaptchalib.php');
include 'capkeys.php';
echo recaptcha_get_html($publickey);
?>
<input type="submit" name="Submit" id="Submit" value="Submit" />
</form>
</body>
</html>