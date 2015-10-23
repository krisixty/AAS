<?php 
require_once('aas_includes.php');
session_start();
do_html_header('');
check_valid_user();
display_officer_menu();
$username=$_SESSION['valid_user'];

include 'db_switcher.php';

//Adatbázis változója
echo 'Jelenlegi adatbázis:'.$app_year.'<br>';

//személyes adatok változói
include 'posts.php';

//email változója
$email=$_POST['email'];

//kettős állampolgárság
$citizen2=str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($_POST['citizen2']))));

//jelentkező azonosító változó
$jel_id=$_POST['jel_id'];

//$space=' '; //szóköz, melyet több változóhoz is hozzáfűz, hogy üres mező esetén is legyen érték

//német érettségi típus+átlag változói
@$ab_typ=$_POST['ab_typ'];
@$ab_avg=$_POST['ab_avg'];

//nem németországi érettségi változója
$ab_ng = trim(preg_replace('/\s+/', ' ', $_POST['ab_ng'])); /*Kiveszi az entereket és a tabokat*/

//egyéb végzettség változó
$qual = trim(preg_replace('/\s+/', ' ', $_POST['qual'])); /*Kiveszi az entereket és a tabokat*/

//felsőfokú tanulmányi adat változó
$studs = trim(preg_replace('/\s+/', ' ', $_POST['studs'])); /*Kiveszi az entereket és a tabokat*/

//egyéb szakmai gyakorlat változó
$practices = trim(preg_replace('/\s+/', ' ', $_POST['practices'])); /*Kiveszi az entereket és a tabokat*/

//jelentkezési dokumentumok változói
$ayear=$_POST['ayear'];
$amonth=$_POST['amonth'];
$aday=$_POST['aday'];
$adate=$ayear.$amonth.$aday;

$xray = $_POST['xray'];
$dyslexia = $_POST['dyslexia'];
$HB_test = $_POST['HB_test'];
$HB_vacc = $_POST['HB_vacc'];
$HC_test = $_POST['HC_test'];
$med_cert = $_POST['med_cert'];
$hiv_test = $_POST['hiv_test'];
$app_form = $_POST['app_form'];
$school_cert = $_POST['school_cert'];
$cv = $_POST['cv'];
$photo = $_POST['photo'];
$app_fee = $_POST['app_fee'];
$passport = $_POST['passport'];
$toefl = $_POST['toefl'];
$comp = $_POST['comp'];
$birthcert = $_POST['birthcert'];
$labreport = $_POST['labreport'];

//jelentkezési dokumentumok megjegyzésének változója
$remarks_ad = trim(preg_replace('/\s+/', ' ', $_POST['remarks_ad'])); /*Kiveszi az entereket és a tabokat*/

//beiratkozási dokumentumok változói
$proof = $_POST['proof'];
$study_a = $_POST['study_a'];
$fee_dec = $_POST['fee_dec'];
$prep = $_POST['prep'];
$vorb = $_POST['vorb'];
$eng_ent = $_POST['eng_ent'];
$rd_subm = $_POST['rd_subm'];

$imm_vacc = $_POST['imm_vacc'];
$var_rub = $_POST['var_rub'];

//beiratkozási dokumentumok megjegyzésének változója
$remarks_rd = trim(preg_replace('/\s+/', ' ', $_POST['remarks_rd'])); /*Kiveszi az entereket és a tabokat*/

 
//angol képzés speciális dokumentumainak változói
$appfee=$_POST['appfee'];
$regform=$_POST['regform'];
$entfee=$_POST['entfee'];
$trscrpt=$_POST['trscrpt'];
$crsdsc=$_POST['crsdsc'];
$diploma=$_POST['diploma'];

//német képzés speciális dokumentumainak változói
$rh_pro=$_POST['rh_pro'];
$r_helf=$_POST['r_helf'];
$r_san=$_POST['r_san'];
$r_ass=$_POST['r_ass'];
$ges_kr=$_POST['ges_kr'];
$m_fach=$_POST['m_fach'];
$phys=$_POST['phys'];
$sg_fach=$_POST['sg_fach'];
$itbtms=$_POST['itbtms'];
$krank=$_POST['krank'];
$vbjmcd=$_POST['vbjmcd'];
$ziv_d=$_POST['ziv_d'];
$fsj=$_POST['fsj'];

