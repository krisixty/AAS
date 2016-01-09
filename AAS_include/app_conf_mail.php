<?php
include 'engmail_data.php';
//angol nyelvű visszajelzés a jelentkezésről: tárgy, szöveg
$engsub = "Confirmation of your University of Szeged Application";
$engmail = "Dear Applicant,\n\n

Thank you for your interest in studying at the University of Szeged, Hungary.

This is a confirmation mail of your University of Szeged registration on-line; however, in order to complete your application, please send the hard copy of the Registration Form along with the required documents directly to the following address by postal service or a courier company:

Foreign Students' Secretariat
University of Szeged
Dóm tér 12.,Szeged, H-6720, Hungary 
or
to your local representative (for the list of representatives please visit www.studyhungary.hu) 

 
This email is an automated notification from the Application and Admission System (AAS) of the University of Szeged, Hungary, which is unable to receive replies.


Your username is $username

Applied program(s):
$medicine
$dentistry 
$pharmacy
$prep

Family name: $fname
First name: $gname
Gender: $gender
Place of Birth: $pob_city, $pob_country 
Date of Birth: $day-$month-$year
Citizenship: $citizen
Citizenship 2 (if any): $citizen2

Mother's maiden name:
Family name: $mfname
Given name: $mgname

Permanent Address: $permadd
Postal code: $add_pc
City: $add_city, Country: $add_country
Phone number: $phone
Proof of Identification: $proof_type, Number: $proof_num

Your first language: $firstlang

High school Leaving Examination: 
$hs_name, $hs_year
$hs_city, $hs_country

Studies following high school graduation(if any):
$studs

In case of Emergency please notify:	
Family name: $er_fname
First name: $er_gname
Relationship: $er_relation
Phone number: $er_phone
E-mail: $er_email
Permanent Address: $er_permadd
Postal Code: $er_add_pc
City: $er_add_city
Country: $er_add_country


I am sending my application package to the: $pack
Name of your local representative (if any): $rep_name
How did you learn about this program (please specify): $about


For further information on the application procedure, please contact our admission officer at apply.fs@med.u-szeged.hu or at + 36 (70) 439-2124 or at + 36 (62) 342-124 or your local representative.

The University of Szeged will only disclose information to the representatives of Study Hungary who may contact you.

The University of Szeged will not divulge your personal data for direct marketing purposes.


The Admission Team of University of Szeged";  

?>