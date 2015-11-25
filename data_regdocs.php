<?php
$regdocs=$conn->query("SELECT * FROM regdocs WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($regdocs);
?>
<fieldset><legend>Beiratkozási dokumentumok:</legend>

Proof of Enrollment: <select name="proof"> 
<option><?php print $sor['proof'] ?></option>
<option>No</option>
<option>1db</option>
<option>2db</option>
<option>Fax</option>
<option>Sca</option>
</select><br>

Study Agreement: <select name="study_a">
<option><?php print $sor['study_a'] ?></option>
<option>No</option>
<option>1db</option>
<option>2db</option>
<option>Fax</option>
<option>Sca</option>
</select><br>

Tuition fee receipt: <select name="fee_dec">
<option><?php print $sor['fee_dec'] ?></option>
<option>No</option>
<option>Yes</option>
<option>Not accepted</option>
</select><br>
<?php include 'data_remarks_regdocs.php' ?>
</fieldset>
