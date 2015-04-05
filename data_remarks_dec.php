<legend>Megjegyzés:</legend>
<form action='dec_remark.php' method='post'>
<?php
$dec_remarks=$conn->query("SELECT * FROM remarks_dec WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($dec_remarks);
?>
<input name="jel_id" type="hidden" value="<?php print $jel_id ?>" />
<textarea name="remarks_dec" cols="100" rows="5" ><?php print $sor['remarks_dec'] ?></textarea><br />
<input name="app_year" type="hidden" value="<?php print $app_year ?>" />
<input type='submit' name='submit' value='Megjegyzés rögzítése'>
</form>