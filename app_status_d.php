<?php
$pageLanguage = 'german';
require_once('aas_includes.php');
session_start();
do_html_header('');
check_valid_user();

$username=$_SESSION['valid_user'];
$conn = db_connect();

$jel_id= $conn->query("SELECT jel_id FROM applicants WHERE username='$username'");
if ($jel_id->num_rows>0) //vizsgálja, hogy adott-e már be jelentkezést
	{
	$sor=mysqli_fetch_array($jel_id);

$jel_id=$sor['jel_id'];
/*
$appdocs= $conn->query("SELECT * FROM appdocs WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($appdocs);	
*/
$appdocs= $conn->query("SELECT * FROM appdocs WHERE jel_id='$jel_id'");
$ad_sor=mysqli_fetch_array($appdocs);	//APPDOCS sor

$regdocs=$conn->query("SELECT * FROM regdocs WHERE jel_id='$jel_id'");
$rd_sor=mysqli_fetch_array($regdocs); //REGDOCS sor - Az angollal ellentétben itt a regdocs táblából kérdez le.

div_open();
?>

<p>
<b>Bisher eingereichte ärztliche Unterlagen:</b><br />
Gesundheitsattest: <?php print $ad_sor['med_cert'];?> <br />
Dyslexie: <?php print $ad_sor['dyslexia'];?> <br />
<br />
<b>Weitere eingereichte Unterlagen:</b><br />
Ausgedrucktes und unterschriebenes
Bewerbungsformular: <?php print $ad_sor['app_form'];?> <br />
Beglaubigte Kopie des Abiturzeugnisses: <?php print $ad_sor['school_cert'];?> <br />
Tabellarischer Lebenslauf: <?php print $ad_sor['cv'];?> <br />
Einzahlungsbeleg über die Bewerbungsgebühren: <?php print $ad_sor['app_fee'];?> <br />
Kopie des Personalausweises/Reisepasses: <?php print $ad_sor['passport'];?> <br />
<br />
Ihre Bewerbung ist vollständig: <?php print $ad_sor['comp'];?><br />
<br />
<br />
<i>Nach der Zulassung:</i><br />
<b>Nach der Zulassung eingereichte ärztliche Unterlagen:</b><br />
Hepatitis-B-Test oder Kopie des Impfpasses: <?php print $ad_sor['HB_test'];?><br /> 
Hepatitis-C-Test: <?php print $ad_sor['HC_test'];?><br /> 
HIV-Test: <?php print $ad_sor['hiv_test'];?> <br />
Befund über die Röntgenaufnahme des Brustraumes: <?php print $ad_sor['xray'];?><br /> 

<?php /*Kopie des Impfpasses: <?php print $ad_sor['HB_vacc'];?><br /> 
A windpockent beilleszteni adatbázába*/ ?>

Erklärung über Windpocken und Röteln: <?php print $rd_sor['var_rub'];?><br /> 

<br />
<b>Weitere eingereichte Unterlagen:</b><br />
beglaubigte Kopie der Geburtsurkunde: <?php print $ad_sor['birthcert'];?><br /> 
Rückmeldeformular: <?php print $rd_sor['proof'];?><br /> 
2 Studienvereinbarungen: <?php print $rd_sor['study_a'];?><br /> 
Einzahlungsbeleg über die Studiengebühren: <?php print $rd_sor['fee_dec'];?><br /> 
<br />
Die zur Einschreibung benötigten Dokumente sind eingereicht worden: <?php print $rd_sor['rd_subm'];?><br />
<br />
<b>Bewerbung für das Programm/die Programme:</b><br />
<?php
	}
    else
	{
	?><p class="text2">You have not submitted your application yet.</p><?php
	exit;
	}

$applications=$conn->query("SELECT * FROM jel_es_prog WHERE jel_id='$jel_id'");

while($sor=mysqli_fetch_array($applications))
	{ 
	   include 'programs_d.php';
	}

?><br /><b>Entscheidung: </b><br /> <?php
//Ha talál döntést, akkor kiírja azt	
$decisions=$conn->query("SELECT * FROM decisions WHERE jel_id='$jel_id'");
if ($decisions->num_rows>0)
	{
	while($sor=mysqli_fetch_array($decisions))
		{ 
		?>
		Programm: <?php include 'programs_dec.php';?>
    	Entscheidung: <?php include 'decisions_deutsch.php';?>
   	 	Rückmeldefrist: <?php print $sor['dfdate'];?><br /><br />
		<?php
		}
	}
else
	{
	?>Zur Zeit noch keine Entscheidung<br /> <?php
	}
	
	
//Ha talál üzenetet, akkor kiírja azt	
$messages=$conn->query("SELECT * FROM messages WHERE jel_id='$jel_id'");
if ($messages->num_rows>0) 
	{
	$sor=mysqli_fetch_array($messages);?>
	<b>Botschaften:</b><br />
	<?php print $sor['message']; ?> <br /> <?php
	}


//Ha talál 'Felvéve' döntést, akkor kiírja a beiratkozási dokumentumokat
$accepted=$conn->query("SELECT * FROM jel_es_prog WHERE jel_id='$jel_id' AND decision='F'");
if ($accepted->num_rows>0) 
	{
	$regdocs= $conn->query("SELECT * FROM regdocs WHERE jel_id='$jel_id'");
	$sor=mysqli_fetch_array($regdocs);	
	?> <br /><b> <?php
	print 'Documents for registration:';  ?></b><br />
Proof of enrollment: <?php print $sor['proof'];?> <br />
Study agreement:  <?php print $sor['study_a'];?> <br /><br /></p>
    <?php
	}
?></p><?php

div_close();
do_html_footer();
?>