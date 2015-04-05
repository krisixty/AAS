<?php
$remarks_gd=$conn->query("SELECT * FROM remarks_gd WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($remarks_gd);
?>
<fieldset><legend>Megjegyzések:</legend>
<textarea name="remarks_gd" cols="100" rows="5" ><?php print $sor['remarks_gd'] ?></textarea>
</fieldset>