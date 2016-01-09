<?php
$appdocs=$conn->query("SELECT * FROM appdocs WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($appdocs); //APPDOCS QUERY
?>
<fieldset><legend>Jelentkezési dokumentumok:</legend>

Printed and signed Application Form: <select name="app_form"> <?php //appdocs ?>
<option><?php print $sor['app_form'] ?></option>
<option>No</option>
<option>Yes</option>
<option>Not accepted</option>
</select><br>

Application Fee: <select name="app_fee"> <?php //appdocs ?>
<option><?php print $sor['app_fee'] ?></option>
<option>No</option>
<option>Yes</option>
<option>Not accepted</option>
<option>Paid to agent</option>
</select><br>

<?php
$engdocs=$conn->query("SELECT * FROM engdocs WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($engdocs); //ENGDOCS QUERY
?>
<?/*
Application Fee: <select name="appfee"> <?php //engdocs ?>
<option><?php print $sor['appfee'] ?></option>
<option>No</option>
<option>Yes</option>
<option>Not accepted</option>
<option>Paid to agent</option>
</select><br>
*/?>
<?php
$appdocs=$conn->query("SELECT * FROM appdocs WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($appdocs); //APPDOCS QUERY
?>

Certified photocopy of School Leaving Certificate: <select name="school_cert"> <?php //appdocs ?>
<option><?php print $sor['school_cert'] ?></option>
<option>No</option>
<option>Yes</option>
<option>Not accepted</option>
<option>Not certified copy</option>
</select><br>

High school transcript: <select name="hs_trscrpt"> <?php //engdocs ?>
<option><?php print $sor['hs_trscrpt'] ?></option>
<option>No</option>
<option>Yes</option>
<option>Not accepted</option>
</select><br><br>

<?php
$engdocs=$conn->query("SELECT * FROM engdocs WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($engdocs); //ENGDOCS QUERY
?>
Additional documents for transfer students:<br />
Transcript(s): <select name="trscrpt"> <?php //engdocs ?>
<option><?php print $sor['trscrpt'] ?></option>
<option>No</option>
<option>Yes</option>
<option>Not accepted</option>
<option>Not applicable</option>
<option>Not certified copy</option>
</select><br>

Course Description(s): <select name="crsdsc"> <?php //engdocs ?>
<option><?php print $sor['crsdsc'] ?></option>
<option>No</option>
<option>Yes</option>
<option>Not accepted</option>
<option>Not applicable</option>
<option>Not certified copy</option>
</select><br>

Diploma: <select name="diploma"> <?php //engdocs ?>
<option><?php print $sor['diploma'] ?></option>
<option>No</option>
<option>Yes</option>
<option>Not accepted</option>
<option>Not applicable</option>
<option>Not certified copy</option>
</select><br><br>

<?php
$appdocs=$conn->query("SELECT * FROM appdocs WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($appdocs); //APPDOCS QUERY
?>

Curriculum vitae: <select name="cv"> <?php //appdocs ?>
<option><?php print $sor['cv'] ?></option>
<option>No</option>
<option>Yes</option>
<option>Not accepted</option>
</select><br>

3 recent photos (passport size): <select name="photo"> <?php //appdocs ?>
<option><?php print $sor['photo'] ?></option>
<option>No</option>
<option>Yes</option>
<option>Not accepted</option>
</select><br>

Photocopy of your valid passport / ID: <select name="passport"> <?php //appdocs ?>
<option><?php print $sor['passport'] ?></option>
<option>No</option>
<option>Yes</option>
<option>Not accepted</option>
</select><br>

English proficiency test results: <select name="toefl"> <?php //appdocs ?>
<option><?php print $sor['toefl'] ?></option>
<option>No</option>
<option>Yes</option>
<option>Not applicable</option>
<option>Not accepted</option>
</select><br>

General Medical Certificate: <select name="med_cert"> <?php //appdocs ?>
<option><?php print $sor['med_cert'] ?></option>
<option>No</option>
<option>Yes</option>
<option>Not accepted</option>
</select><br>

Dyslexia declaration: <select name="dyslexia"> <?php //appdocs ?>
<option><?php print $sor['dyslexia'] ?></option>
<option>No</option>
<option>Yes</option>
<option>Not accepted</option>
</select><br><br>

<?php
$engdocs=$conn->query("SELECT * FROM engdocs WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($engdocs); //ENGDOCS QUERY
?>

In case of having the entrance examination in Szeged.<br>
Registration form for Szeged: <select name="regform"> <?php //engdocs ?>
<option><?php print $sor['regform'] ?></option>
<option>No</option>
<option>Yes</option>
<option>Not accepted</option>
<option>Not applicable</option>
</select><br>

Entrance exam fee for Szeged (300 USD): <select name="entfee"> <?php //engdocs ?>
<option><?php print $sor['entfee'] ?></option>
<option>No</option>
<option>Yes</option>
<option>Not accepted</option>
<option>Not applicable</option>
</select><br>

<br>

<?php
$appdocs=$conn->query("SELECT * FROM appdocs WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($appdocs);
?>

<?php 
include 'data_app_pack_date.php'; //appdocs
?>

<p>Feltöltött fájlok:<br>
<?
	$type_of_doc = 'med_cert'; 
	include 'shwUDocs.php';
	$type_of_doc = 'dyslexia'; 
	include 'shwUDocs.php';
?>
</p>
</fieldset>