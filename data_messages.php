<?php
$messages=$conn->query("SELECT * FROM messages WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($messages);
?>
<fieldset><legend>Üzenetek:</legend>
<input name="jel_id" type="hidden" value="<?php echo $jel_id ?>" />
<textarea name="message" cols="100" rows="10" ><?php print $sor['message'] ?></textarea>
</fieldset>