//felvételi vizsga include - megcsináljam-e így a többit?
include 'regdocs_entrance.php';


//német képzés speciális dokumentumainak megjegyzésének változója
$remarks_gd = trim(preg_replace('/\s+/', ' ', $_POST['remarks_gd'])); /*Kiveszi az entereket és a tabokat*/


//üzenetek változója
$message = trim(preg_replace('/\s+/', ' ', $_POST['message'])); /*Kiveszi az entereket és a tabokat*/


//befizetések változói
$pyear=$_POST['pyear'];
$pmonth=$_POST['pmonth'];
$pday=$_POST['pday'];
$pdate=$pyear.$pmonth.$pday;

//befizetések megjegyzésének változója
$remarks_pay = trim(preg_replace('/\s+/', ' ', $_POST['remarks_pay'])); /*Kiveszi az entereket és a tabokat*/


//egyéb adatok változói
$punk=$_POST['punk'];
$pote=$_POST['pote'];
$sote=$_POST['sote'];
$jon=$_POST['jon'];

//további megjegyzések változója
$remarks_fur = trim(preg_replace('/\s+/', ' ', $_POST['remarks_fur'])); /*Kiveszi az entereket és a tabokat*/


//személyes adatok
if (($hs_day)&&($hs_month)) //csak akkor fűzi össze az érettségi dátumot, ha van nap és hónap is megadva
	{	
	$hs_date=$hs_year.$hs_month.$hs_day; 
	}
/*else
	{
	$hs_date='0000-00-00';
	}*/

/**********************************ADATBÁZIS MŰVELETEK*********************************/	
	
$update_data=$conn->query
	("UPDATE applicants SET fname='$fname', gname='$gname', gender='$gender', dob='$birthdate', pob_country='$pob_country', pob_city='$pob_city', citizen='$citizen', mfname='$mfname', mgname='$mgname', firstlang='$firstlang', proof_type='$proof_type', proof_num='$proof_num', permadd='$permadd', add_country='$add_country', add_pc='$add_pc', add_city='$add_city', phone='$phone', hs_name='$hs_name', hs_year='$hs_year', hs_date='$hs_date', hs_certnum='$hs_certnum', hs_country='$hs_country', hs_city='$hs_city', er_fname='$er_fname', er_gname='$er_gname', er_relation='$er_relation', er_phone='$er_phone', er_email='$er_email', er_permadd='$er_permadd', er_add_pc='$er_add_pc', er_add_city='$er_add_city', er_add_country='$er_add_country' WHERE jel_id='$jel_id'");
	echo 'Jelentkező adatai frissítve.';
	?><br /><?php

//email
if($email) //vizsgálja van-e email rögzítve, van-e értéke a $email-nek NINCS VIZSGÁLAT! MEGOLDANI!
{
$find_username=$conn->query("SELECT username FROM applicants WHERE jel_id='$jel_id'");
$row=mysqli_fetch_array($find_username);
$app_name=$row['username'];

$update_email=$conn->query
	("UPDATE user SET email='$email' WHERE username='$app_name'");
	echo 'E-mail cím frissítve.';	
	?><br /><?php	
}	
	
//kettős állampolgárság
if($citizen2) //vizsgálja van-e 2. állampolhárság rögzítve, van-e értéke a $citizen2-nek
{
$check_citizen2=$conn->query("SELECT * FROM citizen2 WHERE jel_id='$jel_id'");

if ($check_citizen2->num_rows==0) 
	{
	$insert_citizen2=$conn->query
	("INSERT INTO citizen2 (jel_id, citizen2) VALUES ('$jel_id', '$citizen2')");
	echo 'Állampolgárság 2 rögzítve.';
	?><br /><?php
	}
else
	{
	$update_citizen2=$conn->query
	("UPDATE citizen2 SET citizen2='$citizen2' WHERE jel_id='$jel_id'");
	echo 'Állampolgárság 2 frissítve.';	
	?><br /><?php
	}	
}
	
