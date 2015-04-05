<?php
$remarks_rd=$conn->query("SELECT * FROM remarks_rd WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($remarks_rd);
?>
<fieldset><legend>Megjegyzések:</legend>
<textarea name="remarks_rd" cols="100" rows="5" ><?php print $sor['remarks_rd'] ?></textarea>
</fieldset>