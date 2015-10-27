<?php
/*$appdocs=$conn->query("SELECT * FROM appdocs WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($appdocs);*/

$appdocs= $conn->query("SELECT * FROM appdocs WHERE jel_id='$jel_id'");
$ad_sor=mysqli_fetch_array($appdocs);	//APPDOCS sor

$regdocs=$conn->query("SELECT * FROM regdocs WHERE jel_id='$jel_id'");
$rd_sor=mysqli_fetch_array($regdocs); //REGDOCS sor 

?>
<fieldset><legend>Jelentkezési dokumentumok:</legend>
<table>
<tr><td>
<!--APPDOCS-->
Bewerbungsformular: <select name="app_form">
<option><?php print $ad_sor['app_form'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>
<!--APPDOCS-->
Abiturzeugnis: <select name="school_cert">
<option><?php print $ad_sor['school_cert'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>
<!--APPDOCS-->
Tabellarischer Lebenslauf: <select name="cv">
<option><?php print $ad_sor['cv'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>
<!--APPDOCS-->
Kopie des Personalausweises/Reisepasses:  <select name="passport">
<option><?php print $ad_sor['passport'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>
</td>
<td>
<!--APPDOCS-->
Bewerbungsgebühren: <select name="app_fee">
<option><?php print $ad_sor['app_fee'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>
<!--APPDOCS-->
Gesundheitsattest: <select name="med_cert">
<option><?php print $ad_sor['med_cert'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>
<!--APPDOCS-->
Dyslexie:<select name="dyslexia">
<option><?php print $ad_sor['dyslexia'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>
<br>
<!--
2 Passfotos: <select name="photo">
<option><?php /*print $ad_sor['photo'] */?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>
-->

</td></tr>
</table><br>
<br>
<!--APPDOCS-->
Jelentkezési anyaga teljes? <select name="comp">
<option><?php print $ad_sor['comp'] ?></option>
<option>No</option>
<option>Yes</option>
</select><br><br>

<!--REGDOCS-->
Bewerbung für das englischsprachige Vorbereitungsjahr: <select name="prep">
<option><?php print $rd_sor['prep'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>

<!--REGDOCS-->
Bewerbung für das deutschsprachige Vorbereitungsjahr: <select name="vorb">
<option><?php print $rd_sor['vorb'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>

<!--REGDOCS-->
Anmeldung für die englischsprachige Aufnahmeprüfung: <select name="eng_ent">
<option><?php print $rd_sor['eng_ent'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br><br>

<?php 
include 'data_app_pack_date.php';
include 'data_remarks_appdocs.php'; 
?>
<p>Feltöltött fájlok:<br>
<?
$type_of_doc = 'med_cert'; 
include 'shwUDocs.php';
?>
</p>
</fieldset>