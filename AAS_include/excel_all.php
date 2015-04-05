<?php
require_once('aas_includes.php');

$conn = db_connect();
$result=$conn->query("SELECT * FROM applicants
   INNER JOIN jel_es_prog ON applicants.jel_id=jel_es_prog.jel_id
   LEFT JOIN user ON user.username=applicants.username
   LEFT JOIN regdocs ON applicants.jel_id=regdocs.jel_id
   LEFT JOIN appdocs ON applicants.jel_id=appdocs.jel_id
   LEFT JOIN engdocs ON applicants.jel_id=engdocs.jel_id
   LEFT JOIN other ON applicants.jel_id=other.jel_id
   LEFT JOIN decisions ON applicants.jel_id=decisions.jel_id
   LEFT JOIN remarks_rd ON applicants.jel_id=remarks_rd.jel_id
   LEFT JOIN remarks_dec ON applicants.jel_id=remarks_dec.jel_id
   LEFT JOIN remarks_fur ON applicants.jel_id=remarks_fur.jel_id
   LEFT JOIN reps ON applicants.jel_id=reps.jel_id
   LEFT JOIN citizen2 ON applicants.jel_id=citizen2.jel_id
   LEFT JOIN entrance_exam ON applicants.jel_id=entrance_exam.jel_id
   LEFT JOIN entrance_exam_2 ON applicants.jel_id=entrance_exam_2.jel_id
WHERE  
program='M1' OR 
program='M1e' OR 
program='A' OR
program='M2' OR
program='M3' OR
program='D1' OR 
program='D1e' OR 
program='D2' OR
program='D3' OR
program='P1' OR 
program='P1e' OR 
program='P2' OR
program='P3' OR
program='F' ORDER BY fname");

$filename ="All_test.xls";

$head = "Jel. ID\tUsername\tGender\tFamily Name\tFirst & Middle Name\tCitizenship/Nationality\tCitizen2\tDate of Birth\tCity of Birth\tCountry of Birth\tID/Passport - type\tID/Passport number\tMother's family name (Maiden)\tMother's first name\tAddress: No., Street\tPostal Code\tCity (State, County)\tCountry\tE-mail\tTelephone\tDate of application (online)\tDate of application (hard copy)\tApplied to\tAppl. Fee (200 USD)\tAppl. Fee paid to Agent\tSzeged entrance exam\tEntrance exam fee (300 USD)\tTime of 1st entrance exam\tPlace of 1st entrance exam\tTime of 2nd entrance exam\tPlace of 2nd entrance exam\tDecision based on the following\tDecision\tDecision_prog\tLetter sent to the student via e-mail\tLetter sent to\tLetter sent to CI/Avi/S by post\tDate\tDeadline for accepting the place\tRemark - decision\tBank receipt\tPOE\tSA\tRemark - reg. docs\tAgent\tApplication form\tHSD\tCV\tPhoto\tPassport/ID card (copy)\tMed.Cert\tHepaB vacc. card\tHepaB test\tHepaC\tHIV\tChest X-ray result\tDyslexia\tTOEFL\tTranscript\tSyllabus\tDiploma\tAll application documents submitted\tAccepted to SOTE\tAccepted to POTE\tAccepts the place\tSchool leaving cert.: Name of school\tDate of graduation (y/m/d)\tCertificate number\tCountry\tCity\t1_Bio_wr\t1_Chem_wr\t1_Eng_wr\t1_Phys_wr\t1_Bio_or1\t1_Bio_or2\t1_Chem_or1\t1_Chem_or2\t1_Eng_or\t1_Phys_or1\t1_Phys_or2\t1_Comment\t1_Examiner\t2_Bio_wr\t2_Chem_wr\t2_Eng_wr\t2_Phys_wr\t2_Bio_or1\t2_Bio_or2\t2_Chem_or1\t2_Chem_or2\t2_Eng_or\t2_Phys_or1\t2_Phys_or2\t2_Comment\t2_Examiner\n";
echo $head;


header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);