//képviselő adatai
if($rep_name) //vizsgálja, hogy van-e képviselo rögzítve
{
$check_rep=$conn->query("SELECT * FROM reps WHERE jel_id='$jel_id'");

if ($check_rep->num_rows==0) 
	{
	$insert_rep=$conn->query
	("INSERT INTO reps (jel_id, rep_name) VALUES ('$jel_id', '$rep_name')");
	echo 'Képviselő rögzítve.';
	?><br /><?php
	}
else
	{
	$update_rep=$conn->query
	("UPDATE reps SET rep_name='$rep_name' WHERE jel_id='$jel_id'");
	echo 'Képviselő frissítve.';	
	?><br /><?php
	}	
}

//német érettségi típus+átlag+nem németországi érettségi 
if(($ab_typ)||($ab_avg))
{
$check_jel_id=$conn->query("SELECT * FROM abitur WHERE jel_id='$jel_id'");

if ($check_jel_id->num_rows==0) 
	{
		$insert_abitur=$conn->query
	("INSERT INTO abitur (jel_id, ab_typ, ab_avg) VALUES ('$jel_id', '$ab_typ', '$ab_avg')");
	echo 'Érettségi adatok rögzítve.';
	?><br /><?php
	}
else
	{
	$update_abitur=$conn->query
	("UPDATE abitur SET ab_typ='$ab_typ', ab_avg='$ab_avg' WHERE jel_id='$jel_id'");
	echo 'Érettségi adatok frissítve.';	
	?><br /><?php
	}	
}


//emelt szintű német érettségi jegyeinek változói
$bio_lf=$_POST['bio_lf'];
$chem_lf=$_POST['chem_lf'];
$math_lf=$_POST['math_lf'];
$phys_lf=$_POST['phys_lf']; 

if(($bio_lf)||($chem_lf)||($math_lf)||($phys_lf))
{
$check_jel_id=$conn->query("SELECT * FROM abitur_lf WHERE jel_id='$jel_id'");

if ($check_jel_id->num_rows==0) 
	{
		$insert_abitur_lf=$conn->query
	("INSERT INTO abitur_lf (jel_id, bio_lf, chem_lf, math_lf, phys_lf) VALUES ('$jel_id','$bio_lf','$chem_lf','$math_lf','$phys_lf')");
	echo 'Emelt szintű érettségi jegyek rögzítve.';	
	?><br /><?php
	}
else
	{
	$update_abitur_lf=$conn->query
	("UPDATE abitur_lf SET bio_lf='$bio_lf', chem_lf='$chem_lf', math_lf='$math_lf', phys_lf='$phys_lf'   WHERE jel_id='$jel_id'");
	echo 'Emelt szintű érettségi jegyek frissítve.';	
	?><br /><?php
	}	
}


//alap szintű német érettségi jegyeinek változói
$bio_gf=$_POST['bio_gf']; 
$chem_gf=$_POST['chem_gf'];
$math_gf=$_POST['math_gf'];
$phys_gf=$_POST['phys_gf'];

if(($bio_gf)||($chem_gf)||($math_gf)||($phys_gf))
{
$check_jel_id=$conn->query("SELECT * FROM abitur_gf WHERE jel_id='$jel_id'");

if ($check_jel_id->num_rows==0) 
	{
		$insert_abitur_lf=$conn->query
	("INSERT INTO abitur_gf (jel_id, bio_gf, chem_gf, math_gf, phys_gf) VALUES ('$jel_id','$bio_gf','$chem_gf','$math_gf','$phys_gf')");
	echo 'Alap szintű érettségi jegyek rögzítve.';	
	?><br /><?php
	}
else
	{
	$update_abitur_gf=$conn->query
	("UPDATE abitur_gf SET bio_gf='$bio_gf', chem_gf='$chem_gf', math_gf='$math_gf', phys_gf='$phys_gf'   WHERE jel_id='$jel_id'");
	echo 'Alap szintű érettségi jegyek frissítve.';	
	?><br /><?php
	}	
}

