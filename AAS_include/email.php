<?php  
error_reporting(E_ALL & ~E_STRICT); /*Strict errort nem írja ki*/
require_once 'Mail.php';  
  
$from    = "confirmation@aas-szegedmed.hu";  
/*$to      = "sixty.kri@gmail.com";  */
$subject = "New AAS password";  
$body    = "Dear Applicant,\n\nThis is to inform you that your University of Szeged Application and Admission System password has been changed to $password ";  
  
/* SMTP server name, port, user/passwd */  
include 'email_smtp.php';  
  
$headers = array ('Content-Type' => 'text/plain; charset="utf-8"', 'From' => $from,'To' => $to,'Subject' => $subject, 'Content-Transfer-Encoding' => '8bit');
//$headers = array ('From' => $from,'To' => $to,'Subject' => $subject);  
$smtp = &Mail::factory('smtp', $smtpinfo ); 
  
  
$mail = $smtp->send($to, $headers, $body);  
  
if (PEAR::isError($mail)) {  
  echo("<p>" . $mail->getMessage() . "</p>");  
 } else {  
  echo("<p>Message successfully sent.</p>");  
 }  
?>  