while($sor=mysqli_fetch_array($result))
	{
//applicants	
$jel_id=$sor['jel_id'];
$username=$sor['username']; 
$gender=$sor['gender'];

$fname=$sor['fname'];
$gname=$sor['gname'];
$citizen=$sor['citizen'];

//citizen2
$citizen2=$sor['citizen2'];

//applicants folytatás
$dob  = $sor['dob']; /*$pieces = explode("-", $dob); $dob2=$pieces[2].'-'.$pieces[1].'-'.$pieces[0];*/ /*ideiglenesen ki lett kapcsolva mert nem egységes az excelben*/ 
$pob_city=$sor['pob_city']; 
$pob_country=$sor['pob_country']; 
$email=$sor['email'];
$phone=$sor['phone'];

include 'proof_type_excel.php';

//appdocs - anyag beérkezésének dátuma
$date=$sor['date'];

//applicants folytatása
$proof_num=$sor['proof_num']; 
$mfname=$sor['mfname']; 
$mgname=$sor['mgname']; 
$permadd=$sor['permadd']; 
$add_pc=$sor['add_pc']; 
$add_city=$sor['add_city']; 
$add_country=$sor['add_country'];
$appdate=$sor['appdate'];

include 'programs_excel.php';

$app_fee=$sor['app_fee'];
$appfee=$sor['appfee'];
$regform=$sor['regform'];
$entfee=$sor['entfee'];

//entrance_exam
$e_date=$sor['e_date'];
$e_place=$sor['e_place'];
$bio_wr=$sor['bio_wr']; 
$chem_wr=$sor['chem_wr'];
$phys_wr=$sor['phys_wr'];
$eng_wr=$sor['eng_wr'];
$bio_or=$sor['bio_or'];
$bio_or2=$sor['bio_or2'];
$chem_or=$sor['chem_or'];
$chem_or2=$sor['chem_or2'];
$eng_or=$sor['eng_or'];
$phys_or=$sor['phys_or'];
$phys_or2=$sor['phys_or2'];
$examiner=$sor['examiner'];
$suggestion=$sor['suggestion']; //commentként szerepel a fejlécben

//entrance_exam_2
$e_date_2=$sor['e_date_2'];
$e_place_2=$sor['e_place_2'];
$bio_wr_2=$sor['bio_wr_2'];
$chem_wr_2=$sor['chem_wr_2'];
$phys_wr_2=$sor['phys_wr_2'];
$eng_wr_2=$sor['eng_wr_2'];
$bio_or_2=$sor['bio_or_2'];
$bio_or2_2=$sor['bio_or2_2'];
$chem_or_2=$sor['chem_or_2'];
$chem_or2_2=$sor['chem_or2_2'];
$eng_or_2=$sor['eng_or_2'];
$phys_or_2=$sor['phys_or_2'];
$phys_or2_2=$sor['phys_or2_2'];
$examiner_2=$sor['examiner_2'];
$suggestion_2=$sor['suggestion_2']; //commentként szerepel a fejlécben

//Decisions:
$basis=$sor['basis'];
include 'decisions_english_excel.php';
include 'programs_excel_for_decisions.php';
$dfdate=$sor['dfdate'];	
$emaildate=$sor['emaildate'];
$tocas=$sor['tocas'];
$letterdate=$sor['letterdate'];

//remarks_dec
$remarks_dec = trim(preg_replace('/\s\s+/', ' ', $sor['remarks_dec']));
//$remarks_dec=$sor['remarks_dec'];

//regdocs
$fee_dec=$sor['fee_dec'];
$proof=$sor['proof'];
$study_a=$sor['study_a'];

//remarks_rd
$remarks_rd = trim(preg_replace('/\s\s+/', ' ', $sor['remarks_rd']));

//reps
$rep_name=$sor['rep_name'];

//appdocs
$app_form=$sor['app_form'];
//$school_cert=$sor['school_cert'];
$cv=$sor['cv'];
$photo=$sor['photo'];
$passport=$sor['passport'];
$med_cert=$sor['med_cert'];
$HB_vacc=$sor['HB_vacc'];
$HB_test=$sor['HB_test'];
$HC_test=$sor['HC_test'];
$hiv_test=$sor['hiv_test'];
$xray=$sor['xray'];
$dyslexia=$sor['dyslexia'];
$toefl=$sor['toefl'];

//engdocs
//$trscrpt=$sor['trscrpt'];
//$crsdsc=$sor['crsdsc'];
//$diploma=$sor['diploma'];

include 'not_certified_excel.php';

//appdocs - anyaga teljes?
$comp=$sor['comp'];


//other 
include 'other_excel_english.php';

//további megjegyzések
$remarks_fur = trim(preg_replace('/\s\s+/', ' ', $sor['remarks_fur']));

//applicants folytatás
$hs_name=$sor['hs_name'];
$hs_country=$sor['hs_country'];
$hs_city=$sor['hs_city'];
$hs_date=$sor['hs_date'];
$hs_certnum=$sor['hs_certnum'];

$emaildate=$sor['emaildate'];

include 'sent_excel.php';

$letterdate=$sor['letterdate'];

$contents = "$jel_id\t$username\t$gender\t$fname\t$gname\t$citizen\t$citizen2\t$dob\t$pob_city\t$pob_country\t$proof_type\t$proof_num\t$mfname\t$mgname\t$permadd\t$add_pc\t$add_city\t$add_country\t$email\t$phone\t$appdate\t$date\t$program\t$app_fee\t$appfee\t$regform\t$entfee\t$e_date\t$e_place\t$e_date_2\t$e_place_2\t$basis\t$decision\t$prog\t$emaildate\t$tocas\t$letterdate\t$dfdate\t$remarks_dec\t$fee_dec\t$proof\t$study_a\t$remarks_rd\t$rep_name\t$app_form\t$school_cert\t$cv\t$photo\t$passport\t$med_cert\t$HB_vacc\t$HB_test\t$HC_test\t$hiv_test\t$xray\t$dyslexia\t$toefl\t$trscrpt\t$crsdsc\t$diploma\t$comp\t$sote\t$pote\t$jon\t$hs_name\t$hs_date\t$hs_certnum\t$hs_country\t$hs_city\t$bio_wr\t$chem_wr\t$eng_wr\t$phys_wr\t$bio_or\t$bio_or2\t$chem_or\t$chem_or2\t$eng_or\t$phys_or\t$phys_or2\t$suggestion\t$examiner\t$bio_wr_2\t$chem_wr_2\t$eng_wr_2\t$phys_wr_2\t$bio_or_2\t$bio_or2_2\t$chem_or_2\t$chem_or2_2\t$eng_or_2\t$phys_or_2\t$phys_or2_2\t$suggestion_2\t$examiner_2\n";


//$contents=mb_convert_encoding($contents, 'UTF-16LE', 'UTF-8');	
//print chr(255) . chr(254) . mb_convert_encoding($contents, 'UTF-16LE', 'UTF-8');

echo $contents;
		}


 ?>