//utolsó 4 félév jegyeinek változói
$bio_1=$_POST['bio_1']; 
$bio_2=$_POST['bio_2']; 
$bio_3=$_POST['bio_3']; 
$bio_4=$_POST['bio_4']; 
$chem_1=$_POST['chem_1']; 
$chem_2=$_POST['chem_2']; 
$chem_3=$_POST['chem_3'];
$chem_4=$_POST['chem_4']; 
$math_1=$_POST['math_1'];
$math_2=$_POST['math_2']; 
$math_3=$_POST['math_3']; 
$math_4=$_POST['math_4']; 
$phys_1=$_POST['phys_1'];
$phys_2=$_POST['phys_2']; 
$phys_3=$_POST['phys_3']; 
$phys_4=$_POST['phys_4']; 

$check_jel_id=$conn->query("SELECT * FROM semesters WHERE jel_id='$jel_id'");

if ($check_jel_id->num_rows==0) 
	{
		$insert_semesters_lf=$conn->query
	("INSERT INTO semesters (jel_id, bio_1, bio_2, bio_3, bio_4, chem_1, chem_2, chem_3, chem_4, math_1, math_2, math_3, math_4, phys_1, phys_2, phys_3, phys_4) VALUES ('$jel_id','$bio_1','$bio_2','$bio_3','$bio_4','$chem_1','$chem_2','$chem_3','$chem_4','$math_1','$math_2','$math_3','$math_4','$phys_1','$phys_2','$phys_3','$phys_4')");
	echo 'Utolsó négy félév jegyei rögzítve.';	
	?><br /><?php
	}
else
	{
	$update_semesters=$conn->query
	("UPDATE semesters SET bio_1='$bio_1', bio_2='$bio_2', bio_3='$bio_3', bio_4='$bio_4',chem_1='$chem_1', chem_2='$chem_2', chem_3='$chem_3', chem_4='$chem_4', math_1='$math_1', math_2='$math_2', math_3='$math_3', math_4='$math_4', phys_1='$phys_1', phys_2='$phys_2', phys_3='$phys_3', phys_4='$phys_4' WHERE jel_id='$jel_id'");
	echo 'Utolsó négy félév jegyei frissítve.';	
	?><br /><?php
	}

//nem németországi érettségi
if($ab_ng) //vizsgálja, hogy van-e nem németországi érettségi
{
$check_jel_id=$conn->query("SELECT * FROM abitur_ng WHERE jel_id='$jel_id'");

if ($check_jel_id->num_rows==0) 
	{
		$insert_ab_ng=$conn->query
	("INSERT INTO abitur_ng (jel_id, ab_ng) VALUES ('$jel_id', '$ab_ng')");
	echo 'Nem németországi érettségi rögzítve.';
	?><br /><?php
	}
else
	{
	$update_quals=$conn->query
	("UPDATE abitur_ng SET ab_ng='$ab_ng' WHERE jel_id='$jel_id'");
	echo 'Nem németországi érettségi frissítve.';	
	?><br /><?php
	}	
}

//végzettségi adatok
if($qual) //vizsgálja, hogy van-e végzettségi adat
{
$check_jel_id=$conn->query("SELECT * FROM qualifications WHERE jel_id='$jel_id'");

if ($check_jel_id->num_rows==0) 
	{
		$insert_quals=$conn->query
	("INSERT INTO qualifications (jel_id, qual) VALUES ('$jel_id', '$qual')");
	echo 'Végzettség rögzítve.';
	?><br /><?php
	}
else
	{
	$update_quals=$conn->query
	("UPDATE qualifications SET qual='$qual' WHERE jel_id='$jel_id'");
	echo 'Végzettség frissítve.';	
	?><br /><?php
	}	
}


//felsőfokú tanulmányi adatok
if($studs) //vizsgálja, hogy van-e felsőfokú tanulmányi adatok
{
$check_jel_id=$conn->query("SELECT * FROM studs WHERE jel_id='$jel_id'");

if ($check_jel_id->num_rows==0) 
	{
		$insert_studs=$conn->query
	("INSERT INTO studs (jel_id, studs) VALUES ('$jel_id', '$studs')");
	echo 'Felsőfokú tanulmányi adat rögzítve.';
	?><br /><?php
	}
else
	{
	$update_studs=$conn->query
	("UPDATE studs SET studs='$studs' WHERE jel_id='$jel_id'");
	echo 'Felsőfokú tanulmányi adat frissítve.';	
	?><br /><?php
	}	
}

