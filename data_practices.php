<?php
$practices=$conn->query("SELECT * FROM practices WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($practices);
?>
<fieldset><legend>Egyéb szakmai gyakorlatok</legend>
<input name="jel_id" type="hidden" value="<?php echo $jel_id ?>" />
<textarea name="practices" cols="100" rows="5" ><?php print $sor['practices'] ?></textarea>
</fieldset>