<?php  
error_reporting(E_ALL & ~E_STRICT); /*Strict errort nem írja ki*/
//ini_set('include_path', '../include');
include('posts.php');
require_once 'Mail.php';  
//$medicine=$_POST['medicine']; 
  


$applicant = $conn->query("SELECT jel_id FROM applicants WHERE username='$username'");
$sor=mysqli_fetch_array($applicant);
$jel_id=$sor['jel_id'];
$bewerbung= $conn->query("SELECT program FROM jel_es_prog WHERE jel_id='$jel_id' AND (program='G1' OR program='V')");
	
	if ($bewerbung->num_rows>0)
		{
		include 'programs_email_d.php';
		include 'app_conf_mail_d.php';
		$subject=$gersub;
		$body=$germail;
		//$to2=', german1.fs@med.u-szeged.hu';
		}
	else
		{	
		include 'programs_email.php'; //a programok rövidítéséből íratja ki a program teljes nevét
		include 'app_conf_mail.php';
		$subject=$engsub;
		$body=$engmail;
		$to2=', apply.fs@med.u-szeged.hu';
		}

$from    = "confirmation@aas-szegedmed.hu";  //feladó
/*$to      = "sixty.kri@gmail.com";  */
$subject; //levél tárgya
$body; //levél szövege

/* SMTP server name, port, user/passwd */  
include 'email_smtp.php';  
  
$headers = array ('Content-Type' => 'text/plain; charset="utf-8"', 'From' => $from,'To' => $to,'Subject' => $subject, 'Content-Transfer-Encoding' => '8bit');
//$headers = array ('From' => $from,'To' => $to,'Subject' => $subject);  
$smtp = &Mail::factory('smtp', $smtpinfo ); 
  

@$to=$to.$to2; //hozzáfűzi az értesítendő tanulmányi előadó e-mail címét 
  
$mail = $smtp->send($to, $headers, $body);  
  
if (PEAR::isError($mail)) {  
  echo("<p>" . $mail->getMessage() . "</p>");  
 } else {  
  echo "<p>"."A confirmation email on your application has been sent to your e-mail address."."</p>" ;  
 }  
