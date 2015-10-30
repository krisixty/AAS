<?php
$appdocs=$conn->query("SELECT * FROM appdocs WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($appdocs); //APPDOCS QUERY

$regdocs=$conn->query("SELECT * FROM regdocs WHERE jel_id='$jel_id'");
$rd_sor=mysqli_fetch_array($regdocs); //REGDOCS QUERY

?>
<fieldset><legend>Felvétel után beadandó dokumentumok:</legend>

Hepatitis B test: <select name="HB_test"> <?php //appdocs ?>
<option><?php print $sor['HB_test'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>

Hepatitis B vaccination card: <select name="HB_vacc"> <?php //appdocs ?>
<option><?php print $sor['HB_vacc'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>

Hepatitis C test: <select name="HC_test"> <?php //appdocs ?>
<option><?php print $sor['HC_test'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>

HIV test: <select name="hiv_test"> <?php //appdocs ?>
<option><?php print $sor['hiv_test'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>

Chest X-Ray: <select name="xray"> <?php //appdocs ?>
<option><?php print $sor['xray'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>

Vaccination Card/Immunization Records: <select name="imm_vacc"> <?php //regdocs ?>
<option><?php print $rd_sor['imm_vacc'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>

Varicella and Rubeola Declaration: <select name="var_rub"> <?php //regdocs ?>
<option><?php print $rd_sor['var_rub'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>

Certified copy of your Birth Certificate: <select name="birthcert"> <?php //appdocs ?>
<option><?php print $sor['birthcert'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>

Lab report: <select name="labreport"> <?php //regdocs ?>
<option><?php print $rd_sor['labreport'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br><br>


Anyaga teljes? <select name="comp"> <?php //appdocs ?>
<option><?php print $sor['comp'] ?></option>
<option>No</option>
<option>Yes</option>
</select><br><br><br>


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
