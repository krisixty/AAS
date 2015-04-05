<html>
<body> <!-- the body tag is required or the CAPTCHA may not show on some browsers -->
<!-- your HTML content -->

<form method="post" action="forgot_passwd.php">
<?php	
require_once('aas_includes.php');
$username=$_POST['username'];
?>
<input name="username" type="hidden" value="<?php print $username?>" /> 
  
 <?php
require_once('recaptchalib.php');
include 'capkeys.php';
echo recaptcha_get_html($publickey);
?>
<input type="submit" name="Submit" id="Submit" value="Submit" />
</form>
</body>
</html>