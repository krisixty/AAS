<?php
/*$regdocs=$conn->query("SELECT * FROM regdocs WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($regdocs);*/

$appdocs= $conn->query("SELECT * FROM appdocs WHERE jel_id='$jel_id'");
$ad_sor=mysqli_fetch_array($appdocs);	//APPDOCS sor

$regdocs=$conn->query("SELECT * FROM regdocs WHERE jel_id='$jel_id'");
$rd_sor=mysqli_fetch_array($regdocs); //REGDOCS sor 


?>
<fieldset><legend>Beiratkozási dokumentumok:</legend>
<!--APPDOCS-->
Hepatitis-B Test oder Kopie des Impfpasses:<select name="HB_test">
<option><?php print $ad_sor['HB_test'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>

<!--APPDOCS-->
Hepatitis-C Test: <select name="HC_test">
<option><?php print $ad_sor['HC_test'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>

<!--APPDOCS-->
HIV-test: <select name="hiv_test">
<option><?php print $ad_sor['hiv_test'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>

<!--APPDOCS-->
Befund über die Röntgenaufnahme des Brustraumes:
<select name="xray">
<option><?php print $ad_sor['xray'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>

<!--REGDOCS-->
Erklärung über Windpocken und Röteln:
<select name="var_rub">
<option><?php print $rd_sor['var_rub'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>

<!--APPDOCS-->
<?php /*
Kopie des Impfpasses (Hepatitis-B):<select name="HB_vacc">
<option><?php print $ad_sor['HB_vacc'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>
*/?>

<!--APPDOCS-->
Kopie der Geburtsurkunde: <select name="birthcert"> <?php //appdocs ?>
<option><?php print $ad_sor['birthcert'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>

<!--REGDOCS-->
Rückmeldebestätigung: <select name="proof">
<option><?php print $rd_sor['proof'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>

<!--REGDOCS-->
Studienvereinbarung: <select name="study_a">
<option><?php print $rd_sor['study_a'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>

<!--REGDOCS-->
Einzahlungsbeleg über die eingezahlten Studiengebühren: <select name="fee_dec">
<option><?php print $rd_sor['fee_dec'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>

<!--REGDOCS-->
<? /* KIVETETTÉK 2016.01.05-KOR
Laborergebnisse: <select name="labreport">
<option><?php print $rd_sor['labreport'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>
*/?>

<!--REGDOCS-->
A beiratkozáshoz szükséges dokumentumok beadásra kerültek? <select name="rd_subm">
<option><?php print $rd_sor['rd_subm'] ?></option>
<option>No</option>
<option>Yes</option>
</select><br>

<p>Feltöltött fájlok:<br>
<?
	$type_of_doc = 'HB_test'; 
	include 'shwUDocs.php';

	$type_of_doc = 'HB_vacc'; 
	include 'shwUDocs.php';
	
	$type_of_doc = 'HC_test'; 
	include 'shwUDocs.php';

	$type_of_doc = 'hiv_test'; 
	include 'shwUDocs.php';

	$type_of_doc = 'xray'; 
	include 'shwUDocs.php';

	$type_of_doc = 'imm_vacc'; 
	include 'shwUDocs.php';

	$type_of_doc = 'var_rub'; 
	include 'shwUDocs.php';

	$type_of_doc = 'birthcert'; 
	include 'shwUDocs.php';
	
	$type_of_doc = 'labreport'; 
	include 'shwUDocs.php';

?>
<p/>

</fieldset>
