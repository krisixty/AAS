<?php  
error_reporting(E_ALL & ~E_STRICT); /*Strict errort nem írja ki*/
require_once 'Mail.php';  
  
$from    = "confirmation@aas-szegedmed.hu";  
/*$to      = "sixty.kri@gmail.com";  */

if ($notification_type == 'decision') {
	
$subject = "AAS(Decision) - The decision on your application is available";  
$body    = "Dear $applicant_username Applicant,\n\n
The decision on your application has been uploaded to your AAS online account. To view the result please log in to your account at http://aas-szegedmed.hu

This email is automatically generated; please do not reply to it.

Regards, 

The Admissions Team";  

}

if ($notification_type == 'message') {
	
$subject = "AAS(Message) - You have received a message from the University of Szeged";  
$body    = "Dear $applicant_username Applicant,\n\n
We posted a message on to your personal AAS online account. Please make sure to view this message by logging in to your account at http://aas-szegedmed.hu

This email is automatically generated; please do not reply to it.
	 
Regards,

The Admissions Team";
}

if ($notification_type == 'message_d') {
	
$subject = "Sie haben eine Nachricht im AAS System erhalten";  
$body    = "Sehr geehrte/r $applicant_username Bewerber/in!\n\n
Sie haben eine Nachricht im AAS System erhalten.
Klicken Sie bitte auf das folgende Link um sich in das AAS System einzuloggen:
http://aas-szegedmed.hu

Mit freundlichen Grüßen

Sekretariat für ausländische Studenten";
}


  
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