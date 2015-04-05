<?php
$messages=$conn->query("SELECT * FROM qualifications WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($messages);
?>
<fieldset><legend>Egyéb végzettségek:</legend>
<input name="jel_id" type="hidden" value="<?php echo $jel_id ?>" />
<textarea name="qual" cols="100" rows="3" ><?php print $sor['qual'] ?></textarea>
</fieldset>