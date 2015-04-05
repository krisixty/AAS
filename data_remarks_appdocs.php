<?php
$remarks=$conn->query("SELECT * FROM remarks_ad WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($remarks);
?>
<fieldset><legend>Megjegyzések:</legend>
<textarea name="remarks_ad" cols="100" rows="5" ><?php print $sor['remarks_ad'] ?></textarea>
</fieldset>