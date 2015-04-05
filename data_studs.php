<?php
$studs=$conn->query("SELECT * FROM studs WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($studs);
?>
<fieldset><legend>Felsőfokú tanulmányok:</legend>
<textarea name="studs" cols="100" rows="3" ><?php print $sor['studs'] ?></textarea>
</fieldset>