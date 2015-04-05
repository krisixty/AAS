<?php
require_once('aas_includes.php');

include 'db_switcher.php'; //Eldönti az $app_year alapján, hogy melyik adatbázishoz kapcsolódjon 
$result=$conn->query("SELECT * FROM applicants
   INNER JOIN jel_es_prog ON applicants.jel_id=jel_es_prog.jel_id
   LEFT JOIN user ON user.username=applicants.username
WHERE  
program='G1' OR program='V' ORDER BY fname");

$filename ="ETR_nemet_$app_year.xls";

$head = "Nem\tVezetéknév\tKeresztnév\tSzul_vnev\tSzul_knev\tÁllampolgárság\tSz_idő\tSzh_ország\tSzh_város\tSz_ok_tip\tSz_ok_szám\tCím\tIr_sz\tVáros\tOrszág\tAnyja vnev\tAnyja knev\tEmail\tSzak\tNyelv\tSchool leaving cert.: Name of school\tDate of graduation (y/m/d)\tCertificate number\tHS Country\tHS City\n";
echo $head;

header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);

while($sor=mysqli_fetch_array($result))
	{
	if($sor['gender']=='F')	
		{
		$gender='Férfi';
		}
	if($sor['gender']=='N')
		{
		$gender='Nő';	
		}

$fname=$sor['fname'];
$gname=$sor['gname'];
$bfname='';
$bgname='';

$dob  = $sor['dob']; $pieces = explode("-", $dob); $dob2=$pieces[0].'.'.$pieces[1].'.'.$pieces[2];

include 'ISO_pob_countries.php';

//$citizen=$sor['citizen'];
$citizen=$pob_country;

$pob_city=$sor['pob_city']; 

if($sor['proof_type']=='I')	
		{
		$proof_type='Személyi igazolvány';
		}
	if($sor['proof_type']=='P')
		{
		$proof_type='Útlevél';	
		}

$proof_num=$sor['proof_num']; 
$permadd=$sor['permadd']; 
$add_pc=$sor['add_pc']; 
$add_city=$sor['add_city']; 

include 'ISO_add_countries.php';

$mfname=$sor['mfname']; 
$mgname=$sor['mgname']; 

$email=$sor['email']; 
$program_ETR='orvos';
$nyelv='német';

//applicants folytatás
$hs_name=$sor['hs_name'];
$hs_country=$sor['hs_country'];
$hs_city=$sor['hs_city'];
$hs_date=$sor['hs_date'];
$hs_certnum=$sor['hs_certnum'];

//include 'programs_excel.php';

$contents = "$gender\t$fname\t$gname\t$bfname\t$bgname\t$citizen\t$dob2\t$pob_country\t$pob_city\t$proof_type\t$proof_num\t$permadd\t$add_pc\t$add_city\t$add_country\t$mfname\t$mgname\t$email\t$program_ETR\t$nyelv\t$hs_name\t$hs_date\t$hs_certnum\t$hs_country\t$hs_city\n";
	

echo $contents;
		}


 ?>