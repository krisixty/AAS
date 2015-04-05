<?php
$remarks=$conn->query("SELECT * FROM remarks_pay WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($remarks);
?>
<fieldset><legend>Megjegyzések:</legend>
<textarea name="remarks_pay" cols="100" rows="5" ><?php print $sor['remarks_pay'] ?></textarea>
</fieldset>