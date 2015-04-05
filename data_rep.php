<?php
$rep_name=$conn->query("SELECT * FROM reps WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($rep_name);
?>
<fieldset><legend>Képviselő:</legend>
Neve:
<input name="rep_name" type="text" value="<?php print $sor['rep_name'] ?>" /><br />
</fieldset>