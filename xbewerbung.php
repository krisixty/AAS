<?php
require_once('aas_includes.php');

include 'db_switcher.php'; //Eldönti az $app_year alapján, hogy melyik adatbázishoz kapcsolódjon
$result=$conn->query("SELECT * FROM jel_es_prog
   INNER JOIN applicants ON applicants.jel_id=jel_es_prog.jel_id
   LEFT JOIN appdocs ON applicants.jel_id=appdocs.jel_id
   LEFT JOIN abitur ON jel_es_prog.jel_id=abitur.jel_id
   LEFT JOIN abitur_lf ON applicants.jel_id=abitur_lf.jel_id
   LEFT JOIN abitur_gf ON applicants.jel_id=abitur_gf.jel_id
   LEFT JOIN abitur_ng ON applicants.jel_id=abitur_ng.jel_id
   LEFT JOIN decisions ON applicants.jel_id=decisions.jel_id
   LEFT JOIN semesters ON applicants.jel_id=semesters.jel_id
   LEFT JOIN studs ON applicants.jel_id=studs.jel_id
   LEFT JOIN remarks_ad ON remarks_ad.jel_id=applicants.jel_id
   LEFT JOIN remarks_gd ON remarks_gd.jel_id=applicants.jel_id
   LEFT JOIN user ON user.username=applicants.username
   LEFT JOIN gerdocs ON applicants.jel_id=gerdocs.jel_id
   LEFT JOIN other ON applicants.jel_id=other.jel_id
   LEFT JOIN regdocs ON applicants.jel_id=regdocs.jel_id
   LEFT JOIN payments ON applicants.jel_id=payments.jel_id
   LEFT JOIN remarks_pay ON applicants.jel_id=remarks_pay.jel_id
   
   
WHERE program='G1' OR program='V'
ORDER BY fname");

//LEFT JOIN user ON user.username=applicants.username
//LEFT JOIN user ON applicants.username=user.username
//LEFT JOIN studs ON studs.jel_id=applicants.jel_id
//LEFT JOIN remarks_ad ON remarks_ad.jel_id=applicants.jel_id

$filename ="Bewerbung+Abitur_$app_year.xls";

/*Jel ID\t*/

$head = "Vezetéknév\tKeresztnév\tNem\tÁllampolgárság\tSz_idő\tSzh_ország\tSzh_város\tAnyja_vnev\tAnyja_knev\tSz_ok_tip\tSz_ok_szám\tCím\tIr_sz\tVáros\tOrszág\tÉr. helye\tÉr. éve\tÉr. tip\tÉr. átl.\tÉr.nem.német\tBio_LF\tChem_LF\tMath_LF\tPhys_LF\tBio_GF\tChem_GF\tMath_GF\tPhys_GF\tBio\tChem\tMath\tPhys\trh_pro\tr_helf\tr_san\tr_ass\tges_kr\tm_fach\tphys\tsg_fach\titbtms\tkrank\tvbjmcd\tziv_d\tfsj\tMegj. egyeb\tFelsőfokú\tJel_anyag_beérkezett\tMegj. jel_anyag\tJel_díj_megérkezett\tJel_díj_megj.\tPOTE\tSOTE\tPünkösd\tUsername\tEmail\tProgram\tDöntés\tVorb\tPrep\tJön\tHB_test\tHC_test\tHIV_test\tRöntgen\tWind und Röt\tImpf_HB\tGeburtsk\tGesund\tDyslexie\n";
echo $head;

header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);