//szakmai gyakorlatok
if($practices) //vizsgálja, hogy van-e egyéb szakmai gyakorlat
{
$check_jel_id=$conn->query("SELECT * FROM practices WHERE jel_id='$jel_id'");

if ($check_jel_id->num_rows==0) 
	{
		$insert_practices=$conn->query
	("INSERT INTO practices (jel_id, practices) VALUES ('$jel_id', '$practices')");
	echo 'Gyakorlatok rögzítve.';
	?><br /><?php
	}
else
	{
	$update_practices=$conn->query
	("UPDATE practices SET practices='$practices' WHERE jel_id='$jel_id'");
	echo 'Gyakorlatok frissítve.';	
	?><br /><?php
	}	
}

//jelentkezési dokumentumok
$check_jel_id=$conn->query("SELECT * FROM appdocs WHERE jel_id='$jel_id'");

if ($check_jel_id->num_rows==0) 
	{
		$insert_appdocs=$conn->query
	("INSERT INTO appdocs (jel_id, adate, xray, dyslexia, HB_test, HB_vacc, HC_test, med_cert, hiv_test, app_form, school_cert, cv, photo, app_fee, passport, toefl, comp, birthcert) VALUES ('$jel_id', '$adate', '$xray', '$dyslexia', '$HB_test', '$HB_vacc', '$HC_test', '$med_cert', '$hiv_test', '$app_form', '$school_cert', '$cv', '$photo', '$app_fee', '$passport', '$toefl', '$comp', '$birthcert')");
	echo 'Jelentkezési dokumentumok rögzítve.';
	?><br /><?php
	}
else
	{
	$update_appdocs=$conn->query
	("UPDATE appdocs SET adate='$adate', xray='$xray', dyslexia='$dyslexia', HB_test='$HB_test', HB_vacc='$HB_vacc', HC_test='$HC_test', med_cert='$med_cert', hiv_test='$hiv_test', app_form='$app_form', school_cert='$school_cert', cv='$cv', photo='$photo', app_fee='$app_fee', passport='$passport', toefl='$toefl', comp='$comp', birthcert='$birthcert' WHERE jel_id='$jel_id'");
	echo 'Jelentkezési dokumentumok frissítve.';	
	?><br /><?php
	}

//beiratkozási dokumentumok megjegyzése
if($remarks_rd)
{
$check_jel_id=$conn->query("SELECT * FROM remarks_rd WHERE jel_id='$jel_id'");

if ($check_jel_id->num_rows==0) 
	{
		$insert_remarks_rd=$conn->query
	("INSERT INTO remarks_rd (jel_id, remarks_rd) VALUES ('$jel_id', '$remarks_rd')");
	echo 'beiratkozási dokumentumok megjegyzése rögzítve.';
	?><br /><?php
	}
else
	{
	$update_remarks_rd=$conn->query
	("UPDATE remarks_rd SET remarks_rd='$remarks_rd' WHERE jel_id='$jel_id'");
	echo 'beiratkozási dokumentumok megjegyzése frissítve.';	
	?><br /><?php
	}	
}	

//angol képzés speciális dokumentumainak változói

$check_jel_id=$conn->query("SELECT * FROM engdocs WHERE jel_id='$jel_id'");

if ($check_jel_id->num_rows==0) 
	{
		$insert_engdocs=$conn->query
	("INSERT INTO engdocs (jel_id, appfee, regform, entfee, trscrpt, crsdsc, diploma) VALUES ('$jel_id', '$appfee', '$regform', '$entfee', '$trscrpt', '$crsdsc', '$diploma')");
	echo 'Egyéb angol dokumentumok rögzítve.';
	?><br /><?php
	}
