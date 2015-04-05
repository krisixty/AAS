<?php
$remarks=$conn->query("SELECT * FROM remarks WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($remarks);
?>
<fieldset><legend>Megjegyzések:</legend>
<input name="jel_id" type="hidden" value="<?php echo $jel_id ?>" />
<textarea name="remarks1" cols="100" rows="5" ><?php print $sor['remarks'] ?></textarea>
</fieldset>