while($sor=mysqli_fetch_array($result))
	{
$col1=$sor['jel_id'];
$col2=$sor['gender'];
$col3=$sor['fname'];
$col4=$sor['gname'];
$col5=$sor['citizen'];
$dob  = $sor['dob']; $pieces = explode("-", $dob); $col6=$pieces[2].'-'.$pieces[1].'-'.$pieces[0];
$col7=$sor['pob_country']; 
$col8=$sor['pob_city']; 
$mfname=$sor['mfname'];
$mgname=$sor['mgname'];
$col9=$sor['proof_type']; 
$col10=$sor['proof_num']; 
$col11=$sor['permadd']; 
$col12=$sor['add_pc']; 
$col13=$sor['add_city']; 
$col14=$sor['add_country'];
$hs_name=$sor['hs_name'];
$hs_year=$sor['hs_year']; 
$col15=$sor['ab_typ']; 
$col16=$sor['ab_avg']; 
$col17=$sor['ab_ng']; 
$col18=$sor['bio_lf'];
$col19=$sor['chem_lf'];
$col20=$sor['math_lf'];
$col21=$sor['phys_lf'];
$col22=$sor['bio_gf'];
$col23=$sor['chem_gf'];
$col24=$sor['math_gf'];
$col25=$sor['phys_gf'];
//az utolsó 4 félév eredményeit tantárgyanként összefűzzük
$col26=$sor['bio_1'].'-'.$sor['bio_2'].'-'.$sor['bio_3'].'-'.$sor['bio_4'];
$col27=$sor['chem_1'].'-'.$sor['chem_2'].'-'.$sor['chem_3'].'-'.$sor['chem_4'];
$col28=$sor['math_1'].'-'.$sor['math_2'].'-'.$sor['math_3'].'-'.$sor['math_4'];
$col29=$sor['phys_1'].'-'.$sor['phys_2'].'-'.$sor['phys_3'].'-'.$sor['phys_4'];

$rh_pro=$sor['rh_pro'];
$r_helf=$sor['r_helf'];
$r_san=$sor['r_san'];
$r_ass=$sor['r_ass'];
$ges_kr=$sor['ges_kr'];
$m_fach=$sor['m_fach'];
$phys=$sor['phys'];
$sg_fach=$sor['sg_fach'];
$itbtms=$sor['itbtms'];
$krank=$sor['krank'];
$vbjmcd=$sor['vbjmcd'];
$ziv_d=$sor['ziv_d'];
$fsj=$sor['fsj'];

$remarks_gd=$sor['remarks_gd'];
$studs=$sor['studs'];

//appdocs - anyag beérkezésének dátuma
$adate=$sor['adate'];

//jelentkezési díj megérkezésének dátuma
$pdate=$sor['pdate'];

//jelentkezési díjhoz tartozó megjegyzés
$remarks_pay=$sor['remarks_pay'];

$remarks_ad=$sor['remarks_ad'];

$vorb=$sor['vorb'];
$prep=$sor['prep'];

include 'other_excel.php';

/*$pote=$sor['pote'];
$sote=$sor['sote'];
$punk=$sor['punk'];*/

$username=$sor['username']; 
$email=$sor['email']; 

include 'programs_excel.php';
include 'decisions_excel.php';

//APPDOCS
$HB_test=$sor['HB_test'];
$HC_test=$sor['HC_test'];
$hiv_test=$sor['hiv_test'];
$xray=$sor['xray'];
$HB_vacc=$sor['HB_vacc'];
$birthcert=$sor['birthcert'];
$med_cert=$sor['med_cert'];
$dyslexia=$sor['dyslexia'];

//REGDOCS
$var_rub=$sor['var_rub'];


/*$col1\t -jel id van benne*/

$contents = "$col3\t$col4\t$col2\t$col5\t$col6\t$col7\t$col8\t$mfname\t$mgname\t$col9\t$col10\t$col11\t$col12\t$col13\t$col14\t$hs_name\t$hs_year\t$col15\t$col16\t$col17\t$col18\t$col19\t$col20\t$col21\t$col22\t$col23\t$col24\t$col25\t$col26\t$col27\t$col28\t$col29\t$rh_pro\t$r_helf\t$r_san\t$r_ass\t$ges_kr\t$m_fach\t$phys\t$sg_fach\t$itbtms\t$krank\t$vbjmcd\t$ziv_d\t$fsj\t$remarks_gd\t$studs\t$adate\t$remarks_ad\t$pdate\t$remarks_pay\t$pote\t$sote\t$punk\t$username\t$email\t$program\t$decision\t$vorb\t$prep\t$jon\t$HB_test\t$HC_test\t$hiv_test\t$xray\t$var_rub\t$HB_vacc\t$birthcert\t$med_cert\t$dyslexia\n";
	

echo $contents;
		}


 ?>