else
	{
	$update_engdocs=$conn->query
	("UPDATE engdocs SET appfee='$appfee', regform='$regform', entfee='$entfee', trscrpt='$trscrpt', crsdsc='$crsdsc', diploma='$diploma' WHERE jel_id='$jel_id'");
	echo 'Egyéb angol dokumentumok frissítve.';
	?><br /><?php	
	}


//német képzés speciális dokumentumai
$check_jel_id=$conn->query("SELECT * FROM gerdocs WHERE jel_id='$jel_id'");

if ($check_jel_id->num_rows==0) 
	{
		$insert_gerdocs=$conn->query
	("INSERT INTO gerdocs (jel_id, rh_pro, r_helf, r_san, r_ass, ges_kr, m_fach, phys, sg_fach, itbtms, krank, vbjmcd, ziv_d, fsj) VALUES ('$jel_id', '$rh_pro', '$r_helf', '$r_san', '$r_ass', '$ges_kr', '$m_fach', '$phys', '$sg_fach', '$itbtms', '$krank', '$vbjmcd', '$ziv_d', '$fsj')");
	echo 'Egyéb német dokumentumok rögzítve.';
	?><br /><?php
	}
else
	{
	$update_gerdocs=$conn->query
	("UPDATE gerdocs SET rh_pro='$rh_pro', r_helf='$r_helf', r_san='$r_san', r_ass='$r_ass', ges_kr='$ges_kr', m_fach='$m_fach', phys='$phys', sg_fach='$sg_fach', itbtms='$itbtms', krank='$krank', vbjmcd='$vbjmcd', ziv_d='$ziv_d', fsj='$fsj' WHERE jel_id='$jel_id'");
	echo 'Egyéb német dokumentumok frissítve.';
	?><br /><?php	
	}

//német képzés speciális dokumentumainak megjegyzése
if($remarks_gd)
{
$check_jel_id=$conn->query("SELECT * FROM remarks_gd WHERE jel_id='$jel_id'");

if ($check_jel_id->num_rows==0) 
	{
		$insert_remarks_gd=$conn->query
	("INSERT INTO remarks_gd (jel_id, remarks_gd) VALUES ('$jel_id', '$remarks_gd')");
	echo 'Német képzés speciális dokumentumainak megjegyzése rögzítve.';
	?><br /><?php
	}
else
	{
	$update_remarks_gd=$conn->query
	("UPDATE remarks_gd SET remarks_gd='$remarks_gd' WHERE jel_id='$jel_id'");
	echo 'Német képzés speciális dokumentumainak megjegyzése frissítve.';	
	?><br /><?php
	}	
}

//beiratkozási dokumentumok	- döntéssel, kitöltéssel összefüggésbe hozni
$check_jel_id=$conn->query("SELECT * FROM regdocs WHERE jel_id='$jel_id'");

if ($check_jel_id->num_rows==0) 
	{
		$insert_regdocs=$conn->query
	("INSERT INTO regdocs (jel_id, proof, study_a, fee_dec, prep, vorb, eng_ent, rd_subm,  var_rub, imm_vacc, labreport) VALUES ('$jel_id', '$proof', '$study_a', '$fee_dec', '$prep', '$vorb', '$eng_ent', '$rd_subm', '$var_rub', '$imm_vacc', '$labreport')");
	echo 'Beiratkozási dokumentumok rögzítve.';
	?><br /><?php
	}
else
	{
	$update_regdocs_id=$conn->query
	("UPDATE regdocs SET proof='$proof', study_a='$study_a', fee_dec='$fee_dec', prep='$prep', vorb='$vorb', eng_ent='$eng_ent', rd_subm='$rd_subm', var_rub='$var_rub', imm_vacc='$imm_vacc', labreport='$labreport' WHERE jel_id='$jel_id'");
	echo 'Beiratkozási dokumentumok frissítve.';
	?><br /><?php	
	}


