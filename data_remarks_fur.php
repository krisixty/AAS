<?php
$remarks_fur=$conn->query("SELECT * FROM remarks_fur WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($remarks_fur);
?>
<fieldset><legend>További megjegyzések:</legend>
<textarea name="remarks_fur" cols="100" rows="5" ><?php print $sor['remarks_fur'] ?></textarea>
</fieldset>