//beiratkozási dokumentumok megjegyzése
if($remarks_ad)
{
$check_jel_id=$conn->query("SELECT * FROM remarks_ad WHERE jel_id='$jel_id'");

if ($check_jel_id->num_rows==0) 
	{
		$insert_remarks_ad=$conn->query
	("INSERT INTO remarks_ad (jel_id, remarks_ad) VALUES ('$jel_id', '$remarks_ad')");
	echo 'Jelentkezési dokumentumok megjegyzése rögzítve.';
	?><br /><?php
	}
else
	{
	$update_remarks1=$conn->query
	("UPDATE remarks_ad SET remarks_ad='$remarks_ad' WHERE jel_id='$jel_id'");
	echo 'Jelentkezési dokumentumok megjegyzése frissítve.';	
	?><br /><?php
	}	
}

//befizetések megjegyzése
if($remarks_pay)
{
$check_jel_id=$conn->query("SELECT * FROM remarks_pay WHERE jel_id='$jel_id'");

if ($check_jel_id->num_rows==0) 
	{
		$insert_remarks_pay=$conn->query
	("INSERT INTO remarks_pay (jel_id, remarks_pay) VALUES ('$jel_id', '$remarks_pay')");
	echo 'Befizetések megjegyzés rögzítve.';
	?><br /><?php
	}
else
	{
	$update_remarks1=$conn->query
	("UPDATE remarks_pay SET remarks_pay='$remarks_pay' WHERE jel_id='$jel_id'");
	echo 'Befizetések megjegyzés  frissítve.';	
	?><br /><?php
	}	
}

//üzenetek
if($message)
{

$check_jel_id=$conn->query("SELECT * FROM messages WHERE jel_id='$jel_id'");

if ($check_jel_id->num_rows==0) 
	{
		$insert_message=$conn->query
	("INSERT INTO messages (jel_id, message) VALUES ('$jel_id', '$message')");
	echo 'Üzenet rögzítve.';
	?><br /><?php
	}
else
	{
	$update_messages=$conn->query
	("UPDATE messages SET message='$message' WHERE jel_id='$jel_id'");
	echo 'Üzenet frissítve.';	
	?><br /><?php
	}	
}
//befizetések
$check_jel_id=$conn->query("SELECT * FROM payments WHERE jel_id='$jel_id'");

if ($check_jel_id->num_rows==0) 
	{
		$insert_payments=$conn->query
	("INSERT INTO payments (jel_id, pdate) VALUES ('$jel_id', '$pdate')");
	echo 'Befizetési adatok rögzítve.';
	?><br /><?php
	}
else
	{
	$update_payments=$conn->query
	("UPDATE payments SET pdate='$pdate' WHERE jel_id='$jel_id'");
	echo 'Befizetési adatok frissítve.';	
	?><br /><?php
	}	
	
$check_jel_id=$conn->query("SELECT * FROM other WHERE jel_id='$jel_id'");

//Egyéb adatok - POTE, SOTE, PÜNKÖSD, JÖN
if(($punk)||($pote)||($sote)||($jon))
{
	if ($check_jel_id->num_rows==0) 
		{
			$insert_other=$conn->query
		("INSERT INTO other (jel_id, punk, pote, sote, jon) VALUES ('$jel_id', '$punk', '$pote', '$sote', '$jon')");
		echo 'Egyéb adatok rögzítve.';
		?><br /><?php
		}
	else
		{
		$update_other=$conn->query
		("UPDATE other SET punk='$punk', pote='$pote', sote='$sote', jon='$jon' WHERE jel_id='$jel_id'");
		echo 'Egyéb adatok frissítve.';	
		?><br /><?php
		}
}

//további megjegyzés
if($remarks_fur)
{
$check_jel_id=$conn->query("SELECT * FROM remarks_fur WHERE jel_id='$jel_id'");

if ($check_jel_id->num_rows==0) 
	{
		$insert_remarks_fur=$conn->query
	("INSERT INTO remarks_fur (jel_id, remarks_fur) VALUES ('$jel_id', '$remarks_fur')");
	echo 'További megjegyzés rögzítve.';
	?><br /><?php
	}
else
	{
	$update_remarks_fur=$conn->query
	("UPDATE remarks_fur SET remarks_fur='$remarks_fur' WHERE jel_id='$jel_id'");
	echo 'További megjegyzés frissítve.';	
	?><br /><?php
	}	
}		
	
include 'back_to_applicants.php';
do_html_footer();
